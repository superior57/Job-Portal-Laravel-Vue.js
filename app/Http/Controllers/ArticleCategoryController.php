<?php

namespace App\Http\Controllers;

use App\ArticleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Session;
use View;
use App\Helper;

class ArticleCategoryController extends Controller
{
    /**
     * Defining scope of variable
     *
     * @access public
     * @var    array $article_category
     */
    protected $article_category;

    /**
     * Create a new controller instance.
     *
     * @param mixed $article_category get category model
     *
     * @return void
     */
    public function __construct(ArticleCategory $article_category)
    {
        $this->article_category = $article_category;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!empty($_GET['keyword'])) {
            $keyword = $_GET['keyword'];
            $cats = $this->article_category::where('title', 'like', '%' . $keyword . '%')->paginate(7)->setPath('');
            $pagination = $cats->appends(
                array(
                    'keyword' => Input::get('keyword')
                )
            );
        } else {
            $cats = $this->article_category->paginate(10);
        }
        if (file_exists(resource_path('views/extend/back-end/admin/manage-articles/categories/index.blade.php'))) {
            return View::make('extend.back-end.admin.manage-articles.categories.index', compact('cats'));
        } else {
            return View::make(
                'back-end.admin.manage-articles.categories.index', compact('cats')
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
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
        $this->article_category->saveCategories($request);
        Session::flash('message', trans('lang.save_category'));
        return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!empty($id)) {
            $cats = $this->article_category::find($id);
            if (!empty($cats)) {
                if (file_exists(resource_path('views/extend/back-end/admin/manage-articles/categories/edit.blade.php'))) {
                    return View::make('extend.back-end.admin.manage-articles.categories.edit', compact('cats'));
                } else {
                    return View::make(
                        'back-end.admin.manage-articles.categories.edit', compact('id', 'cats')
                    );
                }
                return Redirect::to('admin/article/categories');
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
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
        $this->article_category->updateCategories($request, $id);
        Session::flash('message', trans('lang.cat_updated'));
        return Redirect::to('admin/article/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
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
        $category = ArticleCategory::find($id);
        if (!empty($id)) {
            if ($category->articles) {
                $category->articles()->detach();
            }
            $this->article_category::where('id', $id)->delete();
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
        $path = Helper::PublicPath() . '/uploads/articles/categories/temp/';
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
    // public function categoriesList(Request $request)
    // {
    //     $breadcrumbs_settings = \App\SiteManagement::getMetaValue('show_breadcrumb');
    //     $show_breadcrumbs = !empty($breadcrumbs_settings) ? $breadcrumbs_settings : 'true';
    //     $categories = $this->category->paginate(10);
    //     if (!empty($categories)) {
    //         if (file_exists(resource_path('views/extend/front-end/categories/index.blade.php'))) {
    //             return View::make('extend.front-end.categories.index', compact('categories', 'show_breadcrumbs'));
    //         } else {
    //             return View::make(
    //                 'front-end.categories.index',
    //                 compact(
    //                     'categories',
    //                     'show_breadcrumbs'
    //                 )
    //             );
    //         }
    //     } else {
    //         abort(404);
    //     }
    // }

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
            $category = ArticleCategory::find($id);
            if ($category->articles) {
                $category->articles()->detach();
            }
            $this->article_category::where("id", $id)->delete();
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
}
