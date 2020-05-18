{!! Form::open(['url' => '', 'class' =>'wt-formtheme wt-userform', 'id' =>'payment-form', '@submit.prevent'=>'submitPaypalSettings'])!!}
    <div class="wt-location wt-tabsinfo">
        <div class="wt-tabscontenttitle la-switch-option">
            <h2>{{{ trans('lang.paypal_settings') }}}</h2>
            <switch_button v-model="enable_sandbox">{{{ trans('lang.enable_sandbox') }}}</switch_button>
            <input type="hidden" :value="enable_sandbox" name="enable_sandbox">
        </div>
        <div class="wt-settingscontent">
            <div class="wt-formtheme wt-userform">
                <div class="form-group">
                    {!! Form::text('client_id', e($client_id), ['class' => 'form-control', 'placeholder' => trans('lang.ph_paypal_id')]) !!}
                </div>
            </div>
        </div>
        <div class="wt-settingscontent">
            <div class="wt-formtheme wt-userform">
                <div class="form-group">
                    {{{Form::input('password', 'paypal_password', e($payment_password), ['class' => 'form-control', 'placeholder' => trans('lang.ph_paypal_pass')])}}}
                </div>
            </div>
        </div>
        <div class="wt-settingscontent">
            <div class="wt-formtheme wt-userform">
                <div class="form-group">
                    {{{Form::input('password', 'paypal_secret', e($existing_payment_secret), ['class' => 'form-control', 'placeholder' => trans('lang.ph_paypal_secret')])}}}
                </div>
            </div>
        </div>
    </div>
    <div class="wt-updatall la-updateall-holder">
        <i class="ti-announcement"></i>
        <span>{{{ trans('lang.save_changes_note') }}}</span>
        {!! Form::submit(trans('lang.btn_save'),['class' => 'wt-btn']) !!}
    </div>
{!! Form::close() !!}
