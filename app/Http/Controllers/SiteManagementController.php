<?php
/**
 * Class SiteManagementController
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
use App\User;
use App\Language;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailVerificationMailable;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Redirect;
use Hash;
use Auth;
use DB;
use App\Helper;
use App\Profile;
use Session;
use Storage;
use App\Report;
use App\Job;
use App\Proposal;
use App\SiteManagement;
use App\Page;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Schema;

/**
 * Class SiteManagementController
 *
 */
class SiteManagementController extends Controller
{

    /**
     * Defining scope of variable
     *
     * @access public
     * @var    array $category
     */
    protected $settings;

    /**
     * Create a new controller instance.
     *
     * @param mixed $settings get sitemanagement model
     *
     * @return void
     */
    public function __construct(SiteManagement $settings)
    {
        $this->settings = $settings;
    }

    /**
     * Show site settings form.
     *
     * @access public
     *
     * @return View
     */
    public function settings()
    {
        $client_id = '';
        $payment_password = '';
        $existing_payment_secret = '';
        $data = $this->settings::getMetaValue('email_data');
        $from_email = !empty($data[0]['from_email']) ? $data[0]['from_email'] : null;
        $from_email_id = !empty($data[0]['from_email_id']) ? $data[0]['from_email_id'] : null;
        $sender_name = !empty($data[0]['sender_name']) ? $data[0]['sender_name'] : null;
        $sender_tagline = !empty($data[0]['sender_tagline']) ? $data[0]['sender_tagline'] : null;
        $sender_url = !empty($data[0]['sender_url']) ? $data[0]['sender_url'] : null;
        $email_logo = !empty($data[0]['email_logo']) ? $data[0]['email_logo'] : null;
        $email_banner = !empty($data[0]['email_banner']) ? $data[0]['email_banner'] : null;
        $sender_avatar = !empty($data[0]['sender_avatar']) ? $data[0]['sender_avatar'] : null;
        $settings = $this->settings::getMetaValue('settings');
        $title = !empty($settings[0]['title']) ? $settings[0]['title'] : null;
        $email = !empty($settings[0]['email']) ? $settings[0]['email'] : null;
        $connects_per_job = !empty($settings[0]['connects_per_job']) ? $settings[0]['connects_per_job'] : null;
        $gmap_api_key = !empty($settings[0]['gmap_api_key']) ? $settings[0]['gmap_api_key'] : null;
        $logo = !empty($settings[0]['logo']) ? $settings[0]['logo'] : null;
        $favicon = !empty($settings[0]['favicon']) ? $settings[0]['favicon'] : null;
        $payout_settings = $this->settings::getMetaValue('commision');
        $existing_currency = !empty($payout_settings[0]['currency']) ? $payout_settings[0]['currency'] : '';
        $commision = !empty($payout_settings[0]['commision']) ? $payout_settings[0]['commision'] : null;
        $payment_gateway = !empty($payout_settings[0]['payment_method']) ? $payout_settings[0]['payment_method'] : array();
        $min_payout = !empty($payout_settings[0]['min_payout']) ? $payout_settings[0]['min_payout'] : 0;
        $existing_payment_settings = $this->settings::getMetaValue('payment_settings');
        $client_id = !empty($existing_payment_settings[0]['client_id']) ? $existing_payment_settings[0]['client_id'] : '';
        $payment_password = !empty($existing_payment_settings[0]['paypal_password']) ? $existing_payment_settings[0]['paypal_password'] : '';
        $existing_payment_secret = !empty($existing_payment_settings[0]['paypal_secret']) ? $existing_payment_settings[0]['paypal_secret'] : '';
        $footer_settings = $this->settings::getMetaValue('footer_settings');
        $footer_logo = !empty($footer_settings['footer_logo']) ? $footer_settings['footer_logo'] : null;
        $footer_desc = !empty($footer_settings['description']) ? $footer_settings['description'] : null;
        $footer_copyright = !empty($footer_settings['copyright']) ? $footer_settings['copyright'] : 'Worketic. All Rights Reserved.';
        $menu_pages = !empty($footer_settings['pages']) ? $footer_settings['pages'] : array();
        $menu_pages_1 = !empty($footer_settings['menu_pages_1']) ? $footer_settings['menu_pages_1'] : array();
        $menu_title_1 = !empty($footer_settings['menu_title_1']) ? $footer_settings['menu_title_1'] : '';
        $menu_title_2 = !empty($footer_settings['menu_title_2']) ? $footer_settings['menu_title_2'] : '';
        $pages = Page::select('title', 'id')->get()->pluck('title', 'id');
        $social_list = Helper::getSocialData();
        $social_unserialize_array = SiteManagement::getMetaValue('socials');
        $unserialize_menu_array = SiteManagement::getMetaValue('search_menu');
        $menu_title = DB::table('site_managements')->select('meta_value')->where('meta_key', 'menu_title')->get()->first();
        $currency = array_pluck(Helper::currencyList(), 'code', 'code');
        $payment_methods = Helper::getPaymentMethodList();
        $stripe_settings = $this->settings::getMetaValue('stripe_settings');
        $stripe_key = !empty($stripe_settings) ? $stripe_settings[0]['stripe_key'] : '';
        $stripe_secret = !empty($stripe_settings) ? $stripe_settings[0]['stripe_secret'] : '';
        $languages = Helper::getTranslatedLang();
        $selected_language = !empty($settings[0]['language']) ? $settings[0]['language'] : '' ;
        $currency = array_pluck(Helper::currencyList(), 'code', 'code');
        $register_form = $this->settings::getMetaValue('reg_form_settings');
        $reg_one_title = !empty($register_form) && !empty($register_form[0]['step1-title']) ? $register_form[0]['step1-title'] : '';
        $reg_one_subtitle = !empty($register_form) && !empty($register_form[0]['step1-subtitle']) ? $register_form[0]['step1-subtitle'] : '';
        $reg_two_title = !empty($register_form) && !empty($register_form[0]['step2-title']) ? $register_form[0]['step2-title'] : '';
        $reg_two_subtitle = !empty($register_form) && !empty($register_form[0]['step2-subtitle']) ? $register_form[0]['step2-subtitle'] : '';
        $term_note = !empty($register_form) && !empty($register_form[0]['step2-term-note']) ? $register_form[0]['step2-term-note'] : '';
        $reg_three_title = !empty($register_form) && !empty($register_form[0]['step3-title']) ? $register_form[0]['step3-title'] : '';
        $reg_three_subtitle = !empty($register_form) && !empty($register_form[0]['step3-subtitle']) ? $register_form[0]['step3-subtitle'] : '';
        $register_image = !empty($register_form) && !empty($register_form[0]['register_image']) ? $register_form[0]['register_image'] : '';
        $reg_page = !empty($register_form) && !empty($register_form[0]['step3-page']) ? $register_form[0]['step3-page'] : '';
        $reg_four_title = !empty($register_form) && !empty($register_form[0]['step4-title']) ? $register_form[0]['step4-title'] : '';
        $reg_four_subtitle = !empty($register_form) && !empty($register_form[0]['step4-subtitle']) ? $register_form[0]['step4-subtitle'] : '';
        $icons = Helper::getIconList();
        $dash_icons  = SiteManagement::getMetaValue('icons');
        $inner_page  = SiteManagement::getMetaValue('inner_page_data');
        $f_list_meta_title = !empty($inner_page) && !empty($inner_page[0]['f_list_meta_title']) ? $inner_page[0]['f_list_meta_title'] : '';
        $f_list_meta_desc = !empty($inner_page) && !empty($inner_page[0]['f_list_meta_desc']) ? $inner_page[0]['f_list_meta_desc'] : '';
        $show_f_banner = !empty($inner_page) && !empty($inner_page[0]['show_f_banner']) ? $inner_page[0]['show_f_banner'] : '';
        $emp_list_meta_title = !empty($inner_page) && !empty($inner_page[0]['emp_list_meta_title']) ? $inner_page[0]['emp_list_meta_title'] : '';
        $emp_list_meta_desc = !empty($inner_page) && !empty($inner_page[0]['emp_list_meta_desc']) ? $inner_page[0]['emp_list_meta_desc'] : '';
        $show_emp_banner = !empty($inner_page) && !empty($inner_page[0]['show_emp_banner']) ? $inner_page[0]['show_emp_banner'] : '';
        $job_list_meta_title = !empty($inner_page) && !empty($inner_page[0]['job_list_meta_title']) ? $inner_page[0]['job_list_meta_title'] : '';
        $job_list_meta_desc = !empty($inner_page) && !empty($inner_page[0]['job_list_meta_desc']) ? $inner_page[0]['job_list_meta_desc'] : '';
        $show_job_banner = !empty($inner_page) && !empty($inner_page[0]['show_job_banner']) ? $inner_page[0]['show_job_banner'] : '';
        $f_inner_banner = !empty($inner_page) && !empty($inner_page[0]['f_inner_banner']) ? $inner_page[0]['f_inner_banner'] : null;
        $e_inner_banner = !empty($inner_page) && !empty($inner_page[0]['e_inner_banner']) ? $inner_page[0]['e_inner_banner'] : null;
        $job_inner_banner = !empty($inner_page) && !empty($inner_page[0]['job_inner_banner']) ? $inner_page[0]['job_inner_banner'] : null;
        $show_service_banner = !empty($inner_page) && !empty($inner_page[0]['show_service_banner']) ? $inner_page[0]['show_service_banner'] : '';
        $service_inner_banner = !empty($inner_page) && !empty($inner_page[0]['service_inner_banner']) ? $inner_page[0]['service_inner_banner'] : null;
        $service_meta_title = !empty($inner_page) && !empty($inner_page[0]['service_list_meta_title']) ? $inner_page[0]['service_list_meta_title'] : '';
        $service_meta_desc = !empty($inner_page) && !empty($inner_page[0]['service_list_meta_desc']) ? $inner_page[0]['service_list_meta_desc'] : '';
        $article_meta_title = !empty($inner_page) && !empty($inner_page[0]['article_list_meta_title']) ? $inner_page[0]['article_list_meta_title'] : '';
        $article_meta_desc = !empty($inner_page) && !empty($inner_page[0]['article_list_meta_desc']) ? $inner_page[0]['article_list_meta_desc'] : '';
        $show_article_banner = !empty($inner_page) && !empty($inner_page[0]['show_article_banner']) ? $inner_page[0]['show_article_banner'] : '';
        $article_inner_banner = !empty($inner_page) && !empty($inner_page[0]['article_inner_banner']) ? $inner_page[0]['article_inner_banner'] : null;
        $app_access_type = DB::table('site_managements')->select('meta_value')->where('meta_key', 'access_type')->get()->first();
        $access_type = !empty($app_access_type) ? $app_access_type->meta_value : '';
        $reg_form_banner = !empty($register_form) && !empty($register_form[0]['reg_form_banner']) ? $register_form[0]['reg_form_banner'] : null;
        $chat_setting = SiteManagement::getMetaValue('chat_settings');
        $port =!empty($chat_setting) && !empty($chat_setting['port']) ? $chat_setting['port'] : 3001;
        $host = !empty($chat_setting) && !empty($chat_setting['host']) ? $chat_setting['host'] : 'http://localhost';
        $bank_detail = SiteManagement::getMetaValue('bank_detail');
        $account_name =!empty($bank_detail) && !empty($bank_detail['account_name']) ? $bank_detail['account_name'] : '';
        $account_number =!empty($bank_detail) && !empty($bank_detail['account_number']) ? $bank_detail['account_number'] : '';
        $bank_name =!empty($bank_detail) && !empty($bank_detail['bank_name']) ? $bank_detail['bank_name'] : '';
        $bank_routing_number =!empty($bank_detail) && !empty($bank_detail['bank_routing_number']) ? $bank_detail['bank_routing_number'] : '';
        $bank_bic_swift =!empty($bank_detail) && !empty($bank_detail['bank_bic_swift']) ? $bank_detail['bank_bic_swift'] : '';
        $bank_iban =!empty($bank_detail) && !empty($bank_detail['bank_iban']) ? $bank_detail['bank_iban'] : '';
        $bank_description =!empty($bank_detail) && !empty($bank_detail['description']) ? $bank_detail['description'] : '';
        $bank_instruction =!empty($bank_detail) && !empty($bank_detail['instruction']) ? $bank_detail['instruction'] : '';
        $order_settings = SiteManagement::getMetaValue('order_settings');
        $new_order_subject =!empty($order_settings) && !empty($order_settings['admin_order']['subject']) ? $order_settings['admin_order']['subject'] : '';
        $new_order_content =!empty($order_settings) && !empty($order_settings['admin_order']['email_content']) ? $order_settings['admin_order']['email_content'] : '';
        $employer_hiring_subject =!empty($order_settings) && !empty($order_settings['employer_hire']['subject']) ? $order_settings['employer_hire']['subject'] : '';
        $employer_hiring_content =!empty($order_settings) && !empty($order_settings['employer_hire']['email_content']) ? $order_settings['employer_hire']['email_content'] : '';
        $homepage_list = DB::table('pages')->select('id', 'title')->get()->toArray();
        $homepage = SiteManagement::getMetaValue('homepage');
        $selected_homepage =!empty($homepage) && !empty($homepage['home']) ? $homepage['home'] : 'v1';
        if (file_exists(resource_path('views/extend/back-end/admin/settings/index.blade.php'))) {
            return view(
                'extend.back-end.admin.settings.index',
                compact(
                    'new_order_subject', 'new_order_content', 'employer_hiring_subject', 'employer_hiring_content',
                    'bank_bic_swift', 'bank_iban', 'bank_description', 'bank_instruction',
                    'account_name', 'account_number', 'bank_name', 'bank_routing_number',
                    'from_email', 'from_email_id', 'sender_name',
                    'sender_tagline', 'sender_url', 'email_logo', 'email_banner',
                    'sender_avatar', 'title', 'email', 'logo', 'commision',
                    'existing_payment_settings', 'connects_per_job', 'footer_logo',
                    'footer_desc', 'social_list', 'social_unserialize_array',
                    'footer_copyright', 'pages', 'menu_pages', 'menu_pages_1',
                    'unserialize_menu_array', 'menu_title_1', 'menu_title_2', 'menu_title',
                    'client_id', 'payment_password', 'existing_payment_secret',
                    'currency', 'existing_currency', 'gmap_api_key', 'min_payout',
                    'payment_methods', 'payment_gateway', 'stripe_key',
                    'stripe_secret', 'languages', 'selected_language', 'reg_one_title',
                    'reg_one_subtitle', 'reg_two_title', 'reg_two_subtitle', 'reg_three_title',
                    'reg_three_subtitle', 'register_image', 'reg_four_title', 'reg_four_subtitle',
                    'reg_page', 'term_note', 'icons', 'dash_icons', 'f_list_meta_title',
                    'f_list_meta_desc', 'show_f_banner', 'emp_list_meta_title', 'emp_list_meta_desc',
                    'show_emp_banner', 'job_list_meta_title', 'job_list_meta_desc',
                    'show_job_banner', 'f_inner_banner', 'e_inner_banner', 'job_inner_banner',
                    'favicon', 'show_service_banner', 'service_inner_banner', 'service_meta_title',
                    'service_meta_desc', 'access_type', 'reg_form_banner', 'port', 'host', 'homepage_list',
                    'selected_homepage', 'article_meta_title','article_meta_desc','show_article_banner','article_inner_banner'
                )
            );
        } else {
            return view(
                'back-end.admin.settings.index',
                compact(
                    'new_order_subject', 'new_order_content', 'employer_hiring_subject', 'employer_hiring_content',
                    'bank_bic_swift', 'bank_iban', 'bank_description', 'bank_instruction',
                    'account_name', 'account_number', 'bank_name', 'bank_routing_number',
                    'from_email', 'from_email_id', 'sender_name',
                    'sender_tagline', 'sender_url', 'email_logo', 'email_banner',
                    'sender_avatar', 'title', 'email', 'logo', 'commision',
                    'existing_payment_settings', 'connects_per_job', 'footer_logo',
                    'footer_desc', 'social_list', 'social_unserialize_array',
                    'footer_copyright', 'pages', 'menu_pages', 'menu_pages_1',
                    'unserialize_menu_array', 'menu_title_1', 'menu_title_2', 'menu_title',
                    'client_id', 'payment_password', 'existing_payment_secret',
                    'currency', 'existing_currency', 'gmap_api_key', 'min_payout',
                    'payment_methods', 'payment_gateway', 'stripe_key',
                    'stripe_secret', 'languages', 'selected_language', 'reg_one_title',
                    'reg_one_subtitle', 'reg_two_title', 'reg_two_subtitle', 'reg_three_title',
                    'reg_three_subtitle', 'register_image', 'reg_four_title', 'reg_four_subtitle',
                    'reg_page', 'term_note', 'icons', 'dash_icons',
                    'f_list_meta_title', 'f_list_meta_desc', 'show_f_banner',
                    'emp_list_meta_title', 'emp_list_meta_desc',
                    'show_emp_banner', 'job_list_meta_title', 'job_list_meta_desc',
                    'show_job_banner', 'f_inner_banner', 'e_inner_banner', 'job_inner_banner',
                    'favicon', 'show_service_banner', 'service_inner_banner', 'service_meta_title',
                    'service_meta_desc', 'access_type', 'reg_form_banner', 'port', 'host', 'homepage_list',
                    'selected_homepage', 'article_meta_title','article_meta_desc','show_article_banner','article_inner_banner'
                )
            );
        }
    }

