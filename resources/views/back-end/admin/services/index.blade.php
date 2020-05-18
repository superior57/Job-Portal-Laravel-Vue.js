@extends(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master')
@section('content')
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
						<h2>{{ trans('lang.services_listing') }}</h2>
					</div>
					<div class="wt-dashboardboxcontent wt-categoriescontentholder">
						@if ($services->count() > 0)
							<table class="wt-tablecategories wt-tableservice">
								<thead>
									<tr>
										<th>{{ trans('lang.service_title') }}</th>
										<th>{{ trans('lang.service_status') }}</th>
										<th>{{ trans('lang.in_queue') }}</th>
										<th>{{ trans('lang.action') }}</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($services as $service)
										@php 
											$attachment = Helper::getUnserializeData($service['attachments']); 
											$total_orders = Helper::getServiceCount($service['id'], 'hired');
										@endphp
										<tr class="del-{{{ $service['status'] }}}">
											<td data-th="Service Title">
												<span class="bt-content">
													<div class="wt-service-tabel">
														@if ($service->seller->count() > 0)
															@if (!empty($attachment))
																<figure class="service-feature-image"><img src="{{{asset( Helper::getImageWithSize('uploads/services/'.$service->seller[0]->id, $attachment[0], 'small' ))}}}" alt="{{{$service['title']}}}"></figure>
															@endif
														@endif
														<div class="wt-freelancers-content">
															<div class="dc-title">
																@if ($service['is_featured'] == 'true')
																	<span class="wt-featuredtagvtwo">Featured</span>
																@endif
																<h3>{{{$service['title']}}}</h3>
																<span><strong>{{ !empty($symbol) ? $symbol['symbol'] : '$' }}{{{$service['price']}}}</strong> {{ trans('lang.starting_from') }}</span>
															</div>
														</div>
													</div>
												</span>
											</td>
											<td data-th="Service Status">
												<span class="bt-content">
													<form class="wt-formtheme wt-formsearch" id="change_job_status">
														<fieldset>
															<div class="form-group">
																<span class="wt-select">
																	{!! Form::select('status', $status_list, $service['status'], array('id'=>$service->id.'-service_status', 'data-placeholder' => trans('lang.select_status'))) !!}
																</span>
																<a href="javascrip:void(0);" class="wt-searchgbtn job_status_popup" @click.prevent='changeStatus({{$service->id}})'><i class="fa fa-check"></i></a>
															</div>
														</fieldset>
													</form>
												</span>
											</td>
											<td data-th="In Queue">
												<span class="bt-content">
													<span>
														@if ($total_orders > 0)
															<i class="fa fa-spinner fa-spin"></i> 
														@endif
														{{{$total_orders}}} {{ trans('lang.in_queue') }}
													</span>
												</span>
											</td>
											<td data-th="Action">
												<span class="bt-content">
													<div class="wt-actionbtn">
														<a href="{{{route('serviceDetail',$service['slug'])}}}" class="wt-viewinfo">
															<i class="lnr lnr-eye"></i>
														</a>
														<a href="{{{route('edit_service',$service['id'])}}}" class="wt-addinfo wt-skillsaddinfo">
															<i class="lnr lnr-pencil"></i>
														</a>
														@if ($total_orders == 0)
															<delete :title="'{{trans("lang.ph_delete_confirm_title")}}'" :id="'{{ $service['id'] }}'" :message="'{{trans("lang.ph_badge_delete_message")}}'" :url="'{{url('freelancer/dashboard/delete-service')}}'"></delete>
														@endif
													</div>
												</span>
											</td>
										</tr>	
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
						@if ( method_exists($services,'links') ) {{ $services->links('pagination.custom') }} @endif
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
