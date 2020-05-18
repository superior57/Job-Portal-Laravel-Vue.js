<nav id="wt-profiledashboard" class="wt-usernav">
        <ul>
            <?php if($role === 'admin'): ?>
                <li class="menu-item-has-children">
                    <span class="wt-dropdowarrow"><i class="lnr lnr-chevron-right"></i></span>
                    <a href="javascript:void(0)">
                        <i class="ti-layers"></i>
                        <span><?php echo e(trans('lang.manage_articles')); ?></span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo e(route('articles')); ?>"><?php echo e(trans('lang.articles')); ?></a></li>
                        <li><a href="<?php echo e(route('articleCategories')); ?>"><?php echo e(trans('lang.categories')); ?></a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo e(route('orderList')); ?>">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        <span><?php echo e(trans('lang.orders')); ?></span>
                    </a>
                </li>
                <?php if(Helper::getAccessType() == 'both' || Helper::getAccessType() == 'jobs'): ?>
                    <li>
                        <a href="<?php echo e(route('allJobs')); ?>">
                            <i class="ti-briefcase"></i>
                            <span><?php echo e(trans('lang.all_jobs')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if(Helper::getAccessType() == 'both' || Helper::getAccessType() == 'services'): ?>
                    <li>
                        <a href="<?php echo e(route('allServices')); ?>">
                            <i class="ti-briefcase"></i>
                            <span><?php echo e(trans('lang.services')); ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('ServiceOrders')); ?>">
                            <i class="ti-briefcase"></i>
                            <span><?php echo e(trans('lang.service_orders')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
                <li>
                    <a href="<?php echo e(route('reviewOptions')); ?>">
                        <i class="ti-check-box"></i>
                        <span><?php echo e(trans('lang.review_options')); ?></span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('userListing')); ?>">
                        <i class="ti-user"></i>
                        <span><?php echo e(trans('lang.manage_users')); ?></span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('emailTemplates')); ?>">
                        <i class="ti-email"></i>
                        <span><?php echo e(trans('lang.email_templates')); ?></span>
                    </a>
                </li>
                <li class="menu-item-has-children">
                    <span class="wt-dropdowarrow"><i class="lnr lnr-chevron-right"></i></span>
                    <a href="<?php echo e(route('pages')); ?>">
                        <i class="ti-layers"></i>
                        <span><?php echo e(trans('lang.pages')); ?></span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo e(route('pages')); ?>"><?php echo e(trans('lang.all_pages')); ?></a></li>
                        <li><a href="<?php echo e(route('createPage')); ?>"><?php echo e(trans('lang.add_pages')); ?></a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo e(route('createPackage')); ?>">
                        <i class="ti-package"></i>
                        <span><?php echo e(trans('lang.packages')); ?></span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('adminPayouts')); ?>">
                        <i class="ti-money"></i>
                        <span><?php echo e(trans('lang.payouts')); ?></span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('homePageSettings')); ?>">
                        <i class="ti-home"></i>
                        <span><?php echo e(trans('lang.home_page_settings')); ?></span>
                    </a>
                </li>
                <li class="menu-item-has-children">
                    <span class="wt-dropdowarrow"><i class="lnr lnr-chevron-right"></i></span>
                    <a href="<?php echo e(route('adminProfile')); ?>">
                        <i class="ti-settings"></i>
                        <span><?php echo e(trans('lang.settings')); ?></span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo e(route('adminProfile')); ?>"><?php echo e(trans('lang.acc_settings')); ?></a></li>
                        <li><a href="<?php echo e(route('settings')); ?>"><?php echo e(trans('lang.general_settings')); ?></a></li>
                        <li><a href="<?php echo e(route('resetPassword')); ?>"><?php echo e(trans('lang.reset_pass')); ?></a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <span class="wt-dropdowarrow"><i class="ti-layers"></i></span>
                    <a href="<?php echo e(route('categories')); ?>">
                        <i class="ti-layers"></i>
                        <span><?php echo e(trans('lang.taxonomies')); ?></span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo e(route('skills')); ?>"><?php echo e(trans('lang.skills')); ?></a></li>
                        <li><a href="<?php echo e(route('categories')); ?>"><?php echo e(trans('lang.job_cats')); ?></a></li>
                        <li><a href="<?php echo e(route('departments')); ?>"><?php echo e(trans('lang.dpts')); ?></a></li>
                        <li><a href="<?php echo e(route('languages')); ?>"><?php echo e(trans('lang.langs')); ?></a></li>
                        <li><a href="<?php echo e(route('locations')); ?>"><?php echo e(trans('lang.locations')); ?></a></li>
                        <li><a href="<?php echo e(route('badges')); ?>"><?php echo e(trans('lang.badges')); ?></a></li>
                        <li><a href="<?php echo e(route('deliveryTime')); ?>"><?php echo e(trans('lang.delivery_time')); ?></a></li>
                        <li><a href="<?php echo e(route('ResponseTime')); ?>"><?php echo e(trans('lang.response_time')); ?></a></li>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if($role === 'employer' || $role === 'freelancer' ): ?>
                <li>
                    <a href="<?php echo e(url($role.'/dashboard')); ?>">
                        <i class="ti-desktop"></i>
                        <span><?php echo e(trans('lang.dashboard')); ?></span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('message')); ?>">
                        <i class="ti-envelope"></i>
                        <span><?php echo e(trans('lang.msg_center')); ?></span>
                    </a>
                </li>
                <li class="menu-item-has-children">
                    <span class="wt-dropdowarrow"><i class="lnr lnr-chevron-right"></i></span>
                    <a href="javascript:void(0);">
                        <i class="ti-settings"></i>
                        <span><?php echo e(trans('lang.settings')); ?></span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo e(url($role.'/profile')); ?>"><?php echo e(trans('lang.profile_settings')); ?></a></li>
                        <li><a href="<?php echo e(route('manageAccount')); ?>"><?php echo e(trans('lang.acc_settings')); ?></a></li>
                    </ul>
                </li>
                <?php if($role === 'employer'): ?>
                    <?php if(Helper::getAccessType() == 'both' || Helper::getAccessType() == 'jobs'): ?>
                        <li>
                            <a href="<?php echo e(route('employerPostJob')); ?>">
                                <i class="ti-pencil-alt"></i>
                                <span><?php echo e(trans('lang.post_job')); ?></span>
                            </a>
                        </li>
                        <li class="menu-item-has-children page_item_has_children">
                            <a href="javascript:void(0);">
                                <i class="ti-announcement"></i>
                                <span><?php echo e(trans('lang.jobs')); ?></span>
                            </a>
                            <ul class="sub-menu">
                                <li><a href="<?php echo e(route('employerManageJobs')); ?>"><?php echo e(trans('lang.manage_job')); ?></a></li>
                                <li><a href="<?php echo e(url('employer/jobs/completed')); ?>"><?php echo e(trans('lang.completed_projects')); ?></a></li>
                                <li><a href="<?php echo e(url('employer/jobs/hired')); ?>"><?php echo e(trans('lang.ongoing_projects')); ?></a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <?php if(Helper::getAccessType() == 'both' || Helper::getAccessType() == 'services'): ?>
                        <li class="menu-item-has-children">
                            <span class="wt-dropdowarrow"><i class="lnr lnr-chevron-right"></i></span>
                            <a href="javascript:void(0)">
                                <i class="ti-briefcase"></i>
                                <span><?php echo e(trans('lang.manage_services')); ?></span>
                            </a>
                            <ul class="sub-menu">
                                <li><a href="<?php echo e(url('employer/services/hired')); ?>"><?php echo e(trans('lang.ongoing_services')); ?></a></li>
                                <li><a href="<?php echo e(url('employer/services/completed')); ?>"><?php echo e(trans('lang.completed_services')); ?></a></li>
                                <li><a href="<?php echo e(url('employer/services/cancelled')); ?>"><?php echo e(trans('lang.cancelled_services')); ?></a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <li>
                        <a href="<?php echo e(route('employerPayoutsSettings')); ?>">
                            <i class="ti-money"></i>
                            <span><?php echo e(trans('lang.payouts')); ?></span>
                        </a>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="javascript:void(0);">
                            <i class="ti-file"></i>
                            <span><?php echo e(trans('lang.invoices')); ?></span>
                        </a>
                        <ul class="sub-menu">
                            <?php if($employer_payment_module === 'true' ): ?>
                                <li><a href="<?php echo e(url('employer/package/invoice')); ?>"><?php echo e(trans('lang.pkg_inv')); ?></a></li>
                            <?php endif; ?>    
                            <li><a href="<?php echo e(url('employer/project/invoice')); ?>"><?php echo e(trans('lang.project_inv')); ?></a></li>
                        </ul>
                    </li>
                    <?php if($employer_payment_module === 'true' ): ?>
                        <li>
                            <a href="<?php echo e(url('dashboard/packages/'.$role)); ?>">
                                <i class="ti-package"></i>
                                <span><?php echo e(trans('lang.packages')); ?></span>
                            </a>
                        </li>
                    <?php endif; ?>
                <?php elseif($role === 'freelancer'): ?>
                    <li class="menu-item-has-children page_item_has_children">
                        <a href="javascript:void(0)">
                            <i class="ti-briefcase"></i>
                            <span><?php echo e(trans('lang.all_projects')); ?></span>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="<?php echo e(url('freelancer/jobs/completed')); ?>"><?php echo e(trans('lang.completed_projects')); ?></a></li>
                            <li><a href="<?php echo e(url('freelancer/jobs/cancelled')); ?>"><?php echo e(trans('lang.cancelled_projects')); ?></a></li>
                            <li><a href="<?php echo e(url('freelancer/jobs/hired')); ?>"><?php echo e(trans('lang.ongoing_projects')); ?></a></li>
                        </ul>
                    </li>
                    <?php if(Helper::getAccessType() == 'both' || Helper::getAccessType() == 'services'): ?>
                        <li class="menu-item-has-children">
                            <span class="wt-dropdowarrow"><i class="lnr lnr-chevron-right"></i></span>
                            <a href="javascript:void(0)">
                                <i class="ti-briefcase"></i>
                                <span><?php echo e(trans('lang.manage_services')); ?></span>
                            </a>
                            <ul class="sub-menu">
                                <li><a href="<?php echo e(route('ServiceListing', ['status'=>'posted'])); ?>"><?php echo e(trans('lang.posted_services')); ?></a></li>
                                <li><a href="<?php echo e(route('ServiceListing', ['status'=>'hired'])); ?>"><?php echo e(trans('lang.ongoing_services')); ?></a></li>
                                <li><a href="<?php echo e(route('ServiceListing', ['status'=>'completed'])); ?>"><?php echo e(trans('lang.completed_services')); ?></a></li>
                                <li><a href="<?php echo e(route('ServiceListing', ['status'=>'cancelled'])); ?>"><?php echo e(trans('lang.cancelled_services')); ?></a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <li>
                        <a href="<?php echo e(route('showFreelancerProposals')); ?>">
                            <i class="ti-bookmark-alt"></i>
                            <span><?php echo e(trans('lang.proposals')); ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('FreelancerPayoutsSettings')); ?>">
                            <i class="ti-money"></i>
                            <span><?php echo e(trans('lang.payouts')); ?></span>
                        </a>
                    </li>
                    <?php if($payment_module === 'true' ): ?>
                        <li class="menu-item-has-children">
                            <a href="javascript:void(0);">
                                <i class="ti-file"></i>
                                <span><?php echo e(trans('lang.invoices')); ?></span>
                            </a>
                            <ul class="sub-menu">
                                    <li><a href="<?php echo e(url('freelancer/package/invoice')); ?>"><?php echo e(trans('lang.pkg_inv')); ?></a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo e(url('dashboard/packages/'.$role)); ?>">
                                <i class="ti-package"></i>
                                <span><?php echo e(trans('lang.packages')); ?></span>
                            </a>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
                <li>
                    <a href="<?php echo e(url($role.'/saved-items')); ?>">
                        <i class="ti-heart"></i>
                        <span><?php echo e(trans('lang.saved_items')); ?></span>
                    </a>
                </li>
            <?php endif; ?>
            <li>
                <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('profile-logout-form').submit();">
                    <i class="lnr lnr-exit"></i>
                    <?php echo e(trans('lang.logout')); ?>

                </a>
                <form id="profile-logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                    <?php echo e(csrf_field()); ?>

                </form>
            </li>
        </ul>
    </nav>
