@extends(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master')
@section('content')
    <div class="wt-haslayout wt-manage-account wt-dbsectionspace la-admin-setting" id="settings">
        @if (Session::has('message'))
            <div class="flash_msg">
                <flash_messages :message_class="'success'" :time ='5' :message="'{{{ Session::get('message') }}}'" v-cloak></flash_messages>
            </div>
        @elseif (Session::has('error'))
            <div class="flash_msg">
                <flash_messages :message_class="'danger'" :time ='5' :message="'{{{ Session::get('error') }}}'" v-cloak></flash_messages>
            </div>
        @endif
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9 float-left">
                <div class="wt-dashboardbox wt-dashboardtabsholder wt-accountsettingholder">
                    <div class="wt-dashboardtabs">
                        <ul class="wt-tabstitle nav navbar-nav">
                            <li class="nav-item">
                                <a class="{{{ \Request::route()->getName()==='settings/#wt-general'? 'active': '' }}}" data-toggle="tab" href="#wt-general">{{ trans('lang.general_settings') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="{{{ \Request::route()->getName()==='settings/#wt-homepage'? 'active': '' }}}" data-toggle="tab" href="#wt-homepage">{{ trans('lang.homepage_settings') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="{{{ \Request::route()->getName()==='settings/#wt-email'? 'active': '' }}}" data-toggle="tab" href="#wt-email">{{ trans('lang.email_settings') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="{{{ \Request::route()->getName()==='settings/#wt-payment'? 'active': '' }}}" data-toggle="tab" href="#wt-payment">{{ trans('lang.payment_settings') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="{{{ \Request::route()->getName()==='settings/#wt-footer'? 'active': '' }}}" data-toggle="tab" href="#wt-footer">{{ trans('lang.footer_settings') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="{{{ \Request::route()->getName()==='settings/#wt-register'? 'active': '' }}}" data-toggle="tab" href="#wt-register">{{ trans('lang.register_form_settings') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="{{{ \Request::route()->getName()==='settings/#wt-icons'? 'active': '' }}}" data-toggle="tab" href="#wt-icons">{{ trans('lang.dashboard_icons') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="{{{ \Request::route()->getName()==='settings/#wt-demo'? 'active': '' }}}" data-toggle="tab" href="#wt-demo">{{ trans('lang.demo_content') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="{{{ \Request::route()->getName()==='settings/#wt-clear-cache'? 'active': '' }}}" data-toggle="tab" href="#wt-clear-cache">{{ trans('lang.menu_clear_cache') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="{{{ \Request::route()->getName()==='settings/#wt-inner-pages'? 'active': '' }}}" data-toggle="tab" href="#wt-inner-pages">{{ trans('lang.inner_page_settings') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="{{{ \Request::route()->getName()==='settings/#wt-import-updates'? 'active': '' }}}" data-toggle="tab" href="#wt-import-updates">{{ trans('lang.import_updates') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="{{{ \Request::route()->getName()==='settings/#wt-access-type'? 'active': '' }}}" data-toggle="tab" href="#wt-access-types">{{ trans('lang.site_access_type') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="{{{ \Request::route()->getName()==='settings/#wt-chat-settings'? 'active': '' }}}" data-toggle="tab" href="#wt-chat-settings">{{ trans('lang.chat_settings') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="{{{ \Request::route()->getName()==='settings/#wt-project-settings'? 'active': '' }}}" data-toggle="tab" href="#wt-project-settings">{{ trans('lang.project_settings') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="{{{ \Request::route()->getName()==='settings/#wt-bank-account-settings'? 'active': '' }}}" data-toggle="tab" href="#wt-bank-account-settings">{{ trans('lang.bank_detail') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="{{{ \Request::route()->getName()==='settings/#wt-offline-order-settings'? 'active': '' }}}" data-toggle="tab" href="#wt-offline-order-settings">{{ trans('lang.offline_order_settings') }}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="wt-tabscontent tab-content">
                        <div class="wt-securityhold tab-pane active la-general-setting" id="wt-general">
                            @if (file_exists(resource_path('views/extend/back-end/admin/settings/general/index.blade.php')))
                                @include('extend.back-end.admin.settings.general.index')
                            @else
                                @include('back-end.admin.settings.general.index')
                            @endif
                        </div>
                        <div class="wt-securityhold tab-pane la-general-setting" id="wt-homepage">
                            @if (file_exists(resource_path('views/extend/back-end/admin/settings/homepage/index.blade.php')))
                                @include('extend.back-end.admin.settings.homepage.index')
                            @else
                                @include('back-end.admin.settings.homepage.index')
                            @endif
                        </div>
                        <div class="wt-securityhold tab-pane la-email-setting" id="wt-email">
                            @if (file_exists(resource_path('views/extend/back-end/admin/settings/email/index.blade.php')))
                                @include('extend.back-end.admin.settings.email.index')
                            @else
                                @include('back-end.admin.settings.email.index')
                            @endif
                        </div>
                        <div class="wt-securityhold tab-pane la-payment-setting" id="wt-payment">
                            @if (file_exists(resource_path('views/extend/back-end/admin/settings/payment/commision-settings.blade.php')))
                                @include('extend.back-end.admin.settings.payment.commision-settings')
                            @else
                                @include('back-end.admin.settings.payment.commision-settings')
                            @endif
                            @if (file_exists(resource_path('views/extend/back-end/admin/settings/payment/paypal-settings.blade.php')))
                                @include('extend.back-end.admin.settings.payment.paypal-settings')
                            @else
                                @include('back-end.admin.settings.payment.paypal-settings')
                            @endif
                            @if (file_exists(resource_path('views/extend/back-end/admin/settings/payment/stripe-settings.blade.php')))
                                @include('extend.back-end.admin.settings.payment.stripe-settings')
                            @else
                                @include('back-end.admin.settings.payment.stripe-settings')
                            @endif
                        </div>
                        <div class="wt-securityhold tab-pane la-footer-setting" id="wt-footer">
                            @if (file_exists(resource_path('views/extend/back-end/admin/settings/footer/index.blade.php')))
                                @include('extend.back-end.admin.settings.footer.index')
                            @else
                                @include('back-end.admin.settings.footer.index')
                            @endif
                        </div>
                        <div class="wt-securityhold tab-pane la-footer-setting" id="wt-register">
                            @if (file_exists(resource_path('views/extend/back-end/admin/settings/register/index.blade.php')))
                                @include('extend.back-end.admin.settings.register.index')
                            @else
                                @include('back-end.admin.settings.register.index')
                            @endif
                        </div>
                        <div class="wt-securityhold tab-pane la-footer-setting" id="wt-icons">
                            @if (file_exists(resource_path('views/extend/back-end/admin/settings/icon/index.blade.php')))
                                @include('extend.back-end.admin.settings.icon.index')
                            @else
                                @include('back-end.admin.settings.icon.index')
                            @endif
                        </div>
                        <div class="wt-securityhold tab-pane la-footer-setting" id="wt-demo">
                            @if (file_exists(resource_path('views/extend/back-end/admin/settings/demo-content/index.blade.php')))
                                @include('extend.back-end.admin.settings.demo-content.index')
                            @else
                                @include('back-end.admin.settings.demo-content.index')
                            @endif
                        </div>
                        <div class="wt-securityhold tab-pane la-footer-setting" id="wt-clear-cache">
                            @if (file_exists(resource_path('views/extend/back-end/admin/settings/clear-cache/index.blade.php')))
                                @include('extend.back-end.admin.settings.clear-cache.index')
                            @else
                                @include('back-end.admin.settings.clear-cache.index')
                            @endif
                        </div>
                        <div class="wt-securityhold tab-pane la-footer-setting" id="wt-inner-pages">
                            @if (file_exists(resource_path('views/extend/back-end/admin/settings/inner-pages/index.blade.php')))
                                @include('extend.back-end.admin.settings.inner-pages.index')
                            @else
                                @include('back-end.admin.settings.inner-pages.index')
                            @endif
                        </div>
                        <div class="wt-securityhold tab-pane la-footer-setting" id="wt-import-updates">
                            @if (file_exists(resource_path('views/extend/back-end/admin/settings/updates/index.blade.php')))
                                @include('extend.back-end.admin.settings.updates.index')
                            @else
                                @include('back-end.admin.settings.updates.index')
                            @endif
                        </div>
                        <div class="wt-securityhold tab-pane la-footer-setting" id="wt-access-types">
                            @if (file_exists(resource_path('views/extend/back-end/admin/settings/site-access-type/index.blade.php')))
                                @include('extend.back-end.admin.settings.site-access-type.index')
                            @else
                                @include('back-end.admin.settings.site-access-type.index')
                            @endif
                        </div>
                        <div class="wt-securityhold tab-pane la-footer-setting" id="wt-chat-settings">
                            @if (file_exists(resource_path('views/extend/back-end/admin/settings/chat-settings/index.blade.php')))
                                @include('extend.back-end.admin.settings.chat-settings.index')
                            @else
                                @include('back-end.admin.settings.chat-settings.index')
                            @endif
                        </div>
                        <div class="wt-securityhold tab-pane la-footer-setting" id="wt-project-settings">
                            @if (file_exists(resource_path('views/extend/back-end/admin/settings/project-settings/index.blade.php')))
                                @include('extend.back-end.admin.settings.project-settings.index')
                            @else
                                @include('back-end.admin.settings.project-settings.index')
                            @endif
                        </div>
                        <div class="wt-securityhold tab-pane la-footer-setting" id="wt-bank-account-settings">
                            @if (file_exists(resource_path('views/extend/back-end/admin/settings/bank-account/index.blade.php')))
                                @include('extend.back-end.admin.settings.bank-account.index')
                            @else
                                @include('back-end.admin.settings.bank-account.index')
                            @endif
                        </div>
                        <div class="wt-securityhold tab-pane la-footer-setting" id="wt-offline-order-settings">
                            @if (file_exists(resource_path('views/extend/back-end/admin/settings/offline-order/index.blade.php')))
                                @include('extend.back-end.admin.settings.offline-order.index')
                            @else
                                @include('back-end.admin.settings.offline-order.index')
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
