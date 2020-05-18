@extends(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master')
@section('content')
    <section class="wt-haslayout wt-dbsectionspace">
        <div class="row">
            <div class=" col-12 col-xl-8" id="packages">
                <div class="preloader-section" v-if="loading" v-cloak>
                    <div class="preloader-holder">
                        <div class="loader"></div>
                    </div>
                </div>
                <div class="wt-dashboardbox">
                    @if (Session::has('message'))
                        <div class="flash_msg">
                            <flash_messages :message_class="'success'" :time ='5' :message="'{{{ Session::get('message') }}}'" v-cloak></flash_messages>
                        </div>
                        @php session()->forget('message') @endphp;
                    @elseif (Session::has('error'))
                        <div class="flash_msg">
                            <flash_messages :message_class="'danger'" :time ='5' :message="'{{{ str_replace("'s", " ", Session::get('error')) }}}'" v-cloak></flash_messages>
                        </div>
                        @php session()->forget('error'); @endphp
                    @endif
                    <div class="sj-checkoutjournal">
                        <div class="wt-dashboardboxtitle">
                            <h2>{{{trans('lang.order')}}}</h2>
                        </div>
                        @php
                            
                            session()->put(['product_id' => e($product_id)]);
                            session()->put(['product_title' => e($title)]);
                            session()->put(['product_price' => e($cost)]);
                            session()->put(['type' => $type]);
                            session()->put(['order' => $order]);
                        @endphp
                        <div class="wt-dashboardboxcontent wt-oderholder">
                            <table class="sj-checkouttable wt-ordertable">
                                <thead>
                                    <tr>
                                        <th>{{ trans('lang.item_title') }}</th>
                                    <th>{{trans('lang.details')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="sj-producttitle">
                                                <div class="sj-checkpaydetails">
                                                    <h4>{{{$title}}}</h4>
                                                    @if (!empty($subtitle))
                                                        <span>{{{$subtitle}}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ !empty($symbol['symbol']) ? $symbol['symbol'] : '$' }}{{{$cost}}}</td>
                                    </tr>
                                    @if (!empty($options))
                                        <tr>
                                            <td>{{ trans('lang.duration') }}</td>
                                            <td>{{{Helper::getPackageDurationList($options['duration'])}}}</td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td>{{ trans('lang.total') }}</td>
                                        <td>{{ !empty($symbol['symbol']) ? $symbol['symbol'] : '$' }}{{{$cost}}}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ trans('lang.status') }}</td>
                                        <td>{{ trans('lang.pending') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="wt-tabscontenttitle">
                                <h2>{{{trans('lang.submit_trans')}}}</h2>
                            </div>
                            <div class="wt-transection-holder">
                                {!! Form::open(['url' => '', 'class' =>'wt-formtheme wt-userform sj-checkouttable', '@submit.prevent' => 'submitTransection("'.$product_id.'")', 'id' => 'trans_form' ])!!}
                                    <fieldset>
                                        <div class="form-group">
                                            <textarea name="trans_detail" id="transection_detail" class="form-control" placeholder="{{{ trans('lang.trans_detail') }}}"></textarea>
                                        </div>
                                        <div class="wt-attachmentsholder">
                                            <job_attachments :max_file="1" :temp_url="'{{url('user/upload-temp-image/file')}}'"></job_attachments>
                                            <div class="form-group input-preview">
                                                <ul class="wt-attachfile dropzone-previews">

                                                </ul>
                                            </div>
                                        </div>
                                        <div class="form-group form-group-half wt-btnarea">
                                            {!! Form::submit(trans('lang.btn_submit'), ['class' => 'wt-btn']) !!}
                                        </div>
                                    </fieldset>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if ($mode == 'false' && !empty($bank_detail))
                <div id="packages" class=" col-12 col-xl-4">
                    <div class="wt-dashboardbox wt-account-details"> 
                        <div class="sj-checkoutjournal">
                            <div class="wt-dashboardboxtitle">
                                <h2>{{{trans('lang.account_detail')}}}</h2>
                            </div> 
                            <div class="sj-checkouttable">
                                <div class="wt-account-note">
                                    @if (!empty($bank_detail['description']))
                                        <div class="wt-tabscontenttitle"><h2>Note:</h2></div><div class="wt-description"><p>{{{ $bank_detail['description']}}}</p></div>
                                    @endif
                                </div>
                                <div class="wt-account-instruction">
                                    @if (!empty($bank_detail['instruction']))
                                        <div class="wt-tabscontenttitle"><h2>Instruction:</h2></div><div class="wt-description"><p>{{{ $bank_detail['instruction']}}}</p></div>
                                    @endif
                                </div>
                            </div>
                            <table class="sj-checkouttable wt-ordertable">
                                <tbody>
                                    @if (!empty($bank_detail['account_name']))
                                        <tr>
                                            <td>{{ trans('lang.bank_account_name') }}</td>
                                            <td>{{{$bank_detail['account_name']}}}</td>
                                        </tr>
                                    @endif
                                    @if (!empty($bank_detail['account_number']))
                                        <tr>
                                            <td>{{ trans('lang.bank_account_number') }}</td>
                                            <td>{{{$bank_detail['account_number']}}}</td>
                                        </tr>
                                    @endif
                                    @if (!empty($bank_detail['bank_name']))
                                        <tr>
                                            <td>{{ trans('lang.bank_name') }}</td>
                                            <td>{{{$bank_detail['bank_name']}}}</td>
                                        </tr>
                                    @endif
                                    @if (!empty($bank_detail['bank_routing_number']))
                                        <tr>
                                            <td>{{ trans('lang.bank_routing_number') }}</td>
                                            <td>{{{$bank_detail['bank_routing_number']}}}</td>
                                        </tr>
                                    @endif
                                    @if (!empty($bank_detail['bank_bic_swift']))
                                        <tr>
                                            <td>{{ trans('lang.bank_bic_swift') }}</td>
                                            <td>{{{$bank_detail['bank_bic_swift']}}}</td>
                                        </tr>
                                    @endif
                                    @if (!empty($bank_detail['bank_iban']))
                                        <tr>
                                            <td>{{ trans('lang.bank_iban') }}</td>
                                            <td>{{{$bank_detail['bank_iban']}}}</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div> 
                </div>
            @endif
        </div>
    </section>
@endsection