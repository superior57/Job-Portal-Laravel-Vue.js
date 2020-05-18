@extends(file_exists(resource_path('views/extend/front-end/master.blade.php')) ? 
'extend.front-end.master':
 'front-end.master', ['body_class' => 'wt-innerbgcolor'] )
@section('content')
    @php $breadcrumbs = Breadcrumbs::generate('employerJobs', $slug); @endphp
    <div class="wt-haslayout wt-innerbannerholder">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-xs-12 col-sm-12 col-md-8 push-md-2 col-lg-6 push-lg-3">
                    <div class="wt-innerbannercontent">
                        <div class="wt-title"><h2>Search Result</h2></div>
                        <ol class="wt-breadcrumb">
                            @foreach ($breadcrumbs as $breadcrumb)
                                @if ($breadcrumb->url && !$loop->last)
                                    <li><a href="{{{ $breadcrumb->url }}}">{{{ $breadcrumb->title }}}</a></li>
                                @else
                                    <li class="active">{{{ $breadcrumb->title }}}</li>
                                @endif
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wt-haslayout wt-main-section" id="jobs">
        <div class="wt-haslayout">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-12 col-xl-12 float-left">
                        <div class="wt-userlistingholder wt-haslayout">
                            @if (!empty($jobs))
                                @foreach ($jobs as $job)
                                    @php
                                        $description = strip_tags(stripslashes($job->description));
                                        $featured_class = $job->is_featured == 'true' ? 'wt-featured' : '';
                                        $user = \App\User::find(Auth::user()->id);
                                        $save_jobs = !empty($user->profile->saved_jobs) ? unserialize($user->profile->saved_jobs) : array();
                                        $save_class = !empty($save_jobs) && in_array($job->id, $save_jobs) ? 'wt-clicksave' :'';
                                        $save_text = !empty($save_jobs) && in_array($job->id, $save_jobs) ? 'Save' :'Click to Save';
                                        $save_style = !empty($save_jobs) && in_array($job->id, $save_jobs) ? 'style=pointer-events:none;' :'Click to Save';
                                        $verified_user = \App\User::select('user_verified')->where('id', $job->employer->id)->pluck('user_verified')->first();
                                        $project_type  = Helper::getProjectTypeList($job->project_type);
                                    @endphp
                                    <div class="wt-userlistinghold wt-userlistingholdvtwo {{$featured_class}}">
                                        @if ($job->is_featured == 'true')
                                            <span class="wt-featuredtag"><img src="{{{ asset('images/featured.png') }}}" alt="{{{ trans('ph.is_featured') }}}" data-tipso="Plus Member" class="template-content tipso_style"></span>
                                        @endif
                                        <div class="wt-userlistingcontent">
                                            <div class="wt-contenthead">
                                                <div class="wt-title">
                                                    <a href="{{{ url('profile/'.$job->employer->slug) }}}">@if($verified_user === 1)<i class="fa fa-check-circle"></i>@endif {{{$job->employer->first_name.' '.$job->employer->last_name}}}</a>
                                                    <h2>{{{$job->title}}}</h2>
                                                </div>
                                                <div class="wt-description">
                                                    <p>{{str_limit($description, 300)}}</p>
                                                </div>
                                                <div class="wt-tag wt-widgettag">
                                                    @foreach ($job->skills as $skill )
                                                        <a href="javascript:void(0);">{{ $skill->title }}</a>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="wt-viewjobholder">
                                                <ul>
                                                    <li><span><i class="fa fa-dollar-sign wt-viewjobdollar"></i>{{{$job->price}}}</span></li>
                                                    @if (!empty($job->location->title))
                                                        <li><span><img src="{{{asset(App\Helper::getLocationFlag($job->location->flag))}}}" alt="{{{ trans('lang.location') }}}"> {{{ $job->location->title }}}</span></li>
                                                    @endif
                                                    <li><span><i class="far fa-folder wt-viewjobfolder"></i>{{{ trans('lang.type') }}} {{{$project_type}}}</span></li>
                                                    <li><span><i class="far fa-clock wt-viewjobclock"></i>{{{ trans('lang.duration') }}} {{{ \App\Helper::getJobDurationList($job->duration)}}}</span></li>
                                                    <li><span><i class="fa fa-tag wt-viewjobtag"></i>{{{ trans('lang.job_id') }}} {{{$job->code}}}</span></li>
                                                    <li>
                                                        <a href="javascrip:void(0);" class="wt-clicklike" v-bind:class="disable_btn" @click.prevent="add_wishlist({{$job->id}}, 'saved_jobs')" v-cloak>
                                                            <i v-bind:class="saved_class"></i><span v-cloak>@{{ text }}</span>
                                                        </a>
                                                    </li>
                                                    <li class="wt-btnarea"><a href="{{url('job/'.$job->slug)}}" class="wt-btn">{{{ trans('lang.view_job') }}}</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                @if ( method_exists($jobs,'links') )
                                    {{ $jobs->links('pagination.custom') }}
                                @endif
                            @else
                                @if (file_exists(resource_path('views/extend/errors/no-record.blade.php'))) 
                                    @include('extend.errors.no-record')
                                @else 
                                    @include('errors.no-record')
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
