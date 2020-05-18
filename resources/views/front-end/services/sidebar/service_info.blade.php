<div class="wt-userrating wt-userratingvtwo">
    <div class="wt-ratingtitle">
       <h3>{{ !empty($symbol) ? $symbol['symbol'] : '$' }}{{{$service->price}}}</h3>
       <span>{{trans('lang.starting_from')}}</span>
    </div>
    <div class="wt-rating-info">
       <ul class="wt-service-info">
          <li>
             <span><i class="fa fa-calendar-check-o iconcolor1"></i>
             <strong>{{{$delivery_time->title}}}</strong> &nbsp;{{ trans('lang.delivery_time') }}</span>
          </li>
          <li>
             <span><i class="fa fa-search iconcolor2"></i><strong>{{{$service->views}}}</strong>&nbsp;{{ trans('lang.views') }}</span>
          </li>
          <li>
             <span><i class="fa fa-shopping-basket iconcolor3"></i><strong>{{{Helper::getServiceCount($service->id, 'completed')}}}</strong>&nbsp;{{ trans('lang.sales') }}</span>
          </li>
          <li>
             <span><i class="fa fa-clock-o iconcolor4"></i><strong>{{{$response_time->title}}}</strong>&nbsp;{{ trans('lang.response_time') }}</span>
          </li>
       </ul>
       <div class="wt-ratingcontent">
          <p><em>*</em> {{ trans('lang.service_note') }}</p>
          <a href="javascript:;" class="wt-btn" v-on:click.prevent="hireFreelancer('{{{$service->id}}}', '{{{trans('lang.hire_service_title')}}}', '{{{trans('lang.hire_service_text')}}}', '{{$mode}}')">{{ trans('lang.buy_now') }} </a>
       </div>
    </div>
 </div>