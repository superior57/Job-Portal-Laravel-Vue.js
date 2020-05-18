<?php
/**
 * Class DepartmentController.
 *
 * @category Worketic
 *
 * @package Worketic
 * @author  Amentotech <theamentotech@gmail.com>
 * @license http://www.amentotech.com Amentotech
 * @link    http://www.amentotech.com
 */

namespace App\Http\Controllers;

use App\Department;
use View;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Helper;

/**
 * Class DepartmentController
 *
 */
class DepartmentController extends Controller
{
    /**
     * Defining scope of the variable
     *
     * @access public
     * @var    array $department
     */
    protected $department;

    /**
     * Create a new controller instance.
     *
     * @param instance $department instance
     *
     * @return void
     */
    public function __construct(Department $department)
    {
        $this->department = $department;
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
            $departments = $this->department::where('title', 'like', '%' . $keyword . '%')->paginate(7)->setPath('');
            $pagination = $departments->appends(
                array(
                    'keyword' => Input::get('keyword')
                )
            );
        } else {
            $departments = $this->department->paginate(7);
        }
        if (file_exists(resource_path('views/extend/back-end/admin/departments/index.blade.php'))) {
            return View::make('extend.back-end.admin.departments.index', compact('departments'));
        } else {
            return View::make(
                'back-end.admin.departments.index',
                compact('departments')
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
                    'department_title' => 'required',
                ]
            );
            $this->department->saveDepartments($request);
        }
        Session::flash('message', trans('lang.save_department'));
        return Redirect::back();
    }

    /**
     * Edit departments.
     *
     * @param int $id integer
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!empty($id)) {
            $departments = $this->department::find($id);
            if (!empty($departments)) {
                if (file_exists(resource_path('views/extend/back-end/admin/departments/edit.blade.php'))) {
                    return View::make('extend.back-end.admin.departments.edit', compact('departments'));
                } else {
                    return View::make(
                        'back-end.admin.departments.edit', compact('id', 'departments')
                    );
                }
                Session::flash('message', trans('lang.dpt_updated'));
                return Redirect::to('admin/departments');
            }
        }
    }

    /**
     * Update departments.
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
            'department_title' => 'required',
            ]
        );
        $this->department->updateDepartments($request, $id);
        Session::flash('message', trans('lang.dpt_updated'));
        return Redirect::to('admin/departments');
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
            $this->department::where('id', $id)->delete();
            $json['type'] = 'success';
            $json['message'] = trans('lang.dpt_deleted');
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
            $this->department::where("id", $id)->delete();
        }
        if (!empty($checked)) {
            $json['type'] = 'success';
            $json['message'] = trans('lang.dpt_deleted');
            return $json;
        } else {
            $json['type'] = 'error';
            $json['message'] = trans('lang.something_wrong');
            return $json;
        }
    }
}
