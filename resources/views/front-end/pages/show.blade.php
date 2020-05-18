@extends(file_exists(resource_path('views/extend/front-end/master.blade.php')) ? 
'extend.front-end.master':
 'front-end.master', ['body_class' => 'wt-innerbgcolor'] )
@push('sliderStyle') 
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
@endpush
@push('stylesheets')
    <link href="{{ asset('css/prettyPhoto-min.css') }}" rel="stylesheet">
@endpush
@section('title'){{ config('app.name') }}@stop
@section('description', "$meta_desc")
@if ($slider_style == 'style2' || $slider_style == 'style3' && $slider_order == 0)
    @section('homeSlider')
        <div id="slider">
            @if ($slider_style == 'style2')
                <second-slider 
                    :page_id="{{$page['id']}}">
                </second-slider>
            @elseif ($slider_style == 'style3')
                <third-slider 
                    :page_id="{{$page['id']}}">
                </third-slider>
            @endif
        </div>
    @endsection
@endif
@section('content')
    @if ($show_banner_image == true && $home == false)
        @php $breadcrumbs = Breadcrumbs::generate('showPage',$page, $slug); @endphp
        <div class="wt-haslayout wt-innerbannerholder" style="background-image:url({{{ asset($banner) }}})">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-xs-12 col-sm-12 col-md-8 push-md-2 col-lg-6 push-lg-3">
                        <div class="wt-innerbannercontent">
                            @if (!empty($page) && $show_title == true)
                                <div class="wt-title">
                                    <h2>{{{ $page['title'] }}}</h2>
                                </div>
                            @endif
                            @if (!empty($show_breadcrumbs) && $show_breadcrumbs === 'true')
                                @if (count($breadcrumbs))
                                    <ol class="wt-breadcrumb">
                                        @foreach ($breadcrumbs as $breadcrumb)
                                            @if ($breadcrumb->url && !$loop->last)
                                                <li><a href="{{{ $breadcrumb->url }}}">{{{ $breadcrumb->title }}}</a></li>
                                            @else
                                                <li class="active">{{{ $breadcrumb->title }}}</li>
                                            @endif
                                        @endforeach
                                    </ol>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div id="pages-list">
        @if (Session::has('error'))
            <div class="flash_msg">
                <flash_messages :message_class="'danger'" :time ='5' :message="'{{{ Session::get('error') }}}'" v-cloak></flash_messages>
            </div>
            @php session()->forget('error'); @endphp
        @endif
        @if ($home == false)
            @if ($show_banner_image == false && !empty($page['title']) && $show_title == true)
                <div class="wt-innerbannercontent wt-without-banner-title">
                    <div class="wt-title">
                        <h2>{{{ $page['title'] }}}</h2>
                    </div>
                </div>
            @endif
        @endif
        @if (!empty($page))
            @if (!empty($sections))
                <show-page 
                :sections_list="'{{json_encode($sections)}}'"
                :page="'{{json_encode($page)}}'"
                :type="'{{$type}}'">
                </show-page>
            @endif
            @if (!empty($description && $description != 'null'))
                <div class="dc-contentwrappers">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 float-left">
                                <div class="dc-howitwork-hold dc-haslayout">
                                    <div class="dc-haslayout dc-main-section">
                                        @php echo htmlspecialchars_decode(stripslashes($description)); @endphp
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @else
            @if (file_exists(resource_path('views/extend/errors/404.blade.php'))) 
                @include('extend.errors.404')
            @else 
                @include('errors.404')
            @endif
        @endif
        @if (!empty($skills)
            || !empty($categories)
            || !empty($locations)
            || !empty($languages))
            <section class="wt-haslayaout wt-main-section wt-footeraboutus">
                <div class="container">
                    <div class="row">
                        @if (Helper::getAccessType() != 'services')
                            @if ($skills->count() > 0)
                                <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                                    <div class="wt-widgetskills">
                                        <div class="wt-fwidgettitle">
                                            <h3>{{ trans('lang.by_skills') }}</h3>
                                        </div>
                                        @if (!empty($skills))
                                            <ul class="wt-fwidgetcontent">
                                                @foreach ($skills as $skill)
                                                    <li><a href="{{{url('search-results?type=job&skills%5B%5D='.$skill->slug)}}}">{{{ $skill->title }}}</a></li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        @endif
                        @if ($categories->count() > 0)
                            <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                                <div class="wt-footercol wt-widgetcategories">
                                    <div class="wt-fwidgettitle">
                                        <h3>{{ trans('lang.by_cats') }}</h3>
                                    </div>
                                    @if (!empty($categories))
                                        <ul class="wt-fwidgetcontent">
                                            @foreach ($categories as $category)
                                                <li><a href="{{{url('search-results?type='.$type.'&category%5B%5D='.$category->slug)}}}">{{{ $category->title }}}</a></li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        @endif
                        @if ($locations->count() > 0)
                            <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                                <div class="wt-widgetbylocation">
                                    <div class="wt-fwidgettitle">
                                        <h3>{{ trans('lang.by_locs') }}</h3>
                                    </div>
                                    @if (!empty($locations))
                                        <ul class="wt-fwidgetcontent">
                                            @foreach ($locations as $location)
                                                <li><a href="{{{url('search-results?type='.$type.'&locations%5B%5D='.$location->slug)}}}">{{{ $location->title }}}</a></li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        @endif
                        @if ($languages->count() > 0)
                            <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                                <div class="wt-widgetbylocation">
                                    <div class="wt-fwidgettitle">
                                        <h3>{{ trans('lang.by_lang') }}</h3>
                                    </div>
                                    @if (!empty($languages))
                                        <ul class="wt-fwidgetcontent">
                                            @foreach ($languages as $language)
                                                <li><a href="{{{url('search-results?type='.$type.'&languages%5B%5D='.$language->slug)}}}">{{{ $language->title }}}</a></li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </section>
        @endif
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/prettyPhoto-min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    @if ($slider_style == 'style2')
        <script>
            jQuery('#wt-header').addClass('wt-headervthhree')
            jQuery('#wt-header').removeClass('wt-headervtwo')
            jQuery('.wt-formtheme.wt-formbanner.wt-formbannervtwo').remove()
        </script>
        @if (isset($_SERVER["SERVER_NAME"]) && $_SERVER["SERVER_NAME"] === 'amentotech.com')
            <script>
                jQuery('.wt-logo a img').attr('src',(APP_URL+'/images/logo-white.png'));
            </script>
        @endif
    @else
        <script src="{{ asset('js/tilt.jquery.js') }}"></script>
    @endif
@endpush
