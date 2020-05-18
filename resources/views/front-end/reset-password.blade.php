@extends(file_exists(resource_path('views/extend/front-end/master.blade.php')) ? 'extend.front-end.master' : 'front-end.master')
@section('content')
    <div class="container">
        <div class="wt-main-section wt-haslayout wt-forgotpassword-holder">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-12 col-md-12 col-lg-8">
                    <div class="card">
                        <div class="card-header">{{ trans('lang.reset_pass') }}</div>
                        <div class="card-body">
                            {!! Form::open(['url' => url('user/update/password'), 'class' =>'wt-formtheme wt-userform'])!!}
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ trans('lang.pass') }}</label>
                                    <div class="col-md-6">
                                        {!! Form::password('new_password', ['class' => 'form-control'.($errors->has('new_password') ? ' is-invalid' : ''),
                                            'placeholder' => trans('lang.ph_newpass')]) !!}
                                        @if ($errors->has('new_password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('new_password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ trans('lang.confirm_pass') }}</label>
                                    <div class="col-md-6">
                                        {!! Form::password('confirm_password', ['class' => 'form-control'.($errors->has('confirm_password') ? ' is-invalid' : ''),
                                            'placeholder' => trans('lang.ph_confirm_pass')]) !!}
                                        @if ($errors->has('confirm_password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('confirm_password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary wt-btn">
                                            {{ trans('lang.reset_pass') }}
                                        </button>
                                    </div>
                                </div>
                            {!! Form::hidden('verify_code', Request::segment(4)) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection