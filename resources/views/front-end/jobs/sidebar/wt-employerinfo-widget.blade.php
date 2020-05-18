<div class="wt-widget la-empinfo-holder">
    <div class="wt-companysdetails">
        <figure class="wt-companysimg">
            <img src="{{{ asset(Helper::getUserProfileBanner($job->employer->id, 'small')) }}}" alt="{{ trans('lang.profile_img') }}">
        </figure>
        <div class="wt-companysinfo">
            <figure><img src="{{{asset(Helper::getProfileImage($job->employer->id))}}}" alt="{{ trans('lang.profile_img') }}"></figure>
            <div class="wt-title">
                @if ($job->employer->user_verified === 1)
                    <a href="{{{ url('profile/'.$job->employer->slug) }}}"><i class="fa fa-check-circle"></i> {{ trans('lang.verified_company') }}</a>
                @endif
                <a href="{{{ url('profile/'.$job->employer->slug) }}}"><h2>{{{ Helper::getUserName($job->employer->id) }}}</h2></a>
            </div>
            <ul class="wt-postarticlemeta">
                <li>
                    <a href="{{{ url('profile/'.$job->employer->slug) }}}">
                        <span>{{ trans('lang.open_jobs') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{{ url('profile/'.$job->employer->slug) }}}">
                        <span>{{ trans('lang.full_profile') }}</span>
                    </a>
                </li>
                @if (!empty($save_employers))
                    <li class="wt-btndisbaled">
                        <a href="javascript:void(0);">
                            <span v-cloak>{{trans("lang.following")}}</span>
                        </a>
                    </li>
                @else
                    <li v-bind:class="disable_follow">
                        <a href="javascript:void(0);" id="profile-{{$job->employer->id}}" @click.prevent="add_wishlist('profile-{{$job->employer->id}}', {{$job->employer->id}}, 'saved_employers', '{{trans("lang.following")}}')" v-cloak>
                            <span v-cloak>@{{follow_text}}</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
