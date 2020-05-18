<div class="la-inner-pages wt-haslayout">
{!! Form::open(['url' => '', 'class' =>'wt-formtheme wt-userform la-bank-detail', 'id' =>'back-detail-form', '@submit.prevent'=>'submitBankDetail'])!!}
    <div class="wt-location wt-tabsinfo">
        <div class="wt-tabscontenttitle la-switch-option">
            <h2>{{{ trans('lang.account_detail') }}}</h2>
        </div>
        <div class="wt-settingscontent">
            <div class="form-group form-group-half toolip-wrapo">
                {!! Form::text('account_name', e($account_name), ['class' => 'form-control', 'placeholder' => trans('lang.bank_account_name')]) !!}
            </div>
            <div class="form-group form-group-half toolip-wrapo">
                {{{Form::text('account_number', e($account_number), ['class' => 'form-control', 'placeholder' => trans('lang.bank_account_number')])}}}
            </div>
            <div class="form-group form-group-half toolip-wrapo">
                {{{Form::text('bank_name', e($bank_name), ['class' => 'form-control', 'placeholder' => trans('lang.bank_name')])}}}
            </div>
            <div class="form-group form-group-half toolip-wrapo">
                {{{Form::text('bank_routing_number', e($bank_routing_number), ['class' => 'form-control', 'placeholder' => trans('lang.bank_routing_number')])}}}
            </div>
            <div class="form-group form-group-half toolip-wrapo">
                {{{Form::text('bank_bic_swift', e($bank_bic_swift), ['class' => 'form-control', 'placeholder' => trans('lang.bank_bic_swift')])}}}
            </div>
            <div class="form-group form-group-half toolip-wrapo">
                {{{Form::text('bank_iban', e($bank_iban), ['class' => 'form-control', 'placeholder' => trans('lang.bank_iban')])}}}
            </div>
        </div>
    </div>
    <div class="wt-location wt-tabsinfo">
        <div class="wt-tabscontenttitle la-switch-option">
            <h2>{{{ trans('lang.description') }}}</h2>
        </div>
        <div class="wt-settingscontent">
            <div class="wt-formtheme wt-userform">
                <div class="form-group">
                    {!! Form::textarea('description', e($bank_description), array('class' => 'form-control')) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="wt-location wt-tabsinfo">
        <div class="wt-tabscontenttitle la-switch-option">
            <h2>{{{ trans('lang.instruction') }}}</h2>
        </div>
        <div class="wt-settingscontent">
            <div class="wt-formtheme wt-userform">
                <div class="form-group">
                    {!! Form::textarea('instruction', e($bank_instruction), array('class' => 'form-control')) !!}
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
</div>