    /**
     * Show home page settings form.
     *
     * @access public
     *
     * @return View
     */
    public function homePageSettings()
    {
        $home_settings = $this->settings::getMetaValue('home_settings');
        $section_settings = $this->settings::getMetaValue('section_settings');
        $banner_bg = !empty($home_settings[0]['home_banner']) ? $home_settings[0]['home_banner'] : null;
        $banner_bg_image = !empty($home_settings[0]['home_banner_image']) ? $home_settings[0]['home_banner_image'] : null;
        $banner_title = !empty($home_settings[0]['banner_title']) ? $home_settings[0]['banner_title'] : 'Hire expert freelancers';
        $banner_subtitle = !empty($home_settings[0]['banner_subtitle']) ? $home_settings[0]['banner_subtitle'] : 'for any job, Online';
        $banner_description = !empty($home_settings[0]['banner_description']) ? $home_settings[0]['banner_description'] : null;
        $banner_video_link = !empty($home_settings[0]['video_link']) ? $home_settings[0]['video_link'] : null;
        $banner_video_title = !empty($home_settings[0]['video_title']) ? $home_settings[0]['video_title'] : null;
        $banner_video_desc = !empty($home_settings[0]['video_desc']) ? $home_settings[0]['video_desc'] : null;
        $section_bg = !empty($section_settings[0]['section_bg']) ? $section_settings[0]['section_bg'] : null;
        $company_title = !empty($section_settings[0]['company_title']) ? $section_settings[0]['company_title'] : null;
        $company_desc = !empty($section_settings[0]['company_desc']) ? $section_settings[0]['company_desc'] : null;
        $company_url = !empty($section_settings[0]['company_url']) ? $section_settings[0]['company_url'] : null;
        $freelancer_title = !empty($section_settings[0]['freelancer_title']) ? $section_settings[0]['freelancer_title'] : null;
        $freelancer_desc = !empty($section_settings[0]['freelancer_desc']) ? $section_settings[0]['freelancer_desc'] : null;
        $freelancer_url = !empty($section_settings[0]['freelancer_url']) ? $section_settings[0]['freelancer_url'] : null;
        $download_app_img = !empty($section_settings[0]['download_app_img']) ? $section_settings[0]['download_app_img'] : null;
        $app_title = !empty($section_settings[0]['app_title']) ? $section_settings[0]['app_title'] : null;
        $app_subtitle = !empty($section_settings[0]['app_subtitle']) ? $section_settings[0]['app_subtitle'] : null;
        $app_desc = $this->settings::where('meta_key', 'app_desc')->select('meta_value')->pluck('meta_value')->first();
        $app_android_link = $this->settings::where('meta_key', 'app_android_link')->select('meta_value')->pluck('meta_value')->first();
        $app_ios_link = $this->settings::where('meta_key', 'app_ios_link')->select('meta_value')->pluck('meta_value')->first();
        $cat_sec_title = !empty($section_settings[0]['cat_sec_title']) ? $section_settings[0]['cat_sec_title'] : null;
        $cat_sec_subtitle = !empty($section_settings[0]['cat_sec_subtitle']) ? $section_settings[0]['cat_sec_subtitle'] : null;
        $service_section = !empty($this->settings::getMetaValue('service_section_setting')) ? $this->settings::getMetaValue('service_section_setting') : array();
        $show_services_section  = !empty($service_section) && !empty($service_section['show_services_section']) ? $service_section['show_services_section'] : '';
        $service_sec_title  = !empty($service_section) && !empty($service_section['title']) ? $service_section['title'] : '';
        $service_sec_subtitle  = !empty($service_section) && !empty($service_section['subtitle']) ? $service_section['subtitle'] : '';
        $service_sec_description  = !empty($service_section) && !empty($service_section['description']) ? $service_section['description'] : '';
        if (file_exists(resource_path('views/extend/back-end/admin/home-page-settings/index.blade.php'))) {
            return view(
                'extend.back-end.admin.home-page-settings.index',
                compact(
                    'banner_title', 'banner_subtitle', 'banner_description',
                    'banner_video_link', 'banner_video_title', 'banner_video_desc',
                    'banner_bg', 'banner_bg_image', 'company_title', 'company_desc',
                    'company_url', 'freelancer_title', 'freelancer_desc',
                    'freelancer_url', 'section_bg', 'download_app_img',
                    'app_title', 'app_subtitle', 'app_desc', 'app_android_link',
                    'app_ios_link', 'cat_sec_title', 'cat_sec_subtitle', 'service_sec_title',
                    'service_sec_subtitle', 'service_sec_description'
                )
            );
        } else {
            return view(
                'back-end.admin.home-page-settings.index',
                compact(
                    'banner_title', 'banner_subtitle', 'banner_description',
                    'banner_video_link', 'banner_video_title', 'banner_video_desc',
                    'banner_bg', 'banner_bg_image', 'company_title', 'company_desc',
                    'company_url', 'freelancer_title', 'freelancer_desc',
                    'freelancer_url', 'section_bg', 'download_app_img',
                    'app_title', 'app_subtitle', 'app_desc', 'app_android_link',
                    'app_ios_link', 'cat_sec_title', 'cat_sec_subtitle', 'service_sec_title',
                    'service_sec_subtitle', 'service_sec_description'
                )
            );
        }
    }

