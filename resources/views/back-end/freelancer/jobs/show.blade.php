@extends(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master')
@section('content')
    @php
        $verified_user = \App\User::select('user_verified')
        ->where('id', $job->employer->id)->pluck('user_verified')->first();
    @endphp
    <section class="wt-haslayout wt-dbsectionspace la-dbproposal" id="jobs">
        @if (Session::has('error'))
            <div class="flash_msg">
                <flash_messages :message_class="'danger'" :time='5' :message="'{{{ Session::get('error') }}}'" v-cloak></flash_messages>
            </div>
        @endif
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                @if ($proposal->status == "cancelled" && !empty($cancel_reason))
                    <div class="wt-jobalertsholder">
                        <ul class="wt-jobalerts">
                            <li class="alert alert-danger alert-dismissible fade show">
                                <span><em>{{ trans('lang.sorry') }}</em> {{ trans('lang.job_cancelled') }}</span>
                                <a href="javascript:void(0)" class="wt-alertbtn danger" v-on:click.prevent="viewReason('{{$cancel_reason->description}}')" >{{ trans('lang.reason') }}</a>
                                <a href="javascript:void(0)" class="close" data-dismiss="alert" aria-label="Close"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                    </div>
                @endif
                <div class="wt-dashboardbox">
                    <div class="wt-dashboardboxtitle">
                        <h2>{{ trans('lang.job_dtl') }}</h2>
                    </div>
                    <div class="wt-dashboardboxcontent wt-jobdetailsholder">
                        <div class="wt-freelancerholder wt-tabsinfo">
                            <div class="wt-jobdetailscontent">
                                <div class="wt-userlistinghold wt-featured wt-userlistingvtwo">
                                    @if (!empty($job->is_featured) && $job->is_featured === 'true')
                                        <span class="wt-featuredtag">
                                            <img src="{{{ asset('images/featured.png') }}}" alt="{{ trans('lang.is_featured') }}"
                                                data-tipso="Plus Member" class="template-content tipso_style">
                                        </span>
                                    @endif
                                    <div class="wt-userlistingcontent">
                                        <div class="wt-contenthead">
                                            @if (!empty($employer_name) || !empty($job->title) )
                                                <div class="wt-title">
                                                    @if (!empty($employer_name))
                                                        <a href="{{{ url('profile/'.$job->employer->slug) }}}">
                                                            @if($verified_user === 1)
                                                                <i class="fa fa-check-circle"></i>&nbsp;
                                                            @endif
                                                            {{{ $employer_name }}}
                                                        </a>
                                                    @endif
                                                    @if (!empty($job->title))
                                                        <h2>{{{ $job->title }}}</h2>
                                                    @endif
                                                </div>
                                            @endif
                                            <ul class="wt-userlisting-breadcrumb">
                                                @if (!empty($job->price))
                                                    <li><span><i class="far fa-money-bill-alt"></i> {{ !empty($symbol) ? $symbol['symbol'] : '$' }}{{{ $job->price }}}</span></li>
                                                @endif
                                                @if (!empty($job->location->title))
                                                    <li>
                                                        <span>
                                                            <img src="{{{asset(Helper::getLocationFlag($job->location->flag))}}}"
                                                            alt="{{ trans('lang.img') }}"> {{{ $job->location->title }}}
                                                        </span>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                        <div class="wt-rightarea">
                                            <div class="wt-hireduserstatus">
                                                <figure><img src="{{{ asset($employer_image) }}}" alt="{{ trans('lang.profie_img') }}"></figure>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wt-projecthistory">
                            <div class="wt-tabscontenttitle">
                                <h2>{{ trans('lang.project_history') }}</h2>
                            </div>
                            <div class="wt-historycontent">
                                <private-message :ph_job_dtl="'{{ trans('lang.ph_job_dtl') }}'" :upload_tmp_url="'{{url('proposal/upload-temp-image')}}'" :id="'{{$proposal->id}}'" :recipent_id="'{{$job->user_id}}'"></private-message>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
            </div>
        </div>
    </section>
@endsection
