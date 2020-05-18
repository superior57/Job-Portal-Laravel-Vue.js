<div class="wt-yourdetails wt-tabsinfo">
    <div class="wt-tabscontenttitle">
        <h2>{{{ trans('lang.your_details') }}}</h2>
    </div>
    <fieldset>
        <div class="form-group form-group-half">
            {!! Form::text( 'first_name', e(Auth::user()->first_name), ['class' =>'form-control', 'placeholder' => trans('lang.ph_first_name')] ) !!}
        </div>
        <div class="form-group form-group-half">
            {!! Form::text( 'last_name', e(Auth::user()->last_name), ['class' =>'form-control', 'placeholder' => trans('lang.ph_last_name')] ) !!}
        </div>
        <div class="form-group">
            {!! Form::text( 'tagline', e($tagline), ['class' =>'form-control', 'placeholder' => trans('lang.ph_add_tagline')] ) !!}
        </div>
        <div class="form-group">
            {!! Form::textarea( 'description', e($description), ['class' =>'form-control', 'placeholder' => trans('lang.ph_desc')] ) !!}
        </div>
    </fieldset>
</div>
