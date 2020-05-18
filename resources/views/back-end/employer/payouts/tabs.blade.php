<div class="wt-dashboardtabs">
    <ul class="wt-tabstitle nav navbar-nav">
        <li class="nav-item">
            <a class="{{{ \Request::route()->getName()==='employerPayoutsSettings'? 'active': '' }}}" href="{{{ route('employerPayoutsSettings') }}}">{{{ trans('lang.payout_settings') }}}</a>
        </li>
        <li class="nav-item">
            <a class="{{{ \Request::route()->getName()==='getEmployerPayouts'? 'active': '' }}}" href="{{{ route('getEmployerPayouts') }}}">{{{ trans('lang.payouts') }}}</a>
        </li>
    </ul>
</div>