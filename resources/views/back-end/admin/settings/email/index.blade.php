{!! Form::open(['url' => '', 'class' =>'wt-formtheme wt-userform', 'id' =>'email-setting-form', '@submit.prevent'=>'submitEmailSettings'])!!}
    <div class="wt-location wt-tabsinfo">
        <div class="wt-tabscontenttitle">
            <h2>{{{ trans('lang.from_email_id') }}}</h2>
        </div>
        <div class="wt-settingscontent">
            <div class="wt-formtheme wt-userform">
                <div class="form-group">
                    {!! Form::text('email_data[0][from_email]', e($from_email), array('class' => 'form-control')) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="wt-location wt-tabsinfo">
        <div class="wt-tabscontenttitle">
            <h2>{{{ trans('lang.from_email_name') }}}</h2>
        </div>
        <div class="wt-settingscontent">
            <div class="wt-formtheme wt-userform">
                <div class="form-group">
                    {!! Form::text('email_data[0][from_email_id]', e($from_email_id), array('class' => 'form-control')) !!}
                </div>
            </div>
        </div>
    </div>
    @if (file_exists(resource_path('views/extend/back-end/admin/settings/email/logo.blade.php')))
        @include('extend.back-end.admin.settings.email.logo')
    @else
        @include('back-end.admin.settings.email.logo')
    @endif
    @if (file_exists(resource_path('views/extend/back-end/admin/settings/email/banner.blade.php')))
        @include('extend.back-end.admin.settings.email.banner')
    @else
        @include('back-end.admin.settings.email.banner')
    @endif
    @if (file_exists(resource_path('views/extend/back-end/admin/settings/email/signature.blade.php')))
        @include('extend.back-end.admin.settings.email.signature')
    @else
        @include('back-end.admin.settings.email.signature')
    @endif
    <div class="wt-updatall la-updateall-holder">
        <i class="ti-announcement"></i>
        <span>{{{ trans('lang.save_changes_note') }}}</span>
        {!! Form::submit(trans('lang.btn_save'),['class' => 'wt-btn']) !!}
    </div>
{!! Form::close() !!}
