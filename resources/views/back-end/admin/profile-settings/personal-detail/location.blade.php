<div class="wt-tabscontenttitle">
    <h2>Your Location</h2>
</div>
<div class="wt-formtheme">
    <fieldset>
        <div class="form-group form-group-half">
            <span class="wt-select">
                {!! Form::select('location', $locations, Auth::user()->location_id ,array('class' => '', 'placeholder' => trans('lang.ph_select_location'))) !!}
            </span>
        </div>
        <div class="form-group form-group-half">
            {!! Form::text( 'address', e($address), ['class' =>'form-control', 'placeholder' => trans('lang.ph_your_address')] ) !!}
        </div>
        <div class="form-group wt-formmap">
            <div id="wt-locationmap" class="wt-locationmap"></div>
        </div>
        <div class="form-group form-group-half">
            {!! Form::text( 'longitude', e($longitude), ['class' =>'form-control', 'placeholder' => trans('lang.ph_enter_logitude')]) !!}
        </div>
        <div class="form-group form-group-half">
            {!! Form::text( 'latitude', e($latitude), ['class' =>'form-control', 'placeholder' => trans('lang.ph_enter_latitude')]) !!}
        </div>
    </fieldset>
</div>