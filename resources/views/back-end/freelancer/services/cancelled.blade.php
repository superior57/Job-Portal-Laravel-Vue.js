@extends(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master')
@section('content')
	@if (session()->has('project_type'))
		@php session()->forget('project_type'); @endphp
	@endif
	<div class="wt-haslayout wt-dbsectionspace la-manage-jobs-holder">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 float-right" id="services">
				<div class="preloader-section" v-if="loading" v-cloak>
					<div class="preloader-holder">
						<div class="loader"></div>
					</div>
				</div>
				<div class="wt-dashboardbox wt-dashboardservcies">
					<div class="wt-dashboardboxtitle wt-titlewithsearch">
						<h2>{{ trans('lang.cancelled_services') }}</h2>
					</div>
					<div class="wt-dashboardboxcontent wt-categoriescontentholder">
						@if ($services->count() > 0)
							<table class="wt-tablecategories wt-tableservice">
								<thead>
									<tr>
										<th>{{ trans('lang.service_title') }}</th>
										<th>{{ trans('lang.offered_by') }}</th>
										<th>{{ trans('lang.rating') }}</th>
										<th>{{ trans('lang.action') }}</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($services as $service)
										@php 
											$attachment = Helper::getUnserializeData($service->attachments); 
											$seller = Helper::getServiceSeller($service->id);
											$freelancer = App\User::find($seller->user_id);
											$report = Helper::getPivotServiceReport($service->pivot_id);
										@endphp
										<tr class="del-{{{ $service->status }}}">
											<td data-th="Service Title">
												<span class="bt-content">
													<div class="wt-service-tabel">
														@if (!empty($attachment))
															<figure class="service-feature-image"><img src="{{{asset('/uploads/services/'.$freelancer->id.'/'.$attachment[0])}}}" alt="{{{$service->title}}}"></figure>
														@endif
														<div class="wt-freelancers-content">
															<div class="dc-title">
																@if ($service->is_featured == 'true')
																	<span class="wt-featuredtagvtwo">{{ trans('lang.featured') }}</span>
																@endif
																<h3>{{{$service->title}}}</h3>
																<span><strong>{{ !empty($symbol) ? $symbol['symbol'] : '$' }}{{{$service->price}}}</strong> {{ trans('lang.starting_from') }}</span>
															</div>
														</div>
													</div>
												</span>
											</td>
											<td>
												<span class="bt-content">
													<div class="wt-userlistingsingle">
														<figure class="wt-userlistingimg">
															<img src="{{{asset(Helper::getProfileImage($freelancer->id))}}}" alt="image description">
														</figure>
														<div class="wt-userlistingcontent">
															<div class="wt-contenthead wt-followcomhead">
															<div class="wt-title">
																<a href="{{{url('profile/'.$freelancer->slug)}}}">
																	@if ($freelancer->user_verified)
																		<i class="fa fa-check-circle"></i> {{{Helper::getUserName($freelancer->id)}}}
																	@endif
																</a>
																<h3>{{{$freelancer->profile->tagline}}}</h3>
															</div>
															</div>
														</div>
													</div>
												</span>
											</td>
											<td>
												<span class="bt-content">
													<div class="wt-actionbtn">
														<a href="javascript:void(0);" v-on:click.prevent="showReview('{{ $service->pivot_id }}')" class="wt-viewinfo wt-btnhistory wt-reasonbtn">{{ trans('lang.reason') }}</a>
													</div>
												</span>
											</td>
											<td data-th="Action">
												<span class="bt-content">
													<div class="wt-actionbtn">
														<a href="{{{url('freelancer/service/'.$service->pivot_id.'/cancelled')}}}" class="wt-viewinfo wt-btnhistory">{{ trans('lang.show_history') }}</a>
													</div>
												</span>
											</td>
										</tr>
										<b-modal ref="myModalRef-{{ $service->pivot_id }}" class="wt-uploadrating" hide-footer title="{{{trans('lang.rejection_reason')}}}" v-cloak>
											<div class="wt-modalbody modal-body">
												<div class="wt-description">
													<p>{{{$report->description}}}</p>
												</div>
											</div>
										</b-modal>		
									@endforeach
								</tbody>
							</table>
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
@endsection
