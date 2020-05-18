@extends(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master')
@section('content')
    <section class="wt-haslayout wt-dbsectionspace">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-9 float-right" id="invoice_list">
                <div class="wt-dashboardbox wt-dashboardinvocies">
                    <div class="wt-dashboardboxtitle wt-titlewithsearch">
                        <h2>{{ trans('lang.invoices') }}</h2>
                    </div>
                    <div class="wt-dashboardboxcontent wt-categoriescontentholder wt-categoriesholder" id="printable_area">
                        @if (!empty($invoices) && $invoices->count() > 0)
                            <table class="wt-tablecategories">
                                <thead>
                                    <tr>
                                        <th>
                                            <span class="wt-checkbox">
                                                <input id="wt-name" type="checkbox" name="head">
                                                <label for="wt-name"></label>
                                            </span>
                                        </th>
                                        <th>{{ trans('lang.invoice_id') }}</th>
                                        <th>{{ trans('lang.purchase_date') }}</th>
                                        <th>{{ trans('lang.expriry_date') }}</th>
                                        <th>{{ trans('lang.amount') }}</th>
                                        <th>{{ trans('lang.action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($invoices as $invoice)
                                        @php
                                            $package_options = unserialize($invoice->options);
                                            if ($package_options['duration'] === 10){
                                                    $expiry_date = (!empty($invoice) && !empty($invoice->created_at)) ? $invoice->created_at->addDays(4) : '';
                                            } elseif ($package_options['duration'] === 30){
                                                    $expiry_date = (!empty($invoice) && !empty($invoice->created_at)) ? $invoice->created_at->addDays(30): '';
                                            } elseif ($package_options['duration'] === 360){
                                                    $expiry_date = (!empty($invoice) && !empty($invoice->created_at)) ? $invoice->created_at->addDays(360) : '';
                                            }
                                        @endphp
                                        @if (!empty($invoice))
                                            <tr>
                                                <td>
                                                    <span class="wt-checkbox">
                                                        <input id="wt-{{{ $invoice->id}}}" type="checkbox" name="head">
                                                        <label for="wt-{{{ $invoice->id}}}"></label>
                                                    </span>
                                                </td>
                                                <td>{{{ $invoice->invoice_id}}}</td>
                                                <td>{{{ \Carbon\Carbon::parse($invoice->created_at)->format('M d, Y') }}}</td>
                                                <td>{{{ \Carbon\Carbon::parse($expiry_date)->format('M d, Y') }}}</td>
                                                <td>{{ !empty($symbol) ? $symbol['symbol'] : '$' }}{{{ $invoice->price }}}</td>
                                                <td>
                                                    <div class="wt-actionbtn">
                                                        <a class="print-window wt-addinfo wt-skillsaddinfo" href="{{ url('show/invoice/'.$invoice->id) }}">{{ trans('lang.view_invoice') }}</a>
                                                    </div>
                                                </td>
                                            </tr>
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
                        @if ( method_exists($invoices,'links') )
                            {{ $invoices->links('pagination.custom') }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
