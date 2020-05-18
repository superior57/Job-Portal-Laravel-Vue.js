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
						@if ($orders->count() > 0)
							<table class="wt-tablecategories wt-tableservice">
								<thead>
									<tr>
										<th>{{ trans('lang.service_title') }}</th>
										<th>{{ trans('lang.employer') }}</th>
										<th>{{ trans('lang.order_status') }}</th>
										<th>{{ trans('lang.action') }}</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($orders as $order)
										@php 
											$service = App\Service::find($order->service_id);
											$attachment = Helper::getUnserializeData($service->attachments); 
											$employer = App\User::find($order->user_id);
										@endphp
										<tr class="del-{{{ $service->status }}}">
											<td data-th="Service Title">
												<span class="bt-content">
													<div class="wt-service-tabel">
														@if (!empty($service->seller->count() > 0 && $attachment))
															<figure class="service-feature-image"><img src="{{{asset( Helper::getImageWithSize('uploads/services/'.$service->seller[0]->id, $attachment[0], 'small' ))}}}" alt="{{{$service->title}}}"></figure>
														@endif
														<div class="wt-freelancers-content">
															<div class="dc-title">
																@if ($service->is_featured == 'true')
																	<span class="wt-featuredtagvtwo">Featured</span>
																@endif
																<h3>{{{$service->title}}}</h3>
																<span><strong>{{ !empty($symbol) ? $symbol['symbol'] : '$' }}{{{$service->price}}}</strong> {{ trans('lang.starting_from') }}</span>
															</div>
														</div>
													</div>
												</span>
											</td>
											@if (!empty($employer))
												<td>
													<span class="bt-content">
														<div class="wt-service-tabel">
															@if (!empty($attachment))
																<figure class="service-feature-image"><img src="{{{asset(Helper::getProfileImage($employer->id))}}}" alt="{{{trans('lang.image')}}}"></figure>
															@endif
															<div class="wt-freelancers-content">
																<div class="dc-title">
																	@if ($employer->user_verified == 1)
																		<span class="wt-featuredtagvtwo">{{ trans('lang.featured') }}</span>
																	@endif
																	<a href="{{{url('profile/'.$employer->slug)}}}"><h3>{{{Helper::getUserName($employer->id)}}}</h3></a>
																</div>
															</div>
														</div>
													</span>
												</td>
											@endif
											<td>
												<span class="la-order-status {{$order->status == 'cancelled' ? 'la-order-cancelled' : ''}}">
													<h4>{{{$order->status}}}</h4>
												</span>
											</td>
											<td data-th="Action">
												<span class="bt-content">
													<div class="wt-actionbtn">
														<a href="{{{route('serviceDetail',$service->slug)}}}" class="wt-viewinfo">
															<i class="lnr lnr-eye"></i>
														</a>
														<a href="{{{url('freelancer/service/'.$order->id.'/'.$order->status)}}}" class="wt-addinfo wt-skillsaddinfo">
															<i class="lnr lnr-history"></i>
														</a>
														@if ($order->status == 'cancelled' && Helper::getOrderPayout($order->id)->count() == 0)
															<a href="javascript:void(0);" v-on:click.prevent="showRefoundForm({{ $order->id }})" class="wt-deleteinfo">
																<i class="fa fa-gavel"></i>
															</a>
															<b-modal ref="myModalRef-{{ $order->id }}" hide-footer title="Refund" v-cloak>
																<div class="d-block text-center">
																	{!! Form::open(['url' => '', 'class' =>'wt-formtheme', 'id' => 'submit_refund_'.$order->id,  '@submit.prevent'=>'submitRefund("'.$order->id.'")']) !!}
																		<fieldset>
																			<div class="form-group">
																				<span class="wt-select">
																					<select id="refundable_user_id-{{$order->id}}" class="form-control" placeholder="{{ trans('lang.select_users') }}" v-model="refundable_user">
																						<option value="">{{ trans('lang.select_users') }}</option>
																						<option value="{{$employer->id}}">{{ trans('lang.search_filter_list.employers_val') }}</option>
																						<option value="{{$order->seller_id}}">{{ trans('lang.search_filter_list.freelancer_val') }}</option>
																					</select>
																				</span>
																			</div>
																			{{-- <div class="form-group">
																				<span class="wt-select">
																					{!! Form::select('payment_method', $payment_methods, null, array('class' => 'form-control', 'placeholder' => trans('lang.select_pay_method'), 'v-model' => 'refundable_payment_method')) !!}
																				</span>
																			</div> --}}
																			<input type="hidden" value="{{$service->price}}" id="refundable-amount-{{$order->id}}">
																			{{-- <input type="hidden" value="{{$order->id}}" id="refundable-order-id-{{$order->id}}"> --}}
																			<div class="form-group wt-btnarea">
																				{!! Form::submit(trans('lang.refund'), ['class' => 'wt-btn']) !!}
																			</div>
																		</fieldset>
																	{!! form::close(); !!}
																</div>
															</b-modal>	
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
						@if ( method_exists($orders,'links') ) {{ $orders->links('pagination.custom') }} @endif
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
