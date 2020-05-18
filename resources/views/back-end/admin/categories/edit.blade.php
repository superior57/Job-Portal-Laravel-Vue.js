@extends(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master')
@section('content')
    <div class="cats-listing" id="cat-list">
        @if (Session::has('message'))
            <div class="flash_msg">
                <flash_messages :message_class="'success'" :time ='5' :message="'{{{ Session::get('message') }}}'" v-cloak></flash_messages>
            </div>
        @elseif (Session::has('error'))
            <div class="flash_msg">
                <flash_messages :message_class="'danger'" :time ='5' :message="'{{{ Session::get('error') }}}'" v-cloak></flash_messages>
            </div>
        @endif
        <section class="wt-haslayout wt-dbsectionspace la-editcategory">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 float-left">
                    <div class="wt-dashboardbox">
                        <div class="wt-dashboardboxtitle">
                            <h2>{{{ trans('lang.edit_cat') }}}</h2>
                        </div>
                        <div class="wt-dashboardboxcontent">
                            {!! Form::open(['url' => url('admin/categories/update-cats/'.$cats->id.''),
                                'class' =>'wt-formtheme wt-formprojectinfo wt-formcategory', 'id' => 'categories'] )
                            !!}
                                <fieldset>
                                    <div class="form-group">
                                        {!! Form::text( 'category_title', e($cats['title']), ['class' =>'form-control'] ) !!}
                                        <span class="form-group-description">{{{ trans('lang.desc') }}}</span>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::textarea( 'category_abstract', e($cats['abstract']), ['class' =>'form-control',
                                        'placeholder' => trans('lang.ph_desc')] )
                                        !!}
                                        <span class="form-group-description">{{{ trans('lang.cat_desc') }}}</span>
                                    </div>
                                    <div class="wt-settingscontent">
                                        @if (!empty($cats['image']))
                                            <div class="wt-formtheme wt-userform">
                                                <div v-if="this.uploaded_image">
                                                    <upload-image
                                                        :id="'cat_image'"
                                                        :img_ref="'cat_img'"
                                                        :url="'{{url('admin/categories/upload-temp-image')}}'"
                                                        :name="'uploaded_image'"
                                                        >
                                                    </upload-image>
                                                    {!! Form::hidden( 'uploaded_image', '', ['id'=>'hidden_img'] ) !!}
                                                </div>
                                                <div class="form-group" v-else>
                                                    <ul class="wt-attachfile">
                                                        <li>
                                                            <span>{{{ $cats['image'] }}}</span>
                                                            <em>{{{trans('lang.file_size')}}} <span data-dz-size></span>
                                                                <a class="dz-remove" href="javascript:void();" v-on:click.prevent="removeImage('hidden_img')" >
                                                                    <span class="lnr lnr-cross"></span>
                                                                </a>
                                                            </em>
                                                        </li>
                                                    </ul>
                                                    <input type="hidden" name="uploaded_image" id="hidden_img" value="{{{$cats['image']}}}">
                                                </div>
                                            </div>
                                        @else
                                            <div class = "wt-formtheme wt-userform">
                                                <upload-image
                                                    :id="'cat_image'"
                                                    :img_ref="'cat_ref'"
                                                    :url="'{{url('admin/categories/upload-temp-image')}}'"
                                                    :name="'uploaded_image'"
                                                    >
                                                </upload-image>
                                                {!! Form::hidden( 'uploaded_image', '', ['id'=>'hidden_img'] ) !!}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group wt-btnarea">
                                        {!! Form::submit(trans('lang.update_cat'), ['class' => 'wt-btn']) !!}
                                    </div>
                                </fieldset>
                            {!! Form::close(); !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
