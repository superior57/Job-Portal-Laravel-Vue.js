@extends(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master')
@section('content')
    @php $user_id = !empty(Auth::user()) ? Auth::user()->id : '';  @endphp
    <div class="wt-haslayout wt-dbsectionspace">
        <div class="wt-haslayout wt-reset-pass" id="pass-reset">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
                    @if (Session::has('error'))
                        <div class="flash_msg float-right">
                            <flash_messages :message_class="'danger'" :time='5' :message="'{{{ Session::get('error') }}}'" v-cloak></flash_messages>
                        </div>
                    @endif
                    <div class="wt-dashboardbox wt-dashboardtabsholder wt-accountsettingholder">
                        @if (file_exists(resource_path('views/extend/back-end/settings/tabs.blade.php')))
                            @include('extend.back-end.settings.tabs')
                        @else
                            @include('back-end.settings.tabs')
                        @endif
                        <div class="wt-tabscontent tab-content">
                            <div class="wt-passwordholder" id="wt-password">
                                <div class="wt-changepassword">
                                    <div class="wt-tabscontenttitle">
                                        <h2>{{{ trans('lang.change_pass') }}}</h2>
                                    </div>
                                    {!! Form::open(['url' => url('profile/settings/request-password'), 'class' =>'wt-formtheme wt-userform'])!!}
                                        <fieldset>
                                            <div class="form-group form-group-half">
                                                {!! Form::password('old_password', ['class' => 'form-control'.($errors->has('old_password') ? ' is-invalid' : ''),
                                                    'placeholder' => trans('lang.ph_oldpass')]) !!}
                                                @if ($errors->has('old_password'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('old_password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group form-group-half">
                                                {!! Form::password('confirm_password', ['class' => 'form-control','placeholder' => trans('lang.ph_newpass')]) !!}
                                            </div>
                                            <div class="form-group">
                                                {!! Form::password('confirm_new_password', ['class' => 'form-control','placeholder' => trans('lang.ph_confirm_new_pass')]) !!}
                                            </div>
                                            {!! Form::hidden('user_id', $user_id) !!}
                                            <div class="form-group form-group-half wt-btnarea">
                                                {!! Form::submit(trans('lang.btn_save'), ['class' => 'wt-btn']) !!}
                                            </div>
                                        </fieldset>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
