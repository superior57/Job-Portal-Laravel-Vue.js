<div class="wt-location wt-tabsinfo">
    <div class="wt-settingscontent">
        @if (!empty($f_inner_banner))
            @php
                $image = '/uploads/settings/general/'.$f_inner_banner;
                $file_name = Helper::formateFileName($f_inner_banner);
            @endphp
            <div class="wt-formtheme wt-userform">
                <div v-if="this.f_inner_banner">
                    <upload-image
                        :id="'f_inner_banner'"
                        :img_ref="'f_banner_ref'"
                        :url="'{{url('admin/upload-temp-image/f_inner_banner')}}'"
                        :name="'f_inner_banner'">
                    </upload-image>
                </div>
                <div class="wt-uploadingbox" v-else>
                    <figure><img src="{{{asset($image)}}}" alt="{{{ trans('lang.banner_photo') }}}"></figure>
                    <div class="wt-uploadingbar">
                        <div class="dz-filename">{{{$file_name}}}</div>
                        <em>{{{ trans('lang.file_size') }}}<a href="javascript:void(0);" class="lnr lnr-cross" v-on:click.prevent="removeImage('hidden_f_inner_banner')"></a></em>
                    </div>
                </div>
                <input type="hidden" name="inner_page[0][f_inner_banner]" id="hidden_f_inner_banner" value="{{{ $f_inner_banner }}}">
            </div>
        @else
            <div class="wt-formtheme wt-userform">
                <upload-image
                    :id="'f_inner_banner'"
                    :img_ref="'f_banner_ref'"
                    :url="'{{url('admin/upload-temp-image/f_inner_banner')}}'"
                    :name="'f_inner_banner'">
                </upload-image>
                <input type="hidden" name="inner_page[0][f_inner_banner]" id="hidden_f_inner_banner">
            </div>
        @endif
    </div>
</div>
