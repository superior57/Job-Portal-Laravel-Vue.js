@extends(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master')
@section('content')
    <div class="wt-haslayout wt-manage-account wt-dbsectionspace la-setting-holder" id="settings">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
                <div class="wt-dashboardbox wt-dashboardtabsholder wt-accountsettingholder">
                    <div class="wt-dashboardtabs">
                        <ul class="wt-tabstitle nav navbar-nav">
                            <li class="nav-item">
                                <a class="active" data-toggle="tab" href="#wt-banner">{{ trans('lang.banner_settings') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="" data-toggle="tab" href="#wt-sections">{{ trans('lang.sections') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="" data-toggle="tab" href="#wt-services-sections">{{ trans('lang.services_section') }}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="wt-tabscontent tab-content">
                        <div class="wt-securityhold tab-pane active la-banner-settings" id="wt-banner">
                            {!! Form::open(['url' => '', 'class' =>'wt-formtheme wt-userform', 'id' =>'home-settings-form', '@submit.prevent'=>'submitHomeSettings'])!!}
                                @if (file_exists(resource_path('views/extend/back-end/admin/home-page-settings/banner-settings/index.blade.php')))
                                    @include('extend.back-end.admin.home-page-settings.banner-settings.index')
                                @else
                                    @include('back-end.admin.home-page-settings.banner-settings.index')
                                @endif
                                <div class="wt-updatall la-updateall-holder">
                                    <i class="ti-announcement"></i>
                                    <span>{{{ trans('lang.save_changes_note') }}}</span>
                                    {!! Form::submit(trans('lang.btn_save'),['class' => 'wt-btn']) !!}
                                </div>
                                {{-- <div class="wt-updatall la-btn-setting">
                                    {!! Form::submit(trans('lang.btn_save'), ['class' => 'wt-btn']) !!}
                                </div> --}}
                            {!! Form::close() !!}
                        </div>
                        <div class="wt-securityhold tab-pane la-section-settings" id="wt-sections">
                            {!! Form::open(['url' => '', 'class' =>'wt-formtheme wt-userform', 'id' =>'section-settings-form', '@submit.prevent'=>'submitSectionSettings'])!!}
                                @if (file_exists(resource_path('views/extend/back-end/admin/home-page-settings/sections/index.blade.php')))
                                    @include('extend.back-end.admin.home-page-settings.sections.index')
                                @else
                                    @include('back-end.admin.home-page-settings.sections.index')
                                @endif
                                <div class="wt-updatall la-updateall-holder">
                                    <i class="ti-announcement"></i>
                                    <span>{{{ trans('lang.save_changes_note') }}}</span>
                                    {!! Form::submit(trans('lang.btn_save'),['class' => 'wt-btn']) !!}
                                </div>
                            {!! Form::close() !!}
                        </div>
                        <div class="wt-securityhold tab-pane la-section-settings" id="wt-services-sections">
                            @if (file_exists(resource_path('views/extend/back-end/admin/home-page-settings/services-section.blade.php')))
                                @include('extend.back-end.admin.home-page-settings.services-section')
                            @else
                                @include('back-end.admin.home-page-settings.services-section')
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
