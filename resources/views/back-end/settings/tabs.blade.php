@php 
    $curr_user_id = !empty(Auth::user()) ? Auth::user()->id : '';
    $role_type = App\User::getUserRoleType($curr_user_id);
@endphp
<div class="wt-dashboardtabs">
    <ul class="wt-tabstitle nav navbar-nav">
        @if (!empty($role_type) && $role_type->name <> 'admin' )
            <li class="nav-item">
                <a class="{{{ \Request::route()->getName()==='manageAccount'? 'active': '' }}}" href="{{{ route('manageAccount') }}}">{{{ trans('lang.manage_account') }}}</a>
            </li>
            <li class="nav-item">
                <a class="{{{ \Request::route()->getName()==='emailNotificationSettings'? 'active': '' }}}" href="{{{ route('emailNotificationSettings') }}}">{{{ trans('lang.email_notify') }}}</a>
            </li>
            <li class="nav-item">
                <a class="{{{ \Request::route()->getName()==='deleteAccount'? 'active': '' }}}" href="{{{ route('deleteAccount') }}}">{{{ trans('lang.delete_account') }}}</a>
            </li>
        @endif
        <li class="nav-item">
            <a class="{{{ \Request::route()->getName()==='resetPassword'? 'active': '' }}}" href="{{{ route('resetPassword') }}}">{{{ trans('lang.reset_pass') }}}</a>
        </li>
    </ul>
</div>