    /**
     * Store Email Settings
     *
     * @param mixed $request get req attributes
     *
     * @access public
     *
     * @return View
     */
    public function storeEmailSettings(Request $request)
    {
        $server = Helper::worketicIsDemoSiteAjax();
        if (!empty($server)) {
            $response['type'] = 'error';
            $response['message'] = $server->getData()->message;
            return $response;
        }
        $json = array();
        if (!empty($request['email_data'])) {
            $store_email_settings
                = $this->settings->saveEmailSettings($request['email_data']);
            if ($store_email_settings == "success") {
                $json['type'] = 'success';
                $json['progressing'] = trans('lang.saving');
                $json['message'] = trans('lang.settings_saved');
                return $json;
            } else {
                $json['type'] = 'error';
                $json['message'] = trans('lang.something_wrong');
                return $json;
            }
        }
    }

    /**
     * Store Inner Page Settings
     *
     * @param mixed $request get req attributes
     *
     * @access public
     *
     * @return View
     */
    public function storeInnerPageSettings(Request $request)
    {
        $server = Helper::worketicIsDemoSiteAjax();
        if (!empty($server)) {
            $response['type'] = 'error';
            $response['message'] = $server->getData()->message;
            return $response;
        }
        $json = array();
        if (!empty($request['inner_page'])) {
            $store_inner_page_settings
                = $this->settings->saveInnerPageSettings($request['inner_page']);
            if ($store_inner_page_settings == "success") {
                $json['type'] = 'success';
                $json['progressing'] = trans('lang.saving');
                $json['message'] = trans('lang.settings_saved');
                return $json;
            } else {
                $json['type'] = 'error';
                $json['message'] = trans('lang.something_wrong');
                return $json;
            }
        }
    }

