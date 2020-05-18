<?php
/**
 * Class ResponseTimeController
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
use App\ResponseTime;
use View;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\Helper;

/**
 * Class ResponseTimeController
 *
 */
class ResponseTimeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param instance $response_time delivery time instance
     *
     * @return void
     */
    public function __construct(ResponseTime $response_time)
    {
        $this->response_time = $response_time;
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
        $response_time = $this->response_time::paginate(10);
        if (file_exists(resource_path('views/extend/back-end/admin/response-time/index.blade.php'))) {
            return View::make(
                'extend.back-end.admin.response-time.index',
                compact('response_time')
            );
        } else {
            return View::make(
                'back-end.admin.response-time.index',
                compact('response_time')
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
                    'response_time_title' => 'required',
                ]
            );
            $this->response_time->saveResponseTime($request);
        }
        Session::flash('message', trans('lang.response_time'));
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
            $response_time = $this->response_time::find($id);
            if (!empty($response_time)) {
                if (file_exists(resource_path('views/extend/back-end/admin/response-time/edit.blade.php'))) {
                    return View::make(
                        'extend.back-end.admin.response-time.edit', compact('id', 'response_time')
                    );
                } else {
                    return View::make(
                        'back-end.admin.response-time.edit', compact('id', 'response_time')
                    );
                }
                Session::flash('message', trans('lang.response_time_updated'));
                return Redirect::to('admin/response_time');
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
            'response_time_title' => 'required',
            ]
        );
        $this->response_time->updateResponseTime($request, $id);
        Session::flash('message', trans('lang.response_time_updated'));
        return Redirect::to('admin/response-time');
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
            $this->response_time::where('id', $id)->delete();
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
            $this->response_time::where("id", $id)->delete();
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
