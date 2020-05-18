@extends(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master')
@section('content')
    <section class="wt-haslayout wt-dbsectionspace">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-9 float-right" id="invoice_list">
                <div class="wt-dashboardbox wt-dashboardinvocies">
                    @if (file_exists(resource_path('views/extend/back-end/freelancer/profile-settings/tabs.blade.php')))
                        @include('extend.back-end.freelancer.payouts.tabs')
                    @else
                        @include('back-end.freelancer.payouts.tabs')
                    @endif
                    <div class="wt-tabscontent tab-content">
                        <div class="wt-tabscontenttitle">
                            <h2>{{ trans('lang.payouts') }}</h2>
                        </div>
                        <div class="wt-dashboardboxcontent wt-categoriescontentholder wt-categoriesholder">
                            <table class="wt-tablecategories">
                                <thead>
                                    <tr>
                                        <th>{{ trans('lang.date') }}</th>
                                        <th>{{ trans('lang.amount') }}</th>
                                        <th>{{ trans('lang.payment_method') }}</th>
                                    </tr>
                                </thead>
                                @if ($payouts->count() > 0)
                                    <tbody>
                                        @foreach ($payouts as $key => $payout)
                                            <tr>
                                                <td>{{{ \Carbon\Carbon::parse($payout->created_at)->format('M d, Y') }}}</td>
                                                <td>{{ Helper::currencyList($payout->currency)['symbol'] }}{{{ $payout->amount }}}</td>
                                                <td>
                                                    {{!empty(Helper::getPayoutsList()[$payout->payment_method]['title']) ? Helper::getPayoutsList()[$payout->payment_method]['title'] : ''}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                @endif
                            </table>
                            @if ($payouts->count() === 0)
                                @if (file_exists(resource_path('views/extend/errors/no-record.blade.php')))
                                    @include('extend.errors.no-record')
                                @else
                                    @include('errors.no-record')
                                @endif
                            @endif
                            @if ( method_exists($payouts,'links') )
                                {{ $payouts->links('pagination.custom') }}
                            @endif
                        </div>
                    </div
                </div>
            </div>
        </div>
    </section>
@endsection
