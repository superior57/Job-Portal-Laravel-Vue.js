{!! Form::open(['url' => '', 'class' =>'wt-formtheme wt-userform', 'id' =>'general-home-setting-form', '@submit.prevent'=>'submitGeneralHomeSettings'])!!}
    <div class="wt-location wt-tabsinfo">
        <div class="wt-tabscontenttitle">
            <h2>{{{ trans('lang.homepage') }}}</h2>
        </div>
        <div class="wt-settingscontent">
            <div class="wt-formtheme wt-userform">
                <div class="form-group">
                    <span class="wt-select">
                        <select class="form-control" name="home">
                            @foreach ($homepage_list as $key => $value)
                                @php $selected = $value->id == $selected_homepage ? 'selected' : '' @endphp
                                <option value="{{$value->id}}" {{$selected}}> {{$value->title}}</option>
                            @endforeach
                        </select>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="wt-updatall la-updateall-holder">
        <i class="ti-announcement"></i>
        <span>{{{ trans('lang.save_changes_note') }}}</span>
        {!! Form::submit(trans('lang.btn_save'),['class' => 'wt-btn']) !!}
    </div>
{!! Form::close() !!}
