<?php

namespace App\Http\Controllers;

use App\ArticleCategory;
use App\SiteManagement;
use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Session;
use View;
use App\Helper;

class ArticleController extends Controller
{
    /**
     * Defining scope of variable
     *
     * @access public
     * @var    array $article
     */
    protected $article;

    /**
     * Create a new controller instance.
     *
     * @param mixed $article get article model
     *
     * @return void
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
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
            $articles = $this->article::where('title', 'like', '%' . $keyword . '%')->paginate(7)->setPath('');
            $pagination = $articles->appends(
                array(
                    'keyword' => Input::get('keyword')
                )
            );
        } else {
            $articles = $this->article->paginate(10);
        }
        $cats = ArticleCategory::all()->pluck('title', 'id')->toArray();
        if (file_exists(resource_path('views/extend/back-end/admin/manage-articles/articles/index.blade.php'))) {
            return View::make('extend.back-end.admin.manage-articles.articles.index', compact('articles','cats'));
        } else {
            return View::make(
                'back-end.admin.manage-articles.articles.index', compact('articles','cats')
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
                'title'    => 'required',
            ]
        );
        $this->article->saveArticles($request);
        Session::flash('message', trans('lang.save_article'));
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
            $articles = $this->article::find($id);
            $selected_cats = $articles->categories->pluck('title', 'id')->toArray();
            $cats = ArticleCategory::all()->pluck('title', 'id')->toArray();
            if (!empty($cats)) {
                if (file_exists(resource_path('views/extend/back-end/admin/manage-articles/articles/edit.blade.php'))) {
                    return View::make('extend.back-end.admin.manage-articles.articles.edit', compact('cats, articles', 'selected_cats'));
                } else {
                    return View::make(
                        'back-end.admin.manage-articles.articles.edit', compact('id', 'cats', 'articles', 'selected_cats')
                    );
                }
                return Redirect::to('admin/articles');
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
                'title' => 'required',
            ]
        );
        $this->article->updateArticles($request, $id);
        Session::flash('message', trans('lang.article_updated'));
        return Redirect::to('admin/articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
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
        $article = Article::find($id);
        if ($article->categories) {
            $article->categories()->detach();
        }
        if (!empty($id)) {
            $this->article::where('id', $id)->delete();
            $json['type'] = 'success';
            $json['message'] = trans('lang.article_deleted');
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
        $path = Helper::PublicPath() . '/uploads/articles/temp/';
        if (!empty($request['uploaded_image'])) {
            $image_size = array(
                'x-small' => array(
                    'width' => 65,
                    'height' => 65,
                ),
                'small' => array(
                    'width' => 352,
                    'height' => 200,
                ),
                'medium' => array(
                    'width' => 730,
                    'height' => 240,
                ),
                'large' => array(
                    'width' => 1050,
                    'height' => 500,
                ),
            );
            return Helper::uploadTempImageWithSize($path, $request['uploaded_image'], '', $image_size);
        }
    }

    /**
     * All Articles Lisiting.
     *
     * @param \Illuminate\Http\Request $request request attributes
     *
     * @return \Illuminate\Http\Response
     */
    public function articlesList($category='')
    {
        // $breadcrumbs_settings = \App\SiteManagement::getMetaValue('show_breadcrumb');
        // $show_breadcrumbs = !empty($breadcrumbs_settings) ? $breadcrumbs_settings : 'true';
        $cats = ArticleCategory::all()->toArray();
        $latest_article = $this->article->latest()->take(3)->get();
        $inner_page  = SiteManagement::getMetaValue('inner_page_data');
        $article_inner_banner = !empty($inner_page) && !empty($inner_page[0]['article_inner_banner']) ? $inner_page[0]['article_inner_banner'] : null;
        $show_article_banner = !empty($inner_page) && !empty($inner_page[0]['show_article_banner']) ? $inner_page[0]['show_article_banner'] : 'true';
        if (!empty($category)) {
            $selected_category = ArticleCategory::where('slug', $category)->first();
            if (!empty($selected_category->articles) && $selected_category->articles->count() > 0) {
                foreach ($selected_category->articles as $category_article) {
                    $id[] = $category_article->id;
                }
                $articles = $this->article::whereIn('id', $id)->paginate(4);
            } else {
                $articles = '';
            }
        } else {
            $articles = $this->article->paginate(4);
        }
        if (file_exists(resource_path('views/extend/front-end/articles/index.blade.php'))) {
            return View::make('extend.front-end.articles.index', compact('cats', 'articles', 'latest_article','article_inner_banner','show_article_banner'));
        } else {
            return View::make(
                'front-end.articles.index',
                compact(
                    'cats', 'articles', 'latest_article','article_inner_banner','show_article_banner'
                )
            );
        }
    }

    /**
     * Show Article Detail
     *
     * @param \Illuminate\Http\Request $request request attributes
     *
     * @return \Illuminate\Http\Response
     */
    public function showArticle($slug)
    {
        $inner_page  = SiteManagement::getMetaValue('inner_page_data');
        $article_inner_banner = !empty($inner_page) && !empty($inner_page[0]['article_inner_banner']) ? $inner_page[0]['article_inner_banner'] : null;
        $show_article_banner = !empty($inner_page) && !empty($inner_page[0]['show_article_banner']) ? $inner_page[0]['show_article_banner'] : 'true';
        $cats = ArticleCategory::all()->pluck('title', 'id')->toArray();
        $article = $this->article::where('slug', $slug)->first();
        if (!empty($article)) {
            if (file_exists(resource_path('views/extend/front-end/articles/show.blade.php'))) {
                return View::make('extend.front-end.articles.show', compact('cats', 'article','article_inner_banner','show_article_banner'));
            } else {
                return View::make(
                    'front-end.articles.show',
                    compact(
                        'cats', 'article', 'article_inner_banner','show_article_banner'
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
            $article = Article::find($id);
            if ($article->categories) {
                $article->categories()->detach();
            }
            $this->article::where("id", $id)->delete();
        }
        if (!empty($checked)) {
            $json['type'] = 'success';
            $json['message'] = trans('lang.articles_deleted');
            return $json;
        } else {
            $json['type'] = 'error';
            $json['message'] = trans('lang.something_wrong');
            return $json;
        }
    }

    /**
     * Get article data
     *
     * @return \Illuminate\Http\Response
     */
    public function getArticles()
    {
        $json = array();

        $articles = $this->article::get()->toArray();
        if (!empty($articles)) {
            $json['type'] = 'success';
            $json['articles'] = $articles;
            return $json;
        } else {
            $json['type'] = 'error';
            return $json;
        }
    }
}
