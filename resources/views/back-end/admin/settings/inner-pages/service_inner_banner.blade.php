<div class="wt-location wt-tabsinfo">
    <div class="wt-settingscontent">
        @if (!empty($service_inner_banner))
            @php
                $image = '/uploads/settings/general/'.$service_inner_banner;
                $file_name = Helper::formateFileName($service_inner_banner);
            @endphp
            <div class="wt-formtheme wt-userform">
                <div v-if="this.service_inner_banner">
                    <upload-image
                        :id="'service_inner_banner'"
                        :img_ref="'service_banner_ref'"
                        :url="'{{url('admin/upload-temp-image/service_inner_banner')}}'"
                        :name="'service_inner_banner'">
                    </upload-image>
                </div>
                <div class="wt-uploadingbox" v-else>
                    <figure><img src="{{{asset($image)}}}" alt="{{{ trans('lang.banner_photo') }}}"></figure>
                    <div class="wt-uploadingbar">
                        <div class="dz-filename">{{{$file_name}}}</div>
                        <em>{{{ trans('lang.file_size') }}}<a href="javascript:void(0);" class="lnr lnr-cross" v-on:click.prevent="removeImage('hidden_service_inner_banner')"></a></em>
                    </div>
                </div>
                <input type="hidden" name="inner_page[0][service_inner_banner]" id="hidden_service_inner_banner" value="{{{ $service_inner_banner }}}">
            </div>
        @else
            <div class="wt-formtheme wt-userform">
                <upload-image
                    :id="'service_inner_banner'"
                    :img_ref="'service_banner_ref'"
                    :url="'{{ url('admin/upload-temp-image/service_inner_banner') }}'"
                    :name="'service_inner_banner'">
                </upload-image>
                <input type="hidden" name="inner_page[0][service_inner_banner]" id="hidden_service_inner_banner">
            </div>
        @endif
    </div>
</div>
