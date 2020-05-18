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
                    <div class="wt-title">
                        <h2>{{ trans('lang.join_for_free') }}</h2>
                    </div>
                    @if (!empty($show_breadcrumbs) && $show_breadcrumbs === 'true')
                        <ol class="wt-breadcrumb">
                            <li><a href="{{ url('/') }}">{{ trans('lang.home') }}</a></li>
                            <li class="wt-active">{{ trans('lang.join_now') }}</li>
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
            <div class="col-xs-12 col-sm-12 col-md-10 push-md-1 col-lg-8 push-lg-2" id="registration">
                <div class="preloader-section" v-if="loading" v-cloak>
                    <div class="preloader-holder">
                        <div class="loader"></div>
                    </div>
                </div>
                <div class="wt-registerformhold">
                    <div class="wt-registerformmain">
                        <div class="wt-joinformc">
                                <form method="POST" action="{{ url('user/verify/emailcode') }}" class="wt-formtheme wt-formregister" id="verification_form">
                                    <div class="wt-registerhead">
                                        <div class="wt-title">
                                            <h3>{{{ $reg_three_title }}}</h3>
                                        </div>
                                        <div class="wt-description">
                                            <p>{{{ $reg_three_subtitle }}}</p>
                                        </div>
                                    </div>
                                    <figure class="wt-joinformsimg">
                                        <img src="{{ asset($register_image)}}" alt="{{{ trans('lang.verification_code_img') }}}">
                                    </figure>
                                    <fieldset>
                                        <div class="form-group">
                                            <label>
                                                {{{ trans('lang.verify_code_note') }}}
                                                @if (!empty($reg_page))
                                                    <a target="_blank" href="{{{url($reg_page)}}}">
                                                        {{{ trans('lang.why_need_code') }}}
                                                    </a>
                                                @else
                                                    <a href="javascript:void(0)">
                                                        {{{ trans('lang.why_need_code') }}}
                                                    </a>
                                                @endif
                                            </label>
                                            <input type="text" name="code" class="form-control" placeholder="{{{ trans('lang.enter_code') }}}">
                                        </div>
                                        <div class="form-group wt-btnarea">
                                            <button type="submit" class="wt-btn">{{{ trans('lang.continue') }}}</a>
                                        </div>
                                    </fieldset>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
