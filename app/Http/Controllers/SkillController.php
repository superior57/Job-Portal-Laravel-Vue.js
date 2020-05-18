<?php

/**
 * Class SkillController.
 *
 * @category Worketic
 *
 * @package Worketic
 * @author  Amentotech <theamentotech@gmail.com>
 * @license http://www.amentotech.com Amentotech
 * @link    http://www.amentotech.com
 */

namespace App\Http\Controllers;

use View;
use Auth;
use Session;
use App\Skill;
use App\User;
use App\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Helper;

/**
 * Class Skill Controller
 */
class SkillController extends Controller
{
    /**
     * Defining scope of the variable
     *
     * @access protected
     * @var    array $skill
     */
    protected $skill;

    /**
     * Create a new controller instance.
     *
     * @param instance $skill instance
     *
     * @return void
     */
    public function __construct(Skill $skill)
    {
        $this->skill = $skill;
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
            $skills = $this->skill::where('title', 'like', '%' . $keyword . '%')->paginate(7)->setPath('');
            $pagination = $skills->appends(
                array(
                    'keyword' => Input::get('keyword')
                )
            );
        } else {
            $skills = $this->skill->paginate(7);
        }
        if (file_exists(resource_path('views/extend/back-end/admin/skills/index.blade.php'))) {
            return View::make(
                'extend.back-end.admin.skills.index',
                compact('skills')
            );
        } else {
            return View::make(
                'back-end.admin.skills.index',
                compact('skills')
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
            $request,
            [
                'skill_title' => 'required',
            ]
        );
        $this->skill->saveSkills($request);
        Session::flash('message', trans('lang.save_skills'));
        return Redirect::back();
    }

    /**
     * Edit skills.
     *
     * @param int $id integer
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!empty($id)) {
            $skills = $this->skill::find($id);
            if (!empty($skills)) {
                if (file_exists(resource_path('views/extend/back-end/admin/skills/edit.blade.php'))) {
                    return View::make(
                        'extend.back-end.admin.skills.edit',
                        compact('id', 'skills')
                    );
                } else {
                    return View::make(
                        'back-end.admin.skills.edit',
                        compact('id', 'skills')
                    );
                }
                return Redirect::to('admin/skills');
            }
        }
    }

    /**
     * Update skills.
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
                'skill_title' => 'required',
            ]
        );
        $this->skill->updateSkills($request, $id);
        Session::flash('message', trans('lang.skill_updated'));
        return Redirect::to('admin/skills');
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
            $this->skill::where('id', $id)->delete();
            $json['type'] = 'success';
            $json['message'] = trans('lang.skill_deleted');
            return $json;
        } else {
            $json['type'] = 'error';
            $json['message'] = trans('lang.something_wrong');
            return $json;
        }
    }

    /**
     * Get Freelancer Skills.
     *
     * @return \Illuminate\Http\Response
     */
    public function getFreelancerSkills()
    {
        $json = array();
        $db_skills = Skill::select('id')->get()->pluck('id')->toArray();
        $freelancer_skills = Skill::getFreelancerSkill(Auth::user()->id);
        $result = array_diff($db_skills, $freelancer_skills);
        if (!empty($result)) {
            $skills = DB::table('skills')
                ->whereIn('id', $result)
                ->orderBy('title')->get()->toArray();
        } else {
            $skills = Skill::select('title', 'id')->get()->toArray();
        }
        if (!empty($skills)) {
            $json['type'] = 'success';
            $json['skills'] = $skills;
            return $json;
        } else {
            $json['type'] = 'error';
            $json['message'] = trans('lang.something_wrong');
            return $json;
        }
    }

    /**
     * Get Job Skills.
     *
     * @param mixed $request request attributes
     *
     * @return \Illuminate\Http\Response
     */
    public function getJobSkills(Request $request)
    {
        $json = array();
        if (!empty($request['slug']) && $request['slug'] != "post-job") {
            $job = Job::where('slug', $request['slug'])->select('id')->first();
            $db_skills = Skill::select('id')->get()->pluck('id')->toArray();
            $job_skills = Skill::getJobSkill($job->id);
            if (!empty($job_skills)) {
                $result = array_diff($db_skills, $job_skills);
                if (!empty($result)) {
                    $skills = DB::table('skills')
                        ->whereIn('id', $result)
                        ->orderBy('title')->get()->toArray();
                } else {
                    $skills = array();
                }
                $json['type'] = 'success';
                $json['skills'] = $skills;
                $json['message'] = trans('lang.skills_already_selected');
                return $json;
            } else {
                $skills = Skill::select('title', 'id')->get()->toArray();
                if (!empty($skills)) {
                    $json['type'] = 'success';
                    $json['skills'] = $skills;
                    return $json;
                } else {
                    $json['type'] = 'error';
                    $json['message'] = trans('lang.something_wrong');
                    return $json;
                }
            }
        } else {
            $skills = Skill::select('title', 'id')->get()->toArray();
            if (!empty($skills)) {
                $json['type'] = 'success';
                $json['skills'] = $skills;
                return $json;
            } else {
                $json['type'] = 'error';
                $json['message'] = trans('lang.something_wrong');
                return $json;
            }
        }
    }

    /**
     * Get Skills.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSkills()
    {
        $json = array();
        $skills = Skill::select('title', 'id')->get()->toArray();
        if (!empty($skills)) {
            $json['type'] = 'success';
            $json['skills'] = $skills;
            return $json;
        } else {
            $json['type'] = 'error';
            $json['message'] = trans('lang.something_wrong');
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
            $this->skill::where("id", $id)->delete();
        }
        if (!empty($checked)) {
            // $this->skill::whereIn($checked)->delete();
            $json['type'] = 'success';
            $json['message'] = trans('lang.skill_deleted');
            return $json;
        } else {
            $json['type'] = 'error';
            $json['message'] = trans('lang.something_wrong');
            return $json;
        }
    }
}
