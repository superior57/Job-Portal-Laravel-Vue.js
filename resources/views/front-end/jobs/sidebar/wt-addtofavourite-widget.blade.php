<div class="wt-clicksavearea">
    <span>{{{trans("lang.project_id")}}}: {{{$job->code}}}</span>
    @if (!empty($save_jobs))
        <a href="javascrip:void(0);" class="wt-clicksavebtn wt-clicksave wt-btndisbaled">
            <i class="fa fa-heart"></i> 
            {{{trans("lang.saved")}}}
        </a>
    @else
        <div class="wt-clicksavearea">
            <a href="javascript:void(0);" id="profile-{{$job->id}}" v-bind:class="disable_btn" class="wt-clicksavebtn" @click.prevent="add_wishlist('profile-{{$job->id}}', {{ $job->id }}, 'saved_jobs', '{{{trans("lang.saved")}}}')" v-cloak>
                <i v-bind:class="heart_class"></i> 
                @{{text}}
            </a>
        </div>
    @endif
</div>