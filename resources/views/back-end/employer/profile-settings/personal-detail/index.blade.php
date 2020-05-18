@extends(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master')
@section('content')
    <div class="freelancer-profile wt-dbsectionspace" id="user_profile">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
                <div class="wt-dashboardbox wt-dashboardtabsholder">
                    @if (file_exists(resource_path('views/extend/back-end/employer/profile-settings/tabs.blade.php')))
                        @include('extend.back-end.employer.profile-settings.tabs')
                    @else
                        @include('back-end.employer.profile-settings.tabs')
                    @endif
                    <div class="wt-tabscontent tab-content">
                        @if (Session::has('message'))
                            <div class="flash_msg">
                                <flash_messages :message_class="'success'" :time ='5' :message="'{{{ Session::get('message') }}}'" v-cloak></flash_messages>
                            </div>
                        @endif
                        @if ($errors->any())
                            <ul class="wt-jobalerts">
                                @foreach ($errors->all() as $error)
                                    <div class="flash_msg">
                                        <flash_messages :message_class="'danger'" :time ='10' :message="'{{{ $error }}}'" v-cloak></flash_messages>
                                    </div>
                                @endforeach
                            </ul>
                        @endif
                        <div class="wt-personalskillshold lare-employer-profile tab-pane active fade show" id="wt-profile">
                            {!! Form::open(['url' => url('employer/store-profile-settings'), 'class' =>'wt-userform', 'id' => 'employer_data', '@submit.prevent' => 'submitEmployerProfile']) !!}
                                <div class="wt-yourdetails wt-tabsinfo">
                                    @if (file_exists(resource_path('views/extend/back-end/employer/profile-settings/personal-detail/detail.blade.php')))
                                        @include('extend.back-end.employer.profile-settings.personal-detail.detail')
                                    @else
                                        @include('back-end.employer.profile-settings.personal-detail.detail')
                                    @endif
                                </div>
                                <div class="wt-profilephoto wt-tabsinfo">
                                    @if (file_exists(resource_path('views/extend/back-end/employer/profile-settings/personal-detail/profile_photo.blade.php')))
                                        @include('extend.back-end.employer.profile-settings.personal-detail.profile_photo')
                                    @else
                                        @include('back-end.employer.profile-settings.personal-detail.profile_photo')
                                    @endif
                                </div>
                                <div class="wt-bannerphoto wt-tabsinfo">
                                    @if (file_exists(resource_path('views/extend/back-end/employer/profile-settings/personal-detail/profile_banner.blade.php')))
                                        @include('extend.back-end.employer.profile-settings.personal-detail.profile_banner')
                                    @else
                                        @include('back-end.employer.profile-settings.personal-detail.profile_banner')
                                    @endif
                                </div>
                                @if($show_emplyr_inn_sec === 'true')
                                    <div class="wt-skills">
                                        @if (file_exists(resource_path('views/extend/back-end/employer/profile-settings/personal-detail/employer-detail.blade.php')))
                                            @include('extend.back-end.employer.profile-settings.personal-detail.employer-detail')
                                        @else
                                            @include('back-end.employer.profile-settings.personal-detail.employer-detail')
                                        @endif
                                    </div>
                                @endif
                                <div class="wt-location wt-tabsinfo">
                                    @if (file_exists(resource_path('views/extend/back-end/employer/profile-settings/personal-detail/location.blade.php')))
                                        @include('extend.back-end.employer.profile-settings.personal-detail.location')
                                    @else
                                        @include('back-end.employer.profile-settings.personal-detail.location')
                                    @endif
                                </div>
                                <div class="wt-updatall">
                                    <i class="ti-announcement"></i>
                                    <span>{{{ trans('lang.save_changes_note') }}}</span>
                                    {!! Form::submit(trans('lang.btn_save_update'), ['class' => 'wt-btn', 'id'=>'submit-profile']) !!}
                                </div>
                            {!! form::close(); !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
