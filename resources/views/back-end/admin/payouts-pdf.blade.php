<html>
    <head>
        <style>
            @page {
                margin: 10px 0px 50px 0px;
            }

            header {
                position: fixed;
                top: -20px;
                left: 0px;
                right: 0px;
                height: 50px;
                font-family: sans-serif;
                background: url('.$border_image.');
                background-size:1px;
                background-size: 100% 2px;
                background-repeat: no-repeat;
            }

            footer {
                position: fixed; 
                bottom: -60px; 
                left: 0px; 
                right: 0px;
                height: 50px; 
            }
            table { border-collapse: collapse; }
        </style>
    </head>
    <body style="font-family: sans-serif;">
        <header>
            <div style="width:100%; display: inline-block; text-align:center; font-family: sans-serif;">
                <table style="width:96%; margin:80px auto 0;">
                    <tr style="text-align:left;">
                        <td width="70%">
                            <h1 style="font-size: 26px;line-height: 26px;margin: 0 0 10px; font-weight: 500; color: #3d4461;">{{ trans('lang.payout') }}</h1>
                            <span style="font-size:16px;line-height: 20px;display: block; color: #3d4461;">{{ trans('lang.payout_history_note') }} {{{$month}}},{{{$year}}}</span>
                        </td>
                    </tr>
                </table>
            </div>
        </header>
        <footer style="border-top: 1px solid #eee; text-align: center;margin-top: 80px;padding: 20px 0;">
            <span style="display: block;font-size: 16px;color: #3d4461;line-height: 20px;">
                {{ trans('lang.computer_generated_slip') }}
            </span>
        </footer>
        <main>
            <table style="width: 95%; margin: 150px auto 0;font-family: sans-serif;">
                <thead>
                    <tr style="text-align: left; border-radius:5px 0 0;">
                        <th style="width:15%; padding: 15px 20px;background: #f5f5f5; font-size:14px;">{{ trans('lang.user_name') }}</th>
                        <th style="width:10%; padding: 15px 20px;background: #f5f5f5; font-size:14px;">{{ trans('lang.amount') }}</th>
                        <th style="width:10%; padding: 15px 20px;background: #f5f5f5; font-size:14px;word-wrap:break-word;">{{ trans('lang.method') }}</th>
                        <th style="width:30%; padding: 15px 20px;background: #f5f5f5; font-size:14px;word-wrap:break-word;">{{ trans('lang.details') }}</th>
                        <th style="width:15%; padding: 15px 20px;background: #f5f5f5; font-size:14px;">{{ trans('lang.status') }}</th>
                    </tr>
                </thead>
                @if ($payouts->count() > 0)
                    @php $counter = 0; @endphp
                    <tbody>
                        @foreach ($payouts as $key => $payout)
                            <tr>
                                <td style="padding: 15px 20px;border-top: 1px solid #e2e2e2; font-size:14px;">{{ Helper::getUserName($payout->user_id) }}</td>
                                <td style="padding: 15px 20px;border-top: 1px solid #e2e2e2; font-size:14px;">{{ Helper::currencyList($payout->currency)['symbol'] }}{{{ $payout->amount }}}</td>
                                <td style="padding: 15px 20px;border-top: 1px solid #e2e2e2; font-size:14px;">
                                    {{!empty(Helper::getPayoutsList()[$payout->payment_method]['title']) ? Helper::getPayoutsList()[$payout->payment_method]['title'] : ''}}
                                </td>
                                <td style="padding: 15px 20px;border-top: 1px solid #e2e2e2;word-wrap:break-word; font-size:14px;">
                                    @if (!empty(($payout->bank_details)))
                                        @php $detail = Helper::getUnserializeData($payout->bank_details);@endphp
                                        {{ trans('lang.bank_account_name') }}: {{$detail['bank_account_name']}} 
                                        {{ trans('lang.bank_account_number') }}: {{$detail['bank_account_number']}} 
                                        {{ trans('lang.bank_name') }}: {{$detail['bank_name']}} 
                                        {{ trans('lang.bank_routing_number') }}: {{$detail['bank_routing_number']}} 
                                        {{ trans('lang.bank_iban') }}: {{$detail['bank_iban']}} 
                                    @elseif (!empty($payout->paypal_id))
                                        {{{$payout->paypal_id}}}
                                    @endif
                                </td>
                                <td style="padding: 15px 20px;border-top: 1px solid #e2e2e2; font-size:14px;">{{{ $payout->status }}}</td>
                            </tr>
                            @php $counter++; @endphp
                        @endforeach
                    </tbody>
                @endif
            </table>
        </main>
    </body>
</html>
