@extends(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master')
@section('content')
    <section class="wt-haslayout wt-dbsectionspace">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-9" id="message_center">
                <div class="wt-dashboardbox wt-messages-holder">
                    <div class="wt-dashboardboxtitle">
                        <h2>{{ trans('lang.msgs') }}</h2>
                    </div>
                    <message-center 
                        :empty_field="'{{ trans('lang.empty_field') }}'" 
                        :host="'{{$chat_settings['host']}}'" 
                        :port="'{{$chat_settings['port']}}'">
                    </message-center>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script src="{{ asset('js/emojionearea.min.js') }}"></script>
    <script src="{{ asset('js/linkify.min.js') }}"></script>
    <script src="{{ asset('js/linkify-jquery.min.js') }}"></script>
@endpush
