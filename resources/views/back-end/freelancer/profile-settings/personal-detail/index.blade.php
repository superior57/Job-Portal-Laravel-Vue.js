@extends(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master')
@section('content')
    <div class="wt-dbsectionspace wt-haslayout la-ps-freelancer">
        <div class="freelancer-profile" id="user_profile">
            <div class="preloader-section" v-if="loading" v-cloak>
                <div class="preloader-holder">
                    <div class="loader"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
                    <div class="wt-dashboardbox wt-dashboardtabsholder">
                        @if (file_exists(resource_path('views/extend/back-end/freelancer/profile-settings/tabs.blade.php'))) 
                            @include('extend.back-end.freelancer.profile-settings.tabs')
                        @else 
                            @include('back-end.freelancer.profile-settings.tabs')
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
                            <div class="wt-personalskillshold tab-pane active fade show" id="wt-skills">
                                {!! Form::open(['url' => '', 'class' =>'wt-userform', 'id' => 'freelancer_profile', '@submit.prevent'=>'submitFreelancerProfile']) !!}
                                    <div class="wt-yourdetails wt-tabsinfo">
                                        @if (file_exists(resource_path('views/extend/back-end/freelancer/profile-settings/personal-detail/detail.blade.php'))) 
                                            @include('extend.back-end.freelancer.profile-settings.personal-detail.detail')
                                        @else 
                                            @include('back-end.freelancer.profile-settings.personal-detail.detail')
                                        @endif
                                    </div>
                                    <div class="wt-profilephoto wt-tabsinfo">
                                        @if (file_exists(resource_path('views/extend/back-end/freelancer/profile-settings/personal-detail/profile_photo.blade.php'))) 
                                            @include('extend.back-end.freelancer.profile-settings.personal-detail.profile_photo') 
                                        @else 
                                            @include('back-end.freelancer.profile-settings.personal-detail.profile_photo') 
                                        @endif
                                    </div>
                                    @if (!empty($options) && $options['banner_option'] === 'true')
                                        <div class="wt-bannerphoto wt-tabsinfo">
                                            @if (file_exists(resource_path('views/extend/back-end/freelancer/profile-settings/personal-detail/profile_banner.blade.php'))) 
                                                @include('extend.back-end.freelancer.profile-settings.personal-detail.profile_banner')
                                            @else 
                                                @include('back-end.freelancer.profile-settings.personal-detail.profile_banner')
                                            @endif    
                                        </div>
                                    @endif
                                    <div class="wt-location wt-tabsinfo">
                                        @if (file_exists(resource_path('views/extend/back-end/freelancer/profile-settings/personal-detail/location.blade.php'))) 
                                            @include('extend.back-end.freelancer.profile-settings.personal-detail.location')
                                        @else 
                                            @include('back-end.freelancer.profile-settings.personal-detail.location')
                                        @endif
                                    </div>
                                    <div class="wt-skills la-skills-holder wt-tabsinfo">
                                        @if (file_exists(resource_path('views/extend/back-end/freelancer/profile-settings/personal-detail/skill.blade.php'))) 
                                            @include('extend.back-end.freelancer.profile-settings.personal-detail.skill')   
                                        @else 
                                            @include('back-end.freelancer.profile-settings.personal-detail.skill')   
                                        @endif 
                                    </div>
                                    <div class="wt-videos-holder wt-tabsinfo la-footer-setting">
                                        @if (file_exists(resource_path('views/extend/back-end/freelancer/profile-settings/personal-detail/videos.blade.php'))) 
                                            @include('extend.back-end.freelancer.profile-settings.personal-detail.videos')   
                                        @else 
                                            @include('back-end.freelancer.profile-settings.personal-detail.videos')   
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
    </div>
@endsection
