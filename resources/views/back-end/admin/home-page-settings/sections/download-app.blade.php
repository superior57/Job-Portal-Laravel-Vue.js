@if (file_exists(resource_path('views/extend/back-end/admin/home-page-settings/sections/download-app-image.php'))) 
    @include('extend.back-end.admin.home-page-settings.sections.download-app-image')
@else 
    @include('back-end.admin.home-page-settings.sections.download-app-image')
@endif
<div class="wt-location wt-tabsinfo">
    <h6>{{{ trans('lang.app_sec_title') }}}</h6>
    <div class="wt-settingscontent">
        <div class="wt-formtheme wt-userform">
            <div class="form-group">
                {!! Form::text('section[0][app_title]', e($app_title), array('class' => 'form-control')) !!}
            </div>
        </div>
    </div>
</div>
<div class="wt-location wt-tabsinfo">
    <h6>{{{ trans('lang.app_sec_subtitle') }}}</h6>
    <div class="wt-settingscontent">
        <div class="wt-formtheme wt-userform">
            <div class="form-group">
                {!! Form::text('section[0][app_subtitle]', e($app_subtitle), array('class' => 'form-control')) !!}
            </div>
        </div>
    </div>
</div>
<div class="wt-location wt-tabsinfo">
    <h6>{{{ trans('lang.description') }}}</h6>
    <div class="wt-settingscontent">
        <div class="wt-formtheme wt-userform">
            <div class="form-group">
                {!! Form::textarea('app_desc', e($app_desc), array('class' => 'form-control wt-tinymceeditor', 'id' => 'app_desc_wt_tinymceeditor')) !!}
            </div>
        </div>
    </div>
</div>
<div class="wt-location wt-tabsinfo">
    <h6>{{{ trans('lang.android_app_link') }}}</h6>
    <div class="wt-settingscontent">
        <div class="wt-formtheme wt-userform">
            <div class="form-group">
                {!! Form::text('app_android_link', e($app_android_link), array('class' => 'form-control')) !!}
            </div>
        </div>
    </div>
</div>
<div class="wt-location wt-tabsinfo">
    <h6>{{{ trans('lang.ios_app_link') }}}</h6>
    <div class="wt-settingscontent">
        <div class="wt-formtheme wt-userform">
            <div class="form-group">
                {!! Form::text('app_ios_link', e($app_ios_link), array('class' => 'form-control')) !!}
            </div>
        </div>
    </div>
</div>
