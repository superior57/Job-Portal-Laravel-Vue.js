@extends(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master')
@section('content')
<div class="wt-haslayout wt-dbsectionspace">
    <div class="manage-proposals float-left">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="jobs">
                @if (Session::has('error'))
                    <div class="flash_msg">
                        <flash_messages :message_class="'danger'" :time='5' :message="'{{{ Session::get('error') }}}'" v-cloak></flash_messages>
                    </div>
                @endif
				<div class="wt-dashboardbox">
					<div class="wt-dashboardboxtitle">
						<h2>{{ trans('lang.job_proposals') }}</h2>
                    </div>
                    @if (!empty($proposals))
                        @php
                            $user = \App\User::find($job->user_id);
                            $user_name = $user->first_name.' '.$user->last_name;
                            $verified_user = \App\User::select('user_verified')->where('id', $job->employer->id)->pluck('user_verified')->first();
                            $count = 0;
                            $received_proposal_count = 0;
                            $feature_class = !empty($job->is_featured) ? 'wt-featured' : '';
                        @endphp
                        <div class="wt-dashboardboxcontent wt-rcvproposala">
                            <div class="wt-userlistinghold wt-userlistingvtwo {{ $feature_class }}">
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
                                        @if (!empty($job->professional_level) ||
                                            !empty($location['title'])  ||
                                            !empty($job->price) ||
                                            !empty($job->duration)
                                            )
                                            <ul class="wt-saveitem-breadcrumb wt-userlisting-breadcrumb">
                                                @if (!empty($job->price))
                                                    <li><span class="wt-dashboraddoller"><i>{{ !empty($symbol) ? $symbol['symbol'] : '$' }}</i> {{{ $job->price }}}</span></li>
                                                @endif
                                                @if (!empty($job->location->title))
                                                    <li><span><img src="{{{asset(App\Helper::getLocationFlag($job->location->flag))}}}" alt="{{ trans('lang.img') }}"> {{{ $job->location->title }}}</span></li>
                                                @endif
                                                @if (!empty($job->project_type))
                                                    <li><a href="javascript:void(0);" class="wt-clicksavefolder"><i class="far fa-folder"></i> {{ trans('lang.type') }} {{{ $job->project_type }}}</a></li>
                                                @endif
                                                @if (!empty($job->duration))
                                                    <li><span class="wt-dashboradclock"><i class="far fa-clock"></i> {{ trans('lang.duration') }} {{{ $duration }}}</span></li>
                                                @endif
                                            </ul>
                                        @endif
                                    </div>
                                    <div class="wt-rightarea">
                                        <div class="wt-hireduserstatus">
                                            <h4>{{{ $proposals->count() }}}</h4><span>{{ trans('lang.proposals') }}</span>
                                            @if ($proposals->count() > 0)
                                                <ul class="wt-hireduserimgs">
                                                    @foreach ($proposals as $proposal)
                                                        @php
                                                            $profile = \App\User::find($proposal->freelancer_id)->profile;
                                                            $user_image = !empty($profile) ? $profile->avater : '';
                                                            $profile_image = !empty($user_image) ? '/uploads/users/'.$proposal->freelancer_id.'/'.$user_image : 'images/user-login.png';
                                                        @endphp
                                                        <li><figure><img src="{{{ asset($profile_image) }}}" alt="{{ trans('lang.img') }}" class="mCS_img_loaded"></figure></li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if (!empty($accepted_proposal))
                                <div class="wt-freelancerholder wt-rcvproposalholder la-free-proposal">
                                <div class="wt-tabscontenttitle">
                                    <h2>{{ trans('lang.hired_freelancers') }}</h2>
                                </div>
                                <div class="wt-managejobcontent">
                                    @php
                                        $user = \App\User::find($accepted_proposal->freelancer_id);
                                        $profile = \App\User::find($accepted_proposal->freelancer_id)->profile;
                                        $user_image = !empty($profile) ? $profile->avater : '';
                                        $profile_image = !empty($user_image) ? '/uploads/users/'.$accepted_proposal->freelancer_id.'/'.$user_image : 'images/user-login.png';
                                        $user_name = Helper::getUserName($user->id);
                                        $feedbacks = \App\Review::select('feedback')->where('receiver_id', $user->id)->count();
                                        $avg_rating = App\Review::where('receiver_id', $user->id)->sum('avg_rating');
                                        $rating  = $avg_rating != 0 ? round($avg_rating/\App\Review::count()) : 0;
                                        $reviews = \App\Review::where('receiver_id', $user->id)->get();
                                        $stars  = $reviews->sum('avg_rating') != 0 ? (($reviews->sum('avg_rating')/$feedbacks)/5)*100 : 0;
                                        $average_rating_count = !empty($feedbacks) ? $reviews->sum('avg_rating')/$feedbacks : 0;
                                        $completion_time = !empty($accepted_proposal->completion_time) ? \App\Helper::getJobDurationList($accepted_proposal->completion_time) : '';
                                        $p_attachments = !empty($accepted_proposal->attachments) ? unserialize($accepted_proposal->attachments) : '';
                                        $badge = Helper::getUserBadge($user->id);
                                        if (!empty($enable_package) && $enable_package === 'true') {
                                            $feature_class = !empty($badge) ? 'wt-featured' : '';
                                            $badge_color = !empty($badge) ? $badge->color : '';
                                            $badge_img  = !empty($badge) ? $badge->image : '';
                                        } else {
                                                $feature_class = '';
                                                $badge_color = '';
                                                $badge_img    = '';
                                        }
                                        @endphp
                                        <div class="wt-userlistinghold wt-proposalitem {{ $feature_class }}">
                                            @if(!empty($enable_package) && $enable_package === 'true')     
                                                @if (!empty($badge))
                                                    <span class="wt-featuredtag" style="border-top: 40px solid {{ $badge_color }};">
                                                        <img src="{{{ asset(Helper::getBadgeImage($badge_img)) }}}" alt="{{ trans('lang.hired_freelancers') }}" data-tipso="Plus Member" class="template-content tipso_style">
                                                    </span>
                                                @endif
                                            @endif
                                            <figure class="wt-userlistingimg">
                                                <img src="{{{ asset($profile_image) }}}" alt="{{ trans('lang.profile_img') }}" class="mCS_img_loaded">
                                            </figure>
                                            <div class="wt-proposaldetails">
                                                @if (!empty($user_name))
                                                    <div class="wt-contenthead">
                                                        <div class="wt-title">
                                                            <a href="{{ url('profile/'.$user->slug) }}">{{{ $user_name }}}</a>
                                                        </div>
                                                    </div>
                                                @endif
                                                <div class="wt-proposalfeedback">
                                                    <span class="wt-stars"><span style="width: {{ $stars }}%;"></span></span>
                                                    <span class="wt-starcontent">{{{ round($average_rating_count) }}}<sub>{{ trans('lang.5') }}</sub> <em>({{{ $feedbacks }}} {{ trans('lang.feedbacks') }})</em></span>
                                                </div>
                                            </div>
                                            <div class="wt-rightarea">
                                                <div class="wt-btnarea">
                                                    <a href="javascript:void(0);" class="wt-btn" style="pointer-events:none;">{{ trans('lang.hired') }}</a>
                                                    <a href="{{{ url('proposal/'.$job->slug.'/'.$job->status) }}}"  class="wt-btn">{{ trans('lang.view_detail') }}</a>
                                                </div>
                                                <div class="wt-hireduserstatus">
                                                    <h5>{{ !empty($symbol) ? $symbol['symbol'] : '$' }}{{{ $accepted_proposal->amount }}}</h5>
                                                    @if(!empty($completion_time))
                                                        <span>{{{ $completion_time }}}</span>
                                                    @endif
                                                </div>
                                                <div class="wt-hireduserstatus">
                                                    <i class="far fa-envelope"></i>
                                                    <a href="javascript:void(0);" v-on:click.prevent="showCoverLetter('{{ $accepted_proposal->id }}')" ><span>{{ trans('lang.cover_letter') }}</span></a>
                                                </div>
                                                <div class="wt-hireduserstatus">
                                                    <i class="fa fa-paperclip"></i>
                                                    @if (!empty($p_attachments))
                                                        {!! Form::open(['url' => url('proposal/download-attachments'), 'class' =>'post-job-form wt-haslayout', 'id' => 'accepted-download-attachments-form-'.$accepted_proposal->id]) !!}
                                                            @foreach ($p_attachments as $attachments)
                                                                @if (Storage::disk('local')->exists('uploads/proposals/'.$accepted_proposal->freelancer_id.'/'.$attachments))
                                                                    {!! Form::hidden('attachments['.$count.']', $attachments, []) !!}
                                                                    @php $count++; @endphp
                                                                @endif
                                                            @endforeach
                                                            {!! Form::hidden('freelancer_id', $accepted_proposal->freelancer_id, []) !!}
                                                        {!! form::close(); !!}
                                                        <a href="javascript:void(0);"  v-on:click.prevent="downloadAttachments('{{'accepted-download-attachments-form-'.$accepted_proposal->id}}')" ><span>{{{ $count }}} {{ trans('lang.files_attached') }}</span></a>
                                                    @else
                                                        <span>{{{ $count }}} {{ trans('lang.files_attached') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <b-modal ref="myModalRef-{{ $accepted_proposal->id }}" hide-footer title="Cover Letter" v-cloak>
                                    <div class="d-block text-center">
                                            {{{$accepted_proposal->content}}}
                                        </div>
                                </b-modal>
                            @endif 
                            <div class="wt-freelancerholder wt-rcvproposalholder">
                                    <div class="wt-tabscontenttitle">
                                        <h2>{{ trans('lang.received_proposals') }}</h2>
                                    </div>
                                    @if (!empty($proposals))
                                        <div class="wt-managejobcontent">
                                            @foreach ($proposals as $proposal)
                                                @php
                                                    $user = \App\User::find($proposal->freelancer_id);
                                                    $profile = \App\User::find($proposal->freelancer_id)->profile;
                                                    $user_image = !empty($profile) ? $profile->avater : '';
                                                    $profile_image = !empty($user_image) ? '/uploads/users/'.$proposal->freelancer_id.'/'.$user_image : 'images/user-login.png';
                                                    $user_name = $user->first_name.' '.$user->last_name;
                                                    $feedbacks = \App\Review::select('feedback')->where('receiver_id', $proposal->freelancer_id)->count();
                                                    $avg_rating = App\Review::where('receiver_id', $proposal->freelancer_id)->sum('avg_rating');
                                                    $rating  = $avg_rating != 0 ? round($avg_rating/\App\Review::count()) : 0;
                                                    $reviews = \App\Review::where('receiver_id', $proposal->freelancer_id)->get();
                                                    $stars  = $reviews->sum('avg_rating') != 0 ? (($reviews->sum('avg_rating')/$feedbacks)/5)*100 : 0;
                                                    $average_rating_count = !empty($feedbacks) ? $reviews->sum('avg_rating')/$feedbacks : 0;
                                                    $completion_time = !empty($proposal->completion_time) ? \App\Helper::getJobDurationList($proposal->completion_time) : '';
                                                    $attachments = !empty($proposal->attachments) ? unserialize($proposal->attachments) : '';
                                                    $attachments_count = 0;
                                                    if (!empty($attachments)){
                                                        $attachments_count = count($attachments);
                                                    }
                                                    $reviews = \App\Review::where('receiver_id', $user->id)->count();
                                                    $badge = Helper::getUserBadge($user->id);
                                                    if (!empty($enable_package) && $enable_package === 'true') {
                                                        $feature_class = !empty($badge) ? 'wt-featured' : '';
                                                        $badge_color = !empty($badge) ? $badge->color : '';
                                                        $badge_img  = !empty($badge) ? $badge->image : '';
                                                    } else {
                                                        $feature_class = '';
                                                        $badge_color = '';
                                                        $badge_img    = '';
                                                    }
                                                @endphp
                                                <div class="wt-userlistinghold wt-proposalitem {{ $feature_class }}">
                                                    @if(!empty($enable_package) && $enable_package === 'true')        
                                                        @if (!empty($badge))
                                                            <span class="wt-featuredtag" style="border-top: 40px solid {{ $badge_color }};">
                                                                <img src="{{{ asset(Helper::getBadgeImage($badge_img)) }}}" alt="{{ trans('lang.is_featured') }}" data-tipso="Plus Member" class="template-content tipso_style">
                                                            </span>
                                                        @endif
                                                    @endif    
                                                    <figure class="wt-userlistingimg">
                                                        <img src="{{{ asset($profile_image) }}}" alt="{{ trans('lang.profile_img') }}" class="mCS_img_loaded">
                                                    </figure>
                                                    <div class="wt-proposaldetails">
                                                        @if (!empty($user_name))
                                                            <div class="wt-contenthead">
                                                                <div class="wt-title">
                                                                    <a href="{{ url('profile/'.$user->slug) }}">{{{ $user_name }}}</a>
                                                                </div>
                                                            </div>
                                                        @endif
                                                        <div class="wt-proposalfeedback">
                                                            <span class="wt-stars"><span style="width: {{ $stars }}%;"></span></span>
                                                            <span class="wt-starcontent">{{{ round($average_rating_count) }}}<sub>{{ trans('lang.5') }}</sub> <em>({{{ $feedbacks }}} {{ trans('lang.feedbacks') }})</em></span>
                                                        </div>
                                                    </div>
                                                    <div class="wt-rightarea">
                                                        <div class="wt-btnarea">
                                                            @if (empty($accepted_proposal))
                                                                @if (!empty($order))
                                                                   @if ($order->product_id == $proposal->id)     
                                                                        <h5>{{trans('lang.pending_hiring')}}</h5>
                                                                   @endif
                                                                @else
                                                                    <a href="javascript:void(0);"  v-on:click.prevent="hireFreelancer('{{{$proposal->id}}}', '{{$mode}}')" class="wt-btn">{{ trans('lang.hire_now') }}</a>
                                                                @endif
                                                            @endif
                                                        </div>
                                                        <div class="wt-hireduserstatus">
                                                            <h5>{{ !empty($symbol) ? $symbol['symbol'] : '$' }}{{{$proposal->amount}}}</h5>
                                                            @if(!empty($completion_time))
                                                                <span>{{{ $completion_time }}}</span>
                                                            @endif
                                                        </div>
                                                        <div class="wt-hireduserstatus">
                                                            <i class="far fa-envelope"></i>
                                                            <a href="javascript:void(0);"  v-on:click.prevent="showCoverLetter('{{ $proposal->id }}')" ><span>{{ trans('lang.cover_letter') }}</span></a>
                                                        </div>
                                                        <div class="wt-hireduserstatus">
                                                            <i class="fa fa-paperclip"></i>
                                                            @if (!empty($attachments))
                                                                {!! Form::open(['url' => url('proposal/download-attachments'), 'class' =>'post-job-form wt-haslayout', 'id' => 'download-attachments-form-'.$proposal->id]) !!}
                                                                    @foreach ($attachments as $attachment)
                                                                        @if (Storage::disk('local')->exists('uploads/proposals/'.$proposal->freelancer_id.'/'.$attachment))
                                                                            {!! Form::hidden('attachments['.$received_proposal_count.']', $attachment, []) !!}
                                                                            @php $received_proposal_count++; @endphp
                                                                        @endif
                                                                    @endforeach
                                                                    {!! Form::hidden('freelancer_id', $proposal->freelancer_id, []) !!}
                                                                {!! form::close(); !!}
                                                                <a href="javascript:void(0);"  v-on:click.prevent="downloadAttachments('{{'download-attachments-form-'.$proposal->id}}')" ><span>{{{ $received_proposal_count }}} {{ trans('lang.files_attached') }}</span></a>
                                                            @else
                                                                <span>{{{ $attachments_count }}} {{ trans('lang.files_attached') }}</span>
                                                            @endif
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
                                <b-modal ref="myModalRef-{{ $proposal->id }}" hide-footer title="Cover Letter" v-cloak>
                                    <div class="d-block text-center">
                                        {{{$proposal->content}}}
                                    </div>
                                </b-modal>
                            </div>
                            @if ( method_exists($proposals,'links') )
                                {{ $proposals->links('pagination.custom') }}
                            @endif
                    @endif
				</div>
			</div>
		</div>
    </div>
</div>
@endsection
