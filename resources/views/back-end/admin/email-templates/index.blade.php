@extends(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master')
@section('content')
@php
    $selected_role = !empty($_GET['role']) ? $_GET['role'] : '';
    $selected_type = !empty($_GET['type']) ? $_GET['type'] : '';
@endphp
    <section class="wt-haslayout wt-dbsectionspace" id="settings">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 float-right">
                @if (Session::has('message'))
                    <div class="flash_msg">
                        <flash_messages :message_class="'success'" :time ='5' :message="'{{{ Session::get('message') }}}'" v-cloak></flash_messages>
                    </div>
                @elseif (Session::has('error'))
                    <div class="flash_msg">
                        <flash_messages :message_class="'danger'" :time ='5' :message="'{{{ Session::get('error') }}}'" v-cloak></flash_messages>
                    </div>
                @endif
                <div class="wt-dashboardbox">
                    <div class="wt-dashboardboxtitle wt-titlewithsearch">
                        <h2>{{{ trans('lang.email_templates') }}}</h2>
                        {!! Form::open(['url' => url('admin/email-templates'),
                            'method' => 'get', 'class' => 'wt-formtheme wt-formsearch'])
                        !!}
                            <fieldset>
                                <div class="form-group">
                                    <input type="text" name="keyword" value="{{{ !empty($_GET['keyword']) ? $_GET['keyword'] : '' }}}"
                                        class="form-control" placeholder="{{{ trans('lang.ph_search_templates') }}}">
                                    <button type="submit" class="wt-searchgbtn"><i class="lnr lnr-magnifier"></i></button>
                                </div>
                            </fieldset>
                        {!! Form::close() !!}
                        {!! Form::open(['url' => url('admin/email-templates/filter-templates'), 'method' => 'get', 'class' => 'wt-formtheme wt-formsearch la-mailfilter', 'id'=>'template_filter_form']) !!}
                            <div class="form-group">
                                <span class="wt-select">
                                    {!! Form::select('role', array_map('strtoupper', $roles) ,$selected_role, array('placeholder' => trans('lang.filter_by_roles'), '@change'=>'submitTemplateFilter')) !!}
                                </span>
                            </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="wt-dashboardboxcontent wt-categoriescontentholder">
                        <table class="wt-tablecategories">
                            <thead>
                                <tr>
                                    <th>{{{ trans('lang.title') }}}</th>
                                    <th>{{{ trans('lang.subject') }}}</th>
                                    <th>{{{ trans('lang.type') }}}</th>
                                    <th>{{{ trans('lang.role') }}}</th>
                                    <th>{{{ trans('lang.action') }}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($templates as $key => $template)
                                    <tr>
                                        <td>{{{$template->title}}}</td>
                                        <td>{{{$template->subject}}}</td>
                                        <td>{{{$template->email_type}}}</td>
                                        <td>{{{ Helper::getRoleNameByRoleID($template->role_id) }}}</td>
                                        <td>
                                            <div class="wt-actionbtn">
                                                <a href="{{{url('admin/email-templates/'.$template->id)}}}" class="wt-addinfo wt-skillsaddinfo"><i class="lnr lnr-pencil"></i></a>
                                                <a href="javascript:void(0);" v-on:click.prevent="emailContent('myModalRef-{{$key}}')" class="wt-addinfo wt-skillsaddinfo"><i class="lnr lnr-eye"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <b-modal ref="myModalRef-{{$key}}" hide-footer title="Email Content" v-cloak>
                                        <div class="d-block text-center">
                                            {!! Form::open(['url' => '', 'class' =>'wt-formtheme wt-formfeedback', 'id' => 'update_content-'.$key,  '@submit.prevent'=>'']) !!}
                                                <div class="form-group">
                                                    {!! Form::textarea('email_content', $template->content, array('class' => 'wt-tinymceeditor', 'id' => 'wt-tinymceeditor'.$key) ) !!}
                                                </div>
                                            {!! Form::close() !!}
                                         </div>
                                    </b-modal>
                                @endforeach
                            </tbody>
                        </table>
                        @if ( method_exists($templates,'links') )
                            {{ $templates->links('pagination.custom') }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
