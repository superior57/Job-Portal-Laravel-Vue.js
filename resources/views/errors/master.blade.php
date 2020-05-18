@extends('master') 
@push('stylesheets')
	<link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
@endpush 
@section('header')
	@if (file_exists(resource_path('views/extend/includes/header.blade.php'))) 
		@include('extend.includes.header')
	@else 
		@include('includes.header')
	@endif
@endsection
@section('main')
<main id="wt-main" class="wt-main wt-haslayout">
	@if (file_exists(resource_path('views/extend/back-end/includes/dashboard-menu.blade.php'))) 
		@include('extend.back-end.includes.dashboard-menu')
	@else 
		@include('back-end.includes.dashboard-menu')
	@endif
	@yield('content')
</main>
@endsection
@push('scripts')
@endpush
