<nav id="wt-nav" class="wt-nav navbar-expand-lg">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <i class="lnr lnr-menu"></i>
    </button>
    <div class="collapse navbar-collapse wt-navigation" id="navbarNav">
        <ul class="navbar-nav">
            <!-- @if (!empty($pages) || Schema::hasTable('pages'))
                @foreach ($pages as $key => $page)
                    @php
                        $page_has_child = App\Page::pageHasChild($page->id); $pageID = Request::segment(2);
                        $show_page = \App\SiteManagement::where('meta_key', 'show-page-'.$page->id)->select('meta_value')->pluck('meta_value')->first();
                    @endphp
                    @if ($page->relation_type == 0 && ($show_page == 'true' || $show_page == true))
                        <li class="{{!empty($page_has_child) ? 'menu-item-has-children page_item_has_children' : '' }} @if ($pageID == $page->slug ) current-menu-item @endif">
                            <a href="{{url('page/'.$page->slug)}}">{{{$page->title}}}</a>
                            @if (!empty($page_has_child))
                                <ul class="sub-menu">
                                    @foreach($page_has_child as $parent)
                                        @php $child = App\Page::getChildPages($parent->child_id);@endphp
                                        @if (!empty($child))
                                            <li class="@if ($pageID == $child->slug ) current-menu-item @endif">
                                                <a href="{{url('page/'.$child->slug.'/')}}">
                                                    {{{$child->title}}}
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endif
                @endforeach
            @endif -->
            <!-- <li>
                <a href="{{url('articles')}}">
                    {{{ trans('lang.articles') }}}
                </a>
            </li> -->
            <!-- <li>
                <a href="{{url('search-results?type=freelancer')}}">
                    {{{ trans('lang.view_freelancers') }}}
                </a>
            </li> -->
            <!-- <li>
                <a href="{{url('search-results?type=employer')}}">
                    {{{ trans('lang.view_employers') }}}
                </a>
            </li> -->
            @if ($type =='jobs' || $type == 'both')
                <li>
                    <a href="{{url('search-results?type=job')}}">
                        {{{ trans('lang.browse_jobs') }}}
                    </a>
                </li>
            @endif
                <li>
                    <a href="#">
                        Hadvarker
                    </a>
                </li>
                <li>
                    <a href="#">
                        Information
                    </a>
                </li>
                <li>
                    <a href="#">
                        Opret Konto
                    </a>
                </li>
            <!-- @if ($type =='services' || $type == 'both')
                <li>
                    <a href="{{url('search-results?type=service')}}">
                        {{{ trans('lang.browse_services') }}}
                    </a>
                </li>
            @endif -->
        </ul>
    </div>
</nav>