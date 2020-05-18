<div class="wt-widget wt-sharejob">
    <div class="wt-widgettitle">
        <h2>{{ trans('lang.share_job') }}</h2>
    </div>
    <div class="wt-widgetcontent">
        <ul class="wt-socialiconssimple">
            <li class="wt-facebook">
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}" class="social-share">
                <i class="fa fa fa-facebook-f"></i>{{ trans('lang.share_fb') }}</a>
            </li>
            <li class="wt-twitter">
                <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}" class="social-share">
                <i class="fa fab fa-twitter"></i>{{ trans('lang.share_twitter') }}</a>
            </li>
            <li class="wt-pinterest">
                <a href="//pinterest.com/pin/create/button/?url={{ urlencode(Request::fullUrl()) }}"
                onclick="window.open(this.href, \'post-share\',\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;">
                <i class="fa fab fa-pinterest-p"></i>{{ trans('lang.share_pinterest') }}</a>
            </li>
            <li class="wt-googleplus">
                <a href="https://plus.google.com/share?url={{ urlencode(Request::fullUrl()) }}" class="social-share">
                <i class="fa fab fa-google-plus-g"></i>{{ trans('lang.share_google') }}</a>
            </li>
        </ul>
    </div>
</div>
