<div class="wt-location wt-tabsinfo">
    <div class="wt-tabscontenttitle">
        <h2>{{{ trans('lang.footer_logo') }}}</h2>
    </div>
    <div class="wt-settingscontent">
        @if (!empty($footer_logo)) 
            @php $image = '/uploads/settings/footer/'.$footer_logo; @endphp
            <div class="wt-formtheme wt-userform">
                <div v-if="this.footer_logo">
                    <upload-image 
                        :id="'footer_logo'" 
                        :img_ref="'footer_logo_ref'" 
                        :url="'{{url('admin/upload-temp-image/footer_logo')}}'" 
                        :name="'footer_logo'"
                        >
                    </upload-image>
                </div>
                <div class="wt-uploadingbox" v-else>
                    <figure><img src="{{{asset($image)}}}" alt="{{{ trans('lang.footer_logo') }}}"></figure>
                    <div class="wt-uploadingbar">
                        <div class="dz-filename">{{{$footer_logo}}}</div>
                        <em>{{{ trans('lang.file_size') }}}<a href="javascript:void(0);" class="lnr lnr-cross" v-on:click.prevent="removeImage('hidden_site_footer_logo')"></a></em>
                    </div>
                </div>
                <input type="hidden" name="footer[footer_logo]" id="hidden_site_footer_logo" value="{{{$footer_logo}}}">
            </div>
        @else
            <div class="wt-formtheme wt-userform">
                <upload-image 
                    :id="'footer_logo'" 
                    :img_ref="'footer_logo_ref'" 
                    :url="'{{url('admin/upload-temp-image/footer_logo')}}'" 
                    :name="'footer_logo'"
                    >
                </upload-image>
                <input type="hidden" name="footer[footer_logo]" id="hidden_site_footer_logo">
            </div>
        @endif
    </div>
</div>