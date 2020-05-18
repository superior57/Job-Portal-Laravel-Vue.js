@extends(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master')
@section('content')
	<div class="wt-haslayout wt-dbsectionspace la-manage-jobs-holder">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 float-right" id="orders">
				<div class="preloader-section" v-if="loading" v-cloak>
					<div class="preloader-holder">
						<div class="loader"></div>
					</div>
				</div>
				<div class="wt-dashboardbox wt-dashboardservcies">
					<div class="wt-dashboardboxtitle wt-titlewithsearch">
						<h2>{{ trans('lang.orders') }}</h2>
					</div>
					<div class="wt-dashboardboxcontent wt-categoriescontentholder">
						@if ($orders->count() > 0)
							<table class="wt-tablecategories wt-tableservice">
								<thead>
									<tr>
										<th>{{ trans('lang.order') }}</th>
										<th>{{ trans('lang.user') }}</th>
										<th>{{ trans('lang.trans_detail') }}</th>
										<th>{{ trans('lang.action') }}</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($orders as $order)
										@php 
											$is_featured = '';
											$title = '';
											$amount = '';
											$attachment = '';
											if ($order->type == 'job') {
												$proposal = App\Proposal::find($order->product_id);
												$is_featured = $proposal->job->is_featured;
												$title = $proposal->job->title;
												$amount = $proposal->amount;
											} elseif ($order->type == 'service') {
												$service_order = !empty($order->product_id) ? DB::table('service_user')->select('service_id')->where('id', $order->product_id)->first() : '';
												$service = !empty($service_order->service_id) ? App\Service::find($service_order->service_id) : '';
												$title = !empty($service) ? $service->title : '';
												$amount = !empty($service) ? $service->price : '';
												$attachment = !empty($service) ? Helper::getUnserializeData($service->attachments)[0] : '';
											} elseif ($order->type == 'package') {
												$package = App\Package::find($order->product_id);
												$title = $package->title;
												$amount = $package->cost;
											}
											$user = App\User::find($order->user_id);
										@endphp
										@if (!empty($order->invoice))
											<tr class="del-{{{ $order->id }}}">
												<td data-th="title">
													<span class="bt-content">
														<div class="wt-service-tabel">
															@if (!empty($attachment) && $order->type == 'service')
																<figure class="service-feature-image"><img src="{{{asset( Helper::getImageWithSize('uploads/services/'.$service->seller[0]->id, $attachment, 'small' ))}}}" alt="{{{$service['title']}}}"></figure>
															@else
																<figure class="service-feature-image"><img src="{{{asset('images/order-no-image.jpg')}}}" alt="no-image"></figure>
															@endif
															<div class="wt-freelancers-content">
																<div class="dc-title">
																	@if ($is_featured == 'true')
																		<span class="wt-featuredtagvtwo">Featured</span>
																	@endif
																	<h3>{{{$title}}} <span>{{trans('lang.order')}}#{{$order->id}}</span> </h3>
																	<span><strong>{{ !empty($symbol) ? $symbol['symbol'] : '$' }}{{{$amount}}}</strong></span>
																</div>
															</div>
														</div>
													</span>
												</td>
												<td>
													<span class="bt-content">
														<div class="wt-service-tabel">
															<figure class="service-feature-image"><img src="{{{asset(Helper::getProfileImage($user->id))}}}" alt="{{{trans('lang.image')}}}"></figure>
															<div class="wt-freelancers-content">
																<div class="dc-title">
																	@if ($user->user_verified == 1)
																		<span class="wt-featuredtagvtwo">{{ trans('lang.featured') }}</span>
																	@endif
																	<a href="{{{url('profile/'.$user->slug)}}}"><h3>{{{Helper::getUserName($user->id)}}}</h3></a>
																</div>
															</div>
														</div>
													</span>
												</td>
												<td>
													<span class="bt-content wt-payment-tab">
														<div class="wt-actionbtn">
															<a href="javascript:void(0);" class="wt-viewinfo wt-btnhistory" v-on:click.prevent="showOrderDetail('{{ $order->id }}')">
																{{trans('lang.payment_detail')}}
															</a>
														</div>
														@if ($order->invoice->transection_doc)
															<div class="wt-payment-attachment">
																<a href="javascript:void(0);"  v-on:click.prevent="downloadAttachment('users', '{{Helper::getUnserializeData($order->invoice->transection_doc)[0]}}', '{{$order->user_id}}')" >{{ trans('lang.attachment') }}</a>
															</div>
														@endif
													</span>
												</td>
												<td data-th="Service Status">
													<span class="bt-content">
														<form class="wt-formtheme wt-formsearch">
															<fieldset>
																<div class="form-group">
																	@if ($order->status == 'pending')
																		<span class="wt-select">
																			<select id="order_status_tab{{$order->id}}">
																				@foreach ($status_list as $key => $status)
																					<option value="{{$key}}" {{$key==$order->status ? 'selected' : ''}}>{{$status}}</option>
																				@endforeach
																			</select>
																		</span>
																		<a href="javascrip:void(0);" class="wt-searchgbtn job_status_popup" @click.prevent='changeStatus("{{$order->id}}")'><i class="fa fa-check"></i></a>
																	@else
																		<span class="wt-select">
																			<select id="order_status_tab{{$order->id}}" disabled>
																				@foreach ($status_list as $key => $status)
																					<option value="{{$key}}" {{$key==$order->status ? 'selected' : ''}}>{{$status}}</option>
																				@endforeach
																			</select>
																		</span>
																		<a href="javascrip:void(0);" class="wt-searchgbtn job_status_popup" style="pointer-events: none;"><i class="fa fa-check"></i></a>
																	@endif
																</div>
															</fieldset>
														</form>
													</span>
												</td>
											</tr>	
											@if (!empty($order->invoice->detail))
												<b-modal ref="myModalRef-{{ $order->id }}" class="wt-uploadrating wt-order-details" hide-footer title="{{{trans('lang.payment_detail')}}}" v-cloak>
													<div class="wt-modalbody modal-body">
														<div class="wt-description">
															<p>{{{$order->invoice->detail}}}</p>
														</div>
													</div>
												</b-modal>	
											@endif
										@endif
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
