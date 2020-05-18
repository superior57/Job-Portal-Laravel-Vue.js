<?php $__env->startSection('title'); ?><?php echo e($job_list_meta_title); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('description', $job_list_meta_desc); ?>
<?php $__env->startSection('content'); ?>
    <?php if($show_job_banner == 'true'): ?>
        <?php $breadcrumbs = Breadcrumbs::generate('searchResults'); ?>
        <div class="wt-haslayout wt-innerbannerholder" style="background-image:url(<?php echo e(asset(Helper::getBannerImage($job_inner_banner, 'uploads/settings/general'))); ?>)">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-xs-12 col-sm-12 col-md-8 push-md-2 col-lg-6 push-lg-3">
                        <div class="wt-innerbannercontent">
                            <div class="wt-title">
                                <h2><?php echo e(trans('lang.jobs')); ?></h2>
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
    <div class="wt-haslayout wt-main-section" id="jobs">
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
                            <?php if(file_exists(resource_path('views/extend/front-end/jobs/filters.blade.php'))): ?> 
                                <?php echo $__env->make('extend.front-end.jobs.filters', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <?php else: ?> 
                                <?php echo $__env->make('front-end.jobs.filters', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <?php endif; ?>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xl-8 float-left">
                            <div class="wt-userlistingholder wt-haslayout">
                                <?php if(!empty($keyword)): ?>
                                    <div class="wt-userlistingtitle">
                                        <span><?php echo e(trans('lang.01')); ?> <?php echo e($jobs->count()); ?> of <?php echo e($Jobs_total_records); ?> results for <em>"<?php echo e($keyword); ?>"</em></span>
                                    </div>
                                <?php endif; ?>
                                <?php if(!empty($jobs) && $jobs->count() > 0): ?>
                                    <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(\Schema::hasColumn('jobs', 'expiry_date') && !empty($job->expiry_date)): ?>
                                            <?php $expiry = Carbon\Carbon::parse($job->expiry_date); ?>
                                            <?php if(Carbon\Carbon::now()->lessThan($expiry)): ?>
                                                <?php
                                                    $job = \App\Job::find($job->id);
                                                    //$description = strip_tags(stripslashes($job->description));
                                                    $description = strip_tags(stripslashes($job->description));
                                                    $featured_class = $job->is_featured == 'true' ? 'wt-featured' : '';
                                                    $user = Auth::user() ? \App\User::find(Auth::user()->id) : '';
                                                    $project_type  = Helper::getProjectTypeList($job->project_type);
                                                ?>
                                                <div class="wt-userlistinghold wt-userlistingholdvtwo <?php echo e($featured_class); ?>">
                                                    <?php if($job->is_featured == 'true'): ?>
                                                        <span class="wt-featuredtag"><img src="images/featured.png" alt="<?php echo e(trans('ph.is_featured')); ?>" data-tipso="Plus Member" class="template-content tipso_style"></span>
                                                    <?php endif; ?>
                                                    <div class="wt-userlistingcontent">
                                                        <div class="wt-contenthead">
                                                            <div class="wt-title">
                                                                <?php if(!empty($job->employer->slug)): ?>
                                                                    <a href="<?php echo e(url('profile/'.$job->employer->slug)); ?>"><i class="fa fa-check-circle"></i> <?php echo e(Helper::getUserName($job->employer->id)); ?></a>
                                                                <?php endif; ?>
                                                                <h2><a href="<?php echo e(url('job/'.$job->slug)); ?>"><?php echo e($job->title); ?></a></h2>
                                                            </div>
                                                            <div class="wt-description">
                                                                <p><?php echo e(str_limit(html_entity_decode($description), 200)); ?></p>
                                                            </div>
                                                            <div class="wt-tag wt-widgettag">
                                                                <?php $__currentLoopData = $job->skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <a href="<?php echo e(url('search-results?type=job&skills%5B%5D='.$skill->slug)); ?>"><?php echo e($skill->title); ?></a>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </div>
                                                        </div>
                                                        <div class="wt-viewjobholder">
                                                            <ul>
                                                                <?php if(!empty($job->project_level)): ?>
                                                                    <li><span><i class="fa fa-dollar-sign wt-viewjobdollar"></i><?php echo e(Helper::getProjectLevel($job->project_level)); ?></span></li>
                                                                <?php endif; ?>
                                                                <?php if(!empty($job->location->title)): ?>
                                                                    <li><span><img src="<?php echo e(asset(Helper::getLocationFlag($job->location->flag))); ?>" alt="<?php echo e(trans('lang.location')); ?>"> <?php echo e($job->location->title); ?></span></li>
                                                                <?php endif; ?>
                                                                <li><span><i class="far fa-folder wt-viewjobfolder"></i><?php echo e(trans('lang.type')); ?> <?php echo e($project_type); ?></span></li>
                                                                <li><span><i class="far fa-clock wt-viewjobclock"></i><?php echo e(Helper::getJobDurationList($job->duration)); ?></span></li>
                                                                <li><span><i class="fa fa-tag wt-viewjobtag"></i><?php echo e(trans('lang.job_id')); ?> <?php echo e($job->code); ?></span></li>
                                                                <?php if(!empty($user->profile->saved_jobs) && in_array($job->id, unserialize($user->profile->saved_jobs))): ?>
                                                                    <li style=pointer-events:none;><a href="javascript:void(0);" class="wt-clicklike wt-clicksave"><i class="fa fa-heart"></i> <?php echo e(trans("lang.saved")); ?></a></li>
                                                                <?php else: ?>
                                                                    <li>
                                                                        <a href="javascrip:void(0);" class="wt-clicklike" id="job-<?php echo e($job->id); ?>" @click.prevent="add_wishlist('job-<?php echo e($job->id); ?>', <?php echo e($job->id); ?>, 'saved_jobs', '<?php echo e(trans("lang.saved")); ?>')" v-cloak>
                                                                            <i class="fa fa-heart"></i>
                                                                            <span class="save_text"><?php echo e(trans('lang.click_to_save')); ?></span>
                                                                        </a>
                                                                    </li>
                                                                <?php endif; ?>
                                                                <li class="wt-btnarea"><a href="<?php echo e(url('job/'.$job->slug)); ?>" class="wt-btn"><?php echo e(trans('lang.view_job')); ?></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        <?php else: ?> 
                                            <?php
                                                $job = \App\Job::find($job->id);
                                                $description = strip_tags(stripslashes($job->description));
                                                $featured_class = $job->is_featured == 'true' ? 'wt-featured' : '';
                                                $user = Auth::user() ? \App\User::find(Auth::user()->id) : '';
                                                $project_type  = Helper::getProjectTypeList($job->project_type);
                                            ?>
                                            <div class="wt-userlistinghold wt-userlistingholdvtwo <?php echo e($featured_class); ?>">
                                                <?php if($job->is_featured == 'true'): ?>
                                                    <span class="wt-featuredtag"><img src="images/featured.png" alt="<?php echo e(trans('ph.is_featured')); ?>" data-tipso="Plus Member" class="template-content tipso_style"></span>
                                                <?php endif; ?>
                                                <div class="wt-userlistingcontent">
                                                    <div class="wt-contenthead">
                                                        <div class="wt-title">
                                                            <a href="<?php echo e(url('profile/'.$job->employer->slug)); ?>"><i class="fa fa-check-circle"></i> <?php echo e(Helper::getUserName($job->employer->id)); ?></a>
                                                            <h2><a href="<?php echo e(url('job/'.$job->slug)); ?>"><?php echo e($job->title); ?></a></h2>
                                                        </div>
                                                        <div class="wt-description">
                                                            <p><?php echo e(str_limit($description, 200)); ?></p>
                                                        </div>
                                                        <div class="wt-tag wt-widgettag">
                                                            <?php $__currentLoopData = $job->skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <a href="<?php echo e(url('search-results?type=job&skills%5B%5D='.$skill->slug)); ?>"><?php echo e($skill->title); ?></a>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                    </div>
                                                    <div class="wt-viewjobholder">
                                                        <ul>
                                                            <?php if(!empty($job->project_level)): ?>
                                                                <li><span><i class="fa fa-dollar-sign wt-viewjobdollar"></i><?php echo e(Helper::getProjectLevel($job->project_level)); ?></span></li>
                                                            <?php endif; ?>
                                                            <?php if(!empty($job->location->title)): ?>
                                                                <li><span><img src="<?php echo e(asset(Helper::getLocationFlag($job->location->flag))); ?>" alt="<?php echo e(trans('lang.location')); ?>"> <?php echo e($job->location->title); ?></span></li>
                                                            <?php endif; ?>
                                                            <li><span><i class="far fa-folder wt-viewjobfolder"></i><?php echo e(trans('lang.type')); ?> <?php echo e($project_type); ?></span></li>
                                                            <li><span><i class="far fa-clock wt-viewjobclock"></i><?php echo e(Helper::getJobDurationList($job->duration)); ?></span></li>
                                                            <li><span><i class="fa fa-tag wt-viewjobtag"></i><?php echo e(trans('lang.job_id')); ?> <?php echo e($job->code); ?></span></li>
                                                            <?php if(!empty($user->profile->saved_jobs) && in_array($job->id, unserialize($user->profile->saved_jobs))): ?>
                                                                <li style=pointer-events:none;><a href="javascript:void(0);" class="wt-clicklike wt-clicksave"><i class="fa fa-heart"></i> <?php echo e(trans("lang.saved")); ?></a></li>
                                                            <?php else: ?>
                                                                <li>
                                                                    <a href="javascrip:void(0);" class="wt-clicklike" id="job-<?php echo e($job->id); ?>" @click.prevent="add_wishlist('job-<?php echo e($job->id); ?>', <?php echo e($job->id); ?>, 'saved_jobs', '<?php echo e(trans("lang.saved")); ?>')" v-cloak>
                                                                        <i class="fa fa-heart"></i>
                                                                        <span class="save_text"><?php echo e(trans('lang.click_to_save')); ?></span>
                                                                    </a>
                                                                </li>
                                                            <?php endif; ?>
                                                            <li class="wt-btnarea"><a href="<?php echo e(url('job/'.$job->slug)); ?>" class="wt-btn"><?php echo e(trans('lang.view_job')); ?></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php if( method_exists($jobs,'links') ): ?>
                                        <?php echo e($jobs->links('pagination.custom')); ?>

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
    <?php $__env->stopSection(); ?>

<?php echo $__env->make(file_exists(resource_path('views/extend/front-end/master.blade.php')) ? 
'extend.front-end.master':
 'front-end.master', ['body_class' => 'wt-innerbgcolor'] , \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>