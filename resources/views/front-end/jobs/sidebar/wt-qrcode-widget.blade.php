<div class="tg-authorcodescan">
    <figure class="tg-qrcodeimg">
        {!! QrCode::size(100)->generate(Request::url('job/'.$job->slug)); !!}
    </figure>
    <div class="tg-qrcodedetail">
        <span class="lnr lnr-laptop-phone"></span>
        <div class="tg-qrcodefeat">
            <h3>{{ trans('lang.scan_with_smartphone') }} <span>{{ trans('lang.smartphone') }} </span> {{ trans('lang.get_handy') }}</h3>
        </div>
    </div>
</div>
