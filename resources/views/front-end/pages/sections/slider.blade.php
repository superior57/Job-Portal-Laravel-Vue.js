<div class="wt-haslayout wt-bannerholder" style="background-image:url({{{ asset(Helper::getHomeBanner('image')) }}})">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-5">
                <div class="wt-bannerimages">
                    <figure class="wt-bannermanimg" data-tilt>
                        <img src="{{{ asset(Helper::getHomeBanner('inner_image')) }}}" alt="{{{ trans('lang.img') }}}">
                    </figure>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                <div class="wt-bannercontent">
                    <div class="wt-bannerhead">
                        <div class="wt-title">
                            <h1>
                                <span>{{{ Helper::getHomeBanner('title') }}}</span>
                                {{{ Helper::getHomeBanner('subtitle') }}}
                            </h1>
                        </div>
                        <div class="wt-description">
                            <p>{{{ Helper::getHomeBanner('description') }}}</p>
                        </div>
                    </div>
                    <search-form
                    :widget_type="'home'"
                    :placeholder="'{{ trans('lang.looking_for') }}'"
                    :freelancer_placeholder="'{{ trans('lang.search_filter_list.freelancer') }}'"
                    :employer_placeholder="'{{ trans('lang.search_filter_list.employers') }}'"
                    :job_placeholder="'{{ trans('lang.search_filter_list.jobs') }}'"
                    :service_placeholder="'{{ trans('lang.search_filter_list.services') }}'"
                    :no_record_message="'{{ trans('lang.no_record') }}'"
                    >
                    </search-form>
                    <div class="wt-videoholder">
                        <div class="wt-videoshow">
                            <a data-rel="prettyPhoto[video]" href="{{{ Helper::getHomeBanner('video_url') }}}"><i class="fa fa-play"></i></a>
                        </div>
                        <div class="wt-videocontent">
                            <span>{{{  Helper::getHomeBanner('video_title') }}}<em>{{{ Helper::getHomeBanner('video_description') }}}</em></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>