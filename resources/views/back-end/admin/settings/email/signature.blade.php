@if (file_exists(resource_path('views/extend/back-end/admin/settings/email/sender-avatar.blade.php'))) 
    @include('extend.back-end.admin.settings.email.sender-avatar')
@else 
    @include('back-end.admin.settings.email.sender-avatar')
@endif
<div class="wt-location wt-tabsinfo">
    <div class="wt-tabscontenttitle">
        <h2>{{{ trans('lang.email_sender_name') }}}</h2>
    </div>
    <div class="wt-settingscontent">
        <div class="wt-formtheme wt-userform">
            <div class="form-group">
                {!! Form::text('email_data[0][sender_name]', e($sender_name), array('class' => 'form-control')) !!}
            </div>
        </div>
    </div>
</div>
<div class="wt-location wt-tabsinfo">
    <div class="wt-tabscontenttitle">
        <h2>{{{ trans('lang.email_sender_tagline') }}}</h2>
    </div>
    <div class="wt-settingscontent">
        <div class="wt-formtheme wt-userform">
            <div class="form-group">
                {!! Form::text('email_data[0][sender_tagline]', e($sender_tagline), array('class' => 'form-control')) !!}
            </div>
        </div>
    </div>
</div>
<div class="wt-location wt-tabsinfo">
    <div class="wt-tabscontenttitle">
        <h2>{{{ trans('lang.email_sender_url') }}}</h2>
    </div>
    <div class="wt-settingscontent">
        <div class="wt-formtheme wt-userform">
            <div class="form-group">
                {!! Form::text('email_data[0][sender_url]', e($sender_url), array('class' => 'form-control')) !!}
            </div>
        </div>
    </div>
</div>
