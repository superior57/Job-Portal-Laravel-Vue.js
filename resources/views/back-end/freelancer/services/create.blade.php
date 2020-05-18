@extends(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master')
@section('content')
<div class="wt-haslayout wt-dbsectionspace">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 float-left" id="services">
            <div class="preloader-section" v-if="loading" v-cloak>
                <div class="preloader-holder">
                    <div class="loader"></div>
                </div>
            </div>
            <div class="wt-haslayout wt-post-job-wrap">
                {!! Form::open(['url' => '', 'class' =>'wt-haslayout', 'id' => 'post_service_form',  '@submit.prevent'=>'submitService']) !!}
                    <div class="wt-dashboardbox">
                        <div class="wt-dashboardboxtitle">
                            <h2>{{ trans('lang.post_service') }}</h2>
                        </div>
                        <div class="wt-dashboardboxcontent">
                            <div class="wt-jobdescription wt-tabsinfo">
                                <div class="wt-tabscontenttitle">
                                    <h2>{{ trans('lang.service_desc') }}</h2>
                                </div>
                                <div class="wt-formtheme wt-userform wt-userformvtwo">
                                    <fieldset>
                                        <div class="form-group">
                                            <input type="text" name="title" class="form-control" placeholder="{{ trans('lang.service_title') }}" v-model="title">
                                        </div>
                                        <div class="form-group form-group-half wt-formwithlabel">
                                            <span class="wt-select">
                                                {!! Form::select('delivery_time', $delivery_time, null, array('class' => '', 'placeholder' => trans('lang.select_delivery_time'), 'v-model'=>'delivery_time')) !!}
                                            </span>
                                        </div>
                                        <div class="form-group form-group-half wt-formwithlabel job-cost-input">
                                            {!! Form::number('service_price', null, array('class' => '', 'placeholder' => trans('lang.service_price'), 'v-model'=>'price')) !!}
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="wt-jobcategories wt-tabsinfo">
                                <div class="wt-tabscontenttitle">
                                    <h2>{{ trans('lang.service_cats') }}</h2>
                                </div>
                                <div class="wt-divtheme wt-userform wt-userformvtwo">
                                    <div class="form-group">
                                        <span class="wt-select">
                                            {!! Form::select('categories[]', $categories, null, array('class' => 'chosen-select', 'multiple', 'data-placeholder' => trans('lang.select_service_cats'))) !!}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="wt-languages-holder wt-tabsinfo">
                                <div class="wt-tabscontenttitle">
                                    <h2>{{ trans('lang.service_response_time') }}</h2>
                                </div>
                                <div class="wt-divtheme wt-userform wt-userformvtwo">
                                    <div class="form-group">
                                        <span class="wt-select">
                                            {!! Form::select('response_time', $response_time, null, array('class' => '', 'placeholder' => trans('lang.select_response_time'), 'v-model'=>'response_time')) !!}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-group-half wt-formwithlabel">
                                <div class="wt-tabscontenttitle">
                                    <h2>{{ trans('lang.langs') }}</h2>
                                </div>
                                <div class="wt-divtheme wt-userform wt-userformvtwo">
                                    <div class="form-group">
                                        <span class="wt-select">
                                            {!! Form::select('languages[]', $languages, null, array('class' => 'chosen-select', 'multiple', 'data-placeholder' => trans('lang.select_lang'))) !!}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-group-half wt-formwithlabel">
                                <div class="wt-tabscontenttitle">
                                    <h2>{{ trans('lang.english_level') }}</h2>
                                </div>
                                <div class="wt-divtheme wt-userform wt-userformvtwo">
                                    <div class="form-group">
                                        <span class="wt-select">
                                            {!! Form::select('english_level', $english_levels, null, array('class' => '', 'placeholder' => trans('lang.select_english_level'), 'v-model'=>'english_level')) !!}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="wt-jobdetails wt-tabsinfo">
                                <div class="wt-tabscontenttitle">
                                    <h2>{{ trans('lang.service_desc') }}</h2>
                                </div>
                                <div class="wt-formtheme wt-userform wt-userformvtwo">
                                    {!! Form::textarea('description', null, ['class' => 'wt-tinymceeditor', 'id' => 'wt-tinymceeditor', 'placeholder' => trans('lang.service_desc_note')]) !!}
                                </div>
                            </div>
                            <div class="wt-joblocation wt-tabsinfo">
                                <div class="wt-tabscontenttitle">
                                    <h2>{{ trans('lang.your_loc') }}</h2>
                                </div>
                                <div class="wt-formtheme wt-userform">
                                    <fieldset>
                                        <div class="form-group form-group-half">
                                            <span class="wt-select">
                                                {!! Form::select('locations', $locations, null, array('class' => 'skill-dynamic-field', 'placeholder' => trans('lang.select_locations'))) !!}
                                            </span>
                                        </div>
                                        <div class="form-group form-group-half">
                                            {!! Form::text( 'address', null, ['class' =>'form-control', 'placeholder' => trans('lang.your_address')] ) !!}
                                        </div>
                                        @if (!empty($longitude) && !empty($latitude))
                                            <div class="form-group wt-formmap">
                                                <div class="wt-locationmap">
                                                    <custom-map :latitude="{{$latitude}}" :longitude="{{$longitude}}"></custom-map>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="form-group form-group-half">
                                            {!! Form::text( 'longitude', null, ['class' =>'form-control', 'placeholder' => trans('lang.enter_logitude')]) !!}
                                        </div>
                                        <div class="form-group form-group-half">
                                            {!! Form::text( 'latitude', null, ['class' =>'form-control', 'placeholder' => trans('lang.enter_latitude')]) !!}
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="wt-featuredholder wt-tabsinfo">
                                <div class="wt-tabscontenttitle">
                                    <h2>{{ trans('lang.is_featured') }}</h2>
                                    <div class="wt-rightarea">
                                        <div class="wt-on-off float-right">
                                            <switch_button v-model="is_featured">{{{ trans('lang.is_featured') }}}</switch_button>
                                            <input type="hidden" :value="is_featured" name="is_featured">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wt-attachmentsholder">
                                <div class="lara-attachment-files">
                                    <div class="wt-tabscontenttitle">
                                        <h2>{{ trans('lang.attachments') }}</h2>
                                        <div class="wt-rightarea">
                                            <div class="wt-on-off float-right">
                                                <switch_button v-model="show_attachments">{{{ trans('lang.attachments_note') }}}</switch_button>
                                                <input type="hidden" :value="show_attachments" name="show_attachments">
                                            </div>
                                        </div>
                                    </div>
                                    <image-attachments :temp_url="'{{url('service/upload-temp-image')}}'" :type="'image'"></image-attachments>
                                    <div class="form-group input-preview">
                                        <ul class="wt-attachfile dropzone-previews">

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wt-updatall">
                        <i class="ti-announcement"></i>
                        <span>{{{ trans('lang.save_changes_note') }}}</span>
                        {!! Form::submit(trans('lang.post_service'), ['class' => 'wt-btn', 'id'=>'submit-service']) !!}
                    </div>
                {!! form::close(); !!}
            </div>
        </div>
    </div>
</div>
@endsection
