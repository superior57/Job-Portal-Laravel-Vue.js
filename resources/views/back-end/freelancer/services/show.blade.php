@extends(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master')
@section('content')
   <section class="wt-haslayout wt-dbsectionspace" id="services">
        <div class="preloader-section" v-if="loading" v-cloak>
            <div class="preloader-holder">
                <div class="loader"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                @if (Session::has('success'))
                    <div class="flash_msg">
                        <flash_messages :message_class="'success'" :time ='5' :message="'{{{ Session::get('success') }}}'" v-cloak></flash_messages>
                    </div>
                    @php session()->forget('success'); @endphp
                @elseif (Session::has('error'))
                    <div class="flash_msg">
                        <flash_messages :message_class="'danger'" :time='5' :message="'{{{ Session::get('error') }}}'" v-cloak></flash_messages>
                    </div>
                @endif
                <div class="wt-dashboardbox">
                    <div class="wt-dashboardboxtitle">
                        <h2>{{ trans('lang.service_detail') }}</h2>
                    </div>
                    <div class="wt-dashboardboxcontent wt-jobdetailsholder">
                        <div class="wt-service-tabel wt-jobservice-details">
                            @if (!empty($attachment))
                                <figure class="service-feature-image"><img src="{{{asset('/uploads/services/'.$freelancer->id.'/'.$attachment[0])}}}" alt="{{{$service['title']}}}"></figure>
                            @endif
                            <div class="wt-freelancers-content">
                                <div class="dc-title">
                                    @if ($service['is_featured'] == 'true')
                                        <span class="wt-featuredtagvtwo">{{ trans('lang.featured') }}</span>
                                    @endif
                                    <h3>{{{$service['title']}}}</h3>
                                    <span><strong>{{ !empty($symbol) ? $symbol['symbol'] : '$' }}{{{$service['price']}}}</strong> {{ trans('lang.starting_from') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="wt-rcvproposalholder wt-hiredfreelancer wt-tabsinfo">
                            <div class="wt-tabscontenttitle">
                                <h2>{{ trans('lang.hired_freelancer') }}</h2>
                            </div>
                            <div class="wt-jobdetailscontent">
                                <div class="wt-userlistinghold wt-featured wt-proposalitem">
                                    <span class="wt-featuredtag"><img src="{{{ asset('images/featured.png') }}}" alt="img description" data-tipso="Plus Member" class="template-content tipso_style mCS_img_loaded"></span>
                                    <figure class="wt-userlistingimg">
                                        <img src="{{{asset(Helper::getProfileImage($freelancer->id))}}}" alt="image description">
                                    </figure>
                                    <div class="wt-proposaldetails">
                                        <div class="wt-contenthead">
                                            <div class="wt-title">
                                                <a href="{{{url('profile/'.$freelancer->slug)}}}"> {{{Helper::getUserName($freelancer->id)}}}</a>
                                            </div>
                                        </div>
                                        <div class="wt-proposalfeedback">
                                            <span class="wt-stars"><span style="width: {{ $stars }}%;"></span></span>
                                            <span class="wt-starcontent">{{{ $rating }}}<sub>{{ trans('lang.5') }}</sub> <em>({{{ $feedbacks }}} {{ trans('lang.feedbacks') }})</em></span>
                                        </div>													
                                    </div>
                                    @if ($pivot_service->status == 'hired')
                                        <div class="wt-rightarea wt-titlewithsearch wt-titlewithsearchvtwo">
                                            <form class="wt-formtheme wt-formsearch" id="change_job_status">
                                                <fieldset>
                                                    <div class="form-group">
                                                        <span class="wt-select">
                                                            {!! Form::select('status', $service_status, 'hired', array('id' =>'employer_service_status', 'data-placeholder' => trans('lang.select_status'), '@change' => 'serviceStatus('.$service->id.', '.$id.', '.Auth::user()->id.', "'.$cancel_proposal_text.'", "'.$cancel_proposal_button.'", "'.$validation_error_text.'", "'.$cancel_popup_title.'")')) !!}
                                                        </span>
                                                        <a href="javascrip:void(0);" class="wt-searchgbtn job_status_popup" @click.prevent='serviceStatus({{$service->id}}, {{$id}}, {{Auth::user()->id}}, "{{$cancel_proposal_text}}", "{{$cancel_proposal_button}}", "{{$validation_error_text}}", "{{$cancel_popup_title}}")'><i class="fa fa-check"></i></a>
                                                    </div>
                                                </fieldset>
                                            </form>											
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="wt-projecthistory">
                            <div class="wt-tabscontenttitle">
                                <h2>{{ trans('lang.project_history') }}</h2>
                            </div>
                            <div class="wt-historycontent la-jobdetails-holder">
                                <private-message :placeholder="'{{ trans('lang.ph_job_dtl') }}'" :upload_tmp_url="'{{url('service/upload-temp-message_attachments')}}'" :id="'{{$id}}'" :recipent_id="'{{$pivot_service->user_id}}'" :project_type="'service'"></private-message>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
            </div>
        </div>
        <b-modal ref="myModalRef" hide-footer title="Project Status">
            <div class="d-block text-center">
                <form class="wt-formtheme wt-formfeedback" id="submit-review-form">
                    <fieldset>
                        <div class="form-group">
                            <textarea class="form-control" placeholder="{{ trans('lang.add_your_feedback') }}" name="feedback"></textarea>
                        </div>
                        @if(!empty($review_options))
                            @foreach ($review_options as $key => $option)
                                <div class="form-group wt-ratingholder">
                                    <div class="wt-ratepoints">
                                        <vue-stars
                                            :name="'rating[{{$key}}][rate]'"
                                            :active-color="'#fecb02'"
                                            :inactive-color="'#999999'"
                                            :shadow-color="'#ffff00'"
                                            :hover-color="'#dddd00'"
                                            :max="5"
                                            :value="0"
                                            :readonly="false"
                                            :char="'★'"
                                            id="rating-{{$key}}"
                                        />
                                        <div class="counter wt-pointscounter"></div>
                                    </div>
                                    <input type="hidden" name="rating[{{$key}}][reason]" value="{{{$option->id}}}">
                                    <span class="wt-ratingdescription">{{{$option->title}}}</span>
                                </div>
                            @endforeach
                        @endif
                        <input type="hidden" name="receiver_id" value="{{{$freelancer->id}}}">
                        <input type="hidden" name="service_id" value="{{{$service->id}}}">
                        <div class="form-group wt-btnarea">
                           <a class="wt-btn" href="javascript:void(0);" v-on:click='submitFeedback({{$freelancer->id}}, {{$id}})'>{{ trans('lang.btn_send_feedback') }}</a>
                        </div>
                    </fieldset>
                </form>
            </div>
        </b-modal>
    </section>
    @endsection
