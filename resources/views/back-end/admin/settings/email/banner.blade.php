<div class="wt-location wt-tabsinfo">
    <div class="wt-tabscontenttitle">
        <h2>{{{ trans('lang.email_banner') }}}</h2>
    </div>
    <div class="wt-settingscontent">
        @if (!empty($email_banner)) 
            @php 
                $image = '/uploads/settings/email/'.$email_banner; 
                $file_name = Helper::formateFileName($email_banner);
            @endphp
            <div class="wt-formtheme wt-userform">
                <div v-if="this.uploaded_banner">
                    <upload-image 
                        :id="'email_banner'" 
                        :img_ref="'email_ref'" 
                        :url="'{{url('admin/upload-temp-image/email_banner')}}'" 
                        :name="'email_banner'">
                    </upload-image>
                </div>
                <div class="wt-uploadingbox" v-else>
                    <figure><img src="{{{asset($image)}}}" alt="{{{ trans('lang.profile_photo') }}}"></figure>
                    <div class="wt-uploadingbar">
                        <div class="dz-filename">{{{$file_name}}}</div>
                        <em>{{{ trans('lang.file_size') }}}<a href="javascript:void(0);" class="lnr lnr-cross" v-on:click.prevent="removeImage('hidden_banner')"></a></em>
                    </div>
                </div>
                <input type="hidden" name="email_data[0][email_banner]" id="hidden_banner" value="{{{$email_banner}}}">
            </div>
        @else
            <div class="wt-formtheme wt-userform">
                <upload-image 
                    :id="'email_banner'" 
                    :img_ref="'email_ref'" 
                    :url="'{{url('admin/upload-temp-image/email_banner')}}'" 
                    :name="'email_banner'">
                </upload-image>
                <input type="hidden" name="email_data[0][email_banner]" id="hidden_banner">
            </div>
        @endif
    </div>
</div>