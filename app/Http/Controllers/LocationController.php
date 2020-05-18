<?php
/**
 * Class LocationController.
 *
 * @category Worketic
 *
 * @package Worketic
 * @author  Amentotech <theamentotech@gmail.com>
 * @license http://www.amentotech.com Amentotech
 * @version <PHP: 1.0.0>
 * @link    http://www.amentotech.com
 */

namespace App\Http\Controllers;

use App\Location;
use View;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Helper;

/**
 * Class Location Controller
 *
 */
class LocationController extends Controller
{
    /**
     * Defining scope of the variable
     *
     * @access public
     * @var    array $skill
     */
    protected $location;

    /**
     * Create a new controller instance.
     *
     * @param mixed $location location instance
     *
     * @return void
     */
    public function __construct(Location $location)
    {
        $this->location = $location;
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
            $locations = $this->location::where('title', 'like', '%' . $keyword . '%')->paginate(7)->setPath('');
            $pagination = $locations->appends(
                array(
                    'keyword' => Input::get('keyword')
                )
            );
        } else {
            $locations = $this->location->paginate(7);
        }
        if (file_exists(resource_path('views/extend/back-end/admin/locations/index.blade.php'))) {
            return View::make(
                'extend.back-end.admin.locations.index',
                compact('locations')
            );
        } else {
            return View::make(
                'back-end.admin.locations.index',
                compact('locations')
            );
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request request attributes
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
            $request,
            [
                'title' => 'required',
            ]
        );
        if (!empty($request['title'])) {
            $this->location->storeLocation($request);
            Session::flash('message', trans('lang.save_location'));
            return Redirect::back();
        }
    }

    /**
     * Edit Locations.
     *
     * @param int $id integer
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!empty($id)) {
            $locations = $this->location::find($id);
            if (!empty($locations)) {
                $store_locations = $this->location::where('id', '!=', $id)->get()->all();
                if (file_exists(resource_path('views/extend/back-end/admin/locations/edit.blade.php'))) {
                    return View::make(
                        'extend.back-end.admin.locations.edit',
                        compact(
                            'id', 'locations', 'store_locations'
                        )
                    );
                } else {
                    return View::make(
                        'back-end.admin.locations.edit',
                        compact(
                            'id', 'locations', 'store_locations'
                        )
                    );
                }
                Session::flash('message', trans('lang.location_updated'));
                return Redirect::to('admin/locations');
            }
        }
    }

    /**
     * Update locations.
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
            $request,
            [
                'title' => 'required',
            ]
        );
            $this->location->updateLocation($request, $id);
            Session::flash('message', trans('lang.location_updated'));
            return Redirect::to('admin/locations');
    }

    /**
     * Remove location from database.
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
            $this->location::where('id', $id)->delete();
            $json['type'] = 'success';
            $json['message'] = trans('lang.location_deleted');
            return $json;
        } else {
            $json['type'] = 'error';
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
        $path = Helper::PublicPath() . '/uploads/locations/temp/';
        if (!empty($request['uploaded_image'])) {
            return Helper::uploadTempImage($path, $request['uploaded_image']);
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
            $this->location::where("id", $id)->delete();
        }
        if (!empty($checked)) {
            $json['type'] = 'success';
            $json['message'] = trans('lang.lang_deleted');
            return $json;
        } else {
            $json['type'] = 'error';
            $json['message'] = trans('lang.something_wrong');
            return $json;
        }
    }
}
