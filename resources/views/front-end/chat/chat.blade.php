@extends(file_exists(resource_path('views/extend/front-end/master.blade.php')) ? 
'extend.front-end.master':
 'front-end.master', ['body_class' => 'wt-innerbgcolor'] ) 
@section('content')
    <div class="wt-haslayout wt-innerbannerholder">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-xs-12 col-sm-12 col-md-8 push-md-2 col-lg-6 push-lg-3">
                    <div class="wt-innerbannercontent">
                        <div class="wt-title"><h2>Search Result</h2></div>
                        <ol class="wt-breadcrumb">
                            <li><a href="index.html">Home</a></li>
                            <li class="wt-active">Job</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="wt-haslayout wt-main-section" id="chat">
            <div class="container spark-screen">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">Chat Message Module</div>
                            <div class="panel-body">
            
                            <div class="row">
                                <div class="col-lg-8" >
                                <div id="messages" ></div>
                                </div>
                                <div class="col-lg-8" >
                                    <form action="sendmessage" method="POST">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" >
                                        <input type="hidden" name="user" value="{{ Auth::user()->name }}" >
                                        <textarea class="form-control msg"></textarea>
                                        <br/>
                                        <input type="button" value="Send" class="btn btn-success send-msg">
                                    </form>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection