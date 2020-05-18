<div class="wt-location wt-tabsinfo">
    <div class="wt-tabscontenttitle">
        <h2>{{{ trans('lang.site_logo') }}}</h2>
    </div>
    <div class="wt-settingscontent">
        @if (!empty($logo)) 
            @php $image = '/uploads/settings/general/'.$logo; @endphp
            <div class="wt-formtheme wt-userform">
                <div v-if="this.logo">
                    <upload-image 
                        :id="'logo'" 
                        :img_ref="'logo_ref'" 
                        :url="'{{url('admin/upload-temp-image/logo')}}'" 
                        :name="'logo'">
                    </upload-image>
                </div>
                <div class="wt-uploadingbox" v-else>
                    <figure><img src="{{{asset($image)}}}" alt="{{{ trans('lang.logo') }}}"></figure>
                    <div class="wt-uploadingbar">
                        <div class="dz-filename">{{{$logo}}}</div>
                        <em>{{{ trans('lang.file_size') }}}<a href="javascript:void(0);" class="lnr lnr-cross" v-on:click.prevent="removeImage('hidden_site_logo')"></a></em>
                    </div>
                </div>
                <input type="hidden" name="settings[0][logo]" id="hidden_site_logo" value="{{{$logo}}}">
            </div>
        @else
            <div class="wt-formtheme wt-userform">
                <upload-image 
                    :id="'logo'" 
                    :img_ref="'logo_ref'" 
                    :url="'{{url('admin/upload-temp-image/logo')}}'" 
                    :name="'logo'">
                </upload-image>
                <input type="hidden" name="settings[0][logo]" id="hidden_site_logo">
            </div>
        @endif
    </div>
</div>