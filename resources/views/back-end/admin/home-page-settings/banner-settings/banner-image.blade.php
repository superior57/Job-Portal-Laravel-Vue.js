<div class="wt-location wt-tabsinfo">
    <h5>{{{ trans('lang.home_banner_inner_bg') }}}</h5>
    <div class="wt-settingscontent">
        @if (!empty($banner_bg_image))
            @php $image = '/uploads/settings/home/'.$banner_bg_image; @endphp
            <div class="wt-formtheme wt-userform">
                <div v-if="this.uploaded_banner_image">
                    <upload-image 
                        :id="'home_banner_image'" 
                        :img_ref="'home_banner_ref'" 
                        :url="'{{url('admin/upload-temp-image/home_banner_image')}}'"
                        :name="'home_banner_image'"
                        >
                    </upload-image>
                </div>
                <div class="wt-uploadingbox" v-else>
                    <figure><img src="{{{asset($image)}}}" alt="{{{ trans('lang.home_banner_inner_bg') }}}"></figure>
                    <div class="wt-uploadingbar">
                        <div class="dz-filename">{{{$banner_bg_image}}}</div>
                        <em>{{{ trans('lang.file_size') }}}<a href="javascript:void(0);" class="lnr lnr-cross" v-on:click.prevent="removeImage('hidden_banner_image')"></a></em>
                    </div>
                </div>
                <input type="hidden" name="home[0][home_banner_image]" id="hidden_banner_image" value="{{{$banner_bg_image}}}"> 
            </div>
        @else
            <div class="wt-formtheme wt-userform">
                <upload-image 
                    :id="'home_banner_image'" 
                    :img_ref="'home_banner_ref'" 
                    :url="'{{url('admin/upload-temp-image/home_banner_image')}}'"
                    :name="'home_banner_image'"
                    >
                </upload-image>
                <input type="hidden" name="home[0][home_banner_image]" id="hidden_banner_image"> 
            </div>
        @endif
    </div>
</div>