    /**
     * Get job attachment settings.
     *
     * @param integer $request $request->attributes
     *
     * @return show job single page
     */
    public function getInnerPageSettings(Request $request)
    {
        $json = array();
        $inner_page_settings = !empty(SiteManagement::getMetaValue('inner_page_data')) ? SiteManagement::getMetaValue('inner_page_data') : array();
        if (!empty($inner_page_settings[0]['show_f_banner'])) {
            if ($inner_page_settings[0]['show_f_banner'] == 'true') {
                $json['show_f_banner'] = 'true';
            }
        }
        if (!empty($inner_page_settings[0]['show_emp_banner'])) {
            if ($inner_page_settings[0]['show_emp_banner'] == 'true') {
                $json['show_emp_banner'] = 'true';
            }
        }
        if (!empty($inner_page_settings[0]['show_job_banner'])) {
            if ($inner_page_settings[0]['show_job_banner'] == 'true') {
                $json['show_job_banner'] = 'true';
            }
        }
        if (!empty($inner_page_settings[0]['show_service_banner'])) {
            if ($inner_page_settings[0]['show_service_banner'] == 'true') {
                $json['show_service_banner'] = 'true';
            }
        }
        if (!empty($inner_page_settings[0]['show_article_banner'])) {
            if ($inner_page_settings[0]['show_article_banner'] == 'true') {
                $json['show_article_banner'] = 'true';
            }
        }
        return $json;
    }

    /**
     * Get registration settings.
     *
     * @return response
     */
    public function getRegistrationSettings()
    {
        $json = array();
        $reg_form_settings = !empty(SiteManagement::getMetaValue('reg_form_settings')) ? SiteManagement::getMetaValue('reg_form_settings') : array();
        if (!empty($reg_form_settings[0]['show_emplyr_inn_sec'])) {
            $json['show_emplyr_inn_sec'] = $reg_form_settings[0]['show_emplyr_inn_sec'];
        } else {
            $json['show_emplyr_inn_sec'] = 'true';
        }
        if (!empty($reg_form_settings[0]['show_reg_form_banner'])) {
            $json['show_reg_form_banner'] = $reg_form_settings[0]['show_reg_form_banner'];
        } else {
            $json['show_reg_form_banner'] = 'true';
        }
        return $json;
    }

