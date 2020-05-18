@extends(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master')
@section('content')
    <div class="cats-listing" id="emails">
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
                            <h2>{{{ trans('lang.edit_email_template') }}}</h2>
                            <div>
                                <strong>{{{ trans('lang.variables') }}}</strong>
                                <ul>
                                    @foreach ($variables_array as $key => $value )
                                        <li>{{ $key }} => {{ $value }}</li>
                                    @endforeach
                                </ul>
                                <span>{{{ trans('lang.variable_note') }}}</span>
                            </div>
                        </div>
                        <div class="wt-dashboardboxcontent">
                            {!! Form::open(['url' => url('admin/email-templates/update-templates/'.$template->id.''),
                                'class' =>'wt-formtheme wt-formprojectinfo wt-formcategory', 'id' => 'update_email_templates'] )
                            !!}
                            <fieldset>
                                <div class="form-group">
                                    {!! Form::text( 'title', e($template->title), ['class' =>'form-control', 'placeholder' => trans('lang.title')] ) !!}
                                </div>
                                <div class="form-group">
                                        {!! Form::text( 'subject', e($template->subject), ['class' =>'form-control', 'placeholder' => trans('lang.subject')] ) !!}
                                    </div>
                                <div class="form-group">
                                    {!! Form::textarea('email_content', $template->content, array('class' => 'wt-tinymceeditor', 'id' => 'wt-tinymceeditor', 'placeholder' => trans('lang.add_template_content')) ) !!}
                                </div>
                                <div class="form-group wt-btnarea">
                                    {!! Form::submit(trans('lang.update_email_template'), ['class' => 'wt-btn']) !!}
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
