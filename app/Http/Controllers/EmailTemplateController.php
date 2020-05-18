<?php
/**
 * Class EmailTemplateController.
 *
 * @category Worketic
 *
 * @package Worketic
 * @author  Amentotech <theamentotech@gmail.com>
 * @license http://www.amentotech.com Amentotech
 * @link    http://www.amentotech.com
 */
namespace App\Http\Controllers;

use App\EmailTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use View;
use Session;
use App\Helper;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Role;

/**
 * Class EmailTemplateController
 *
 */
class EmailTemplateController extends Controller
{
    /**
     * Defining scope of the variable
     *
     * @access protected
     * @var    array $email
     */
    protected $email;

    /**
     * Create a new controller instance.
     *
     * @param instance $email instance
     *
     * @return void
     */
    public function __construct(EmailTemplate $email)
    {
        $this->email = $email;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!empty($_GET['keyword'])) {
            $keyword = $_GET['keyword'];
            $templates = $this->email::where('title', 'like', '%' . $keyword . '%')->paginate(7)->setPath('');
            $roles = array_pluck(Role::all(), 'name', 'id');
            $pagination = $templates->appends(
                array(
                    'keyword' => Input::get('keyword')
                )
            );
        } else if (!empty($request['role'])) {
            $templates = EmailTemplate::getFilterTemplate($request['role']);
            $roles = array_pluck(Role::all(), 'name', 'id');
        } else {
            $templates = $this->email->getEmailTemplates();
            $roles = array_pluck(Role::all(), 'name', 'id');
        }
        if (file_exists(resource_path('views/extend/back-end/admin/email-templates/index.blade.php'))) {
            return View::make('extend.back-end.admin.email-templates.index', compact('templates', 'roles'));
        } else {
            return View::make('back-end.admin.email-templates.index', compact('templates', 'roles'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id ID
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $template = $this->email::getEmailTemplateByID($id);
        $variables = unserialize($template->variables);
        $variables_array = Arr::pluck($variables, 'key', 'value');
        if (file_exists(resource_path('views/extend/back-end/admin/email-templates/edit.blade.php'))) {
            return View::make('extend.back-end.admin.email-templates.edit', compact('template', 'variables_array'));
        } else {
            return View::make('back-end.admin.email-templates.edit', compact('template', 'variables_array'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request request
     * @param \App\EmailTemplate       $id      emailTemplate
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $server_verification = Helper::worketicIsDemoSite();
        if (!empty($server_verification)) {
            Session::flash('error', $server_verification);
            return Redirect::to('admin/email-templates');
        }
        $this->validate(
            $request, [
                'title' => 'required',
                'subject' => 'required',
                'email_content' => 'required',
            ]
        );
        $this->email->updateEmailTemplates($request, $id);
        Session::flash('message', trans('lang.email_template_updated'));
        return Redirect::to('admin/email-templates');
    }
}
