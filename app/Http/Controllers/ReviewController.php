<?php
/**
 * Class ReviewController
 *
 * @category Worketic
 *
 * @package Worketic
 * @author  Amentotech <theamentotech@gmail.com>
 * @license http://www.amentotech.com Amentotech
 * @link    http://www.amentotech.com
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\ReviewOptions;
use View;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Helper;

/**
 * Class ReviewController
 *
 */
class ReviewController extends Controller
{
    /**
     * Defining scope of the variable
     *
     * @access public
     * @var    array $review
     */
    protected $review;

    /**
     * Create a new controller instance.
     *
     * @param instance $review         review instance
     * @param instance $review_options review options instance
     *
     * @return void
     */
    public function __construct(Review $review, ReviewOptions $review_options)
    {
        $this->review = $review;
        $this->review_options = $review_options;
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
        $review_options = $this->review_options::paginate(10);
        if (file_exists(resource_path('views/extend/back-end/admin/review-options/index.blade.php'))) {
            return View::make(
                'extend.back-end.admin.review-options.index',
                compact('review_options')
            );
        } else {
            return View::make(
                'back-end.admin.review-options.index',
                compact('review_options')
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
        if (!empty($request)) {
            $this->validate(
                $request, [
                    'review_option_title' => 'required',
                ]
            );
            $this->review_options->saveReviewOptions($request);
        }
        Session::flash('message', trans('lang.save_review_option'));
        return Redirect::back();
    }

    /**
     * Edit review options.
     *
     * @param int $id integer
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!empty($id)) {
            $review_options = $this->review_options::find($id);
            if (!empty($review_options)) {
                if (file_exists(resource_path('views/extend/back-end/admin/review-options/edit.blade.php'))) {
                    return View::make(
                        'extend.back-end.admin.review-options.edit', compact('id', 'review_options')
                    );
                } else {
                    return View::make(
                        'back-end.admin.review-options.edit', compact('id', 'review_options')
                    );
                }
                Session::flash('message', trans('lang.review_options_updated'));
                return Redirect::to('admin/review_options');
            }
        }
    }

    /**
     * Update review options.
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
            'review_option_title' => 'required',
            ]
        );
        $this->review_options->updateReviewOptions($request, $id);
        Session::flash('message', trans('lang.review_option_updated'));
        return Redirect::to('admin/review-options');
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
            $this->review_options::where('id', $id)->delete();
            $json['type'] = 'success';
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
            $this->review_options::where("id", $id)->delete();
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
}
