@extends(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master')
@section('content')
    <div class="wt-haslayout wt-email-notification-settings wt-dbsectionspace" id="profile_settings">
        @if (Session::has('message'))
            <div class="flash_msg">
                <flash_messages :message_class="'success'" :time ='5' :message="'{{{ Session::get('message') }}}'" v-cloak></flash_messages>
            </div>
        @endif
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9">
                <div class="wt-dashboardbox wt-dashboardtabsholder wt-accountsettingholder">
                    @if (file_exists(resource_path('views/extend/back-end/settings/tabs.blade.php'))) 
                        @include('extend.back-end.settings.tabs')
                    @else 
                        @include('back-end.settings.tabs')
                    @endif
                    <div class="wt-tabscontent tab-content">
                        <div class="wt-emailnotiholder" id="wt-emailnoti">
                            <div class="wt-emailnoti">
                                <div class="wt-tabscontenttitle">
                                    <h2>{{{ trans('lang.manage_email_notifications') }}}</h2>
                                </div>
                                <div class="wt-settingscontent">
                                    <div class="wt-description">
                                        <p>{{{ trans('lang.email_notifications_note') }}}</p>
                                    </div>
                                    {!! Form::open(['url' => url('profile/settings/save-email-settings'), 'class' =>'wt-formtheme wt-userform', 'id'=>'notifications'])!!}
                                        <fieldset>
                                            <div class="form-group form-disabeld">
                                                <input type="email" name="user_email" class="form-control" placeholder="{{{ $user_email }}}" disabled="">
                                            </div>
                                        </fieldset>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
