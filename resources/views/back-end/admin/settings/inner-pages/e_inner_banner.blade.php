<div class="wt-location wt-tabsinfo">
    <div class="wt-settingscontent">
        @if (!empty($e_inner_banner))
            @php
                $image = '/uploads/settings/general/'.$e_inner_banner;
                $file_name = Helper::formateFileName($e_inner_banner);
            @endphp
            <div class="wt-formtheme wt-userform">
                <div v-if="this.e_inner_banner">
                    <upload-image
                        :id="'e_inner_banner'"
                        :img_ref="'e_banner_ref'"
                        :url="'{{url('admin/upload-temp-image/e_inner_banner')}}'"
                        :name="'e_inner_banner'">
                    </upload-image>
                </div>
                <div class="wt-uploadingbox" v-else>
                    <figure><img src="{{{asset($image)}}}" alt="{{{ trans('lang.banner_photo') }}}"></figure>
                    <div class="wt-uploadingbar">
                        <div class="dz-filename">{{{$file_name}}}</div>
                        <em>{{{ trans('lang.file_size') }}}<a href="javascript:void(0);" class="lnr lnr-cross" v-on:click.prevent="removeImage('hidden_e_inner_banner')"></a></em>
                    </div>
                </div>
                <input type="hidden" name="inner_page[0][e_inner_banner]" id="hidden_e_inner_banner" value="{{{ $e_inner_banner }}}">
            </div>
        @else
            <div class="wt-formtheme wt-userform">
                <upload-image
                    :id="'e_inner_banner'"
                    :img_ref="'e_banner_ref'"
                    :url="'{{url('admin/upload-temp-image/e_inner_banner')}}'"
                    :name="'e_inner_banner'">
                </upload-image>
                <input type="hidden" name="inner_page[0][e_inner_banner]" id="hidden_e_inner_banner">
            </div>
        @endif
    </div>
</div>
