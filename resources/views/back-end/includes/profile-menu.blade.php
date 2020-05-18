<nav id="wt-profiledashboard" class="wt-usernav">
        <ul>
            @if ($role === 'admin')
                <li class="menu-item-has-children">
                    <span class="wt-dropdowarrow"><i class="lnr lnr-chevron-right"></i></span>
                    <a href="javascript:void(0)">
                        <i class="ti-layers"></i>
                        <span>{{ trans('lang.manage_articles') }}</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{{ route('articles') }}}">{{ trans('lang.articles') }}</a></li>
                        <li><a href="{{{ route('articleCategories') }}}">{{ trans('lang.categories') }}</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{{ route('orderList') }}}">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        <span>{{ trans('lang.orders') }}</span>
                    </a>
                </li>
                @if (Helper::getAccessType() == 'both' || Helper::getAccessType() == 'jobs')
                    <li>
                        <a href="{{{ route('allJobs') }}}">
                            <i class="ti-briefcase"></i>
                            <span>{{ trans('lang.all_jobs') }}</span>
                        </a>
                    </li>
                @endif
                @if (Helper::getAccessType() == 'both' || Helper::getAccessType() == 'services')
                    <li>
                        <a href="{{{ route('allServices') }}}">
                            <i class="ti-briefcase"></i>
                            <span>{{ trans('lang.services') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{{ route('ServiceOrders') }}}">
                            <i class="ti-briefcase"></i>
                            <span>{{ trans('lang.service_orders') }}</span>
                        </a>
                    </li>
                @endif
                <li>
                    <a href="{{{ route('reviewOptions') }}}">
                        <i class="ti-check-box"></i>
                        <span>{{ trans('lang.review_options') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{{ route('userListing') }}}">
                        <i class="ti-user"></i>
                        <span>{{ trans('lang.manage_users') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{{ route('emailTemplates') }}}">
                        <i class="ti-email"></i>
                        <span>{{ trans('lang.email_templates') }}</span>
                    </a>
                </li>
                <li class="menu-item-has-children">
                    <span class="wt-dropdowarrow"><i class="lnr lnr-chevron-right"></i></span>
                    <a href="{{{ route('pages') }}}">
                        <i class="ti-layers"></i>
                        <span>{{ trans('lang.pages') }}</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{{ route('pages') }}}">{{ trans('lang.all_pages') }}</a></li>
                        <li><a href="{{{ route('createPage') }}}">{{ trans('lang.add_pages') }}</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{{ route('createPackage') }}}">
                        <i class="ti-package"></i>
                        <span>{{ trans('lang.packages') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{{ route('adminPayouts') }}}">
                        <i class="ti-money"></i>
                        <span>{{ trans('lang.payouts') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{{ route('homePageSettings') }}}">
                        <i class="ti-home"></i>
                        <span>{{ trans('lang.home_page_settings') }}</span>
                    </a>
                </li>
                <li class="menu-item-has-children">
                    <span class="wt-dropdowarrow"><i class="lnr lnr-chevron-right"></i></span>
                    <a href="{{{ route('adminProfile') }}}">
                        <i class="ti-settings"></i>
                        <span>{{ trans('lang.settings') }}</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{{ route('adminProfile') }}}">{{ trans('lang.acc_settings') }}</a></li>
                        <li><a href="{{{ route('settings') }}}">{{ trans('lang.general_settings') }}</a></li>
                        <li><a href="{{{ route('resetPassword') }}}">{{ trans('lang.reset_pass') }}</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <span class="wt-dropdowarrow"><i class="ti-layers"></i></span>
                    <a href="{{{ route('categories') }}}">
                        <i class="ti-layers"></i>
                        <span>{{ trans('lang.taxonomies') }}</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{{ route('skills') }}}">{{ trans('lang.skills') }}</a></li>
                        <li><a href="{{{ route('categories') }}}">{{ trans('lang.job_cats') }}</a></li>
                        <li><a href="{{{ route('departments') }}}">{{ trans('lang.dpts') }}</a></li>
                        <li><a href="{{{ route('languages') }}}">{{ trans('lang.langs') }}</a></li>
                        <li><a href="{{{ route('locations') }}}">{{ trans('lang.locations') }}</a></li>
                        <li><a href="{{{ route('badges') }}}">{{ trans('lang.badges') }}</a></li>
                        <li><a href="{{{ route('deliveryTime') }}}">{{ trans('lang.delivery_time') }}</a></li>
                        <li><a href="{{{ route('ResponseTime') }}}">{{ trans('lang.response_time') }}</a></li>
                    </ul>
                </li>
            @endif
            @if ($role === 'employer' || $role === 'freelancer' )
                <li>
                    <a href="{{{ url($role.'/dashboard') }}}">
                        <i class="ti-desktop"></i>
                        <span>{{ trans('lang.dashboard') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{{ route('message') }}}">
                        <i class="ti-envelope"></i>
                        <span>{{ trans('lang.msg_center') }}</span>
                    </a>
                </li>
                <li class="menu-item-has-children">
                    <span class="wt-dropdowarrow"><i class="lnr lnr-chevron-right"></i></span>
                    <a href="javascript:void(0);">
                        <i class="ti-settings"></i>
                        <span>{{ trans('lang.settings') }}</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{{ url($role.'/profile') }}}">{{ trans('lang.profile_settings') }}</a></li>
                        <li><a href="{{{ route('manageAccount') }}}">{{ trans('lang.acc_settings') }}</a></li>
                    </ul>
                </li>
                @if ($role === 'employer')
                    @if (Helper::getAccessType() == 'both' || Helper::getAccessType() == 'jobs')
                        <li>
                            <a href="{{{ route('employerPostJob') }}}">
                                <i class="ti-pencil-alt"></i>
                                <span>{{{ trans('lang.post_job') }}}</span>
                            </a>
                        </li>
                        <li class="menu-item-has-children page_item_has_children">
                            <a href="javascript:void(0);">
                                <i class="ti-announcement"></i>
                                <span>{{ trans('lang.jobs') }}</span>
                            </a>
                            <ul class="sub-menu">
                                <li><a href="{{{ route('employerManageJobs') }}}">{{ trans('lang.manage_job') }}</a></li>
                                <li><a href="{{{ url('employer/jobs/completed') }}}">{{ trans('lang.completed_projects') }}</a></li>
                                <li><a href="{{{ url('employer/jobs/hired') }}}">{{ trans('lang.ongoing_projects') }}</a></li>
                            </ul>
                        </li>
                    @endif
                    @if (Helper::getAccessType() == 'both' || Helper::getAccessType() == 'services')
                        <li class="menu-item-has-children">
                            <span class="wt-dropdowarrow"><i class="lnr lnr-chevron-right"></i></span>
                            <a href="javascript:void(0)">
                                <i class="ti-briefcase"></i>
                                <span>{{ trans('lang.manage_services') }}</span>
                            </a>
                            <ul class="sub-menu">
                                <li><a href="{{{ url('employer/services/hired') }}}">{{ trans('lang.ongoing_services') }}</a></li>
                                <li><a href="{{{ url('employer/services/completed') }}}">{{ trans('lang.completed_services') }}</a></li>
                                <li><a href="{{{ url('employer/services/cancelled') }}}">{{ trans('lang.cancelled_services') }}</a></li>
                            </ul>
                        </li>
                    @endif
                    <li>
                        <a href="{{{ route('employerPayoutsSettings') }}}">
                            <i class="ti-money"></i>
                            <span>{{ trans('lang.payouts') }}</span>
                        </a>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="javascript:void(0);">
                            <i class="ti-file"></i>
                            <span>{{ trans('lang.invoices') }}</span>
                        </a>
                        <ul class="sub-menu">
                            @if ($employer_payment_module === 'true' )
                                <li><a href="{{{ url('employer/package/invoice') }}}">{{ trans('lang.pkg_inv') }}</a></li>
                            @endif    
                            <li><a href="{{{ url('employer/project/invoice') }}}">{{ trans('lang.project_inv') }}</a></li>
                        </ul>
                    </li>
                    @if ($employer_payment_module === 'true' )
                        <li>
                            <a href="{{{ url('dashboard/packages/'.$role) }}}">
                                <i class="ti-package"></i>
                                <span>{{ trans('lang.packages') }}</span>
                            </a>
                        </li>
                    @endif
                @elseif ($role === 'freelancer')
                    <li class="menu-item-has-children page_item_has_children">
                        <a href="javascript:void(0)">
                            <i class="ti-briefcase"></i>
                            <span>{{ trans('lang.all_projects') }}</span>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="{{{ url('freelancer/jobs/completed') }}}">{{ trans('lang.completed_projects') }}</a></li>
                            <li><a href="{{{ url('freelancer/jobs/cancelled') }}}">{{ trans('lang.cancelled_projects') }}</a></li>
                            <li><a href="{{{ url('freelancer/jobs/hired') }}}">{{ trans('lang.ongoing_projects') }}</a></li>
                        </ul>
                    </li>
                    @if (Helper::getAccessType() == 'both' || Helper::getAccessType() == 'services')
                        <li class="menu-item-has-children">
                            <span class="wt-dropdowarrow"><i class="lnr lnr-chevron-right"></i></span>
                            <a href="javascript:void(0)">
                                <i class="ti-briefcase"></i>
                                <span>{{ trans('lang.manage_services') }}</span>
                            </a>
                            <ul class="sub-menu">
                                <li><a href="{{{ route('ServiceListing', ['status'=>'posted']) }}}">{{ trans('lang.posted_services') }}</a></li>
                                <li><a href="{{{ route('ServiceListing', ['status'=>'hired']) }}}">{{ trans('lang.ongoing_services') }}</a></li>
                                <li><a href="{{{ route('ServiceListing', ['status'=>'completed']) }}}">{{ trans('lang.completed_services') }}</a></li>
                                <li><a href="{{{ route('ServiceListing', ['status'=>'cancelled']) }}}">{{ trans('lang.cancelled_services') }}</a></li>
                            </ul>
                        </li>
                    @endif
                    <li>
                        <a href="{{{ route('showFreelancerProposals') }}}">
                            <i class="ti-bookmark-alt"></i>
                            <span>{{ trans('lang.proposals') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{{ route('FreelancerPayoutsSettings') }}}">
                            <i class="ti-money"></i>
                            <span>{{ trans('lang.payouts') }}</span>
                        </a>
                    </li>
                    @if ($payment_module === 'true' )
                        <li class="menu-item-has-children">
                            <a href="javascript:void(0);">
                                <i class="ti-file"></i>
                                <span>{{ trans('lang.invoices') }}</span>
                            </a>
                            <ul class="sub-menu">
                                    <li><a href="{{{ url('freelancer/package/invoice') }}}">{{ trans('lang.pkg_inv') }}</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{{ url('dashboard/packages/'.$role) }}}">
                                <i class="ti-package"></i>
                                <span>{{ trans('lang.packages') }}</span>
                            </a>
                        </li>
                    @endif
                @endif
                <li>
                    <a href="{{{ url($role.'/saved-items') }}}">
                        <i class="ti-heart"></i>
                        <span>{{ trans('lang.saved_items') }}</span>
                    </a>
                </li>
            @endif
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('profile-logout-form').submit();">
                    <i class="lnr lnr-exit"></i>
                    {{{trans('lang.logout')}}}
                </a>
                <form id="profile-logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </nav>
