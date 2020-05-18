@extends(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master')
@push('sliderStyle')
    <link href="{{ asset('css/antd.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="pages-listing" id="pages-list">
        @if (Session::has('message'))
            <div class="flash_msg">
                <flash_messages :message_class="'success'" :time='5' :message="'{{{ Session::get('message') }}}'" v-cloak></flash_messages>
            </div>
        @elseif (Session::has('error'))
            <div class="flash_msg">
                <flash_messages :message_class="'danger'" :time ='5' :message="'{{{ Session::get('error') }}}'" v-cloak></flash_messages>
            </div>
        @endif
        @if ($errors->any())
            <ul class="wt-jobalerts">
                @foreach ($errors->all() as $error)
                    <div class="flash_msg">
                        <flash_messages :message_class="'danger'" :time='10' :message="'{{{ $error }}}'" v-cloak></flash_messages>
                    </div>
                @endforeach
            </ul>
        @endif
        <section class="wt-haslayout wt-dbsectionspace">
            <edit-page 
                :selected_parent="'{{$parent_selected_id}}'" 
                :page="'{{json_encode($page)}}'" 
                :pages="'{{  json_encode($parent_page) }}'"
                :has_child="'{{json_encode($has_child)}}'"
                :seo_desc="'{{$seo_desc}}'"
                :app_styles = "'{{json_encode($app_style_list)}}'"
                :slider_styles="'{{json_encode($slider_style_list)}}'"
                :sections_list="'{{json_encode($sections)}}'">
            </edit-page>
        </section>
    </div>
@endsection
