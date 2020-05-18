@extends(file_exists(resource_path('views/extend/front-end/master.blade.php')) ? 
'extend.front-end.master':
 'front-end.master', ['body_class' => 'wt-innerbgcolor'] )
@section('content')
    <div class="wt-haslayout wt-innerbannerholder wt-innerbannerholdervtwo" style="background-image: url({{{ asset($banner) }}});">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-xs-12 col-sm-12 col-md-8 push-md-2 col-lg-6 push-lg-3">
                </div>
            </div>
        </div>
    </div>
    <div class="proifle-single wt-paddingtopnull wt-haslayout">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 float-left">
                    {{ trans('lang.thanks_subscription') }}
                    <a class="wt-btn" href="{{{url('paypal/ec-checkout')}}}"><span>{{ trans('lang.click_here') }} </span></a>
                </div>
            </div>
        </div>
    </div>
@endsection
