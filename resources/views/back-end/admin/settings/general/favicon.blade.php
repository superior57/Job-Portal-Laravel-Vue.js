<div class="wt-location wt-tabsinfo">
    <div class="wt-tabscontenttitle">
        <h2>{{{ trans('lang.upload_favicon') }}}</h2>
    </div>
    <div class="wt-settingscontent">
        @if (!empty($favicon))
            @php $image = '/uploads/settings/general/'.$favicon; @endphp
            <div class="wt-formtheme wt-userform">
                <div v-if="this.favicon">
                    <upload-image
                        :id="'favicon'"
                        :img_ref="'favicon_ref'"
                        :url="'{{url('admin/upload-temp-image/favicon')}}'"
                        :name="'favicon'">
                    </upload-image>
                </div>
                <div class="wt-uploadingbox" v-else>
                    <figure><img src="{{{asset($image)}}}" alt="{{{ trans('lang.favicon') }}}"></figure>
                    <div class="wt-uploadingbar">
                        <div class="dz-filename">{{{$favicon}}}</div>
                        <em>{{{ trans('lang.file_size') }}}<a href="javascript:void(0);" class="lnr lnr-cross" v-on:click.prevent="removeImage('hidden_site_favicon')"></a></em>
                    </div>
                </div>
                <input type="hidden" name="settings[0][favicon]" id="hidden_site_favicon" value="{{{$favicon}}}">
            </div>
        @else
            <div class="wt-formtheme wt-userform">
                <upload-image
                    :id="'favicon'"
                    :img_ref="'favicon_ref'"
                    :url="'{{url('admin/upload-temp-image/favicon')}}'"
                    :name="'favicon'">
                </upload-image>
                <input type="hidden" name="settings[0][favicon]" id="hidden_site_favicon">
            </div>
        @endif
    </div>
</div>