    /**
     * Store home settings
     *
     * @param mixed $request get req attributes
     *
     * @access public
     *
     * @return View
     */
    public function storeHomeSettings(Request $request)
    {
        $server = Helper::worketicIsDemoSiteAjax();
        if (!empty($server)) {
            $response['type'] = 'error';
            $response['message'] = $server->getData()->message;
            return $response;
        }
        $json = array();
        if (!empty($request)) {
            $store_home_settings = SiteManagement::saveHomeSettings($request['home'], $request);
            if ($store_home_settings == "success") {
                $json['type'] = 'success';
                $json['progressing'] = trans('lang.saving');
                $json['message'] = trans('lang.settings_saved');
                return $json;
            } else {
                $json['type'] = 'error';
                $json['message'] = trans('lang.something_wrong');
                return $json;
            }
        }
    }

    /**
     * Store section settings
     *
     * @param mixed $request get req attributes
     *
     * @access public
     *
     * @return View
     */
    public function storeSectionSettings(Request $request)
    {
        $server = Helper::worketicIsDemoSiteAjax();
        if (!empty($server)) {
            $response['type'] = 'error';
            $response['message'] = $server->getData()->message;
            return $response;
        }
        $json = array();
        if (!empty($request)) {
            $store_home_settings = SiteManagement::saveSectionSettings($request['section'], $request);
            if ($store_home_settings == "success") {
                $json['type'] = 'success';
                $json['progressing'] = trans('lang.saving');
                $json['message'] = trans('lang.settings_saved');
                return $json;
            } else {
                $json['type'] = 'error';
                $json['message'] = trans('lang.something_wrong');
                return $json;
            }
        }
    }

    /**
     * Store service section settings
     *
     * @param mixed $request get req attributes
     *
     * @access public
     *
     * @return View
     */
    public function storeServiceSectionSettings(Request $request)
    {
        $server = Helper::worketicIsDemoSiteAjax();
        if (!empty($server)) {
            $response['type'] = 'error';
            $response['message'] = $server->getData()->message;
            return $response;
        }
        $json = array();
        if (!empty($request)) {
            $store_home_settings = SiteManagement::saveServiceSectionSettings($request);
            if ($store_home_settings == "success") {
                $json['type'] = 'success';
                $json['progressing'] = trans('lang.saving');
                $json['message'] = trans('lang.settings_saved');
                return $json;
            } else {
                $json['type'] = 'error';
                $json['message'] = trans('lang.something_wrong');
                return $json;
            }
        }
    }

    /**
     * Store general settings
     *
     * @param mixed $request get req attributes
     *
     * @access public
     *
     * @return View
     */
    public function storeGeneralSettings(Request $request)
    {
        $server = Helper::worketicIsDemoSiteAjax();
        if (!empty($server)) {
            $response['type'] = 'error';
            $response['message'] = $server->getData()->message;
            return $response;
        }
        $json = array();
        if (!empty($request['settings'])) {
            $store_email_settings
                = $this->settings->saveSettings($request['settings']);
            if ($store_email_settings == "success") {
                $json['type'] = 'success';
                $json['progressing'] = trans('lang.saving');
                $json['message'] = trans('lang.settings_saved');
                return $json;
            } elseif ($store_email_settings == "lang_not_found") {
                $json['type'] = 'error';
                $json['message'] = trans('lang.lang_not_found');
                return $json;
            } else {
                $json['type'] = 'error';
                $json['message'] = trans('lang.something_wrong');
                return $json;
            }
        }
    }

    /**
     * Store general home settings
     *
     * @param mixed $request get req attributes
     *
     * @access public
     *
     * @return View
     */
    public function storeGeneralHomeSettings(Request $request)
    {
        $server = Helper::worketicIsDemoSiteAjax();
        if (!empty($server)) {
            $response['type'] = 'error';
            $response['message'] = $server->getData()->message;
            return $response;
        }
        $json = array();
        if (!empty($request)) {
            $store_general_home_settings
                = $this->settings->saveGeneralHomeSettings($request);
            if ($store_general_home_settings == "success") {
                $json['type'] = 'success';
                $json['progressing'] = trans('lang.saving');
                $json['message'] = trans('lang.settings_saved');
                return $json;
            } elseif ($store_general_home_settings == "lang_not_found") {
                $json['type'] = 'error';
                $json['message'] = trans('lang.lang_not_found');
                return $json;
            } else {
                $json['type'] = 'error';
                $json['message'] = trans('lang.something_wrong');
                return $json;
            }
        }
    }

    /**
     * Store chat settings
     *
     * @param mixed $request get req attributes
     *
     * @access public
     *
     * @return View
     */
    public function storeChatSettings(Request $request)
    {
        $server = Helper::worketicIsDemoSiteAjax();
        if (!empty($server)) {
            $response['type'] = 'error';
            $response['message'] = $server->getData()->message;
            return $response;
        }
        $json = array();
        if (!empty($request)) {
            $store_chat_settings
                = $this->settings->saveChatSettings($request);
            if ($store_chat_settings == "success") {
                $json['type'] = 'success';
                $json['progressing'] = trans('lang.saving');
                $json['message'] = trans('lang.settings_saved');
                return $json;
            } elseif ($store_chat_settings == "lang_not_found") {
                $json['type'] = 'error';
                $json['message'] = trans('lang.lang_not_found');
                return $json;
            } else {
                $json['type'] = 'error';
                $json['message'] = trans('lang.something_wrong');
                return $json;
            }
        }
    }

    /**
     * Store dashboard icons
     *
     * @param mixed $request get req attributes
     *
     * @access public
     *
     * @return View
     */
    public function storeDashboardIcons(Request $request)
    {
        $server = Helper::worketicIsDemoSiteAjax();
        if (!empty($server)) {
            $response['type'] = 'error';
            $response['message'] = $server->getData()->message;
            return $response;
        }
        $json = array();
        if (!empty($request)) {
            $upload_icons
                = $this->settings->saveIcons($request);
            if ($upload_icons == "success") {
                $json['type'] = 'success';
                $json['progressing'] = trans('lang.saving');
                $json['message'] = trans('lang.settings_saved');
                return $json;
            } elseif ($upload_icons == "lang_not_found") {
                $json['type'] = 'error';
                $json['message'] = trans('lang.lang_not_found');
                return $json;
            } else {
                $json['type'] = 'error';
                $json['message'] = trans('lang.something_wrong');
                return $json;
            }
        }
    }

    /**
     * Store theme color settings
     *
     * @param mixed $request get req attributes
     *
     * @access public
     *
     * @return View
     */
    public function storeThemeStylingSettings(Request $request)
    {
        $server = Helper::worketicIsDemoSiteAjax();
        if (!empty($server)) {
            $response['type'] = 'error';
            $response['message'] = $server->getData()->message;
            return $response;
        }
        $json = array();
        if (!empty($request)) {
            $store_theme_settings
                = $this->settings->saveThemeStylingSettings($request);
            if ($store_theme_settings == "success") {
                $json['type'] = 'success';
                $json['progressing'] = trans('lang.saving');
                $json['message'] = trans('lang.settings_saved');
                return $json;
            } else {
                $json['type'] = 'error';
                $json['message'] = trans('lang.something_wrong');
                return $json;
            }
        }
    }

