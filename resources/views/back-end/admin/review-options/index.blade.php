@extends(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master')
@section('content')
    <div class="dpts-listing" id="reviews">
        @if (Session::has('message'))
            <div class="flash_msg">
                <flash_messages :message_class="'success'" :time ='5' :message="'{{{ Session::get('message') }}}'" v-cloak></flash_messages>
            </div>
        @elseif (Session::has('error'))
            <div class="flash_msg">
                <flash_messages :message_class="'danger'" :time ='5' :message="'{{{ Session::get('error') }}}'" v-cloak></flash_messages>
            </div>
        @endif
        <section class="wt-haslayout wt-dbsectionspace la-review-holder">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5 col-xl-4 float-left">
                    <div class="wt-dashboardbox">
                        <div class="wt-dashboardboxtitle">
                            <h2>{{{ trans('lang.add_review_option') }}}</h2>
                        </div>
                        <div class="wt-dashboardboxcontent">
                            {!! Form::open([ 'url' => 'admin/store-review-options', 'class' =>'wt-formtheme wt-formprojectinfo wt-formcategory', 'id' => 'review_options']) !!}
                            <fieldset>
                                <div class="form-group">
                                    {!! Form::text( 'review_option_title', null, ['class' =>'form-control'.($errors->has('review_option_title') ? ' is-invalid' : ''), 'placeholder' => trans('lang.ph_review_option_title')]) !!}
                                    @if ($errors->has('review_option_title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('review_option_title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group wt-btnarea">
                                    {!! Form::submit(trans('lang.add_review_option'), ['class' => 'wt-btn']) !!}
                                </div>
                            </fieldset>
                            {!! Form::close(); !!}
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7 col-xl-8 float-right">
                    <div class="wt-dashboardbox">
                        <div class="wt-dashboardboxtitle wt-titlewithsearch">
                            <h2>{{{ trans('lang.review_options') }}}</h2>
                            <a href="javascript:void(0);" v-if="this.is_show" @click="deleteChecked('{{ trans('lang.ph_delete_confirm_title') }}', '{{ trans('lang.ph_review_delete_message') }}')" class="wt-skilldel">
                                <i class="lnr lnr-trash"></i>
                                <span>{{ trans('lang.del_select_rec') }}</span>
                            </a>
                        </div>
                        @if ($review_options->count() > 0)
                            <div class="wt-dashboardboxcontent wt-categoriescontentholder">
                                <table class="wt-tablecategories" id="checked-val">
                                    <thead>
                                        <tr>
                                            <th>
                                                <span class="wt-checkbox">
                                                    <input name="rev-options[]" id="wt-rev-options" @click="selectAll" type="checkbox" name="head">
                                                    <label for="wt-rev-options"></label>
                                                </span>
                                            </th>
                                            <th>{{{ trans('lang.name') }}}</th>
                                            <th>{{{ trans('lang.slug') }}}</th>
                                            <th>{{{ trans('lang.action') }}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $counter = 0; @endphp
                                        @foreach ($review_options as $option)
                                            <tr class="del-{{{ $option->id }}}" v-bind:id="optionID">
                                                <td>
                                                    <span class="wt-checkbox">
                                                        <input name="rev-options[]" @click="selectRecord" value="{{{ $option->id }}}" id="wt-check-{{{ $counter }}}" type="checkbox" name="head">
                                                        <label for="wt-check-{{{ $counter }}}"></label>
                                                    </span>
                                                </td>
                                                <td>{{{ $option->title }}}</td>
                                                <td>{{{ $option->slug }}}</td>
                                                <td>
                                                    <div class="wt-actionbtn">
                                                        <a href="{{{ url('admin/review-options/edit-review-options') }}}/{{{ $option->id }}}" class="wt-addinfo wt-dpts">
                                                            <i class="lnr lnr-pencil"></i>
                                                        </a>
                                                        <delete :title="'{{trans("lang.ph_delete_confirm_title")}}'" :id="'{{$option->id}}'" :message="'{{trans("lang.ph_review_delete_message")}}'" :url="'{{url('admin/review-options/delete-review-options')}}'"></delete>
                                                    </div>
                                                </td>
                                            </tr>
                                            @php $counter++; @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                                @if( method_exists($review_options,'links') ) {{ $review_options->links('pagination.custom') }} @endif
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
