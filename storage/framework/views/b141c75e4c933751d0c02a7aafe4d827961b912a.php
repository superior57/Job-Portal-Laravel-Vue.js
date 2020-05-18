<?php $__env->startPush('stylesheets'); ?>
    <link href="<?php echo e(asset('css/owl.carousel.min.css')); ?>" rel="stylesheet">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('title'); ?><?php echo e($f_list_meta_title); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('description', $f_list_meta_desc); ?>
<?php $__env->startSection('content'); ?>
    <?php if($show_f_banner == 'true'): ?>
        <?php $breadcrumbs = Breadcrumbs::generate('searchResults'); ?>
        <div class="wt-haslayout wt-innerbannerholder" style="background-image:url(<?php echo e(asset(Helper::getBannerImage($f_inner_banner, 'uploads/settings/general'))); ?>)">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-xs-12 col-sm-12 col-md-8 push-md-2 col-lg-6 push-lg-3">
                        <div class="wt-innerbannercontent">
                            <div class="wt-title">
                                <h2><?php echo e(trans('lang.freelancers')); ?></h2>
                            </div>
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
    <?php if(!empty($categories) && $categories->count() > 0): ?>
        <div class="wt-categoriesslider-holder wt-haslayout <?php echo e($show_f_banner == 'false' ? 'la-categorty-top-mt' : ''); ?>">
            <div class="wt-title">
                <h2><?php echo e(trans('lang.browse_job_cats')); ?></h2>
            </div>
            <div id="wt-categoriesslider" class="wt-categoriesslider owl-carousel">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $category = \App\Category::find($cat->id);
                        $active = (!empty($_GET['category']) && in_array($cat->id, $_GET['category'])) ? 'active-category' : '';
                        $active_wrapper = ( !empty($_GET['category']) && in_array($cat->id, $_GET['category'])) ? 'active-category-wrapper' : '';
                    ?>
                    <div class="wt-categoryslidercontent item <?php echo e($active_wrapper); ?>">
                        <figure><img src="<?php echo e(asset(Helper::getCategoryImage($cat->image))); ?>" alt="<?php echo e($cat->title); ?>"></figure>
                        <div class="wt-cattitle">
                        <h3><a href="<?php echo e(url('search-results?type=job&category%5B%5D='.$cat->slug)); ?>" class="<?php echo e($active); ?>"><?php echo e($cat->title); ?></a></h3>
                            <span>Items: <?php echo e($category->jobs->count()); ?></span>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    <?php endif; ?>
    <div class="wt-haslayout wt-main-section" id="user_profile">
        <?php if(Session::has('payment_message')): ?>
            <?php $response = Session::get('payment_message') ?>
            <div class="flash_msg">
                <flash_messages :message_class="'<?php echo e($response['code']); ?>'" :time ='5' :message="'<?php echo e($response['message']); ?>'" v-cloak></flash_messages>
            </div>
        <?php endif; ?>
        <div class="wt-haslayout">
            <div class="container">
                <div class="row">
                    <div id="wt-twocolumns" class="wt-twocolumns wt-haslayout">
                        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-4 float-left">
                            <?php if(file_exists(resource_path('views/extend/front-end/freelancers/filters.blade.php'))): ?> 
                                <?php echo $__env->make('extend.front-end.freelancers.filters', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <?php else: ?> 
                                <?php echo $__env->make('front-end.freelancers.filters', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <?php endif; ?>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xl-8 float-left">
                            <div class="wt-userlistingholder wt-userlisting wt-haslayout">
                                <div class="wt-userlistingtitle">
                                    <?php if(!empty($users)): ?>
                                        <span><?php echo e(trans('lang.01')); ?> <?php echo e($users->count()); ?> of <?php echo e(\App\User::role('freelancer')->count()); ?> results <?php if(!empty($keyword)): ?> for <em>"<?php echo e($keyword); ?>"</em> <?php endif; ?></span>
                                    <?php endif; ?>
                                </div>
                                <?php if(!empty($users)): ?>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $freelancer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $user_image = !empty($freelancer->profile->avater) ?
                                                            '/uploads/users/'.$freelancer->id.'/'.$freelancer->profile->avater :
                                                            'images/user.jpg';
                                            $flag = !empty($freelancer->location->flag) ? Helper::getLocationFlag($freelancer->location->flag) :
                                                    '/images/img-01.png';
                                            $feedbacks = \App\Review::select('feedback')->where('receiver_id', $freelancer->id)->count();
                                            $avg_rating = App\Review::where('receiver_id', $freelancer->id)->sum('avg_rating');
                                            $rating  = $avg_rating != 0 ? round($avg_rating/\App\Review::count()) : 0;
                                            $reviews = \App\Review::where('receiver_id', $freelancer->id)->get();
                                            $stars  = $reviews->sum('avg_rating') != 0 ? (($reviews->sum('avg_rating')/$feedbacks)/5)*100 : 0;
                                            $average_rating_count = !empty($feedbacks) ? $reviews->sum('avg_rating')/$feedbacks : 0;
                                            $verified_user = \App\User::select('user_verified')->where('id', $freelancer->id)->pluck('user_verified')->first();
                                            $save_freelancer = !empty(auth()->user()->profile->saved_freelancer) ? unserialize(auth()->user()->profile->saved_freelancer) : array();
                                            $badge = Helper::getUserBadge($freelancer->id);
                                            if (!empty($enable_package) && $enable_package === 'true') {
                                                $feature_class = (!empty($badge) && $freelancer->expiry_date >= $current_date) ? 'wt-featured' : 'wt-exp';
                                                $badge_color = !empty($badge) ? $badge->color : '';
                                                $badge_img  = !empty($badge) ? $badge->image : '';
                                            } else {
                                                $feature_class = 'wt-exp';
                                                $badge_color = '';
                                                $badge_img    = '';
                                            }
                                        ?>
                                        <div class="wt-userlistinghold <?php echo e($feature_class); ?>">
                                            <?php if(!empty($enable_package) && $enable_package === 'true'): ?>
                                                <?php if($freelancer->expiry_date >= $current_date && !empty($freelancer->badge_id)): ?>
                                                    <span class="wt-featuredtag" style="border-top: 40px solid <?php echo e($badge_color); ?>;">
                                                        <?php if(!empty($badge_img)): ?>
                                                            <img src="<?php echo e(asset(Helper::getBadgeImage($badge_img))); ?>" alt="<?php echo e(trans('lang.is_featured')); ?>" data-tipso="Plus Member" class="template-content tipso_style">
                                                        <?php else: ?>
                                                            <i class="wt-expired fas fa-bold"></i>
                                                        <?php endif; ?>
                                                    </span>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                            <figure class="wt-userlistingimg">
                                                <img src="<?php echo e(asset(Helper::getImageWithSize('uploads/users/'.$freelancer->id, $freelancer->profile->avater, 'listing'))); ?>" alt="<?php echo e(trans('lang.img')); ?>">
                                            </figure>
                                            <div class="wt-userlistingcontent">
                                                <div class="wt-contenthead">
                                                    <div class="wt-title">
                                                        <a href="<?php echo e(url('profile/'.$freelancer->slug)); ?>">
                                                            <?php if($verified_user == 1): ?>
                                                                <i class="fa fa-check-circle"></i>
                                                            <?php endif; ?>
                                                            <?php echo e(Helper::getUserName($freelancer->id)); ?>

                                                        </a>
                                                        <?php if(!empty($freelancer->profile->tagline)): ?>
                                                            <h2><a href="<?php echo e(url('profile/'.$freelancer->slug)); ?>"><?php echo e($freelancer->profile->tagline); ?></a></h2>
                                                        <?php endif; ?>
                                                    </div>
                                                    <ul class="wt-userlisting-breadcrumb">
                                                        <?php if(!empty($freelancer->profile->hourly_rate)): ?>
                                                            <li><span><i class="far fa-money-bill-alt"></i>
                                                                <?php echo e((!empty($symbol['symbol'])) ? $symbol['symbol'] : '$'); ?><?php echo e($freelancer->profile->hourly_rate); ?> <?php echo e(trans('lang.per_hour')); ?></span>
                                                            </li>
                                                        <?php endif; ?>
                                                        <?php if(!empty($freelancer->location)): ?>
                                                            <li><span><img src="<?php echo e(asset($flag)); ?>" alt="Flag"> <?php echo e(!empty($freelancer->location->title) ? $freelancer->location->title : ''); ?></span></li>
                                                        <?php endif; ?>
                                                        <?php if(in_array($freelancer->id, $save_freelancer)): ?>
                                                            <li class="wt-btndisbaled">
                                                                <a href="javascrip:void(0);" class="wt-clicksave wt-clicksave">
                                                                    <i class="fa fa-heart"></i>
                                                                    <?php echo e(trans('lang.saved')); ?>

                                                                </a>
                                                            </li>
                                                        <?php else: ?>
                                                            <li v-cloak>
                                                                <a href="javascrip:void(0);" class="wt-clicklike" id="freelancer-<?php echo e($freelancer->id); ?>" @click.prevent="add_wishlist('freelancer-<?php echo e($freelancer->id); ?>', <?php echo e($freelancer->id); ?>, 'saved_freelancer', '<?php echo e(trans("lang.saved")); ?>')">
                                                                    <i class="fa fa-heart"></i>
                                                                    <span class="save_text"><?php echo e(trans('lang.click_to_save')); ?></span>
                                                                </a>
                                                            </li>
                                                        <?php endif; ?>
                                                    </ul>
                                                </div>
                                                <div class="wt-rightarea">
                                                    <span class="wt-stars"><span style="width: <?php echo e($stars); ?>%;"></span></span>
                                                    <span class="wt-starcontent">
                                                        <?php echo e(round($average_rating_count)); ?><sub><?php echo e(trans('lang.5')); ?></sub> <em>(<?php echo e($feedbacks); ?> <?php echo e(trans('lang.feedbacks')); ?>)</em>
                                                    </span>
                                                </div>
                                            </div>
                                            <?php if(!empty($freelancer->profile->description)): ?>
                                                <div class="wt-description">
                                                    <p><?php echo e(str_limit($freelancer->profile->description, 180)); ?></p>
                                                </div>
                                            <?php endif; ?>
                                            <?php if(!empty($freelancer->skills)): ?>
                                                <div class="wt-tag wt-widgettag">
                                                    <?php $__currentLoopData = $freelancer->skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <a href="<?php echo e(url('search-results?type=job&skills%5B%5D='.$skill->slug)); ?>"><?php echo e($skill->title); ?></a>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php if( method_exists($users,'links') ): ?>
                                        <?php echo e($users->links('pagination.custom')); ?>

                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php if(file_exists(resource_path('views/extend/errors/no-record.blade.php'))): ?> 
                                        <?php echo $__env->make('extend.errors.no-record', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                    <?php else: ?> 
                                        <?php echo $__env->make('errors.no-record', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $__env->startPush('scripts'); ?>
        <script src="<?php echo e(asset('js/owl.carousel.min.js')); ?>"></script>
        <script>
            if (APP_DIRECTION == 'rtl') {
                var direction = true;
            } else {
                var direction = false;
            }
            
            jQuery("#wt-categoriesslider").owlCarousel({
                item: 6,
                rtl:direction,
                loop:true,
                nav:false,
                margin: 0,
                autoplay:false,
                center: true,
                responsiveClass:true,
                responsive:{
                    0:{items:1,},
                    481:{items:2,},
                    768:{items:3,},
                    1440:{items:4,},
                    1760:{items:6,}
                }
            });
        </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(file_exists(resource_path('views/extend/front-end/master.blade.php')) ? 
'extend.front-end.master':
 'front-end.master', ['body_class' => 'wt-innerbgcolor'] , \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>