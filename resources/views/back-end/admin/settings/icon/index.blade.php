<div class="preloader-section" v-if="loading" v-cloak>
    <div class="preloader-holder">
        <div class="loader"></div>
    </div>
</div>
{!! Form::open(['url' => '', 'class' =>'wt-formtheme wt-userform la-dashboard-icons', 'id'
=>'upload_dashboard_icon', '@submit.prevent'=>'uploadDashboardIcons']) !!}
@foreach ($icons as $key => $icon)
    <div class="wt-selectdesignholder wt-tabsinfo">
        <div class="wt-selectdesign la-selectthemecolor">
            @if (!empty($dash_icons['hidden_'.$key]))
                <dashboard-icon
                :title="'{{$icon['title']}}'"
                :icon="'{{$icon['value']}}'"
                :icon_id="'{{$icon['value']}}'"
                :icon_name="'{{$icon['value']}}'"
                :icon_ref="'{{$icon['value']}}'"
                :icon_hidden_name="'icons[hidden_{{$icon['value']}}][hidden_{{$icon['value']}}]'"
                icon_hidden_id="'hidden_{{$icon['value']}}'"
                :existed_icon="'{{$dash_icons['hidden_'.$key]}}'"
                >
                </dashboard-icon>
            @else
                <dashboard-icon
                :title="'{{$icon['title']}}'"
                :icon="'{{$icon['value']}}'"
                :icon_id="'{{$icon['value']}}'"
                :icon_name="'{{$icon['value']}}'"
                :icon_ref="'{{$icon['value']}}'"
                :icon_hidden_name="'icons[hidden_{{$icon['value']}}][hidden_{{$icon['value']}}]'"
                icon_hidden_id="'hidden_{{$icon['value']}}'"
                >
                </dashboard-icon>
            @endif
        </div>
    </div>
@endforeach
<div class="wt-updatall la-updateall-holder">
    <i class="ti-announcement"></i>
    <span>{{{ trans('lang.save_changes_note') }}}</span>
    {!! Form::submit(trans('lang.btn_save'),['class' => 'wt-btn']) !!}
</div>
{{-- <div class="wt-updatall la-updateall-holder">
    {!! Form::submit(trans('lang.btn_save'), ['class' => 'wt-btn']) !!}
</div> --}}
{!! Form::close() !!}