    /**
     * Store Footer Settings
     *
     * @param mixed $request get req attributes
     *
     * @access public
     *
     * @return View
     */
    public function storeFooterSettings(Request $request)
    {
        $server = Helper::worketicIsDemoSiteAjax();
        if (!empty($server)) {
            $response['type'] = 'error';
            $response['message'] = $server->getData()->message;
            return $response;
        }
        $json = array();
        if (!empty($request['footer'])) {
            $footer_settings = $this->settings->saveFooterSettings($request['footer']);
            if ($footer_settings == "success") {
                $json['type'] = 'success';
                $json['progressing'] = trans('lang.saving');
                $json['message'] = trans('lang.settings_saved');
                return $json;
            } else {
                $json['type'] = 'error';
                $json['message'] = trans('lang.something_wrong');
                return $json;
            }
        } else {
            $json['type'] = 'error';
            $json['message'] = trans('lang.something_wrong');
            return $json;
        }
    }

    /**
     * Store social settings
     *
     * @param mixed $request get req attributes
     *
     * @access public
     *
     * @return View
     */
    public function storeSocialSettings(Request $request)
    {
        $server = Helper::worketicIsDemoSiteAjax();
        if (!empty($server)) {
            $response['type'] = 'error';
            $response['message'] = $server->getData()->message;
            return $response;
        }
        $json = array();
        if (!empty($request['social'])) {
            $social_settings = $this->settings->saveSocialSettings($request['social']);
            if ($social_settings == "success") {
                $json['type'] = 'success';
                $json['progressing'] = trans('lang.saving');
                $json['message'] = trans('lang.settings_saved');
                return $json;
            } else {
                $json['type'] = 'error';
                $json['message'] = trans('lang.something_wrong');
                return $json;
            }
        } else {
            $json['type'] = 'error';
            $json['message'] = trans('lang.something_wrong');
            return $json;
        }
    }

    /**
     * Store search menu.
     *
     * @param mixed $request get req attributes
     *
     * @access public
     *
     * @return View
     */
    public function storeSearchMenu(Request $request)
    {
        $server = Helper::worketicIsDemoSiteAjax();
        if (!empty($server)) {
            $response['type'] = 'error';
            $response['message'] = $server->getData()->message;
            return $response;
        }
        $this->validate(
            $request,
            [
                'menu_title' => 'required',
            ]
        );
        $json = array();
        if (!empty($request)) {
            $search_menu = $this->settings->saveSearchMenu($request);
            if ($search_menu['type'] == "success") {
                $json['type'] = 'success';
                $json['progressing'] = trans('lang.saving');
                $json['message'] = trans('lang.settings_saved');
                return $json;
            } else {
                $json['type'] = 'error';
                $json['message'] = trans('lang.all_required');
                return $json;
            }
        } else {
            $json['type'] = 'error';
            $json['message'] = trans('lang.all_required');
            return $json;
        }
    }

    /**
     * Store commision settings
     *
     * @param mixed $request get req attributes
     *
     * @access public
     *
     * @return View
     */
    public function storeCommisionSettings(Request $request)
    {
        $server = Helper::worketicIsDemoSiteAjax();
        if (!empty($server)) {
            $response['type'] = 'error';
            $response['message'] = $server->getData()->message;
            return $response;
        }
        $json = array();
        if (!empty($request['payment'])) {
            $default_settings = $this->settings->saveCommisionSettings($request['payment']);
            if ($default_settings == "success") {
                $json['type'] = 'success';
                $json['progressing'] = trans('lang.saving');
                $json['message'] = trans('lang.settings_saved');
                return $json;
            } else {
                $json['type'] = 'error';
                $json['message'] = trans('lang.something_wrong');
                return $json;
            }
        } else {
            $json['type'] = 'error';
            $json['message'] = trans('lang.something_wrong');
            return $json;
        }
    }

    /**
     * Store payment settings
     *
     * @param mixed $request get req attributes
     *
     * @access public
     *
     * @return View
     */
    public function storePaymentSettings(Request $request)
    {
        $server = Helper::worketicIsDemoSiteAjax();
        if (!empty($server)) {
            $response['type'] = 'error';
            $response['message'] = $server->getData()->message;
            return $response;
        }
        $this->validate(
            $request,
            [
                'client_id' => 'required',
                'paypal_password' => 'required',
                'paypal_secret' => 'required',
            ]
        );
        $json = array();
        if (!empty($request)) {
            $default_settings = $this->settings->savePaymentSettings($request);
            if ($default_settings == "success") {
                $json['type'] = 'success';
                $json['progressing'] = trans('lang.saving');
                $json['message'] = trans('lang.settings_saved');
                return $json;
            } else {
                $json['type'] = 'error';
                $json['message'] = trans('lang.something_wrong');
                return $json;
            }
        } else {
            $json['type'] = 'error';
            $json['message'] = trans('lang.something_wrong');
            return $json;
        }
    }

    /**
     * Store payment settings
     *
     * @param mixed $request get req attributes
     *
     * @access public
     *
     * @return View
     */
    public function storeStripeSettings(Request $request)
    {
        $server = Helper::worketicIsDemoSiteAjax();
        if (!empty($server)) {
            $response['type'] = 'error';
            $response['message'] = $server->getData()->message;
            return $response;
        }
        $this->validate(
            $request,
            [
                'stripe_key' => 'required',
                'stripe_secret' => 'required',
            ]
        );
        $json = array();
        if (!empty($request)) {
            $default_settings = $this->settings->saveStripeSettings($request);
            if ($default_settings == "success") {
                $json['type'] = 'success';
                $json['progressing'] = trans('lang.saving');
                $json['message'] = trans('lang.settings_saved');
                return $json;
            } else {
                $json['type'] = 'error';
                $json['message'] = trans('lang.something_wrong');
                return $json;
            }
        } else {
            $json['type'] = 'error';
            $json['message'] = trans('lang.something_wrong');
            return $json;
        }
    }

    /**
     * Upload Image to temporary folder.
     *
     * @param mixed  $request   request attributes
     * @param string $file_name getfilename
     *
     * @return \Illuminate\Http\Response
     */
    public function uploadTempImage(Request $request, $file_name = '')
    {
        $path = Helper::PublicPath() . '/uploads/settings/temp/';
        if (!empty($request[$file_name])) {
            Helper::uploadSingleTempImage($path, $request[$file_name]);
        }
    }

