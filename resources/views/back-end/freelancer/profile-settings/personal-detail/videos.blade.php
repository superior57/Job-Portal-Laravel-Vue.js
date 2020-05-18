<div class="wt-tabscontenttitle">
    <h2>{{{ trans('lang.videos') }}}</h2>
</div>
<div class="wt-skillsform">
    <fieldset class="social-icons-content">
        @if (!empty($videos))
            @php $counter = 0 @endphp
            @foreach ($videos as $video_key => $mem_value)
                <div class="wrap-social-icons wt-haslayout">
                    <div class="form-group">
                        <div class="form-group-holder">
                            {!! Form::text('video['.$counter.'][url]', e($mem_value['url']),
                            ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group wt-rightarea">
                            @if ($video_key == 0 )
                                <span class="wt-addinfobtn" @click="addVideo"><i class="fa fa-plus"></i></span> 
                            @else
                                <span class="wt-addinfobtn wt-deleteinfo delete-social" data-check="{{{$counter}}}">
                                    <i class="fa fa-trash"></i>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                @php $counter++; @endphp
            @endforeach
        @else
            <div class="wrap-social-icons wt-haslayout">
                <div class="form-group">
                    <div class="form-group-holder">
                        {!! Form::text('video[0][url]', null, ['class' => 'form-control',
                            'placeholder' => trans('lang.video_url')])
                        !!}
                    </div>
                    <div class="form-group wt-rightarea">
                        <span class="wt-addinfobtn" @click="addVideo"><i class="fa fa-plus"></i></span>
                    </div>
                </div>
                
            </div>
        @endif
            <div v-for="(video, index) in videos" v-cloak>
                <div class="wrap-social-icons wt-haslayout">
                    <div class="form-group">
                        <div class="form-group-holder">
                            <input v-bind:name="'video['+[video.count]+'][url]'" type="text" class="form-control"
                            v-model="video.url" placeholder="{{trans('lang.video_url')}}">
                        </div>
                        <div class="form-group wt-rightarea">
                            <span class="wt-addinfobtn wt-deleteinfo" @click="removeVideo(index)"><i class="fa fa-trash"></i></span>
                        </div>
                    </div>
                </div>
            </div>
    </fieldset>
</div>
