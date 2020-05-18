<div class="wt-location wt-tabsinfo">
    <div class="wt-tabscontenttitle">
        <h2>{{{ trans('lang.email_sender_avatar') }}}</h2>
    </div>
    <div class="wt-settingscontent">
        @if (!empty($sender_avatar)) 
            @php $image = '/uploads/settings/email/'.$sender_avatar; @endphp
            <div class="wt-formtheme wt-userform">
                <div v-if="this.uploaded_avatar">
                    <upload-image 
                        :id="'sender_avatar'" 
                        :img_ref="'email_ref'" 
                        :url="'{{url('admin/upload-temp-image/sender_avatar')}}'" 
                        :name="'sender_avatar'"
                    >
                    </upload-image>
                </div>
                <div class="wt-uploadingbox" v-else>
                    <figure><img src="{{{asset($image)}}}" alt="{{{ trans('lang.profile_photo') }}}"></figure>
                    <div class="wt-uploadingbar">
                        <div class="dz-filename">{{{$sender_avatar}}}</div>
                        <em>{{{ trans('lang.file_size') }}}<a href="javascript:void(0);" class="lnr lnr-cross" v-on:click.prevent="removeImage('hidden_avatar')"></a></em>
                    </div>
                </div>
                <input type="hidden" name="email_data[0][sender_avatar]" id="hidden_avatar" value="{{{$sender_avatar}}}">
            </div>
        @else
            <div class="wt-formtheme wt-userform">
                <upload-image 
                    :id="'sender_avatar'" 
                    :img_ref="'email_ref'" 
                    :url="'{{url('admin/upload-temp-image/sender_avatar')}}'" 
                    :name="'sender_avatar'">
                </upload-image>
                <input type="hidden" name="email_data[0][sender_avatar]" id="hidden_avatar">
            </div>
        @endif
    </div>
</div>