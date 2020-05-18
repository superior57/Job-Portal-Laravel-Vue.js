@extends(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master')
@section('content')
    <div class="wt-haslayout wt-dbsectionspace" id="jobs">
        <div class="preloader-section" v-if="loading" v-cloak>
            <div class="preloader-holder">
                <div class="loader"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="wt-dashboardbox la-alljob-holder">
                    <div class="wt-dashboardboxtitle wt-titlewithsearch">
                        <h2>{{ trans('lang.all_jobs') }}</h2>
                        {!! Form::open(['url' => url('admin/jobs/search'),
                            'method' => 'get', 'class' => 'wt-formtheme wt-formsearch'])
                        !!}
                        <fieldset>
                            <div class="form-group">
                                <input type="text" name="keyword" value="{{{ !empty($_GET['keyword']) ? $_GET['keyword'] : '' }}}"
                                    class="form-control" placeholder="{{{ trans('lang.ph_search_jobs') }}}">
                                <button type="submit" class="wt-searchgbtn"><i class="lnr lnr-magnifier"></i></button>
                            </div>
                        </fieldset>
                        {!! Form::close() !!}
                    </div>
                    <div class="wt-dashboardboxcontent wt-jobdetailsholder">
                        <div class="wt-freelancerholder">
                            @if (!empty($jobs) && $jobs->count() > 0)
                                <div class="wt-managejobcontent">
                                    @foreach ($jobs as $job)
                                        @php
                                            $duration = !empty($job->duration) ? Helper::getJobDurationList($job->duration) : '';
                                            $user_name = !empty($job->employer->id) ? Helper::getUserName($job->employer->id) : '';
                                            $verified_user = !empty($job->employer->id) ? $job->employer->user_verified : '';
                                            $cancel_proposal = $job->proposals->where('status', 'cancelled')->first();
                                            if (!empty($cancel_proposal)) {
                                                $freelancer = Helper::getUserName($cancel_proposal->freelancer_id);
                                            }
                                            $project_type  = Helper::getProjectTypeList($job->project_type);
                                        @endphp
                                        <div class="wt-userlistinghold wt-featured wt-userlistingvtwo del-job-{{ $job->id }}">
                                            @if (!empty($job->is_featured) && $job->is_featured === 'true')
                                                <span class="wt-featuredtag"><img src="{{{ asset('images/featured.png') }}}" alt="{{ trans('lang.is_featured') }}" data-tipso="Plus Member" class="template-content tipso_style"></span>
                                            @endif
                                            <div class="wt-userlistingcontent">
                                                <div class="wt-contenthead">
                                                    @if (!empty($user_name) || !empty($job->title) )
                                                        <div class="wt-title">
                                                            @if (!empty($user_name))
                                                                <a href="{{{ url('profile/'.$job->employer->slug) }}}">
                                                                @if ($verified_user === 1)
                                                                    <i class="fa fa-check-circle"></i>
                                                                @endif
                                                                &nbsp;{{{ $user_name }}}</a>
                                                            @endif
                                                            @if (!empty($job->title))
                                                                <h2>{{{ $job->title }}}</h2>
                                                            @endif
                                                        </div>
                                                    @endif
                                                    @if (!empty($job->price) || !empty($location['title']) || !empty($job->project_type) || !empty($job->duration) )
                                                        <ul class="wt-saveitem-breadcrumb wt-userlisting-breadcrumb">
                                                            @if (!empty($job->price))
                                                                <li><span class="wt-dashboraddoller"><i>{{ !empty($symbol) ? $symbol['symbol'] : '$' }}</i> {{{ $job->price }}}</span></li>
                                                            @endif
                                                            @if (!empty($job->location->title))
                                                                <li><span><img src="{{{asset(App\Helper::getLocationFlag($job->location->flag))}}}" alt="{{{ trans('lang.locations') }}}"> {{{ $job->location->title }}}</span></li>
                                                            @endif
                                                            @if (!empty($job->project_type))
                                                                <li><a href="javascript:void(0);" class="wt-clicksavefolder"><i class="far fa-folder"></i> {{{ trans('lang.type') }}} {{{ $project_type }}}</a></li>
                                                            @endif
                                                            @if (!empty($job->duration))
                                                                <li><span class="wt-dashboradclock"><i class="far fa-clock"></i> {{ trans('lang.duration') }} {{{ $duration }}}</span></li>
                                                            @endif
                                                        </ul>
                                                    @endif
                                                </div>
                                                <div class="wt-rightarea la-pending-jobs">
                                                    <div class="wt-btnarea">
                                                        <a href="{{{ url('job/edit-job/'.$job->slug) }}}" class="wt-btn">{{ trans('lang.edit_job') }}</a>
                                                        <a href="javascript:void(0);" v-on:click.prevent="deleteJob({{$job->id}})" class="wt-btn">{{ trans('lang.del_job') }}</a>
                                                        @if (!empty($cancel_proposal) && Helper::getOrderPayout($cancel_proposal->id)->count() == 0)
                                                            <a href="javascript:void(0);"  v-on:click.prevent="showRefoundForm({{ $job->id }})"  class="wt-btn"><span>{{ trans('lang.refund_now') }}</span></a>
                                                        @endif
                                                    </div>
                                                    @if ($job->proposals->count() > 0)
                                                        <div class="wt-hireduserstatus">
                                                            @if ($job->status == 'hired' || $job->status == 'completed')
                                                                <h4>{{{ $job->status }}}</h4>
                                                                <a href="{{{ url('proposal/'.$job->slug . '/'. $job->proposals[0]->status) }}}" class="wt-btn">{{ trans('lang.view_detail') }}</a>
                                                                @foreach ($job->proposals as $proposals)
                                                                    @if ($proposals->status == 'cancelled')
                                                                        <h4>{{{ $proposals->status }}}</h4>
                                                                        <a href="{{{ url('proposal/'.$job->slug . '/cancelled') }}}" class="wt-btn">{{ trans('lang.view_detail') }}</a>
                                                                    @elseif ($proposals->status == 'pending')
                                                                        <h4>{{{ $job->status }}}</h4>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                    @elseif ($job->status == 'posted')
                                                        @if (\Schema::hasColumn('jobs', 'expiry_date') && !empty($job->expiry_date))
                                                            @php $expiry = Carbon\Carbon::parse($job->expiry_date); @endphp
                                                            @if ($expiry->lessThan(Carbon\Carbon::now()))
                                                                <div class="wt-hireduserstatus">
                                                                    <h4>{{{ trans('lang.project_status.expired') }}}</h4>
                                                                </div>
                                                            @else
                                                                <div class="wt-hireduserstatus">
                                                                    <h4>{{{ $job->status }}}</h4>
                                                                </div>
                                                            @endif
                                                        @endif
                                                    @else
                                                        <div class="wt-hireduserstatus">
                                                            <h4>{{{ $job->status }}}</h4>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <b-modal ref="myModalRef-{{ $job->id }}" hide-footer title="Refund" v-cloak>
                                            <div class="d-block text-center">
                                                {!! Form::open(['url' => '', 'class' =>'wt-formtheme', 'id' => 'submit_refund_'.$job->id,  
                                                    '@submit.prevent'=>'submitRefund("'.$job->id.'")'])
                                                !!}
                                                    <fieldset>
                                                        <div class="form-group">
                                                            <span class="wt-select">
                                                                <select id="refundable_user_id-{{$job->id}}" class="form-control" placeholder="{{ trans('lang.select_users') }}" v-model="refundable_user">
                                                                    <option value="">{{ trans('lang.select_users') }}</option>
                                                                    <option value="{{$job->employer->id}}">{{ trans('lang.search_filter_list.employers_val') }}</option>
                                                                    @if (!empty($cancel_proposal))
                                                                        <option value="{{$cancel_proposal->freelancer_id}}">{{ trans('lang.search_filter_list.freelancer_val') }}</option>
                                                                    @endif
                                                                </select>
                                                            </span>
                                                        </div>
                                                        @if (!empty($cancel_proposal))
                                                            <input type="hidden" value="{{$cancel_proposal->amount}}" id="refundable-amount-{{$job->id}}">
                                                            <input type="hidden" value="{{$cancel_proposal->id}}" id="refundable-order-id-{{$job->id}}">
                                                        @endif
                                                        <input type="hidden" value="{{$job->id}}" id="refundable-job-id-{{$job->id}}">

                                                        <div class="form-group wt-btnarea">
                                                            {!! Form::submit(trans('lang.refund'), ['class' => 'wt-btn']) !!}
                                                        </div>
                                                    </fieldset>
                                                {!! form::close(); !!}
                                            </div>
                                        </b-modal>
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
                    @if ( method_exists($jobs,'links') ) {{ $jobs->links('pagination.custom') }} @endif
                </div>
            </div>
        </div>
    </div>
@endsection
