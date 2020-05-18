@extends(file_exists(resource_path('views/extend/front-end/master.blade.php')) ? 
'extend.front-end.master':
 'front-end.master', ['body_class' => 'wt-innerbgcolor'] )
@push('stylesheets')
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
@endpush
{{-- @section('title'){{ 'Job Portal' }} @stop
@section('description', $f_list_meta_desc) --}}
@section('content')    
    @if ($show_article_banner == 'true')
        <div class="wt-haslayout wt-innerbannerholder" style="background-image:url({{{ asset(Helper::getBannerImage('uploads/settings/general/'.$article_inner_banner)) }}})">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-xs-12 col-sm-12 col-md-8 push-md-2 col-lg-6 push-lg-3">
                        <div class="wt-innerbannercontent">
                            <div class="wt-title">
                                <h2>{{ trans('lang.article_detail') }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="wt-haslayout wt-main-section">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 float-left">
                    <div class="wt-articlesingle-holder wt-bgwhite">
                        <div class="wt-articlesingle-content">
                            <figure class="wt-singleimg-one">
                                <img src="{{{asset(Helper::getImage('uploads/articles', $article->banner, 'large-', 'large-default-article.png'))}}}" alt="{{{ $article->title }}}">
                            </figure>
                            <div class="wt-title">
                                <h2>{{$article->title}}</h2>
                            </div>
                            <ul class="wt-postarticlemeta">
                                <li>
                                    <a href="javascript:void(0);">
                                        <i class="lnr lnr-calendar-full"></i>
                                        <span>{{ \Carbon\Carbon::parse($article->updated_at)->format('M d, Y')}}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <i class="lnr lnr-user"></i>
                                        <span>{{{ \App\Helper::getUserName($article->user_id) }}}</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="wt-description">
                                @php echo htmlspecialchars_decode(stripslashes($article->description)); @endphp
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
        <script>
            if (APP_DIRECTION == 'rtl') {
                var direction = true;
            } else {
                var direction = false;
            }
        </script>
    @endpush
@endsection