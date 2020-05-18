@if (file_exists(resource_path('views/extend/back-end/admin/home-page-settings/banner-settings/background-image.blade.php'))) 
    @include('extend.back-end.admin.home-page-settings.banner-settings.background-image')
@else 
    @include('back-end.admin.home-page-settings.banner-settings.background-image')
@endif
@if (file_exists(resource_path('views/extend/back-end/admin/home-page-settings/banner-settings/banner-image.blade.php'))) 
    @include('extend.back-end.admin.home-page-settings.banner-settings.banner-image')
@else 
    @include('back-end.admin.home-page-settings.banner-settings.banner-image')
@endif
<div class="wt-location wt-tabsinfo">
    <h5>{{{ trans('lang.banner_title') }}}</h5>
    <div class="wt-settingscontent">
        <div class="wt-formtheme wt-userform">
            <div class="form-group">
                {!! Form::text('home[0][banner_title]', e($banner_title), array('class' => 'form-control')) !!}
            </div>
        </div>
        
    </div>
</div>
<div class="wt-location wt-tabsinfo">
    <h5>{{{ trans('lang.banner_subtitle') }}}</h5>
    <div class="wt-settingscontent">
        <div class="wt-formtheme wt-userform">
            <div class="form-group">
                {!! Form::text('home[0][banner_subtitle]', e($banner_subtitle), array('class' => 'form-control')) !!}
            </div>
        </div>
    </div>
</div>
<div class="wt-location wt-tabsinfo">
    <h5>{{{ trans('lang.banner_desc') }}}</h5>
    <div class="wt-settingscontent">
        <div class="wt-formtheme wt-userform">
            <div class="form-group">
                {!! Form::textarea('home[0][banner_description]', e($banner_description), array('class' => 'form-control')) !!}
            </div>
        </div>
    </div>
</div>
<div class="wt-location wt-tabsinfo">
    <h5>{{{ trans('lang.banner_video_link') }}}</h5>
    <span>{{ trans('lang.video_note') }}</span>
    <div class="wt-settingscontent">
        <div class="wt-formtheme wt-userform">
            <div class="form-group">
                {!! Form::text('home[0][video_link]', e($banner_video_link), array('class' => 'form-control')) !!}
            </div>
        </div>
    </div>
</div>
<div class="wt-location wt-tabsinfo">
    <h5>{{{ trans('lang.video_title') }}}</h5>
    <div class="wt-settingscontent">
        <div class="wt-formtheme wt-userform">
            <div class="form-group">
                {!! Form::text('home[0][video_title]', e($banner_video_title), array('class' => 'form-control')) !!}
            </div>
        </div>
    </div>
</div>
<div class="wt-location wt-tabsinfo">
    <h5>{{{ trans('lang.video_desc') }}}</h5>
    <div class="wt-settingscontent">
        <div class="wt-formtheme wt-userform">
            <div class="form-group">
                {!! Form::text('home[0][video_desc]', e($banner_video_desc), array('class' => 'form-control')) !!}
            </div>
        </div>
    </div>
</div>
