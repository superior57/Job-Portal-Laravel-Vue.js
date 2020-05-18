@extends(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master')
@section('content')
    <section class="wt-haslayout wt-dbsectionspace">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-9 float-right" id="invoice_list">
                <div class="preloader-section" v-if="loading" v-cloak>
                    <div class="preloader-holder">
                        <div class="loader"></div>
                    </div>
                </div>
                <div class="wt-dashboardbox wt-dashboardinvocies la-payout-holder">
                    <div class="wt-dashboardboxtitle wt-titlewithsearch wt-titlewithbtn">
                        <h2>{{ trans('lang.payouts') }}</h2>
                        @if ($selected_year)
                            <a href="javascript:;" v-on:click="generatePdfPayout('{{$selected_year}}', '{{$selected_month}}')" class="wt-btn"> {{ trans('lang.download') }}</a>
                        @endif
                        {!! Form::open(['url' => url('admin/payouts'), 'method' => 'get', 'class' => 'wt-formtheme wt-formsearch', 'id'=>'payout_year_filter']) !!}
                            <span class="wt-select">
                                <select name="year" @change.prevent='getPayouts' id="payout_year">
                                    <option value="" disabled selected>{{ trans('lang.select_year') }}</option>
                                    @foreach ($years as $key => $year)
                                        @php $selected = $selected_year == $year ? 'selected' : '' @endphp
                                        <option value="{{$year}}" {{$selected}}> {{$year}} </option>
                                    @endforeach
                                </select>
                            </span>
                            <span class="wt-select">
                                <select name="month" @change.prevent='getPayouts' id="payout_month">
                                    <option value="" disabled selected>{{ trans('lang.select_month') }}</option>
                                    @foreach ($months as $key => $month)
                                        @php $selected = $selected_month == $key ? 'selected' : '' @endphp
                                        <option value="{{$key}}" {{$selected}}> {{$month}} </option>
                                    @endforeach
                                </select>
                            </span>
                        {!! Form::close() !!}
                    </div>
                    <div class="wt-dashboardboxcontent wt-categoriescontentholder wt-categoriesholder">
                        @if (file_exists(resource_path('views/extend/back-end/admin/payouts-table.blade.php'))) 
                            @include('extend.back-end.admin.payouts-table')
                        @else 
                            @include('back-end.admin.payouts-table')
                        @endif
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
                </div>
            </div>
        </div>
    </section>
@endsection
