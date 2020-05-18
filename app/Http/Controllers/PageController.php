<?php

/**
 * Class PageController
 *
 * @category Worketic
 *
 * @package Worketic
 * @author  Amentotech <theamentotech@gmail.com>
 * @license http://www.amentotech.com Amentotech
 * @link    http://www.amentotech.com
 */

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use View;
use Illuminate\Support\Facades\Redirect;
use Session;
use DB;
use Auth;
use App\User;
use App\Helper;
use App\SiteManagement;
use Illuminate\Support\Facades\Schema;

/**
 * Class PageController
 *
 */
class PageController extends Controller
{
    /**
     * Defining scope of the variable
     *
     * @access public
     * @var    array $page
     */
    protected $page;

    /**
     * Create a new controller instance.
     *
     * @param instance $page instance
     *
     * @return void
     */
    public function __construct(Page $page)
    {
        $this->page = $page;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = $this->page::getPages();
        if (file_exists(resource_path('views/extend/back-end/admin/pages/index.blade.php'))) {
            return View::make('extend.back-end.admin.pages.index', compact('pages'));
        } else {
            return View::make(
                'back-end.admin.pages.index',
                compact('pages')
            );
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $parent_page = $this->page->getParentPages();
        $parent_page = DB::table('pages')->select('id', 'title')->where('relation_type', '=', 0)->get()->toArray();
        $page_created = trans('lang.page_created');
        $sections = Helper::getPageSections();
        $app_style_list = Helper::getAppStyleList();
        $slider_style_list = Helper::getSliderStyleList();
        if (file_exists(resource_path('views/extend/back-end/admin/pages/create.blade.php'))) {
            return View::make(
                'extend.back-end.admin.pages.create',
                compact(
                    'parent_page',
                    'page_created',
                    'sections',
                    'app_style_list',
                    'slider_style_list'
                )
            );
        } else {
            return View::make(
                'back-end.admin.pages.create',
                compact(
                    'parent_page',
                    'page_created',
                    'sections',
                    'app_style_list',
                    'slider_style_list'
                )
            );
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param mixed $request $req->attr
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $server = Helper::worketicIsDemoSiteAjax();
        if (!empty($server)) {
            $response['type'] = 'error';
            $response['message'] = $server->getData()->message;
            return $response;
        }
        $json = array();
        if (!empty($request)) {
            $this->validate(
                $request,
                [
                    'title' => 'required|string',

                ]
            );
            $save_page = $this->page->savePage($request);
            if ($request['parent_id']) {
                DB::table('child_pages')->insert(
                    ['parent_id' => $request['parent_id'], 'child_id' => $save_page]
                );
            }
            $json['message'] = trans('lang.page_created');
            $json['type'] = 'success';
            return $json;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param string $slug page slug
     *
     * @return \Illuminate\Http\Response
     */
    public function show($slug = 'home-v2')
    {
        if (!empty($slug)) {
            $sections = Helper::getPageSections();
            $selected_page_data = $this->page->getPageData($slug);
            if (!empty($selected_page_data)) {
                $selected_page = $this->page::find($selected_page_data->id);
                $page_data = $selected_page->toArray();
                $page = array();
                $page['id'] = $page_data['id'];
                $page['title'] = $page_data['title'];
                $page['slug'] = $page_data['slug'];
                $page['section_list'] = !empty($page_data['sections']) ? Helper::getUnserializeData($page_data['sections']) : array();
                $description = $page_data['body'];
                $page_meta = SiteManagement::where('meta_key', 'seo-desc-' . $selected_page_data->id)->select('meta_value')->pluck('meta_value')->first();
                $page_banner = SiteManagement::where('meta_key', 'page-banner-' . $selected_page_data->id)->select('meta_value')->pluck('meta_value')->first();
                $show_banner = SiteManagement::where('meta_key', 'show-banner-' . $selected_page_data->id)->select('meta_value')->pluck('meta_value')->first();
                $breadcrumbs_settings = SiteManagement::getMetaValue('show_breadcrumb');
                $show_breadcrumbs = !empty($breadcrumbs_settings) ? $breadcrumbs_settings : 'true';
                $show_banner_image = false;
                if ($show_banner == false) {
                    $show_banner_image = false;
                } else {
                    $show_banner_image = true;
                }
                $banner = !empty($page_banner) ? Helper::getBannerImage('uploads/pages/'.$page['id'].'/'. $page_banner) : 'images/bannerimg/img-02.jpg';
                $meta_desc = !empty($page_meta) ? $page_meta : '';
                $type = Helper::getAccessType() == 'services' ? 'service' : Helper::getAccessType();
                // $home_id = SiteManagement::getMetaValue('homepage');
                $slider_section = '';
                $slider_style = '';
                $slider_order = '';
                $show_title = '';
                if (Schema::hasTable('metas')) {
                    foreach ($selected_page->meta->toArray() as $key => $meta) {
                        preg_match_all('!\d+!', $meta['meta_key'], $matches);
                        $meta_key_modify = preg_replace('/\d/', '', $meta['meta_key']);
                        if ($meta_key_modify == 'sliders') {
                            $slider_section = Helper::getUnserializeData($meta['meta_value']);
                            $slider_style = !empty($slider_section['style']) ? $slider_section['style'] : '';
                            $slider_order = !empty($slider_section['parentIndex']) ? $slider_section['parentIndex'] : '';
                        } else if ($meta_key_modify == 'title') {
                            $show_title = $meta['meta_value'];
                        }
                    }
                }
                $home = false;
                $categories = '';
                $skills = '';
                $locations = '';
                $languages = '';
                if (file_exists(resource_path('views/extend/front-end/pages/show.blade.php'))) {
                    return View::make(
                        'extend.front-end.pages.show',
                        compact(
                            'page',
                            'slug',
                            'meta_desc',
                            'banner',
                            'show_banner',
                            'show_banner_image',
                            'show_breadcrumbs',
                            'selected_page',
                            'sections',
                            'type',
                            'slider_style',
                            'slider_section',
                            'description',
                            'slider_order',
                            'home',
                            'show_title',
                            'categories',
                            'skills',
                            'locations',
                            'languages'
                        )
                    );
                } else {
                    return View::make(
                        'front-end.pages.show',
                        compact(
                            'page',
                            'slug',
                            'meta_desc',
                            'banner',
                            'show_banner',
                            'show_banner_image',
                            'show_breadcrumbs',
                            'selected_page',
                            'sections',
                            'type',
                            'slider_style',
                            'slider_section',
                            'description',
                            'slider_order',
                            'home',
                            'show_title',
                            'categories',
                            'skills',
                            'locations',
                            'languages'
                        )
                    );
                }
            } else {
                abort(404);
            }
        } else {
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param integer $id page Id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = array();
        if (!empty($id)) {
            $selected_page = $this->page::find($id);
            $count = 0;
            $sections = Helper::getPageSections();
            if (!empty($selected_page)) {
                $page_data = $selected_page->toArray();
                $page['id'] = $page_data['id'];
                $page['title'] = $page_data['title'];
                $page['slug'] = $page_data['slug'];
                $page['section_list'] = Helper::getUnserializeData($page_data['sections']);
                $parent_selected_id = '';
                $parent_page = DB::table('pages')->select('id', 'title')->where('id', '!=', $id)->where('relation_type', '=', 0)->get()->toArray();
                $has_child = $this->page->pageHasChild($id);
                $child_parent_id = DB::table('child_pages')->select('parent_id')->where('child_id', $id)->get()->first();
                $desc = SiteManagement::where('meta_key', 'seo-desc-' . $id)->select('meta_value')->pluck('meta_value')->first();
                $seo_desc = !empty($desc) ? $desc : '';
                $page_banner = SiteManagement::where('meta_key', 'page-banner-' . $id)->select('meta_value')->pluck('meta_value')->first();
                $page['banner'] = !empty($page_banner) ? $page_banner : '';
                $page['banner_detail'] = !empty($page_banner) ? Helper::getImageDetail($page_banner, 'uploads/pages/' . $id) : '';
                if (!empty($child_parent_id->parent_id)) {
                    $parent_selected_id = $child_parent_id->parent_id;
                } else {
                    $parent_selected_id = '';
                }
                $app_style_list = Helper::getAppStyleList();
                $slider_style_list = Helper::getSliderStyleList();
                if (file_exists(resource_path('views/extend/back-end/admin/pages/edit.blade.php'))) {
                    return View::make(
                        'extend.back-end.admin.pages.edit',
                        compact(
                            'app_style_list',
                            'page',
                            'parent_page',
                            'parent_selected_id',
                            'id',
                            'has_child',
                            'seo_desc',
                            'page_banner',
                            'slider_style_list',
                            'sections'
                        )
                    );
                } else {
                    return View::make(
                        'back-end.admin.pages.edit',
                        compact(
                            'app_style_list',
                            'page',
                            'parent_page',
                            'parent_selected_id',
                            'id',
                            'has_child',
                            'seo_desc',
                            'page_banner',
                            'slider_style_list',
                            'sections'
                        )
                    );
                }
            } else {
                abort(404);
            }
        } else {
            abort(404);
        }
    }

    public function getPage($id)
    {
        $json = array();
        $selected_page = $this->page::find($id);
        $count = 0;
        $prepare_array = array();
        $section_description = array();
        if (Schema::hasTable('metas')) {
            if (!empty($selected_page->meta) && $selected_page->meta->count() > 0) {
                foreach ($selected_page->meta->toArray() as $key => $meta) {
                    $meta_key_modify = preg_replace('/\d/', '', $meta['meta_key']);
                    $section_index = preg_match_all('!\d+!', $meta['meta_key'], $matches);
                    if ($meta['meta_key'] == 'title') {
                        $prepare_array[$meta_key_modify][$count] = $meta['meta_value'];
                    } else {
                        $prepare_array[$meta_key_modify][$count] = Helper::getUnserializeData($meta['meta_value'] . $section_index);
                    }
                    $count++;
                }
            }
        }
        $sections_data = array_map('array_values', $prepare_array);
        $json['section_data'] = $sections_data;
        $json['body'] = !empty($selected_page->body) ? $selected_page->body : '';
        $json['type'] = 'success';
        return $json;
    }

    public function getSlider($id)
    {
        $json = array();
        $selected_page = $this->page::find($id);
        $slider_section = '';
        foreach ($selected_page->meta->toArray() as $key => $meta) {
            preg_match_all('!\d+!', $meta['meta_key'], $matches);
            $meta_key_modify = preg_replace('/\d/', '', $meta['meta_key']);
            if ($meta_key_modify == 'sliders') {
                $slider_section = Helper::getUnserializeData($meta['meta_value']);
            }
        }
        $json['type'] = 'success';
        $json['slider'] = $slider_section;
        return $json;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param mixed   $request $req->attr
     * @param integer $id      page ID
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $server_verification = Helper::worketicIsDemoSite();
        if (!empty($server_verification)) {
            Session::flash('error', $server_verification);
            return Redirect::to('admin/pages');
        }
        if (!empty($request)) {
            $this->validate(
                $request,
                [
                    'title' => 'required|string',
                ]
            );
            $parent_id = filter_var($request['parent_id'], FILTER_SANITIZE_NUMBER_INT);
            $child_id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
            $this->page->updatePage($id, $request);
            if ($parent_id == null) {
                DB::table('child_pages')->where('child_id', '=', $child_id)->delete();
            } elseif ($parent_id) {
                DB::table('child_pages')->where('child_id', '=', $child_id)->delete();
                DB::table('child_pages')->insert(
                    ['parent_id' => $parent_id, 'child_id' => $child_id]
                );
            }
            $json['message'] = trans('lang.page_updated');
            $json['type'] = 'success';
            return $json;
            // Session::flash('message', trans('lang.page_updated'));
            // return Redirect::to('admin/pages');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param mixed $request $req->attr
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $server = Helper::worketicIsDemoSiteAjax();
        if (!empty($server)) {
            $json['type'] = 'error';
            $json['message'] = $server->getData()->message;
            return $json;
        }
        $json = array();
        $id = $request['id'];
        if (!empty($id)) {
            $page = $this->page::find($id);
            $page->meta()->delete();
            $child_pages = $this->page::pageHasChild($id);
            if (!empty($child_pages)) {
                foreach ($child_pages as $page) {
                    DB::table('pages')->where('id', $page->child_id)->update(['relation_type' => 0]);
                }
            } else {
                $relation = DB::table('pages')->select('relation_type')->where('id', $id)->get()->first();
                if ($relation->relation_type == 1) {
                    DB::table('pages')->where('id', $id)->update(['relation_type' => 0]);
                }
            }
            DB::table('child_pages')->where('child_id', '=', $id)->orWhere('parent_id', '=', $id)->delete();
            DB::table('pages')->where('id', '=', $id)->delete();
            $json['type'] = 'success';
            $json['message'] = trans('lang.page_deleted');
            return $json;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param mixed $request request attributes
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteSelected(Request $request)
    {
        $server = Helper::worketicIsDemoSiteAjax();
        if (!empty($server)) {
            $json['type'] = 'error';
            $json['message'] = $server->getData()->message;
            return $json;
        }
        $json = array();
        $checked = $request['ids'];
        foreach ($checked as $id) {
            $page = $this->page::find($id);
            $page->meta()->delete();
            $this->page::where("id", $id)->delete();
        }
        if (!empty($checked)) {
            $json['type'] = 'success';
            return $json;
        } else {
            $json['type'] = 'error';
            $json['message'] = trans('lang.something_wrong');
            return $json;
        }
    }

    /**
     * Upload Image to temporary folder.
     *
     * @param mixed  $request   request attributes
     * @param string $file_name getfilename
     *
     * @return \Illuminate\Http\Response
     */
    public function uploadTempImage(Request $request, $file_name = '')
    {
        $path = Helper::PublicPath() . '/uploads/pages/temp/';
        if (!empty($request[$file_name])) {
            Helper::uploadSingleTempImage($path, $request[$file_name]);
        }
    }
}
