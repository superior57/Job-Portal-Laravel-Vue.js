<div class="wt-location wt-tabsinfo">
    <div class="wt-settingscontent">
        @if (!empty($page_banner))
            @php
                $image = '/uploads/pages/'.$page_banner;
                $file_name = Helper::formateFileName($page_banner);
            @endphp
            <div class="wt-formtheme wt-userform">
                <div v-if="this.page_banner">
                    <upload-image
                        :id="'page_banner'"
                        :img_ref="'f_banner_ref'"
                        :url="'{{url('admin/pages/upload-temp-image/page_banner')}}'"
                        :name="'page_banner'">
                    </upload-image>
                </div>
                <div class="wt-uploadingbox" v-else>
                    <figure><img src="{{{asset($image)}}}" alt="{{{ trans('lang.banner_photo') }}}"></figure>
                    <div class="wt-uploadingbar">
                        <div class="dz-filename">{{{$file_name}}}</div>
                        <em>{{{ trans('lang.file_size') }}}<a href="javascript:void(0);" class="lnr lnr-cross" v-on:click.prevent="removeImage('hidden_page_banner')"></a></em>
                    </div>
                </div>
                <input type="hidden" name="page_banner" id="hidden_page_banner" value="{{{ $page_banner }}}">
            </div>
        @else
            <div class="wt-formtheme wt-userform">
                <upload-image
                    :id="'page_banner'"
                    :img_ref="'f_banner_ref'"
                    :url="'{{url('admin/pages/upload-temp-image/page_banner')}}'"
                    :name="'page_banner'">
                </upload-image>
                <input type="hidden" name="page_banner" id="hidden_page_banner">
            </div>
        @endif
    </div>
</div>
