<div class="wt-tabscontenttitle">
    <h2>{{ trans('lang.your_loc') }}</h2>
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
        @if (!empty($longitude) && !empty($latitude))
            <div class="form-group wt-formmap">
                <div class="wt-locationmap">
                    <custom-map :latitude="{{$latitude}}" :longitude="{{$longitude}}"></custom-map>
                </div>
            </div>
        @endif
        <div class="form-group form-group-half">
            {!! Form::text( 'longitude', e($longitude), ['class' =>'form-control', 'placeholder' => trans('lang.ph_enter_logitude')]) !!}
        </div>
        <div class="form-group form-group-half">
            {!! Form::text( 'latitude', e($latitude), ['class' =>'form-control', 'placeholder' => trans('lang.ph_enter_latitude')]) !!}
        </div>
    </fieldset>
</div>