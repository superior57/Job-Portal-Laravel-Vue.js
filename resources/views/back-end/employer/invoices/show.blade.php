@extends(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master')
@push('stylesheets')
    <link href="{{ asset('css/print.css') }}" rel="stylesheet" media="print" type="text/css">
@endpush
@section('content')
    <div class="wt-haslayout wt-dbsectionspace">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" id="invoice_list">
                <div class="wt-transactionhold">
                    <div class="wt-borderheading wt-borderheadingvtwo">
                        <h3>{{{trans('lang.transaction_detl')}}}</h3>
                        <a class="print-window" href="javascript:void(0);" @click="print()">
                            <i class="fa fa-print"></i>
                            {{{trans('lang.print')}}}
                        </a>
                    </div>
                    <div class="wt-transactioncontent" id="printable_area">
                        <ul class="wt-transactiondetails">
                            <li>
                                <span><em>{{{trans('lang.pay_rec')}}}</em> {{{trans('lang.from')}}} {{{$invoice_info->payer_name}}}</span>
                                <span class="wt-grossamount">{{{trans('lang.gross_amnt')}}}</span>
                            </li>
                            <li>
                                <span>
                                    {{{ Carbon\Carbon::parse($invoice_info->created_at)->diffForHumans()}}} on {{{Carbon\Carbon::parse($invoice_info->created_at)->format('l \\a\\t H:i:s')}}}
                                </span>

                                <span class="wt-transactionid">
                                    {{{trans('lang.transaction_id')}}}:&nbsp;{{{$invoice_info->transaction_id}}}
                                </span>
                                @if (!empty($invoice_info->customer_id))
                                    <span class="wt-transactionid">
                                        {{{trans('lang.customer_id')}}}:&nbsp;{{{$invoice_info->customer_id}}}
                                    </span>
                                @endif
                                <span class="wt-grossamount wt-grossamountusd">{{{ $symbol }}}{{{$invoice_info->price}}}&nbsp;{{{ strtoupper($invoice_info->currency_code) }}}</span>
                            </li>
                            @if (!empty($invoice_info->payer_status))
                                <li>
                                    <span>{{{trans('lang.pay_status')}}}&nbsp;&colon;</span>
                                    <span class="wt-paymentstatus">{{{$invoice_info->payer_status}}}</span>
                                </li>
                            @endif
                        </ul>
                        <table class="table wt-carttable">
                            <thead>
                                <tr>
                                    <th>{{{trans('lang.product_name')}}}</th>
                                    <th>{{{trans('lang.product_qty')}}}</th>
                                    <th>{{{trans('lang.product_price')}}}</th>
                                    <th>{{{trans('lang.product_subtotal')}}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td data-title="Product Name">
                                        <em>{{{$invoice_info->item_name}}}</em>
                                    </td>
                                    <td data-title="Unit Price">{{{ $invoice_info->item_qty }}}</td>
                                    <td data-title="Total">{{ $symbol }}{{{ $invoice_info->item_price }}}&nbsp;{{ strtoupper($invoice_info->currency_code) }}</td>
                                    <td data-title="Total">{{ $symbol }}{{{ $invoice_info->item_price }}}&nbsp;{{ strtoupper($invoice_info->currency_code) }}</td>
                                </tr>
                                <tr>
                                    <td data-title="Product Name"></td>
                                    <td data-title="Unit Price"></td>
                                    <td data-title="Unit Price">{{{trans('lang.purchase_total')}}}</td>
                                    <td data-title="Total">{{ $symbol }}{{{ $invoice_info->item_price }}}&nbsp;{{ strtoupper($invoice_info->currency_code) }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table wt-carttable wt-carttablevtwo">
                            <thead>
                                <tr>
                                    <th>{{{trans('lang.pay_detl')}}}</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td data-title="Product Name">
                                        <em>{{{trans('lang.purchase_total')}}}</em>
                                        <span>{{ $symbol }}{{{ $invoice_info->item_price }}}&nbsp;{{ strtoupper($invoice_info->currency_code) }}</span>
                                    </td>
                                    <td data-title="Unit Price"></td>
                                    <td data-title="Total"></td>
                                    <td data-title="Total"></td>
                                </tr>
                                <tr>
                                    <td data-title="Product Name">
                                        <em>{{{trans('lang.sales_tax')}}}</em>
                                        <span>{{ $symbol }}{{{$invoice_info->sales_tax}}} {{ strtoupper($invoice_info->currency_code) }}</span>
                                    </td>
                                    <td data-title="Unit Price"></td>
                                    <td data-title="Total"></td>
                                    <td data-title="Total"></td>
                                </tr>
                                <tr>
                                    <td data-title="Product Name">
                                        <em>{{{trans('lang.shiping_amnt')}}}</em>
                                        <span>{{ $symbol }}{{{$invoice_info->shipping_amount}}} USD</span>
                                    </td>
                                    <td data-title="Unit Price"></td>
                                    <td data-title="Total"></td>
                                    <td data-title="Total"></td>
                                </tr>
                                <tr>
                                    <td data-title="Product Name">
                                        <em>{{{trans('lang.handling_amnt')}}}</em>
                                        <span>{{ $symbol }}{{{$invoice_info->handling_amount}}} USD</span>
                                    </td>
                                    <td data-title="Unit Price"></td>
                                    <td data-title="Total"></td>
                                    <td data-title="Total"></td>
                                </tr>
                                <tr>
                                    <td data-title="Product Name">
                                        <em>{{{trans('lang.insurance_amnt')}}}</em>
                                        <span>{{ $symbol }}{{{$invoice_info->insurance_amount}}} USD</span>
                                    </td>
                                    <td data-title="Unit Price"></td>
                                    <td data-title="Total"></td>
                                    <td data-title="Total"></td>
                                </tr>
                                <tr>
                                    <td data-title="Product Name">
                                        <em>{{{trans('lang.net_amnt')}}}</em>
                                        <span>{{ $symbol }}{{{$invoice_info->price}}} {{ strtoupper($invoice_info->currency_code) }}</span>
                                    </td>
                                    <td data-title="Unit Price"></td>
                                    <td data-title="Total"></td>
                                    <td data-title="Total"></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="wt-createtransactionhold wt-createtransactionholdvtwo">
                            <div class="wt-createtransactionheading">
                                <span></span>
                            </div>
                            <div class="wt-refundscontent">
                                <ul class="wt-refundsdetails">
                                    <li>
                                        <strong>{{{trans('lang.invoice_id')}}}</strong>
                                        <div class="wt-rightarea"><span>{{{$invoice_info->invoice_id}}}</span></div>
                                    </li>
                                    <li>
                                        <strong>{{{trans('lang.paid_by')}}}</strong>
                                        <div class="wt-rightarea">
                                            <span>{{{$invoice_info->payer_name}}}</span>
                                            <span>{{{trans('lang.pay_sender_note')}}} <em>{{{$invoice_info->payer_status}}}</em> </span>
                                            <span>{{{$invoice_info->payer_email}}}</span>
                                        </div>
                                    </li>
                                    <li>
                                        <strong><span>{{{trans('lang.need_help')}}}</span></strong>
                                        <span class="wt-refundsinfo">{{{trans('lang.paypal_note')}}}</span>
                                    </li>
                                    <li><span class="wt-refundsinfo">{{{trans('lang.paypal_warning_note')}}}</span></li>
                                    <li>
                                        <strong>{{{trans('lang.memo')}}}</strong>
                                        <div class="wt-rightarea"><span>{{{$invoice_info->title}}}</span></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
