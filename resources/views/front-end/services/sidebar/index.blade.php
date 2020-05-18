<aside id="wt-sidebar" class="wt-sidebar">
    @if (file_exists(resource_path('views/extend/front-end/services/sidebar/service_info.blade.php'))) 
        @include('extend.front-end.services.sidebar.service_info')
    @else 
        @include('front-end.services.sidebar.service_info')
    @endif
    @if (!empty($seller))
        @if (file_exists(resource_path('views/extend/front-end/services/sidebar/user_info.blade.php'))) 
            @include('extend.front-end.services.sidebar.user_info')
        @else 
            @include('front-end.services.sidebar.user_info')
        @endif
    @endif
    @if (file_exists(resource_path('views/extend/front-end/services/sidebar/qrcode.blade.php'))) 
        @include('extend.front-end.services.sidebar.qrcode')
    @else 
        @include('front-end.services.sidebar.qrcode')
    @endif
    @if (file_exists(resource_path('views/extend/front-end/services/sidebar/social-share.blade.php'))) 
        @include('extend.front-end.services.sidebar.social-share')
    @else 
        @include('front-end.services.sidebar.social-share')
    @endif
    @if (file_exists(resource_path('views/extend/front-end/services/sidebar/report.blade.php'))) 
        @include('extend.front-end.services.sidebar.report')
    @else 
        @include('front-end.services.sidebar.report')
    @endif
</aside>
