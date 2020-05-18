<div class="wt-location wt-tabsinfo">
    <div class="wt-tabscontenttitle">
        <h2>{{{ trans('lang.email_logo') }}}</h2>
    </div>
    <div class="wt-settingscontent">
        @if (!empty($email_logo)) 
            @php $image = '/uploads/settings/email/'.$email_logo; @endphp
            <div class="wt-formtheme wt-userform">
                <div v-if="this.uploaded_logo">
                    <upload-image 
                        :id="'email_logo'" 
                        :img_ref="'email_ref'"
                        :url="'{{url('admin/upload-temp-image/email_logo')}}'" 
                        :name="'email_logo'"
                    >
                    </upload-image>
                </div>
                <div class="wt-uploadingbox" v-else>
                    <figure><img src="{{{asset($image)}}}" alt="{{{ trans('lang.email_logo') }}}"></figure>
                    <div class="wt-uploadingbar">
                        <div class="dz-filename">{{{$email_logo}}}</div>
                        <em>{{{ trans('lang.file_size') }}}<a href="javascript:void(0);" class="lnr lnr-cross" v-on:click.prevent="removeImage('hidden_logo')"></a></em>
                    </div>
                </div>
                <input type="hidden" name="email_data[0][email_logo]" id="hidden_logo" value="{{{$email_logo}}}">
            </div>
        @else
            <div class="wt-formtheme wt-userform">
                <upload-image 
                    :id="'email_logo'" 
                    :img_ref="'email_ref'" 
                    :url="'{{url('admin/upload-temp-image/email_logo')}}'" 
                    :name="'email_logo'"
                >
                </upload-image>
                <input type="hidden" name="email_data[0][email_logo]" id="hidden_logo">
            </div>
        @endif
    </div>
</div>