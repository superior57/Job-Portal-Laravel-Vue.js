@extends(file_exists(resource_path('views/extend/front-end/master.blade.php')) ? 
'extend.front-end.master':
 'front-end.master', ['body_class' => 'wt-innerbgcolor'] )
@push('stylesheets')
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
@endpush
{{-- @section('title'){{ $f_list_meta_title }} @stop
@section('description', $f_list_meta_desc) --}}
@section('content')
    @if ($show_article_banner == 'true')
        <div class="wt-haslayout wt-innerbannerholder" style="background-image:url({{{ asset(Helper::getBannerImage($article_inner_banner, 'uploads/settings/general')) }}})">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-xs-12 col-sm-12 col-md-8 push-md-2 col-lg-6 push-lg-3">
                        <div class="wt-innerbannercontent">
                            <div class="wt-title">
                                <h2>{{ trans('lang.articles') }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="wt-haslayout wt-main-section">
        <div class="container">
            <div class="row">
                <div id="wt-twocolumns" class="wt-twocolumns wt-haslayout">
                    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-4 float-left">
                        <aside id="wt-sidebar" class="wt-sidebar">
                            @if (!empty($cats)  && count($cats) !== 0)
                                <div class="wt-widget wt-categoriesholder">
                                    <div class="wt-widgettitle">
                                        <h2>{{ trans('lang.cats') }}</h2>
                                    </div>
                                    <div class="wt-widgetcontent">
                                        <ul class="wt-categoriescontent">
                                            @foreach ($cats as $key => $cat)
                                            @php 
                                                $selected_category = \App\ArticleCategory::where('id', $cat['id'])->first(); 
                                                $article_count = $selected_category->articles->count();
                                            @endphp
                                            <li><a href="{{{ url('articles/'.$cat['slug']) }}}">{{$cat['title']}}<em>{{$article_count}}</em></a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif
                            @if (!empty($latest_article)  && count($latest_article) !== 0)
                                <div class="wt-widget wt-widgetarticlesholder">
                                    <div class="wt-widgettitle">
                                        <h2>{{ trans('lang.popular_articles') }}</h2>
                                    </div>
                                    <div class="wt-widgetcontent">
                                        @foreach ($latest_article as $key => $article)
                                            <div class="wt-particlehold">
                                                <figure>
                                                    <img src="{{{asset(Helper::getImage('uploads/articles', $article->banner, 'x-small-', 'xsmall-default-article.png'))}}}" alt="image description">
                                                </figure>
                                                <div class="wt-particlecontent">
                                                    <h3><a href="{{{ url('article/'.$article->slug) }}}">{{$article->title}}</a></h3>
                                                    <span><i class="lnr lnr-clock"></i>{{ \Carbon\Carbon::parse($article->updated_at)->format('M d, Y')}}</span>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </aside>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xl-8 float-left">
                        <div class="wt-classicaricle-holder">
                            <div class="wt-classicaricle-header">
                                <div class="wt-title">
                                    <h2>{{ trans('lang.our_latest_articles') }}</h2>
                                </div>
                            </div>
                            @if (!empty($articles) && count($articles) !== 0)
                                <div class="wt-article-holder">
                                    @foreach ($articles as $key => $article)
                                        <div class="wt-article">
                                            <figure>
                                                <a href="{{{ url('article/'.$article->slug) }}}">
                                                    <img src="{{{asset(Helper::getImage('uploads/articles', $article->banner, 'medium-', 'medium-default-article.png'))}}}" alt="{{{ $article->title }}}">
                                                </a>
                                            </figure>
                                            <div class="wt-articlecontent">
                                                <a href="{{{ url('article/'.$article->slug) }}}">
                                                    <div class="wt-title">
                                                        <h2>{{$article->title}}</h2>
                                                    </div>
                                                </a>
                                                <ul class="wt-postarticlemeta">
                                                    <li>
                                                        <a href="javascript:void(0);">
                                                            <i class="lnr lnr-clock"></i>
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
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                @if ( method_exists($articles,'links') )
                                    {{ $articles->links('pagination.custom') }}
                                @endif
                            @else
                                @if (file_exists(resource_path('views/extend/errors/no-record.blade.php'))) 
                                    @include('extend.errors.no-record')
                                @else 
                                    @include('errors.no-record')
                                @endif
                            @endif
                            {{-- <nav class="wt-pagination">
                                <ul>
                                    <li class="wt-prevpage"><a href="javascrip:void(0);"><i class="lnr lnr-chevron-left"></i></a></li>
                                    <li><a href="javascrip:void(0);">1</a></li>
                                    <li><a href="javascrip:void(0);">2</a></li>
                                    <li><a href="javascrip:void(0);">3</a></li>
                                    <li><a href="javascrip:void(0);">4</a></li>
                                    <li><a href="javascrip:void(0);">...</a></li>
                                    <li><a href="javascrip:void(0);">50</a></li>
                                    <li class="wt-nextpage"><a href="javascrip:void(0);"><i class="lnr lnr-chevron-right"></i></a></li>
                                </ul>
                            </nav> --}}
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
