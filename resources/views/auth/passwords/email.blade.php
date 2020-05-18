@extends(file_exists(resource_path('views/extend/front-end/master.blade.php')) ? 'extend.front-end.master' : 'front-end.master')
@section('content')
<div class="container">
    <div class="wt-main-section wt-haslayout wt-forgotpassword-holder">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-12 col-md-12 col-lg-8">
                <div class="card">
                    <div class="card-header">{{ trans('lang.reset_pass') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ trans('lang.email_address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary wt-btn">
                                        {{ trans('lang.send_pass_reset_link') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
