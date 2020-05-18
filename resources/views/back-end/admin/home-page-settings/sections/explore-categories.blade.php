<div class="wt-location wt-tabsinfo">
    <h6>{{{ trans('lang.cat_sec_title') }}}</h6>
    <div class="wt-settingscontent">
        <div class="wt-formtheme wt-userform">
            <div class="form-group">
                {!! Form::text('section[0][cat_sec_title]', e($cat_sec_title), array('class' => 'form-control')) !!}
            </div>
        </div>
    </div>
</div>
<div class="wt-location wt-tabsinfo">
    <h6>{{{ trans('lang.cat_sec_subtitle') }}}</h6>
    <div class="wt-settingscontent">
        <div class="wt-formtheme wt-userform">
            <div class="form-group">
                {!! Form::text('section[0][cat_sec_subtitle]', e($cat_sec_subtitle), array('class' => 'form-control')) !!}
            </div>
        </div>
    </div>
</div>
