<?php $__env->startPush('sliderStyle'); ?> 
    <link href="<?php echo e(asset('css/owl.carousel.min.css')); ?>" rel="stylesheet">
<?php $__env->stopPush(); ?>
<?php $__env->startPush('stylesheets'); ?>
    <link href="<?php echo e(asset('css/prettyPhoto-min.css')); ?>" rel="stylesheet">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('title'); ?><?php echo e(config('app.name')); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('description', "$meta_desc"); ?>
<?php if($slider_style == 'style2' || $slider_style == 'style3' && $slider_order == 0): ?>
    <?php $__env->startSection('homeSlider'); ?>
        <div id="slider">
            <?php if($slider_style == 'style2'): ?>
                <second-slider 
                    :page_id="<?php echo e($page['id']); ?>">
                </second-slider>
            <?php elseif($slider_style == 'style3'): ?>
                <third-slider 
                    :page_id="<?php echo e($page['id']); ?>">
                </third-slider>
            <?php endif; ?>
        </div>
    <?php $__env->stopSection(); ?>
<?php endif; ?>
<?php $__env->startSection('content'); ?>
    <?php if($show_banner_image == true && $home == false): ?>
        <?php $breadcrumbs = Breadcrumbs::generate('showPage',$page, $slug); ?>
        <div class="wt-haslayout wt-innerbannerholder" style="background-image:url(<?php echo e(asset($banner)); ?>)">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-xs-12 col-sm-12 col-md-8 push-md-2 col-lg-6 push-lg-3">
                        <div class="wt-innerbannercontent">
                            <?php if(!empty($page) && $show_title == true): ?>
                                <div class="wt-title">
                                    <h2><?php echo e($page['title']); ?></h2>
                                </div>
                            <?php endif; ?>
                            <?php if(!empty($show_breadcrumbs) && $show_breadcrumbs === 'true'): ?>
                                <?php if(count($breadcrumbs)): ?>
                                    <ol class="wt-breadcrumb">
                                        <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($breadcrumb->url && !$loop->last): ?>
                                                <li><a href="<?php echo e($breadcrumb->url); ?>"><?php echo e($breadcrumb->title); ?></a></li>
                                            <?php else: ?>
                                                <li class="active"><?php echo e($breadcrumb->title); ?></li>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ol>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div id="pages-list">
        <?php if(Session::has('error')): ?>
            <div class="flash_msg">
                <flash_messages :message_class="'danger'" :time ='5' :message="'<?php echo e(Session::get('error')); ?>'" v-cloak></flash_messages>
            </div>
            <?php session()->forget('error'); ?>
        <?php endif; ?>
        <?php if($home == false): ?>
            <?php if($show_banner_image == false && !empty($page['title']) && $show_title == true): ?>
                <div class="wt-innerbannercontent wt-without-banner-title">
                    <div class="wt-title">
                        <h2><?php echo e($page['title']); ?></h2>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
        <?php if(!empty($page)): ?>
            <?php if(!empty($sections)): ?>
                <show-page 
                :sections_list="'<?php echo e(json_encode($sections)); ?>'"
                :page="'<?php echo e(json_encode($page)); ?>'"
                :type="'<?php echo e($type); ?>'">
                </show-page>
            <?php endif; ?>
            <?php if(!empty($description && $description != 'null')): ?>
                <div class="dc-contentwrappers">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 float-left">
                                <div class="dc-howitwork-hold dc-haslayout">
                                    <div class="dc-haslayout dc-main-section">
                                        <?php echo htmlspecialchars_decode(stripslashes($description)); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php else: ?>
            <?php if(file_exists(resource_path('views/extend/errors/404.blade.php'))): ?> 
                <?php echo $__env->make('extend.errors.404', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php else: ?> 
                <?php echo $__env->make('errors.404', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php endif; ?>
        <?php endif; ?>
        <?php if(!empty($skills)
            || !empty($categories)
            || !empty($locations)
            || !empty($languages)): ?>
            <section class="wt-haslayaout wt-main-section wt-footeraboutus">
                <div class="container">
                    <div class="row">
                        <?php if(Helper::getAccessType() != 'services'): ?>
                            <?php if($skills->count() > 0): ?>
                                <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                                    <div class="wt-widgetskills">
                                        <div class="wt-fwidgettitle">
                                            <h3><?php echo e(trans('lang.by_skills')); ?></h3>
                                        </div>
                                        <?php if(!empty($skills)): ?>
                                            <ul class="wt-fwidgetcontent">
                                                <?php $__currentLoopData = $skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li><a href="<?php echo e(url('search-results?type=job&skills%5B%5D='.$skill->slug)); ?>"><?php echo e($skill->title); ?></a></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php if($categories->count() > 0): ?>
                            <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                                <div class="wt-footercol wt-widgetcategories">
                                    <div class="wt-fwidgettitle">
                                        <h3><?php echo e(trans('lang.by_cats')); ?></h3>
                                    </div>
                                    <?php if(!empty($categories)): ?>
                                        <ul class="wt-fwidgetcontent">
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><a href="<?php echo e(url('search-results?type='.$type.'&category%5B%5D='.$category->slug)); ?>"><?php echo e($category->title); ?></a></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if($locations->count() > 0): ?>
                            <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                                <div class="wt-widgetbylocation">
                                    <div class="wt-fwidgettitle">
                                        <h3><?php echo e(trans('lang.by_locs')); ?></h3>
                                    </div>
                                    <?php if(!empty($locations)): ?>
                                        <ul class="wt-fwidgetcontent">
                                            <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><a href="<?php echo e(url('search-results?type='.$type.'&locations%5B%5D='.$location->slug)); ?>"><?php echo e($location->title); ?></a></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if($languages->count() > 0): ?>
                            <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                                <div class="wt-widgetbylocation">
                                    <div class="wt-fwidgettitle">
                                        <h3><?php echo e(trans('lang.by_lang')); ?></h3>
                                    </div>
                                    <?php if(!empty($languages)): ?>
                                        <ul class="wt-fwidgetcontent">
                                            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><a href="<?php echo e(url('search-results?type='.$type.'&languages%5B%5D='.$language->slug)); ?>"><?php echo e($language->title); ?></a></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('js/prettyPhoto-min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/owl.carousel.min.js')); ?>"></script>
    <?php if($slider_style == 'style2'): ?>
        <script>
            jQuery('#wt-header').addClass('wt-headervthhree')
            jQuery('#wt-header').removeClass('wt-headervtwo')
            jQuery('.wt-formtheme.wt-formbanner.wt-formbannervtwo').remove()
        </script>
        <?php if(isset($_SERVER["SERVER_NAME"]) && $_SERVER["SERVER_NAME"] === 'amentotech.com'): ?>
            <script>
                jQuery('.wt-logo a img').attr('src',(APP_URL+'/images/logo-white.png'));
            </script>
        <?php endif; ?>
    <?php else: ?>
        <script src="<?php echo e(asset('js/tilt.jquery.js')); ?>"></script>
    <?php endif; ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make(file_exists(resource_path('views/extend/front-end/master.blade.php')) ? 
'extend.front-end.master':
 'front-end.master', ['body_class' => 'wt-innerbgcolor'] , \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>