    /**
     * Import Demo content.
     *
     * @return \Illuminate\Http\Response
     */
    public function importDemo()
    {
        $server_verification = Helper::worketicIsDemoSite();
        if (!empty($server_verification)) {
            Session::flash('error', $server_verification);
            return redirect()->to('admin/settings');
        }
        \Artisan::call('migrate:fresh');
        \Artisan::call('db:seed');
        return redirect()->to('/');
    }

    /**
     * Remove Demo content.
     *
     * @return \Illuminate\Http\Response
     */
    public function removeDemoContent()
    {
        $server_verification = Helper::worketicIsDemoSite();
        if (!empty($server_verification)) {
            Session::flash('error', $server_verification);
            return Redirect::back();
        }
        \Artisan::call('migrate:fresh');
        \Artisan::call('db:seed', ['--class' => 'AdminSeeder', '--force' => true]);
        \Artisan::call('db:seed', ['--class' => 'AdminProfileSeeder', '--force' => true]);
        \Artisan::call('db:seed', ['--class' => 'RoleTableSeeder', '--force' => true]);
        \Artisan::call('db:seed', ['--class' => 'AdminModelHasRoleSeeder', '--force' => true]);
        \Artisan::call('db:seed', ['--class' => 'EmailTypeSeeder', '--force' => true]);
        \Artisan::call('db:seed', ['--class' => 'EmailTemplateSeeder', '--force' => true]);
        \Artisan::call('db:seed', ['--class' => 'TrialPackageSeeder', '--force' => true]);
        \Artisan::call('db:seed', ['--class' => 'TrialInvoiceSeeder', '--force' => true]);
        \Artisan::call('db:seed', ['--class' => 'ResponseTimeSeeder', '--force' => true]);
        \Artisan::call('db:seed', ['--class' => 'DeliveryTimeSeeder', '--force' => true]);
        \Artisan::call('db:seed', ['--class' => 'AccessTypeSeeder', '--force' => true]);
        \Artisan::call('db:seed', ['--class' => 'ServiceSeeder', '--force' => true]);
        \Artisan::call('db:seed', ['--class' => 'ServiceUserSeeder', '--force' => true]);
        return redirect()->to('/');
    }

    /**
     * Clear select cache of the app.
     *
     * @param boolean $request $req
     *
     * @return \Illuminate\Http\Response
     */
    public function clearCache(Request $request)
    {
        $json = array();
        if ($request['clear_cache'] == true) {
            \Artisan::call('config:cache');
            \Artisan::call('cache:clear');
            \Artisan::call('config:clear');
        }
        if ($request['clear_views'] == true) {
            \Artisan::call('view:clear');
        }
        if ($request['clear_routes'] == true) {
            \Artisan::call('route:clear');
        }
        $json['type'] = 'success';
        return $json;
    }

    /**
     * Remove all cache of the app.
     *
     * @return \Illuminate\Http\Response
     */
    public function clearAllCache()
    {
        $json = array();
        \Artisan::call('optimize:clear');
        $json['type'] = 'success';
        return $json;
    }

    /**
     * Remove all cache of the app.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPageOption(Request $request)
    {
        $json = array();
        $settings = DB::table('site_managements')->select('meta_value')->where('meta_key', 'show-page-'.$request['page_id'])->get()->first();
        $banner = DB::table('site_managements')->select('meta_value')->where('meta_key', 'show-banner-'.$request['page_id'])->get()->first();

        if (!empty($settings)) {
            $json['type'] = 'success';
            $json['show_page'] = $settings->meta_value;
        }
        if (!empty($banner)) {
            $json['type'] = 'success';
            $json['show_banner'] = $banner->meta_value;
        }
        return $json;
    }

    /**
     * Store registration settings
     *
     * @param mixed $request get req attributes
     *
     * @access public
     *
     * @return View
     */
    public function storeRegistrationSettings(Request $request)
    {
        $server = Helper::worketicIsDemoSiteAjax();
        if (!empty($server)) {
            $response['type'] = 'error';
            $response['message'] = $server->getData()->message;
            return $response;
        }
        if (!empty($request)) {
            $reg_settings = $this->settings->saveRegistrationSettings($request);
            if ($reg_settings == "success") {
                Session::flash('message', trans('lang.settings_saved'));
                return Redirect::back();
            } elseif ($reg_settings == "error") {
                Session::flash('error', trans('lang.all_required'));
                return Redirect::back();
            }
        } else {
            Session::flash('error', trans('lang.something_wrong'));
            return Redirect::back();
        }
    }

    /**
     * Get section display settings
     *
     * @access public
     *
     * @return View
     */
    public function getSectionDisplaySetting()
    {
        $json = array();
        $section_settings = !empty(SiteManagement::getMetaValue('section_settings')) ? SiteManagement::getMetaValue('section_settings') : array();
        $service_section_settings = !empty(SiteManagement::getMetaValue('service_section_setting')) ? SiteManagement::getMetaValue('service_section_setting') : array();
        if (!empty($section_settings[0]['cat_section_display'])) {
            if ($section_settings[0]['cat_section_display'] == 'true') {
                $json['cat_section_display'] = 'true';
            }
        }
        if (!empty($section_settings[0]['home_section_display'])) {
            if ($section_settings[0]['home_section_display'] == 'true') {
                $json['home_section_display'] = 'true';
            }
        }
        if (!empty($section_settings[0]['app_section_display'])) {
            if ($section_settings[0]['app_section_display'] == 'true') {
                $json['app_section_display'] = 'true';
            }
        }
        if (!empty($service_section_settings['show_services_section'])) {
            if ($service_section_settings['show_services_section'] == 'true') {
                $json['show_services_section'] = 'true';
            }
        }
        return $json;
    }

    /**
     * Get section display settings
     *
     * @access public
     *
     * @return View
     */
    public function getThemeColorDisplaySetting()
    {
        $json = array();
        $settings = !empty(SiteManagement::getMetaValue('settings')) ? SiteManagement::getMetaValue('settings') : array();
        if (!empty($settings[0]['enable_theme_color'])) {
            if ($settings[0]['enable_theme_color'] == 'true') {
                $json['enable_theme_color'] = 'true';
            }
        }
        if (!empty($settings[0]['primary_color'])) {
            $json['color'] = $settings[0]['primary_color'];
        }
        return $json;
    }

    /**
     * Get chat display setting
     *
     * @access public
     *
     * @return View
     */
    public function getchatDisplaySetting()
    {
        $json = array();
        $settings = !empty(SiteManagement::getMetaValue('settings')) ? SiteManagement::getMetaValue('settings') : array();
        if (!empty($settings[0]['chat_display'])) {
            if ($settings[0]['chat_display'] == 'true') {
                $json['chat_display'] = 'true';
            }
        }
        return $json;
    }

    /**
     * Remove all cache of the app.
     *
     * @return \Illuminate\Http\Response
     */
    public function importUpdate()
    {
        $json = array();
        \Artisan::call('migrate');
        $json['type'] = 'success';
        return $json;
    }

