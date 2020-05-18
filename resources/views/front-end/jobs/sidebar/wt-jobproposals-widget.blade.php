@php $proposals_count = !empty($job->proposals) ? $job->proposals->count() : 0; @endphp
<div class="wt-proposalsrcontent tg-authorcodescan">
    <span class="wt-proposalsicon"><i class="fa fa-angle-double-down"></i><i class="fa fa-newspaper"></i></span>
    <div class="wt-title">
        <h3>{{{ $proposals_count }}}</h3>
        <span>{{ trans('lang.proposals_received') }}<em>{{ Carbon\Carbon::now()->format('M d Y') }}</em></span>
    </div>
</div>
