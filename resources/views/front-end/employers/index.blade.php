@extends(file_exists(resource_path('views/extend/front-end/master.blade.php')) ? 
'extend.front-end.master':
 'front-end.master', ['body_class' => 'wt-innerbgcolor'] )
@section('title'){{ $emp_list_meta_title }} @stop
@section('description', $emp_list_meta_desc)
@section('content')
    @if ($show_emp_banner == 'true')
        @php $breadcrumbs = Breadcrumbs::generate('searchResults'); @endphp
        <div class="wt-haslayout wt-innerbannerholder" style="background-image:url({{{ asset(Helper::getBannerImage($e_inner_banner, 'uploads/settings/general')) }}})">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-xs-12 col-sm-12 col-md-8 push-md-2 col-lg-6 push-lg-3">
                        <div class="wt-innerbannercontent">
                            <div class="wt-title">
                                <h2>{{ trans('lang.employers') }}</h2>
                            </div>
                            @if (!empty($show_breadcrumbs) && $show_breadcrumbs === 'true')
                                @if (count($breadcrumbs))
                                    <ol class="wt-breadcrumb">
                                        @foreach ($breadcrumbs as $breadcrumb)
                                            @if ($breadcrumb->url && !$loop->last)
                                                <li><a href="{{{ $breadcrumb->url }}}">{{{ $breadcrumb->title }}}</a></li>
                                            @else
                                                <li class="active">{{{ $breadcrumb->title }}}</li>
                                            @endif
                                        @endforeach
                                    </ol>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="wt-haslayout wt-main-section" id="user_profile">
        @if (Session::has('payment_message'))
            @php $response = Session::get('payment_message') @endphp
            <div class="flash_msg">
                <flash_messages :message_class="'{{{$response['code']}}}'" :time ='5' :message="'{{{ $response['message'] }}}'" v-cloak></flash_messages>
            </div>
        @endif
        <div class="wt-haslayout">
            <div class="container">
                <div class="row">
                    <div id="wt-twocolumns" class="wt-twocolumns wt-haslayout">
                        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-4 float-left">
                            @if (file_exists(resource_path('views/extend/front-end/employers/filters.blade.php'))) 
                                @include('extend.front-end.employers.filters')
                            @else 
                                @include('front-end.employers.filters')
                            @endif
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xl-8 float-left">
                            <div class="wt-userlistingtitle">
                                @if (!empty($users))
                                    <span>{{ trans('lang.01') }} {{$users->count()}} of {{\App\User::role('employer')->count()}} results @if (!empty($keyword)) for <em>"{{{$keyword}}}"</em> @endif</span>
                                @endif
                            </div>
                            <div class="wt-companysinfoholder">
                                <div class="row">
                                    @if (!empty($users))
                                        @foreach ($users as $employer)
                                            @php
                                                $verified_user = \App\User::select('user_verified')->where('id', $employer->id)->pluck('user_verified')->first();
                                                $user_image = !empty($employer->profile->avater) ?
                                                            '/uploads/users/'.$employer->id.'/'.$employer->profile->avater :
                                                            'images/user.jpg';
                                            @endphp
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                                                <div class="wt-companysdetails">
                                                    <figure class="wt-companysimg">
                                                        <img src="{{{ asset(Helper::getUserProfileBanner($employer->id, 'small')) }}}" alt="Company">
                                                    </figure>
                                                    <div class="wt-companysinfo">
                                                        <figure><img src="{{{ asset($user_image) }}}" alt="Company"></figure>
                                                        <div class="wt-title">
                                                            <a href="{{{ url('profile/'.$employer->slug) }}}">
                                                            @if ($verified_user === 1)
                                                                <i class="fa fa-check-circle"></i> {{ trans('lang.verified_company') }}</a>
                                                            @endif
                                                            <a href="{{{ url('profile/'.$employer->slug) }}}"><h2>{{{ Helper::getUserName($employer->id) }}}</h2></a>
                                                        </div>
                                                        <ul class="wt-postarticlemeta">
                                                            <li>
                                                                <a href="{{ url('profile/'.$employer->slug) }}">
                                                                    <span>{{ trans('lang.open_jobs') }}</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="{{{ url('profile/'.$employer->slug) }}}">
                                                                    <span>{{ trans('lang.full_profile') }}</span>
                                                                </a>
                                                            </li>
                                                            @if (in_array($employer->id, $save_employer))
                                                                <li class="wt-following wt-btndisbaled">
                                                                    <a href="javascript:void(0);">
                                                                        {{ trans('lang.following') }}
                                                                    </a>
                                                                </li>
                                                            @else
                                                                <li>
                                                                    <a href="javascript:void(0);" id="profile-{{$employer->id}}" @click.prevent="add_wishlist('profile-{{$employer->id}}', {{$employer->id}}, 'saved_employers', '{{trans("lang.following")}}')" v-cloak>
                                                                        <span>{{ trans('lang.click_to_follow') }}</span>
                                                                    </a>
                                                                </li>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        @if ( method_exists($users,'links') )
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 la-employerpagintaion">
                                                {{ $users->links('pagination.custom') }}
                                            </div>
                                        @endif
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
