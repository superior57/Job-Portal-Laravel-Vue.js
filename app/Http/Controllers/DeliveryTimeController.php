<?php
/**
 * Class DeliveryTimeController
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
use App\DeliveryTime;
use View;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\Helper;

/**
 * Class DeliveryTimeController
 *
 */
class DeliveryTimeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param instance $delivery_time delivery time instance
     *
     * @return void
     */
    public function __construct(DeliveryTime $delivery_time)
    {
        $this->delivery_time = $delivery_time;
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
        $delivery_time = $this->delivery_time::paginate(10);
        if (file_exists(resource_path('views/extend/back-end/admin/delivery-time/index.blade.php'))) {
            return View::make(
                'extend.back-end.admin.delivery-time.index',
                compact('delivery_time')
            );
        } else {
            return View::make(
                'back-end.admin.delivery-time.index',
                compact('delivery_time')
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
                    'delivery_time_title' => 'required',
                ]
            );
            $this->delivery_time->saveDeliveryTime($request);
        }
        Session::flash('message', trans('lang.save_delivery_time'));
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
            $delivery_time = $this->delivery_time::find($id);
            if (!empty($delivery_time)) {
                if (file_exists(resource_path('views/extend/back-end/admin/delivery-time/edit.blade.php'))) {
                    return View::make(
                        'extend.back-end.admin.delivery-time.edit', compact('id', 'delivery_time')
                    );
                } else {
                    return View::make(
                        'back-end.admin.delivery-time.edit', compact('id', 'delivery_time')
                    );
                }
                Session::flash('message', trans('lang.delivery_time_updated'));
                return Redirect::to('admin/delivery_time');
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
            'delivery_time_title' => 'required',
            ]
        );
        $this->delivery_time->updateDeliveryTime($request, $id);
        Session::flash('message', trans('lang.delivery_time_updated'));
        return Redirect::to('admin/delivery-time');
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
            $this->delivery_time::where('id', $id)->delete();
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
            $this->delivery_time::where("id", $id)->delete();
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
