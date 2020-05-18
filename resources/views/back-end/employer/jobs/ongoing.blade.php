@extends(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master')
@section('content')
    @if (session()->has('type'))
        @php session()->forget('type'); @endphp
    @endif
    <div class="wt-haslayout wt-dbsectionspace">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="wt-dashboardbox">
                    <div class="wt-dashboardboxtitle">
                        <h2>{{ trans('lang.ongoing_jobs') }}</h2>
                    </div>
                    <div class="wt-dashboardboxcontent wt-jobdetailsholder">
                        <div class="wt-freelancerholder">
                            @if(!empty($ongoing_jobs) && $ongoing_jobs->count() > 0)
                                <div class="wt-managejobcontent wt-verticalscrollbar mCustomScrollbar _mCS_1">
                                    @foreach ($ongoing_jobs as $job)
                                        @php
                                            $accepted_proposal = array();
                                            $duration  =  \App\Helper::getJobDurationList($job->duration);
                                            $user_name = $job->employer->first_name.' '.$job->employer->last_name;
                                            $accepted_proposal = \App\Job::find($job->id)->proposals()->where('status', 'hired')->first();
                                            $freelancer_name = \App\Helper::getUserName($accepted_proposal->freelancer_id);
                                            $profile = \App\User::find($accepted_proposal->freelancer_id)->profile;
                                            $user_image = !empty($profile) ? $profile->avater : '';
                                            $profile_image = !empty($user_image) ? '/uploads/users/'.$accepted_proposal->freelancer_id.'/'.$user_image : 'images/user-login.png';
                                            $verified_user = \App\User::select('user_verified')->where('id', $job->employer->id)->pluck('user_verified')->first();
                                            $project_type  = Helper::getProjectTypeList($job->project_type);
                                        @endphp
                                        <div class="wt-userlistinghold wt-featured wt-userlistingvtwo">
                                            @if (!empty($job->is_featured) && $job->is_featured === 'true')
                                                <span class="wt-featuredtag"><img src="{{{ asset('images/featured.png') }}}" alt="{{ trans('lang.is_featured') }}" data-tipso="Plus Member" class="template-content tipso_style"></span>
                                            @endif
                                            <div class="wt-userlistingcontent">
                                                <div class="wt-contenthead">
                                                    @if (!empty($user_name) || !empty($job->title) )
                                                        <div class="wt-title">
                                                            @if (!empty($user_name))
                                                                <a href="{{{ url('profile/'.$job->employer->slug) }}}">@if($verified_user === 1)<i class="fa fa-check-circle"></i>@endif&nbsp;{{{ $user_name }}}</a>
                                                            @endif
                                                            @if (!empty($job->title))
                                                                <h2>{{{ $job->title }}}</h2>
                                                            @endif
                                                        </div>
                                                    @endif
                                                    @if (!empty($job->price) ||
                                                        !empty($job->location->title)  ||
                                                        !empty($job->project_type) ||
                                                        !empty($job->duration)
                                                        )
                                                        <ul class="wt-saveitem-breadcrumb wt-userlisting-breadcrumb">
                                                            @if (!empty($job->price))
                                                                <li><span class="wt-dashboraddoller"><i>{{ !empty($symbol) ? $symbol['symbol'] : '$' }}</i> {{{ $job->price }}}</span></li>
                                                            @endif
                                                            @if (!empty($job->location->title))
                                                                <li><span><img src="{{{asset(App\Helper::getLocationFlag($job->location->flag))}}}" alt="{{{ trans('lang.locations') }}}"> {{{ $job->location->title }}}</span></li>
                                                            @endif
                                                            @if (!empty($job->project_type))
                                                                <li><a href="javascript:void(0);" class="wt-clicksavefolder"><i class="far fa-folder"></i> {{ trans('lang.type') }} {{{ $project_type }}}</a></li>
                                                            @endif
                                                            @if (!empty($job->duration))
                                                                <li><span class="wt-dashboradclock"><i class="far fa-clock"></i> {{ trans('lang.duration') }} {{{ $duration }}}</span></li>
                                                            @endif
                                                        </ul>
                                                    @endif
                                                </div>
                                                <div class="wt-rightarea">
                                                    <div class="wt-btnarea">
                                                        <a href="{{{ url('proposal/'.$job->slug.'/'.$job->status) }}}" class="wt-btn">{{ trans('lang.view_detail') }}</a>
                                                    </div>
                                                    <div class="wt-hireduserstatus">
                                                        <h4>{{ trans('lang.hired') }}</h4><span>{{{ $freelancer_name }}}</span>
                                                        <ul class="wt-hireduserimgs">
                                                            <li><figure><img src="{{{ asset($profile_image) }}}" alt="{{{ trans('lang.freelancer') }}}"></figure></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                @if (file_exists(resource_path('views/extend/errors/no-record.blade.php'))) 
                                    @include('extend.errors.no-record')
                                @else 
                                    @include('errors.no-record')
                                @endif
                            @endif
                        </div>
                    </div>
                    @if ( method_exists($ongoing_jobs,'links') )
                        {{ $ongoing_jobs->links('pagination.custom') }}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
