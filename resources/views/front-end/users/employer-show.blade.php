@extends(file_exists(resource_path('views/extend/front-end/master.blade.php')) ?
'extend.front-end.master':
 'front-end.master', ['body_class' => 'wt-innerbgcolor'] )
@section('title'){{ $user_name }} | {{ $tagline }} @stop
@section('description', "$desc")
@section('content')
    @php $breadcrumbs = Breadcrumbs::generate('showUserProfile', $user->slug); @endphp
    <div class="wt-haslayout wt-innerbannerholder">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-xs-12 col-sm-12 col-md-8 push-md-2 col-lg-6 push-lg-3">
                    <div class="wt-innerbannercontent">
                    <div class="wt-title"><h2>{{ Helper::getUserName($user->id) }}</h2></div>
                    @if (!empty($show_breadcrumbs) && $show_breadcrumbs === 'true')
                        <ol class="wt-breadcrumb">
                            @foreach ($breadcrumbs as $breadcrumb)
                                @if ($breadcrumb->url && !$loop->last)
                                    <li><a href="{{{ $breadcrumb->url }}}">{{{ $breadcrumb->title }}}</a></li>
                                @else
                                    <li class="active">{{{ $breadcrumb->title }}}</li>
                                @endif
                            @endforeach
                        </ol>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wt-main-section wt-haslayout la-profile-holder" id="user_profile">
        <div class="preloader-section" v-if="loading" v-cloak>
            <div class="preloader-holder">
                <div class="loader"></div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div id="wt-twocolumns" class="wt-twocolumns wt-haslayout">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 float-left">
                        <div class="wt-comsingleimg">
                            <figure><img src="{{{ asset(Helper::getUserProfileBanner($user->id)) }}}" alt="{{{ trans('lang.company_banner') }}}"></figure>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5 col-xl-4 float-left">
                        <aside id="wt-sidebar" class="wt-sidebar">
                            <div class="wt-proposalsr wt-proposalsrvtwo">
                                <div class="wt-widgetcontent wt-companysinfo">
                                    <figure><img src="{{{ asset($avatar) }}}" alt="{{ trans('lang.img') }}"></figure>
                                    <div class="wt-title">
                                        @if ($user->user_verified === 1)
                                            <a href="{{{ url('profile/'.$user->slug) }}}"><i class="fa fa-check-circle"></i> {{ trans('lang.verified_company') }}</a>
                                        @endif
                                        <h2>{{{ $user_name }}}</h2>
                                    </div>
                                </div>
                                <div class="tg-authorcodescan">
                                    <figure class="tg-qrcodeimg">
                                        {!! QrCode::size(100)->generate(Request::url('profile/'.$user->slug)); !!}
                                    </figure>
                                    <div class="tg-qrcodedetail">
                                        <span class="lnr lnr-laptop-phone"></span>
                                        <div class="tg-qrcodefeat">
                                            <h3>{{ trans('lang.scan_with_smartphone') }}
                                                <span>{{ trans('lang.smartphone') }} </span>
                                                {{ trans('lang.get_handy') }}
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                @if (in_array($user->id, $save_employer))
                                    <div class="wt-clicksavearea">
                                        <a href="javascript:void(0);" class="wt-clicksavebtn wt-btndisbaled" >
                                            <i class="fa fa-heart"></i>
                                            {{ trans('lang.following') }}
                                        </a>
                                    </div>
                                @else
                                    <div class="wt-clicksavearea">
                                        <a href="javascript:void(0);" id="profile-{{$user->id}}" class="wt-clicksavebtn" @click.prevent="add_wishlist('profile-{{$user->id}}', {{ $user->id }}, 'saved_employers', 'Following')" v-cloak>
                                            <i></i>
                                            {{ trans('lang.click_follow') }}
                                        </a>
                                    </div>
                                @endif
                            </div>
                            <div class="wt-widget">
                                <div class="wt-widgettitle">
                                    <h2>{{ trans('lang.company_followers') }}</h2>
                                </div>
                                <div class="wt-widgetcontent wt-comfollowers wt-verticalscrollbar">
                                    @if ($followers->count() > 0)
                                        <ul>
                                            @foreach ($followers as $follower)
                                                @php
                                                    $profile = \App\Profile::all()->where('user_id', $follower->follower)->first();
                                                    $role_id = Helper::getRoleByUserID($follower->follower);
                                                @endphp
                                                @if (Helper::getRoleName($role_id) !== 'admin' && $follower->follower <> $user->id)
                                                    <li>
                                                        <a href="{{{url('profile/'.$profile->user->slug)}}}">
                                                            <span><img src="{{{asset(Helper::getProfileImage($follower->follower))}}}" alt="Follower"></span>
                                                            <span>{{{Helper::getUserName($follower->follower)}}}</span>
                                                        </a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    @else
                                        <p class="la-no-follower">{{ trans('lang.no_followers') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="wt-widget wt-sharejob">
                                <div class="wt-widgettitle">
                                    <h2>{{ trans('lang.share_company') }}</h2>
                                </div>
                                <div class="wt-widgetcontent">
                                    <ul class="wt-socialiconssimple">
                                        <li class="wt-facebook">
                                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}" class="social-share">
                                            <i class="fa fa fa-facebook-f"></i>{{ trans('lang.share_fb') }}</a>
                                        </li>
                                        <li class="wt-twitter">
                                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}" class="social-share">
                                            <i class="fa fab fa-twitter"></i>{{ trans('lang.share_twitter') }}</a>
                                        </li>
                                        <li class="wt-pinterest">
                                            <a href="//pinterest.com/pin/create/button/?url={{ urlencode(Request::fullUrl()) }}"
                                            onclick="window.open(this.href, \'post-share\',\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;">
                                            <i class="fa fab fa-pinterest-p"></i>{{ trans('lang.share_pinterest') }}</a>
                                        </li>
                                        <li class="wt-googleplus">
                                            <a href="https://plus.google.com/share?url={{ urlencode(Request::fullUrl()) }}" class="social-share">
                                            <i class="fa fab fa-google-plus-g"></i>{{ trans('lang.share_google') }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="wt-widget wt-reportjob">
                                <div class="wt-widgettitle">
                                    <h2>{{ trans('lang.report_employer') }}</h2>
                                </div>
                                <div class="wt-widgetcontent">
                                    {!! Form::open(['url' => '', 'class' =>'wt-formtheme wt-formreport', 'id' => 'submit-report',  '@submit.prevent'=>'submitReport("'.$user->id.'","employer-report")']) !!}
                                        <fieldset>
                                            <div class="form-group">
                                                <span class="wt-select">
                                                    {!! Form::select('reason', \Illuminate\Support\Arr::pluck($reasons, 'title'), null ,array('class' => '', 'placeholder' => trans('lang.select_reason'), 'v-model' => 'report.reason')) !!}
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                {!! Form::textarea( 'description', null, ['class' =>'form-control', 'placeholder' => trans('lang.ph_desc'), 'v-model' => 'report.description'] ) !!}
                                            </div>
                                            <div class="form-group wt-btnarea">
                                                {!! Form::submit(trans('lang.btn_submit'), ['class' => 'wt-btn']) !!}
                                            </div>
                                        </fieldset>
                                    {!! form::close(); !!}
                                </div>
                            </div>
                        </aside>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7 col-xl-8 float-left">
                        <div class="wt-userlistingholder wt-haslayout">
                            <div class="wt-comcontent">
                                <div class="wt-title">
                                    <h3>{{ trans('lang.about') }} “{{{ $user_name }}}”</h3>
                                </div>
                                <div class="wt-description">
                                    @php echo htmlspecialchars_decode(stripslashes($user->profile->description)); @endphp
                                </div>
                            </div>
                            @if (!empty($jobs) && $jobs->count() > 0)
                                @foreach ($jobs as $job)
                                    @php
                                        $job = \App\Job::find($job->id);
                                        $description = strip_tags(stripslashes($job->description));
                                        $featured_class = $job->is_featured == 'true' ? 'wt-featured' : '';
                                        $project_type  = Helper::getProjectTypeList($job->project_type);
                                    @endphp
                                    <div class="wt-userlistinghold wt-userlistingholdvtwo {{$featured_class}}">
                                        @if ($job->is_featured == 'true')
                                            <span class="wt-featuredtag"><img src="{{{ asset('images/featured.png') }}}" alt="{{{ trans('lang.is_featured') }}}" data-tipso="Plus Member" class="template-content tipso_style"></span>
                                        @endif
                                        <div class="wt-userlistingcontent">
                                            <div class="wt-contenthead">
                                                <div class="wt-title">
                                                    <a href="{{{ url('profile/'.$job->employer->slug) }}}">
                                                        @if ($job->employer->user_verified === 1)
                                                            <i class="fa fa-check-circle"></i>
                                                        @endif
                                                        {{{$job->employer->first_name.' '.$job->employer->last_name}}}
                                                    </a>
                                                    <h2>{{{$job->title}}}</h2>
                                                </div>
                                                <div class="wt-description">
                                                    <p>@php echo htmlspecialchars_decode(stripslashes(str_limit($description, 200))); @endphp</p>
                                                </div>
                                                <div class="wt-tag wt-widgettag">
                                                    @foreach ($job->skills as $skill )
                                                        <a href="{{{url('search-results?type=job&skills%5B%5D='.$skill->slug)}}}">{{$skill->title}}</a>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="wt-viewjobholder">
                                                <ul>
                                                    <li><span><i class="wt-viewjobdollar">{{ !empty($symbol) ? $symbol['symbol'] : '$' }}</i>{{{$job->price}}}</span></li>
                                                    @if (!empty($job->location->title))
                                                        <li><span><img src="{{{asset(App\Helper::getLocationFlag($job->location->flag))}}}" alt="{{{ trans('lang.location') }}}"> {{{ $job->location->title }}}</span></li>
                                                    @endif
                                                    <li><span><i class="far fa-folder wt-viewjobfolder"></i>{{{ trans('lang.type') }}} {{{$project_type}}}</span></li>
                                                    <li><span><i class="far fa-clock wt-viewjobclock"></i>{{{ Helper::getJobDurationList($job->duration) }}}</span></li>
                                                    <li><span><i class="fa fa-tag wt-viewjobtag"></i>{{{ trans('lang.job_id') }}} {{{$job->code}}}</span></li>

                                                    @if (!empty($save_jobs) && in_array($job->id, $save_jobs))
                                                        <li style="pointer-events: none;"><a href="javascript:void(0);" class="wt-clicklike wt-clicksave">
                                                            <i class="fa fa-heart"></i> {{trans("lang.saved")}}</a>
                                                        </li>
                                                    @else
                                                        <li>
                                                            <a href="javascrip:void(0);" class="wt-clicklike" id="job-{{$job->id}}" @click.prevent="add_wishlist('job-{{$job->id}}', {{$job->id}}, 'saved_jobs', '{{trans("lang.saved")}}')" v-cloak>
                                                                <i class="fa fa-heart"></i>
                                                                <span class="save_text">Click to Save</span>
                                                            </a>
                                                        </li>
                                                    @endif
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
@push('scripts')
    <script>
        var popupMeta = {
            width: 400,
            height: 400
        }
        $(document).on('click', '.social-share', function(event){
            event.preventDefault();

            var vPosition = Math.floor(($(window).width() - popupMeta.width) / 2),
                hPosition = Math.floor(($(window).height() - popupMeta.height) / 2);

            var url = $(this).attr('href');
            var popup = window.open(url, 'Social Share',
                'width='+popupMeta.width+',height='+popupMeta.height+
                ',left='+vPosition+',top='+hPosition+
                ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

            if (popup) {
                popup.focus();
                return false;
            }
        })
    </script>
@endpush
