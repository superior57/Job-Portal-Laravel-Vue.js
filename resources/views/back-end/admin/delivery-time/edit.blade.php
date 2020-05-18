@extends(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master')
@section('content')
    <div class="dpts-listing" id="delivery-time">
        @if (Session::has('message'))
            <div class="flash_msg">
                <flash_messages :message_class="'success'" :time ='5' :message="'{{{ Session::get('message') }}}'" v-cloak></flash_messages>
            </div>
        @elseif (Session::has('error'))
            <div class="flash_msg">
                <flash_messages :message_class="'danger'" :time ='5' :message="'{{{ Session::get('error') }}}'" v-cloak></flash_messages>
            </div>
        @endif
        <section class="wt-haslayout wt-dbsectionspace">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-6 float-left">
                    <div class="wt-dashboardbox">
                        <div class="wt-dashboardboxtitle">
                            <h2>{{{ trans('lang.edit_delivery_time') }}}</h2>
                        </div>
                        <div class="wt-dashboardboxcontent">
                            {!! Form::open([ 'url' => url('admin/delivery-time/update-delivery-time/'.$delivery_time->id.''), 'class' =>'wt-formtheme
                            wt-formprojectinfo wt-formcategory','id' => 'delivery_time']) !!}
                            <fieldset>
                                <div class="form-group">
                                    {!! Form::text( 'delivery_time_title', e($delivery_time['title']), ['class' =>'form-control'.($errors->has('delivery_time_title') ? ' is-invalid' : ''), 'placeholder' => trans('lang.ph_delivery_time_title')]) !!}
                                    @if ($errors->has('delivery_time_title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('delivery_time_title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group wt-btnarea">
                                    {!! Form::submit(trans('lang.update_delivery_time'), ['class' => 'wt-btn']) !!}
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
