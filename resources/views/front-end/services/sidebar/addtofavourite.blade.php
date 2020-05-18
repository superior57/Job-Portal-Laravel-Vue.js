@php $seller_id = !empty($seller) ? $seller->id : 0; @endphp
<div class="wt-clicksavearea">
    <span>{{{trans("lang.service_id")}}}: {{{$service->code}}}</span>
    @if (!empty($save_services))
        <a href="javascrip:void(0);" class="wt-clicksavebtn wt-clicksave wt-btndisbaled">
            <i class="fa fa-heart"></i> 
            {{{trans("lang.saved")}}}
        </a>
    @else
        <div class="wt-clicksavearea">
            <a href="javascript:void(0);" id="profile-{{$service->id}}" v-bind:class="disable_btn" class="wt-clicksavebtn" @click.prevent="add_wishlist('profile-{{$service->id}}', {{ $service->id }}, 'saved_services', {{$seller_id}}, '{{{trans("lang.saved")}}}')" v-cloak>
                <i v-bind:class="heart_class"></i> 
                @{{text}}
            </a>
        </div>
    @endif
</div>