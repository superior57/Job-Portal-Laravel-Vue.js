@if (Schema::hasTable('users'))
    @php
    $inner_header = '';
    @endphp
    @if (Schema::hasTable('pages') || Schema::hasTable('site_managements'))
        @php
            $settings = array();
            $pages = App\Page::all();
            $setting = \App\SiteManagement::getMetaValue('settings');
            $logo = !empty($setting[0]['logo']) ? Helper::getHeaderLogo($setting[0]['logo']) : '/images/logo.png';
            $inner_header = !empty(Route::getCurrentRoute()) && Route::getCurrentRoute()->uri() != '/' ? 'wt-headervtwo' : '';
            $type = Helper::getAccessType();
            $page_id='';
            if (!empty(Route::getCurrentRoute()) && Route::getCurrentRoute()->uri() != '/' && Route::getCurrentRoute()->uri() != 'home') {
                if (Request::segment(1) == 'page') {
                    $selected_page_data = APP\Page::getPageData(Request::segment(2));
                    $selected_page = !empty($selected_page_data) ? APP\Page::find($selected_page_data->id) : '';
                    $page_id = !empty($selected_page) ? $selected_page->id : '';
                }
            } else {
                $page_id = APP\SiteManagement::getMetaValue('homepage');
            }
            $slider = Helper::getPageSlider($page_id);
        @endphp
    @endif
        
    {{-- <header id="wt-header" class="wt-header  wt-haslayout {{$inner_header}}">
        <div class="wt-navigationarea">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        @auth
                            {{ Helper::displayEmailWarning() }}
                        @endauth
                        @if (!empty($logo) || Schema::hasTable('site_managements'))
                            <strong class="wt-logo"><a href="{{{ url('/') }}}"><img src="{{{ asset($logo) }}}" alt="{{{ trans('Logo') }}}"></a></strong>
                        @endif
                        @if (!empty(Route::getCurrentRoute()) && Route::getCurrentRoute()->uri() != '/' && Route::getCurrentRoute()->uri() != 'home')
                        @endif
                        <div class="wt-rightarea">
                            @if (file_exists(resource_path('views/extend/includes/menu.blade.php'))) 
                                @include('extend.includes.menu')
                            @else 
                                @include('includes.menu')
                            @endif
                            @guest
                                <div class="wt-loginarea">
                                    <div class="wt-loginoption">
                                        <a href="javascript:void(0);" id="wt-loginbtn" class="wt-loginbtn">{{{trans('lang.login') }}}</a>
                                        <div class="wt-loginformhold" @if ($errors->has('email') || $errors->has('password')) style="display: block;" @endif>
                                            <div class="wt-loginheader">
                                                <span>{{{ trans('lang.login') }}}</span>
                                                <a href="javascript:;"><i class="fa fa-times"></i></a>
                                            </div>
                                            <form method="POST" action="{{ route('login') }}" class="wt-formtheme wt-loginform do-login-form">
                                                @csrf
                                                <fieldset>
                                                    <div class="form-group">
                                                        <input id="email" type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                            placeholder="Email" required autofocus>
                                                        @if ($errors->has('email'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <input id="password" type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                            placeholder="Password" required>
                                                        @if ($errors->has('password'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                    <div class="wt-logininfo">
                                                            <button type="submit" class="wt-btn do-login-button">{{{ trans('lang.login') }}}</button>
                                                        <span class="wt-checkbox">
                                                            <input id="remember" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                                            <label for="remember">{{{ trans('lang.remember') }}}</label>
                                                        </span>
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
                                    <a href="{{{ route('register') }}}" class="wt-btn">{{{ trans('lang.join_now') }}}</a>
                                </div>
                            @endguest
                            @auth
                                @php
                                    $user = !empty(Auth::user()) ? Auth::user() : '';
                                    $role = !empty($user) ? $user->getRoleNames()->first() : array();
                                    $profile = \App\User::find(Auth::user()->id)->profile;
                                    $user_image = !empty($profile) ? $profile->avater : '';
                                    $employer_job = \App\Job::select('status')->where('user_id', Auth::user()->id)->first();
                                    $profile_image = !empty($user_image) ? '/uploads/users/'.$user->id.'/'.$user_image : 'images/user-login.png';
                                    $payment_settings = \App\SiteManagement::getMetaValue('commision');
                                    $payment_module = !empty($payment_settings) && !empty($payment_settings[0]['enable_packages']) ? $payment_settings[0]['enable_packages'] : 'true';
                                    $employer_payment_module = !empty($payment_settings) && !empty($payment_settings[0]['employer_package']) ? $payment_settings[0]['employer_package'] : 'true';
                                @endphp
                                    <div class="wt-userlogedin">
                                        <figure class="wt-userimg">
                                            <img src="{{{ asset(Helper::getImage('uploads/users/' . Auth::user()->id, $profile->avater, '' , 'user.jpg')) }}}" alt="{{{ trans('lang.user_avatar') }}}">
                                        </figure>
                                        <div class="wt-username">
                                            <h3>{{{ Helper::getUserName(Auth::user()->id) }}}</h3>
                                            <span>{{{ !empty(Auth::user()->profile->tagline) ? str_limit(Auth::user()->profile->tagline, 26, '') : Helper::getAuthRoleName() }}}</span>
                                        </div>
                                        @if (file_exists(resource_path('views/extend/back-end/includes/profile-menu.blade.php'))) 
                                            @include('extend.back-end.includes.profile-menu')
                                        @else 
                                            @include('back-end.includes.profile-menu')
                                        @endif
                                    </div>
                            @endauth
                            @if ($slider['style'] == 'style1')
                                @if (!empty(Route::getCurrentRoute()) && Route::getCurrentRoute()->uri() != '/' && Route::getCurrentRoute()->uri() != 'home')
                                    <div class="wt-respsonsive-search"><a href="javascript:;" class="wt-searchbtn"><i class="fa fa-search"></i></a></div>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header> --}}
    <nav class="navbar navbar-toggleable-md navbar-light " style="background-color:black;">
        <div class="container">
            <div class="d-flex justify-content-start">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">&nbsp;</span>
                </button>

                  <a href="" class="navbar-brand"><span style="color: #6E5107;">PDX </span> <span style="color: white;">Mechanics</span></a>
              </div>
              <div class="d-flex justify-content-end">
                  <ul class="left-nav">
                      <li class=""><a class="nav-link" href="#" style="color: #ffffff;"><i class="fa fa-wrench fa-rotate-270" aria-hidden="true"></i></a></li>
                      <li class=""><a class="nav-link" href="#" style="color: #ffffff;">5</a></li>
                      <li class=""><a class="nav-link" href="#" style="color: #ffffff;"><i class="fa fa-address-book" aria-hidden="true"></i></a></li>
                      <li class=""><a class="nav-link btn btn-warning" href="#" style="color: #ffffff;background-color: #E6AB3A;">Join</a></li>
                  </ul>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link disabled" href="#">Disabled</a>
                </li>
              </ul>
              <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
              </form>
            </div>
        </div>
      </nav>
@endif

