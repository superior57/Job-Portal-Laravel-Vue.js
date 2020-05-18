<div class="wt-dashboardtabs">
    <ul class="wt-tabstitle nav navbar-nav">
        <li class="nav-item">
            <a class="{{{ \Request::route()->getName()==='FreelancerPayoutsSettings'? 'active': '' }}}" href="{{{ route('FreelancerPayoutsSettings') }}}">{{{ trans('lang.payout_settings') }}}</a>
        </li>
        <li class="nav-item">
            <a class="{{{ \Request::route()->getName()==='getFreelancerPayouts'? 'active': '' }}}" href="{{{ route('getFreelancerPayouts') }}}">{{{ trans('lang.payouts') }}}</a>
        </li>
    </ul>
</div>