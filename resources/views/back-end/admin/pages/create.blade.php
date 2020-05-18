@extends(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master')
@push('sliderStyle')
    <link href="{{ asset('css/antd.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="pages-listing wt-page-builder" id="pages-list">
        <section class="wt-haslayout wt-dbsectionspace">
            <create-page 
                :sections_list="'{{json_encode($sections)}}'" 
                :pages="'{{  json_encode($parent_page) }}'"
                :app_styles = "'{{json_encode($app_style_list)}}'"
                :slider_styles="'{{json_encode($slider_style_list)}}'">
            </create-page>
        </section>
    </div>
@endsection