    /**
     * Store Access Type Settings
     *
     * @param mixed $request get req attributes
     *
     * @access public
     *
     * @return View
     */
    public function storeAccessTypeSettings(Request $request)
    {
        $server = Helper::worketicIsDemoSiteAjax();
        if (!empty($server)) {
            $response['type'] = 'error';
            $response['message'] = $server->getData()->message;
            return $response;
        }
        $json = array();
        if (!empty($request)) {
            $footer_settings = $this->settings->saveAccessType($request);
            if ($footer_settings == "success") {
                $json['type'] = 'success';
                $json['progressing'] = trans('lang.saving');
                $json['message'] = trans('lang.settings_saved');
                return $json;
            } else {
                $json['type'] = 'error';
                $json['message'] = trans('lang.something_wrong');
                return $json;
            }
        } else {
            $json['type'] = 'error';
            $json['message'] = trans('lang.something_wrong');
            return $json;
        }
    }

    /**
     * Get Site Payment Option.
     *
     * @return response
     */
    public function getSitePaymentOption()
    {
        $json = array();
        $commision_settings = !empty(SiteManagement::getMetaValue('commision')) ? SiteManagement::getMetaValue('commision') : array();
        $payment_settings = !empty(SiteManagement::getMetaValue('payment_settings')) ? SiteManagement::getMetaValue('payment_settings') : array();
        if (!empty($commision_settings[0]['enable_packages'])) {
            $json['enable_packages'] = $commision_settings[0]['enable_packages'];
        } else {
            $json['enable_packages'] = 'true';
        }
        if (!empty($commision_settings[0]['employer_package'])) {
            $json['employer_package'] = $commision_settings[0]['employer_package'];
        } else {
            $json['employer_package'] = 'true';
        }
        if (!empty($commision_settings[0]['payment_mode'])) {
            $json['payment_mode'] = $commision_settings[0]['payment_mode'];
        } else {
            $json['payment_mode'] = 'true';
        }
        if (!empty($payment_settings[0]['enable_sandbox'])) {
            $json['enable_sandbox'] = $payment_settings[0]['enable_sandbox'];
        } else {
            $json['enable_sandbox'] = 'false';
        }
        return $json;
    }

    /**
     * Store Breadcrumbs Settings
     *
     * @param mixed $request get req attributes
     *
     * @access public
     *
     * @return View
     */
    public function storeBreadcrumbsSettings(Request $request)
    {
        $server = Helper::worketicIsDemoSiteAjax();
        if (!empty($server)) {
            $response['type'] = 'error';
            $response['message'] = $server->getData()->message;
            return $response;
        }
        $json = array();
        if (!empty($request['enable_breadcrumbs'])) {
            $store_breadcrumbs_settings
                = $this->settings->saveBreadcrumbsSettings($request);
            if ($store_breadcrumbs_settings == "success") {
                $json['type'] = 'success';
                $json['progressing'] = trans('lang.saving');
                $json['message'] = trans('lang.settings_saved');
                return $json;
            } else {
                $json['type'] = 'error';
                $json['message'] = trans('lang.something_wrong');
                return $json;
            }
        }
    }

    /**
     * Store Breadcrumbs Settings
     *
     * @param mixed $request get req attributes
     *
     * @access public
     *
     * @return View
     */
    public function storeBankDetail(Request $request)
    {
        $server = Helper::worketicIsDemoSiteAjax();
        if (!empty($server)) {
            $response['type'] = 'error';
            $response['message'] = $server->getData()->message;
            return $response;
        }
        $json = array();
        if (!empty($request)) {
            $bank_detail
                = $this->settings->saveBankDetail($request);
            if ($bank_detail == "success") {
                $json['type'] = 'success';
                $json['progressing'] = trans('lang.saving');
                $json['message'] = trans('lang.settings_saved');
                return $json;
            } else {
                $json['type'] = 'error';
                $json['message'] = trans('lang.something_wrong');
                return $json;
            }
        }
    }

    /**
     * Get Breadcrumbs settings.
     *
     * @param integer $request $request->attributes
     *
     * @return Response
     */
    public function getBreadcrumbsSettings(Request $request)
    {
        $json = array();
        $breadcrumbs_settings = !empty(SiteManagement::getMetaValue('show_breadcrumb')) ? SiteManagement::getMetaValue('show_breadcrumb') : array();
        if (!empty($breadcrumbs_settings)) {
            $json['breadcrumbs_settings'] = $breadcrumbs_settings;
        } else {
            $json['breadcrumbs_settings'] = 'true';
        }
        return $json;
    }

    /**
     * Get Breadcrumbs settings.
     *
     * @param integer $request $request->attributes
     *
     * @return Response
     */
    public function getprojectSettings(Request $request)
    {
        $json = array();
        $project_settings = !empty(SiteManagement::getMetaValue('project_settings')) ? SiteManagement::getMetaValue('project_settings') : array();
        if (!empty($project_settings)) {
            $json['project_settings'] = $project_settings['enable_completed_projects'];
        } else {
            $json['project_settings'] = 'true';
        }
        return $json;
    }

    /**
     * Store Breadcrumbs Settings
     *
     * @param mixed $request get req attributes
     *
     * @access public
     *
     * @return View
     */
    public function storeProjectSettings(Request $request)
    {
        $server = Helper::worketicIsDemoSiteAjax();
        if (!empty($server)) {
            $response['type'] = 'error';
            $response['message'] = $server->getData()->message;
            return $response;
        }
        $json = array();
        if (!empty($request)) {
            $store_project_settings
                = $this->settings->saveProjectSettings($request);
            if ($store_project_settings == "success") {
                $json['type'] = 'success';
                $json['progressing'] = trans('lang.saving');
                $json['message'] = trans('lang.settings_saved');
                return $json;
            } else {
                $json['type'] = 'error';
                $json['message'] = trans('lang.something_wrong');
                return $json;
            }
        }
    }

    /**
     * Store order Settings
     *
     * @param mixed $request get req attributes
     *
     * @access public
     *
     * @return View
     */
    public function storeOrderSettings(Request $request)
    {
        $server = Helper::worketicIsDemoSiteAjax();
        if (!empty($server)) {
            $response['type'] = 'error';
            $response['message'] = $server->getData()->message;
            return $response;
        }
        $json = array();
        if (!empty($request)) {
            $order_settings
                = $this->settings->saveOrderSettings($request);
            if ($order_settings == "success") {
                $json['type'] = 'success';
                $json['progressing'] = trans('lang.saving');
                $json['message'] = trans('lang.settings_saved');
                return $json;
            } else {
                $json['type'] = 'error';
                $json['message'] = trans('lang.something_wrong');
                return $json;
            }
        }
    }
}
