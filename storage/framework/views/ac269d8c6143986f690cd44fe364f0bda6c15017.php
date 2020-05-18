<?php if(Schema::hasTable('users')): ?>
    <?php
    $inner_header = '';
    ?>
    <?php if(Schema::hasTable('pages') || Schema::hasTable('site_managements')): ?>
        <?php
            $settings = array();
            $pages = App\Page::all();
            $setting = \App\SiteManagement::getMetaValue('settings');
            $logo = !empty($setting[0]['logo']) ? Helper::getHeaderLogo($setting[0]['logo']) : '/images/logo.png';
            $inner_header = !empty(Route::getCurrentRoute()) && Route::getCurrentRoute()->uri() != '/' ? 'wt-headervtwo' : '';
            $type = Helper::getAccessType();
            $page_id=6;
            // if (!empty(Route::getCurrentRoute()) && Route::getCurrentRoute()->uri() != '/' && Route::getCurrentRoute()->uri() != 'home') {
            //     if (Request::segment(1) == 'page') {
            //         $selected_page_data = APP\Page::getPageData(Request::segment(2));
            //         $selected_page = !empty($selected_page_data) ? APP\Page::find($selected_page_data->id) : '';
            //         $page_id = !empty($selected_page) ? $selected_page->id : '';
            //     }
            // } else {
            //     $page_id = APP\SiteManagement::getMetaValue('homepage');
            // }
            $slider = Helper::getPageSlider($page_id);
        ?>
    <?php endif; ?>
    <?php if(!empty($slider) && $slider['index'] == 0): ?> 
        <?php if(!empty($slider['style']) && $slider['style'] == 'style3'): ?>
            <header id="wt-header" class="wt-header wt-headervfour wt-haslayout">
                <div class="wt-navigationarea">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <?php if(!empty($logo) || Schema::hasTable('site_managements')): ?>
                                    <strong class="wt-logo"><a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset($logo)); ?>" alt="<?php echo e(trans('Logo')); ?>"></a></strong>
                                <?php endif; ?>
                                <div class="wt-rightarea">
                                    <?php if(auth()->guard()->guest()): ?>
                                        <div class="wt-loginarea">
                                            <div class="wt-loginoption">
                                                <a href="javascript:void(0);" id="wt-loginbtn" class="wt-loginbtn"><?php echo e(trans('lang.login')); ?></a>
                                                <div class="wt-loginformhold" <?php if($errors->has('email') || $errors->has('password')): ?> style="display: block;" <?php endif; ?>>
                                                    <div class="wt-loginheader">
                                                        <span><?php echo e(trans('lang.login')); ?></span>
                                                        <a href="javascript:;"><i class="fa fa-times"></i></a>
                                                    </div>
                                                    <form method="POST" action="<?php echo e(route('login')); ?>" class="wt-formtheme wt-loginform do-login-form">
                                                        <?php echo csrf_field(); ?>
                                                        <fieldset>
                                                            <div class="form-group">
                                                                <input id="email" type="email" name="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>"
                                                                    placeholder="Email" required autofocus>
                                                                <?php if($errors->has('email')): ?>
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong><?php echo e($errors->first('email')); ?></strong>
                                                                </span>
                                                                <?php endif; ?>
                                                            </div>
                                                            <div class="form-group">
                                                                <input id="password" type="password" name="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>"
                                                                    placeholder="Password" required>
                                                                <?php if($errors->has('password')): ?>
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong><?php echo e($errors->first('password')); ?></strong>
                                                                </span>
                                                                <?php endif; ?>
                                                            </div>
                                                            <div class="wt-logininfo">
                                                                    <button type="submit" class="wt-btn do-login-button"><?php echo e(trans('lang.login')); ?></button>
                                                                <span class="wt-checkbox">
                                                                    <input id="remember" type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                                                                    <label for="remember"><?php echo e(trans('lang.remember')); ?></label>
                                                                </span>
                                                            </div>
                                                        </fieldset>
                                                        <div class="wt-loginfooterinfo">
                                                            <?php if(Route::has('password.request')): ?>
                                                                <a href="<?php echo e(route('password.request')); ?>" class="wt-forgot-password"><?php echo e(trans('lang.forget_pass')); ?></a>
                                                            <?php endif; ?>
                                                            <a href="<?php echo e(route('register')); ?>"><?php echo e(trans('lang.create_account')); ?></a>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <a href="<?php echo e(route('register')); ?>" class="wt-btn"><?php echo e(trans('lang.join_now')); ?></a>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(auth()->guard()->check()): ?>
                                        <?php
                                            $user = !empty(Auth::user()) ? Auth::user() : '';
                                            $role = !empty($user) ? $user->getRoleNames()->first() : array();
                                            $profile = \App\User::find(Auth::user()->id)->profile;
                                            $user_image = !empty($profile) ? $profile->avater : '';
                                            $employer_job = \App\Job::select('status')->where('user_id', Auth::user()->id)->first();
                                            $profile_image = !empty($user_image) ? '/uploads/users/'.$user->id.'/'.$user_image : 'images/user-login.png';
                                            $payment_settings = \App\SiteManagement::getMetaValue('commision');
                                            $payment_module = !empty($payment_settings) && !empty($payment_settings[0]['enable_packages']) ? $payment_settings[0]['enable_packages'] : 'true';
                                            $employer_payment_module = !empty($payment_settings) && !empty($payment_settings[0]['employer_package']) ? $payment_settings[0]['employer_package'] : 'true';
                                        ?>
                                        <div class="wt-userlogedin">
                                            <figure class="wt-userimg">
                                                
                                                <img src="<?php echo e(asset(Helper::getImage('uploads/users/' . Auth::user()->id, $profile->avater, '' , 'user.jpg'))); ?>" alt="<?php echo e(trans('lang.user_avatar')); ?>">
                                            </figure>
                                            <div class="wt-username">
                                                <h3><?php echo e(Helper::getUserName(Auth::user()->id)); ?></h3>
                                                <span><?php echo e(!empty(Auth::user()->profile->tagline) ? str_limit(Auth::user()->profile->tagline, 26, '') : Helper::getAuthRoleName()); ?></span>
                                            </div>
                                            <?php if(file_exists(resource_path('views/extend/back-end/includes/profile-menu.blade.php'))): ?> 
                                                <?php echo $__env->make('extend.back-end.includes.profile-menu', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                            <?php else: ?> 
                                                <?php echo $__env->make('back-end.includes.profile-menu', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <?php if(file_exists(resource_path('views/extend/includes/menu.blade.php'))): ?> 
                                    <?php echo $__env->make('extend.includes.menu', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                <?php else: ?> 
                                    <?php echo $__env->make('includes.menu', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
        <?php else: ?>
            <header id="wt-header" class="wt-header wt-haslayout <?php echo e($inner_header); ?>">
                <div class="wt-navigationarea">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <?php if(auth()->guard()->check()): ?>
                                    <?php echo e(Helper::displayEmailWarning()); ?>

                                <?php endif; ?>
                                <?php if(!empty($logo) || Schema::hasTable('site_managements')): ?>
                                    <strong class="wt-logo"><a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset($logo)); ?>" alt="<?php echo e(trans('Logo')); ?>"></a></strong>
                                <?php endif; ?>
                                <?php if(!empty(Route::getCurrentRoute()) && Route::getCurrentRoute()->uri() != '/' && Route::getCurrentRoute()->uri() != 'home'): ?>
                                    <search-form
                                    :placeholder="'<?php echo e(trans('lang.looking_for')); ?>'"
                                    :freelancer_placeholder="'<?php echo e(trans('lang.search_filter_list.freelancer')); ?>'"
                                    :employer_placeholder="'<?php echo e(trans('lang.search_filter_list.employers')); ?>'"
                                    :job_placeholder="'<?php echo e(trans('lang.search_filter_list.jobs')); ?>'"
                                    :service_placeholder="'<?php echo e(trans('lang.search_filter_list.services')); ?>'"
                                    :no_record_message="'<?php echo e(trans('lang.no_record')); ?>'"
                                    >
                                    </search-form>
                                <?php endif; ?>
                                <div class="wt-rightarea">
                                    <?php if(file_exists(resource_path('views/extend/includes/menu.blade.php'))): ?> 
                                        <?php echo $__env->make('extend.includes.menu', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                    <?php else: ?> 
                                        <?php echo $__env->make('includes.menu', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                    <?php endif; ?>
                                    <?php if(auth()->guard()->guest()): ?>
                                        <div class="wt-loginarea">
                                            <div class="wt-loginoption">
                                                <!-- <a href="javascript:void(0);" id="wt-loginbtn" class="wt-loginbtn"><?php echo e(trans('lang.login')); ?></a> -->
                                                <a href="<?php echo e(route('login')); ?>"  class="wt-loginbtn"><?php echo e(trans('lang.login')); ?></a>
                                            </div>
                                            <a href="<?php echo e(route('register')); ?>" class="wt-btn"><?php echo e(trans('lang.join_now')); ?></a>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(auth()->guard()->check()): ?>
                                        <?php
                                            $user = !empty(Auth::user()) ? Auth::user() : '';
                                            $role = !empty($user) ? $user->getRoleNames()->first() : array();
                                            $profile = \App\User::find(Auth::user()->id)->profile;
                                            $user_image = !empty($profile) ? $profile->avater : '';
                                            $employer_job = \App\Job::select('status')->where('user_id', Auth::user()->id)->first();
                                            $profile_image = !empty($user_image) ? '/uploads/users/'.$user->id.'/'.$user_image : 'images/user-login.png';
                                            $payment_settings = \App\SiteManagement::getMetaValue('commision');
                                            $payment_module = !empty($payment_settings) && !empty($payment_settings[0]['enable_packages']) ? $payment_settings[0]['enable_packages'] : 'true';
                                            $employer_payment_module = !empty($payment_settings) && !empty($payment_settings[0]['employer_package']) ? $payment_settings[0]['employer_package'] : 'true';
                                        ?>
                                            <div class="wt-userlogedin">
                                                <figure class="wt-userimg">
                                                    
                                                    <img src="<?php echo e(asset(Helper::getImage('uploads/users/' . Auth::user()->id, $profile->avater, '' , 'user.jpg'))); ?>" alt="<?php echo e(trans('lang.user_avatar')); ?>">
                                                </figure>
                                                <div class="wt-username">
                                                    <h3><?php echo e(Helper::getUserName(Auth::user()->id)); ?></h3>
                                                    <span><?php echo e(!empty(Auth::user()->profile->tagline) ? str_limit(Auth::user()->profile->tagline, 26, '') : Helper::getAuthRoleName()); ?></span>
                                                </div>
                                                <?php if(file_exists(resource_path('views/extend/back-end/includes/profile-menu.blade.php'))): ?> 
                                                    <?php echo $__env->make('extend.back-end.includes.profile-menu', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                                <?php else: ?> 
                                                    <?php echo $__env->make('back-end.includes.profile-menu', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                                <?php endif; ?>
                                            </div>
                                    <?php endif; ?>
                                    <?php if($slider['style'] == 'style1'): ?>
                                        <?php if(!empty(Route::getCurrentRoute()) && Route::getCurrentRoute()->uri() != '/' && Route::getCurrentRoute()->uri() != 'home'): ?>
                                            <div class="wt-respsonsive-search"><a href="javascript:;" class="wt-searchbtn"><i class="fa fa-search"></i></a></div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
        <?php endif; ?>
    <?php else: ?>
        <header id="wt-header" class="wt-header wt-haslayout <?php echo e($inner_header); ?>">
            <div class="wt-navigationarea">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <?php if(auth()->guard()->check()): ?>
                                <?php echo e(Helper::displayEmailWarning()); ?>

                            <?php endif; ?>
                            <?php if(!empty($logo) || Schema::hasTable('site_managements')): ?>
                                <strong class="wt-logo"><a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset($logo)); ?>" alt="<?php echo e(trans('Logo')); ?>"></a></strong>
                            <?php endif; ?>
                            <?php if(!empty(Route::getCurrentRoute()) && Route::getCurrentRoute()->uri() != '/' && Route::getCurrentRoute()->uri() != 'home'): ?>
                                <search-form
                                :placeholder="'<?php echo e(trans('lang.looking_for')); ?>'"
                                :freelancer_placeholder="'<?php echo e(trans('lang.search_filter_list.freelancer')); ?>'"
                                :employer_placeholder="'<?php echo e(trans('lang.search_filter_list.employers')); ?>'"
                                :job_placeholder="'<?php echo e(trans('lang.search_filter_list.jobs')); ?>'"
                                :service_placeholder="'<?php echo e(trans('lang.search_filter_list.services')); ?>'"
                                :no_record_message="'<?php echo e(trans('lang.no_record')); ?>'"
                                >
                                </search-form>
                            <?php endif; ?>
                            <div class="wt-rightarea">
                                <nav id="wt-nav" class="wt-nav navbar-expand-lg">
                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                        <i class="lnr lnr-menu"></i>
                                    </button>
                                    <div class="collapse navbar-collapse wt-navigation" id="navbarNav">
                                        <?php if(file_exists(resource_path('views/extend/includes/menu.blade.php'))): ?> 
                                            <?php echo $__env->make('extend.includes.menu', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                        <?php else: ?> 
                                            <?php echo $__env->make('includes.menu', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                        <?php endif; ?>
                                    </div>
                                </nav>
                                <?php if(auth()->guard()->guest()): ?>
                                    <div class="wt-loginarea">
                                        <div class="wt-loginoption">
                                            <a href="javascript:void(0);" id="wt-loginbtn" class="wt-loginbtn"><?php echo e(trans('lang.login')); ?></a>
                                            <div class="wt-loginformhold" <?php if($errors->has('email') || $errors->has('password')): ?> style="display: block;" <?php endif; ?>>
                                                <div class="wt-loginheader">
                                                    <span><?php echo e(trans('lang.login')); ?></span>
                                                    <a href="javascript:;"><i class="fa fa-times"></i></a>
                                                </div>
                                                <form method="POST" action="<?php echo e(route('login')); ?>" class="wt-formtheme wt-loginform do-login-form">
                                                    <?php echo csrf_field(); ?>
                                                    <fieldset>
                                                        <div class="form-group">
                                                            <input id="email" type="email" name="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>"
                                                                placeholder="Email" required autofocus>
                                                            <?php if($errors->has('email')): ?>
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong><?php echo e($errors->first('email')); ?></strong>
                                                            </span>
                                                            <?php endif; ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <input id="password" type="password" name="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>"
                                                                placeholder="Password" required>
                                                            <?php if($errors->has('password')): ?>
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong><?php echo e($errors->first('password')); ?></strong>
                                                            </span>
                                                            <?php endif; ?>
                                                        </div>
                                                        <div class="wt-logininfo">
                                                                <button type="submit" class="wt-btn do-login-button"><?php echo e(trans('lang.login')); ?></button>
                                                            <span class="wt-checkbox">
                                                                <input id="remember" type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                                                                <label for="remember"><?php echo e(trans('lang.remember')); ?></label>
                                                            </span>
                                                        </div>
                                                    </fieldset>
                                                    <div class="wt-loginfooterinfo">
                                                        <?php if(Route::has('password.request')): ?>
                                                            <a href="<?php echo e(route('password.request')); ?>" class="wt-forgot-password"><?php echo e(trans('lang.forget_pass')); ?></a>
                                                        <?php endif; ?>
                                                        <a href="<?php echo e(route('register')); ?>"><?php echo e(trans('lang.create_account')); ?></a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <a href="<?php echo e(route('register')); ?>" class="wt-btn"><?php echo e(trans('lang.join_now')); ?></a>
                                    </div>
                                <?php endif; ?>
                                <?php if(auth()->guard()->check()): ?>
                                    <?php
                                        $user = !empty(Auth::user()) ? Auth::user() : '';
                                        $role = !empty($user) ? $user->getRoleNames()->first() : array();
                                        $profile = \App\User::find(Auth::user()->id)->profile;
                                        $user_image = !empty($profile) ? $profile->avater : '';
                                        $employer_job = \App\Job::select('status')->where('user_id', Auth::user()->id)->first();
                                        $profile_image = !empty($user_image) ? '/uploads/users/'.$user->id.'/'.$user_image : 'images/user-login.png';
                                        $payment_settings = \App\SiteManagement::getMetaValue('commision');
                                        $payment_module = !empty($payment_settings) && !empty($payment_settings[0]['enable_packages']) ? $payment_settings[0]['enable_packages'] : 'true';
                                        $employer_payment_module = !empty($payment_settings) && !empty($payment_settings[0]['employer_package']) ? $payment_settings[0]['employer_package'] : 'true';
                                    ?>
                                        <div class="wt-userlogedin">
                                            <figure class="wt-userimg">
                                                
                                                <img src="<?php echo e(asset(Helper::getImage('uploads/users/' . Auth::user()->id, $profile->avater, '' , 'user.jpg'))); ?>" alt="<?php echo e(trans('lang.user_avatar')); ?>">
                                            </figure>
                                            <div class="wt-username">
                                                <h3><?php echo e(Helper::getUserName(Auth::user()->id)); ?></h3>
                                                <span><?php echo e(!empty(Auth::user()->profile->tagline) ? str_limit(Auth::user()->profile->tagline, 26, '') : Helper::getAuthRoleName()); ?></span>
                                            </div>
                                            <?php if(file_exists(resource_path('views/extend/back-end/includes/profile-menu.blade.php'))): ?> 
                                                <?php echo $__env->make('extend.back-end.includes.profile-menu', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                            <?php else: ?> 
                                                <?php echo $__env->make('back-end.includes.profile-menu', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                            <?php endif; ?>
                                        </div>
                                <?php endif; ?>
                                <?php if(!empty(Route::getCurrentRoute()) && Route::getCurrentRoute()->uri() != '/' && Route::getCurrentRoute()->uri() != 'home'): ?>
                                    <div class="wt-respsonsive-search"><a href="javascript:;" class="wt-searchbtn"><i class="fa fa-search"></i></a></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    <?php endif; ?>
<?php endif; ?>

