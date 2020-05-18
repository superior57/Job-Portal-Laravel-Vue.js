@extends(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master')
@section('content')
    <div class="locations-listing la-locations-listing" id="location">
        @if (Session::has('message'))
            <div class="flash_msg">
                <flash_messages :message_class="'success'" :time ='5' :message="'{{{ Session::get('message') }}}'" v-cloak></flash_messages>
            </div>
        @elseif (Session::has('error'))
            <div class="flash_msg">
                <flash_messages :message_class="'danger'" :time ='5' :message="'{{{ Session::get('error') }}}'" v-cloak></flash_messages>
            </div>
        @endif
        <section class="wt-haslayout wt-dbsectionspace la-admin-locations">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 float-left">
                    <div class="wt-dashboardbox">
                        <div class="wt-dashboardboxtitle">
                            <h2>{{{ trans('lang.add_location') }}}</h2>
                        </div>
                        <div class="wt-dashboardboxcontent">
                            {!! Form::open(['url' => url('admin/store-location'), 'class' =>'wt-formtheme wt-formprojectinfo wt-formcategory', 'id'=>'location_form'])!!}
                            <fieldset>
                                <div class="form-group">
                                    {!! Form::text( 'title', null, ['class' =>'form-control'.($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => trans('lang.ph_location_title'), 'id'=>'location_title']) !!}
                                    <span class="form-group-description">{{{ trans('lang.desc') }}}</span>
                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                @if (!empty($locations))
                                    <div class="form-group">
                                        <span class="wt-select">
                                            <select class="form-control" name="parent_location">
                                                <option value="0">{{ trans('lang.choose_parent_cat') }}</option>
                                                @php Helper::listTreeCategories(); @endphp
                                            </select>
                                        </span>
                                        <span class="form-group-description">{{{ trans('lang.parent_desc') }}}</span>
                                    </div>
                                @endif
                                <div class="form-group">
                                    {!! Form::textarea( 'abstract', null, ['class' =>'form-control', 'placeholder' => trans('lang.ph_desc'), 'id'=>'location_abstract']) !!}
                                    <span class="form-group-description">{{{ trans('lang.cat_desc') }}}</span>
                                </div>
                                <div class="wt-settingscontent">
                                    <div class = "wt-formtheme wt-userform">
                                        <upload-image
                                            :id="'location_image'"
                                            :img_ref="'location_ref'"
                                            :url="'{{url('admin/locations/upload-temp-image')}}'"
                                            :name="'uploaded_image'"
                                            >
                                        </upload-image>
                                        {!! Form::hidden( 'uploaded_image', '', ['id'=>'hidden_img'] ) !!}
                                    </div>
                                </div>
                                <div class="form-group wt-btnarea">
                                    {!! Form::submit(trans('lang.add_location'), ['class' => 'wt-btn']) !!}
                                </div>
                            </fieldset>
                            {!! Form::close(); !!}
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 float-right">
                    <div class="wt-dashboardbox">
                        <div class="wt-dashboardboxtitle wt-titlewithsearch">
                            <h2>{{{ trans('lang.locations') }}}</h2>
                            <form class="wt-formtheme wt-formsearch">
                                <fieldset>
                                    <div class="form-group">
                                        <input type="text" name="keyword" value="{{{ !empty($_GET['keyword']) ? $_GET['keyword'] : '' }}}"
                                        class="form-control" placeholder="{{{ trans('lang.ph_search_locations') }}}">
                                        <button type="submit" class="wt-searchgbtn"><i class="lnr lnr-magnifier"></i></button>
                                    </div>
                                </fieldset>
                            </form>
                            <a href="javascript:void(0);" v-if="this.is_show" @click="deleteChecked('{{ trans('lang.ph_delete_confirm_title') }}', '{{ trans('lang.ph_location_delete_message') }}')" class="wt-skilldel">
                                <i class="lnr lnr-trash"></i>
                                <span>{{ trans('lang.del_select_rec') }}</span>
                            </a>
                        </div>
                        @if ($locations->count() > 0)
                            <div class="wt-dashboardboxcontent wt-categoriescontentholder">
                                <table class="wt-tablecategories" id="checked-val">
                                    <thead>
                                        <tr>
                                            <th>
                                                <span class="wt-checkbox">
                                                    <input  name="locs[]" id="wt-locs" @click="selectAll" type="checkbox" name="head">
                                                    <label for="wt-locs"></label>
                                                </span>
                                            </th>
                                            <th>{{{ trans('lang.icon') }}}</th>
                                            <th>{{{ trans('lang.name') }}}</th>
                                            <th>{{{ trans('lang.slug') }}}</th>
                                            <th>{{{ trans('lang.action') }}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!empty($locations))
                                            @foreach ($locations as $location)
                                                <tr class="del-{{{ $location->id }}}" v-bind:id="locationID">
                                                    <td>
                                                        <span class="wt-checkbox">
                                                            <input name="locs[]" @click="selectRecord" value="{{{ $location->id }}}" id="wt-check-{{{ $location->slug }}}" type="checkbox" name="head">
                                                            <label for="wt-check-{{{ $location->slug }}}"></label>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <figure><img src="{{{asset(Helper::getLocationFlag($location->flag))}}}" alt="{{{ trans('lang.flag_img') }}}"></figure>
                                                    </td>
                                                    <td>{{{ $location->title }}}</td>
                                                    <td>{{{ $location->slug }}}</td>
                                                    <td>
                                                        <div class="wt-actionbtn">
                                                            <a href="{{{ url('admin/locations/edit-locations') }}}/{{{ $location->id }}}" class="wt-addinfo wt-skillsaddinfo"><i class="lnr lnr-pencil"></i></a>
                                                            <delete :title="'{{trans("lang.ph_delete_confirm_title")}}'" :id="'{{$location->id}}'" :message="'{{trans("lang.ph_location_delete_message")}}'" :url="'{{url('admin/locations/delete-locations')}}'"></delete>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                                @if ( method_exists($locations,'links') )
                                    {{ $locations->links('pagination.custom') }}
                                @endif
                            </div>
                        @else
                            @if (file_exists(resource_path('views/extend/errors/no-record.blade.php'))) 
                                @include('extend.errors.no-record')
                            @else 
                                @include('errors.no-record')
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
