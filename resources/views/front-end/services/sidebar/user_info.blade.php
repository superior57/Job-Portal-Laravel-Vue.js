<div class="wt-widget la-empinfo-holder wt-user-service">
    <div class="wt-companysdetails">
        <figure class="wt-companysimg">
            <img src="{{{ asset(Helper::getUserProfileBanner($seller->id, 'small')) }}}" alt="{{ trans('lang.profile_img') }}">
        </figure>
        <div class="wt-companysinfo">
            <figure><img src="{{{asset(Helper::getProfileImage($seller->id))}}}" alt="{{ trans('lang.profile_img') }}"></figure>
            <div class="wt-userprofile">
                <div class="wt-title">
                    <h3>			
                        <a href="{{{ url('profile/'.$seller->slug) }}}">
                            @if ($seller->user_verified === 1) <i class="fa fa-check-circle"></i> @endif &nbsp;{{{ Helper::getUserName($seller->id) }}}
                        </a>
                    </h3>
                    {{ trans('lang.member_since') }}&nbsp;{{  \Carbon\Carbon::parse($seller->created_at)->format('Y-m-d') }}	<a href="javascript:;">@ {{$seller->slug}}</a> 
                    <a href="{{{ url('profile/'.$seller->slug) }}}" class="wt-btn">View Profile</a>
                </div>
            </div>
        </div>
    </div>
</div>
