@extends(file_exists(resource_path('views/extend/front-end/master.blade.php')) ? 'extend.front-end.master' : 'front-end.master')
@section('content')
    @php
    $breadcrumbs_settings = \App\SiteManagement::getMetaValue('show_breadcrumb');
    $show_breadcrumbs = !empty($breadcrumbs_settings) ? $breadcrumbs_settings : 'true';
    @endphp
    <div class="wt-haslayout wt-innerbannerholder">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-xs-12 col-sm-12 col-md-8 push-md-2 col-lg-6 push-lg-3">
                    <div class="wt-innerbannercontent">
                    <div class="wt-title"><h2>{{ trans('lang.access_denied') }}</h2></div>
                    @if (!empty($show_breadcrumbs) && $show_breadcrumbs === 'true')
                        <ol class="wt-breadcrumb">
                            <li><a href="{{{ url('/') }}}">{{ trans('lang.home') }}</a></li>
                            <li class="wt-active">{{ trans('lang.no_permission') }}</li>
                        </ol>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wt-haslayout wt-main-section">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-xs-12 col-sm-12 col-md-10 push-md-1 col-lg-8 push-lg-2">
                    <div class="wt-404errorpage">
                        <div class="wt-404errorcontent">
                            <div class="wt-title">
                                <h3>{{ trans('lang.no_access') }}</h3>
                            </div>
                            <div class="wt-description">
                            <a class="wt-btn btn-large" href="{{{ url('/') }}}">{{ trans('lang.home') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


