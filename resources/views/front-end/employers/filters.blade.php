{!! Form::open(['url' => url('search-results'), 'method' => 'get', 'class' => 'wt-formtheme wt-formsearch']) !!}
    <input type="hidden" value="{{$type}}" name="type">
    <aside id="wt-sidebar" class="wt-sidebar">
        <div class="wt-widget wt-startsearch">
            <div class="wt-widgettitle">
                <h2>{{ trans('lang.start_search') }}</h2>
            </div>
            <div class="wt-widgetcontent">
                <div class="wt-formtheme wt-formsearch">
                    <fieldset>
                        <div class="form-group">
                            <input type="text" name="s" class="form-control" placeholder="{{ trans('lang.ph_search_employer') }}" value="{{$keyword}}">
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
        <div class="wt-widget wt-effectiveholder">
            <div class="wt-widgettitle">
                <h2>{{ trans('lang.location') }}</h2>
            </div>
            <div class="wt-widgetcontent">
                <div class="wt-formtheme wt-formsearch">
                    <fieldset>
                        <div class="form-group">
                            <input type="text" class="form-control filter-records" placeholder="{{ trans('lang.search_loc') }}">
                            <a href="javascrip:void(0);" class="wt-searchgbtn"><i class="lnr lnr-magnifier"></i></a>
                        </div>
                    </fieldset>
                    <fieldset>
                        @if (!empty($locations))
                            <div class="wt-checkboxholder wt-verticalscrollbar">
                                @foreach ($locations as $location)
                                    @php $checked = ( !empty($_GET['locations']) && in_array($location->slug, $_GET['locations'])) ? 'checked' : '' @endphp
                                    <span class="wt-checkbox">
                                        <input id="location-{{{ $location->slug }}}" type="checkbox" name="locations[]" value="{{{$location->slug}}}" {{$checked}}>
                                        <label for="location-{{{ $location->slug }}}"> <img src="{{{asset(App\Helper::getLocationFlag($location->flag))}}}" alt="{{ trans('lang.img') }}"> 
                                            {{{ $location->title }}}
                                        </label>
                                    </span>
                                @endforeach
                            </div>
                        @endif
                    </fieldset>
                </div>
            </div>
        </div>
        <div class="wt-widget wt-effectiveholder">
            <div class="wt-widgettitle">
                <h2>{{ trans('lang.no_of_employee') }}</h2>
            </div>
            <div class="wt-widgetcontent">
                <div class="wt-formtheme wt-formsearch">
                    <fieldset>
                        <div class="wt-checkboxholder wt-verticalscrollbar">
                            @foreach (Helper::getEmployeesList() as $employee)
                                @php $checked = ( !empty($_GET['employees']) && in_array($employee['value'], $_GET['employees'])) ? 'checked' : '' @endphp
                                <span class="wt-checkbox">
                                    <input id="employee-{{{ $employee['value'] }}}" type="checkbox" name="employees[]" value="{{{ $employee['value'] }}}" {{{ $checked }}}>
                                    <label for="employee-{{{ $employee['value'] }}}">{{{ $employee['title'] }}}</label>
                                </span>
                            @endforeach
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
        <div class="wt-widget wt-effectiveholder">
            <div class="wt-widgetcontent">
                <div class="wt-applyfilters">
                    <span>{{ trans('lang.apply_filter') }}<br> {{ trans('lang.changes_by_you') }}</span>
                    {!! Form::submit(trans('lang.btn_apply_filters'), ['class' => 'wt-btn']) !!}
                </div>
            </div>
        </div>
    </aside>
{!! form::close(); !!}