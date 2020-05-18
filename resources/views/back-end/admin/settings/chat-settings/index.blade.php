{!! Form::open(['url' => '', 'class' =>'wt-formtheme wt-userform', 'id' =>'submit-chat-form', '@submit.prevent'=>'submitChatSettings'])!!}
    <div class="wt-location wt-tabsinfo">
        <div class="wt-tabscontenttitle">
            <h2>{{ trans('lang.host') }}</h2>
        </div>
        <div class="wt-settingscontent">
            <div class="wt-description">
                <ol>
                    <li>{{ trans('lang.host_note_1') }}</li>
                    <li>{{ trans('lang.host_note_2') }}</li>
                </ol>
            </div>
            <div class="wt-formtheme wt-userform">
                <div class="form-group">
                    {!! Form::text('host', e($host), array('class' => 'form-control', 'placeholder'=>trans('lang.host'))) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="wt-location wt-tabsinfo">
        <div class="wt-tabscontenttitle">
            <h2>{{ trans('lang.port') }}</h2>
        </div>
        <div class="wt-settingscontent">
            <div class="wt-description">
                {{ trans('lang.port_note_1') }}
                <ol>
                    <li>{{ trans('lang.port_note_2') }}</li>
                    <li>{{ trans('lang.port_note_3') }}</li>
                    <li>
                        {{ trans('lang.port_note_4') }}
                        {{ trans('lang.port_note_5') }}
                        {{ trans('lang.port_note_6') }}
                    </li>
                </ol>
            </div>
            <div class="wt-formtheme wt-userform">
                <div class="form-group">
                    {!! Form::number('port', e($port), array('class' => 'form-control', 'placeholder'=>trans('lang.port'))) !!}
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
