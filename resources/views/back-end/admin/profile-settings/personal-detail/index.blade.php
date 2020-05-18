@extends(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master')
@section('content')
    <div class="freelancer-profile wt-dbsectionspace la-admin-details" id="user_profile">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
                <div class="wt-dashboardbox wt-dashboardtabsholder">
                    <div class="wt-dashboardtabs">
                        <ul class="wt-tabstitle nav navbar-nav">
                            <li class="nav-item">
                                <a class="{{{ \Request::route()->getName()==='adminProfile'? 'active': '' }}}" href="{{{ route('adminProfile') }}}">{{{ trans('lang.admin_detail') }}}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="wt-tabscontent tab-content">
                        @if (Session::has('message'))
                            <div class="flash_msg">
                                <flash_messages :message_class="'success'" :time='5' :message="'{{{ Session::get('message') }}}'" v-cloak></flash_messages>
                            </div>
                        @endif
                        @if ($errors->any())
                            <ul class="wt-jobalerts">
                                @foreach ($errors->all() as $error)
                                    <div class="flash_msg">
                                        <flash_messages :message_class="'danger'" :time='10' :message="'{{{ $error }}}'" v-cloak></flash_messages>
                                    </div>
                                @endforeach
                            </ul>
                        @endif
                        <div class="wt-personalskillshold tab-pane active show">
                            {!! Form::open(['url' => '', 'class' =>'wt-userform', 'id' => 'admin_data', '@submit.prevent' => 'submitAdminProfile']) !!}
                                <div class="wt-yourdetails wt-tabsinfo">
                                    <div class="wt-tabscontenttitle">
                                        <h2>{{{ trans('lang.your_details') }}}</h2>
                                    </div>
                                    <div class="lara-detail-form">
                                        <fieldset>
                                            <div class="form-group form-group-half">
                                                {!! Form::text( 'first_name', e(Auth::user()->first_name), ['class' =>'form-control', 'placeholder' => trans('lang.ph_first_name')]) !!}
                                            </div>
                                            <div class="form-group form-group-half">
                                                {!! Form::text( 'last_name', e(Auth::user()->last_name), ['class' =>'form-control', 'placeholder' => trans('lang.ph_last_name')]) !!}
                                            </div>
                                            <div class="form-group">
                                                {!! Form::email('email', e(Auth::user()->email), array('class' => 'form-control', 'placeholder' => trans('lang.ph_email'))) !!}
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="wt-profilephoto wt-tabsinfo">
                                    @if (file_exists(resource_path('views/extend/back-end/admin/profile-settings/personal-detail/profile_photo.blade.php'))) 
                                        @include('extend.back-end.admin.profile-settings.personal-detail.profile_photo')
                                    @else 
                                        @include('back-end.admin.profile-settings.personal-detail.profile_photo')
                                    @endif
                                </div>
                                <div class="wt-bannerphoto wt-tabsinfo">
                                    @if (file_exists(resource_path('views/extend/back-end/admin/profile-settings/personal-detail/profile_banner.blade.php'))) 
                                        @include('extend.back-end.admin.profile-settings.personal-detail.profile_banner')
                                    @else 
                                        @include('back-end.admin.profile-settings.personal-detail.profile_banner')
                                    @endif
                                </div>
                                <div class="wt-updatall la-updateall-holder">
                                    <i class="ti-announcement"></i>
                                    <span>{{{ trans('lang.save_changes_note') }}}</span> {!! Form::submit(trans('lang.btn_save_update'),
                                    ['class' => 'wt-btn', 'id'=>'submit-profile']) !!}
                                </div>
                            {!! form::close(); !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
