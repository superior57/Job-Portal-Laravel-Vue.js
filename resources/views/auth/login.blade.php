@extends(file_exists(resource_path('views/extend/front-end/master.blade.php')) ? 'extend.front-end.master' : 'front-end.master') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-4 login-form" @if ($errors->has('email') || $errors->has('password')) style="display: block;" @endif>
            <form method="POST" action="{{ route('login') }}" class="wt-formtheme wt-loginform do-login-form">
                @csrf
                <fieldset>
                    <h3>LOG PÅ</h3>
                    <div class="login-form-groups">
                        <div class="form-group">
                            <input id="email" type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                placeholder="E-mail adresse" required autofocus>
                            @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input id="password" type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                placeholder="Kodeord" required>
                            @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="wt-logininfo">
                        <button type="submit" class="wt-btn do-login-button">{{{ trans('lang.login') }}}</button>
                    </div>
                    <div class="wt-loginwith row">
                        <div class="h-line">
                            <hr/>
                        </div>
                        <div class="h-with">
                            <span>ELLER LOGIN MED</span>
                        </div>
                        <div class="h-line">
                            <hr/>
                        </div>
                    </div>
                    <div class="wt-logininfo">
                        <button class="wt-btn with-facebook-button"><i class="fa fa-facebook-square fa-2x"></i>FACEBOOK</button>
                    </div>
                </fieldset>
                <div class="wt-loginfooterinfo">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="wt-forgot-password">{{{ trans('lang.forget_pass') }}}</a>
                    @endif
                    <a href="{{{ route('register') }}}">{{{ trans('lang.create_account') }}}</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
