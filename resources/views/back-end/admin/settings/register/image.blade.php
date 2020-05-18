<div class="wt-location wt-tabsinfo">
    <div class="wt-settingscontent">
        @if (!empty($register_image))
            @php $image = '/uploads/settings/home/'.$register_image; @endphp
            <div class="wt-formtheme wt-userform">
                <div v-if="this.register_image">
                    <upload-image
                        :id="'register_image'"
                        :img_ref="'register_image_ref'"
                        :url="'{{url('admin/upload-temp-image/register_image')}}'"
                        :name="'register_image'"
                        >
                    </upload-image>
                </div>
                <div class="wt-uploadingbox" v-else>
                    <figure><img src="{{{asset($image)}}}" alt="{{{ trans('lang.register_image') }}}"></figure>
                    <div class="wt-uploadingbar">
                        <div class="dz-filename">{{{$register_image}}}</div>
                        <em>{{{ trans('lang.file_size') }}}<a href="javascript:void(0);" class="lnr lnr-cross" v-on:click.prevent="removeImage('hidden_site_register_image')"></a></em>
                    </div>
                </div>
                <input type="hidden" name="registration[0][register_image]" id="hidden_site_register_image" value="{{{$register_image}}}">
            </div>
        @else
            <div class="wt-formtheme wt-userform">
                <upload-image
                    :id="'register_image'"
                    :img_ref="'register_image_ref'"
                    :url="'{{url('admin/upload-temp-image/register_image')}}'"
                    :name="'register_image'"
                    >
                </upload-image>
                <input type="hidden" name="registration[0][register_image]" id="hidden_site_register_image">
            </div>
        @endif
    </div>
</div>
