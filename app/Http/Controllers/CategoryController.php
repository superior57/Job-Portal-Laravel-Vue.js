<?php
/**
 * Class CategoryController
 *
 * @category Worketic
 *
 * @package Worketic
 * @author  Amentotech <theamentotech@gmail.com>
 * @license http://www.amentotech.com Amentotech
 * @link    http://www.amentotech.com
 */

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Session;
use View;
use App\Helper;

/**
 * Class Category Controller
 *
 */
class CategoryController extends Controller
{
    /**
     * Defining scope of variable
     *
     * @access public
     * @var    array $category
     */
    protected $category;

    /**
     * Create a new controller instance.
     *
     * @param mixed $category get category model
     *
     * @return void
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @param mixed $request Request Attributes
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!empty($_GET['keyword'])) {
            $keyword = $_GET['keyword'];
            $cats = $this->category::where('title', 'like', '%' . $keyword . '%')->paginate(7)->setPath('');
            $pagination = $cats->appends(
                array(
                    'keyword' => Input::get('keyword')
                )
            );
        } else {
            $cats = $this->category->paginate(10);
        }
        if (file_exists(resource_path('views/extend/back-end/admin/categories/index.blade.php'))) {
            return View::make('extend.back-end.admin.categories.index', compact('cats'));
        } else {
            return View::make(
                'back-end.admin.categories.index', compact('cats')
            );
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param string $request string
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $server_verification = Helper::worketicIsDemoSite();
        if (!empty($server_verification)) {
            Session::flash('error', $server_verification);
            return Redirect::back();
        }
        $this->validate(
            $request, [
                'category_title'    => 'required',
            ]
        );
        $this->category->saveCategories($request);
        Session::flash('message', trans('lang.save_category'));
        return Redirect::back();
    }

    /**
     * Edit Categories.
     *
     * @param int $id integer
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!empty($id)) {
            $cats = $this->category::find($id);
            if (!empty($cats)) {
                if (file_exists(resource_path('views/extend/back-end/admin/categories/edit.blade.php'))) {
                    return View::make('extend.back-end.admin.categories.edit', compact('cats'));
                } else {
                    return View::make(
                        'back-end.admin.categories.edit', compact('id', 'cats')
                    );
                }
                return Redirect::to('admin/categories');
            }
        }
    }

    /**
     * Update Categories.
     *
     * @param string $request string
     * @param int    $id      integer
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $server_verification = Helper::worketicIsDemoSite();
        if (!empty($server_verification)) {
            Session::flash('error', $server_verification);
            return Redirect::back();
        }
        $this->validate(
            $request, [
                'category_title' => 'required',
            ]
        );
        $this->category->updateCategories($request, $id);
        Session::flash('message', trans('lang.cat_updated'));
        return Redirect::to('admin/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param mixed $request request attributes
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
            $this->category::where('id', $id)->delete();
            $json['type'] = 'success';
            $json['message'] = trans('lang.cat_deleted');
            return $json;
        }
    }

    /**
     * Upload Image to temporary folder.
     *
     * @param mixed $request request attributes
     *
     * @return \Illuminate\Http\Response
     */
    public function uploadTempImage(Request $request)
    {
        $path = Helper::PublicPath() . '/uploads/categories/temp/';
        if (!empty($request['uploaded_image'])) {
            return Helper::uploadTempImage($path, $request['uploaded_image']);
        }
    }

    /**
     * All Categories Lisiting.
     *
     * @param \Illuminate\Http\Request $request request attributes
     *
     * @return \Illuminate\Http\Response
     */
    public function categoriesList(Request $request)
    {
        $breadcrumbs_settings = \App\SiteManagement::getMetaValue('show_breadcrumb');
        $show_breadcrumbs = !empty($breadcrumbs_settings) ? $breadcrumbs_settings : 'true';
        $categories = $this->category->paginate(10);
        if (!empty($categories)) {
            if (file_exists(resource_path('views/extend/front-end/categories/index.blade.php'))) {
                return View::make('extend.front-end.categories.index', compact('categories', 'show_breadcrumbs'));
            } else {
                return View::make(
                    'front-end.categories.index',
                    compact(
                        'categories',
                        'show_breadcrumbs'
                    )
                );
            }
        } else {
            abort(404);
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
            $this->category::where("id", $id)->delete();
        }
        if (!empty($checked)) {
            $json['type'] = 'success';
            $json['message'] = trans('lang.cat_deleted');
            return $json;
        } else {
            $json['type'] = 'error';
            $json['message'] = trans('lang.something_wrong');
            return $json;
        }
    }

    /**
     * get Categories
     *
     * @param mixed $request request attributes
     *
     * @return \Illuminate\Http\Response
     */
    public function getCategories()
    {
        $json = array();
        $categories = $this->category::latest()->get()->take(8);
        if (!empty($categories)) {
            $json['type'] = 'success';
            $json['categories'] = $categories;
            return $json;
        } else {
            $json['type'] = 'error';
            return $json;
        }
    }
}
