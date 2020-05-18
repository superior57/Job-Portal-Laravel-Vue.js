{!! Form::open(['url' => '', 'class' => 'wt-formtheme wt-skillsform', 'id'=>'social-management', '@submit.prevent'=>'submitSocialSettings']) !!}
    <fieldset class="social-icons-content">
        @if (!empty($social_unserialize_array))
            @php $counter = 0 @endphp
            @foreach ($social_unserialize_array as $unserializeKey =>$unserializevalue)
                <div class="wrap-social-icons wt-haslayout">
                    <div class="form-group">
                        <div class="form-group-holder">
                            <span class="wt-select">
                                <select name="social[{{{$counter}}}][title]" class="form-control">
                                    <option value="null" selected>{{{trans('lang.select_social_icons')}}}</option>
                                    @foreach ($social_list as $key => $value)
                                        @php
                                            $selected = 'selected';
                                            $selected_value = $unserializevalue['title'] === $key ? $selected : '';
                                        @endphp
                                        <option value="{{{$key}}}" {{{$selected_value}}}>{{{$value['title']}}}</option>
                                    @endforeach
                                </select>
                            </span> {!! Form::text('social['.$counter.'][url]', $unserializevalue['url'],
                            ['class' => 'form-control author_title']) !!}
                        </div>
                        <div class="form-group wt-rightarea">
                            @if ($unserializeKey == 0 )
                                <span class="wt-addinfobtn" @click="addSocial"><i class="fa fa-plus"></i></span> @else
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
                        <span class="wt-select">
                            <select name="social[0][title]" class="form-control">
                                <option value="null" selected>{{ trans('lang.select_social_icons') }}</option>
                                @foreach($social_list as $key => $value)
                                    <option value="{{{$key}}}">{{{$value['title']}}}</option>
                                @endforeach
                            </select>
                        </span>
                        {!! Form::text('social[0][url]', null, ['class' => 'form-control author_title',
                        'placeholder' => trans('lang.ph_social_url'),'v-model' => 'first_social_url']) !!}
                    </div>
                </div>
                <div class="form-group wt-rightarea">
                    <span class="wt-addinfo" @click="addSocial"><i class="fa fa-plus"></i></span>
                </div>
            </div>
        @endif
            <div v-for="(social, index) in socials" v-cloak>
                <div class="wrap-social-icons wt-haslayout">
                    <div class="form-group">
                        <div class="form-group-holder">
                            <span class="wt-select">
                                    <select class="form-control" v-bind:name="'social['+[social.count]+'][title]'">
                                        <option>{{{trans('lang.select_social')}}}</option>
                                        @foreach($social_list as $key => $value)
                                            <option value="{{{$key}}}">{{{$value['title']}}}</option>
                                        @endforeach
                                    </select>
                                </span>
                            <input placeholder="{{{trans('lang.ph_social_url')}}}" v-bind:name="'social['+[social.count]+'][url]'" type="text" class="form-control"
                                v-model="social.social_url">
                        </div>
                        <div class="form-group wt-rightarea">
                            <span class="wt-addinfo wt-deleteinfo wt-addinfobtn" @click="removeSocial(index)"><i class="fa fa-trash"></i></span>
                        </div>
                    </div>
                </div>
            </div>
    </fieldset>
    <div class="wt-updatall la-updateall-holder">
        <i class="ti-announcement"></i>
        <span>{{{ trans('lang.save_changes_note') }}}</span>
        {!! Form::submit(trans('lang.btn_save'),['class' => 'wt-btn']) !!}
    </div>
{!! Form::close() !!}
