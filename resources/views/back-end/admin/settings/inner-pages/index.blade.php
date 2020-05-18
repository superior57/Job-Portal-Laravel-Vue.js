<div class="la-inner-pages wt-haslayout">
{!! Form::open(['url' => '', 'class' =>'wt-formtheme wt-userform', 'id' =>'breadcrumb-option', '@submit.prevent'=>'submitBreadcrumbs'])!!}
    <div class="wt-location wt-tabsinfo">
        <div class="wt-tabscontenttitle">
                <h2>{{{ trans('lang.breadcrumbs_option') }}}</h2>
        </div>
        <div class="wt-settingscontent">
            <div class="wt-settingscontent la-settingsradio">
                <div class="wt-description"><p>{{ trans('lang.breadcrumbs_option_note') }}</p></div>
                <switch_button v-model="enable_breadcrumbs">{{{ trans('lang.enable_disable') }}}</switch_button>
                <input type="hidden" :value="enable_breadcrumbs" name="enable_breadcrumbs">
            </div>

        </div>
    </div>
    <div class="wt-updatall la-updateall-holder">
        <i class="ti-announcement"></i>
        <span>{{{ trans('lang.save_changes_note') }}}</span>
        {!! Form::submit(trans('lang.btn_save'),['class' => 'wt-btn']) !!}
    </div>
{!! Form::close() !!}
{!! Form::open(['url' => '', 'class' =>'wt-formtheme wt-userform', 'id' =>'inner-page-form', '@submit.prevent'=>'submitInnerPage'])!!}
    <div class="wt-location wt-tabsinfo">
        <div class="wt-tabscontenttitle">
            <h2>{{{ trans('lang.freelancer_listing') }}}</h2>
        </div>
        <div class="wt-settingscontent">
            <div class="wt-description"><p>{{ trans('lang.seo_meta_title') }}</p></div>
            <div class="wt-formtheme wt-userform">
                <div class="form-group">
                    {!! Form::text('inner_page[0][f_list_meta_title]', e($f_list_meta_title), array('class' => 'form-control')) !!}
                </div>
            </div>
        </div>
        <div class="wt-settingscontent">
            <div class="wt-description"><p>{{ trans('lang.seo_meta_desc') }}</p></div>
            <div class="wt-formtheme wt-userform">
                <div class="form-group">
                    {!! Form::textarea('inner_page[0][f_list_meta_desc]', $f_list_meta_desc, array('class' => 'form-control')) !!}
                </div>
            </div>
        </div>
        <div class="wt-settingscontent la-settingsradio">
            <div class="wt-description"><p>{{ trans('lang.show_f_banner') }}</p></div>
            <switch_button v-model="show_f_banner">{{{ trans('lang.show_hide_banner') }}}</switch_button>
            <input type="hidden" :value="show_f_banner" name="inner_page[0][show_f_banner]">
        </div>
        @if (file_exists(resource_path('views/extend/back-end/admin/settings/inner-pages/f_inner_banner.blade.php')))
            @include('extend.back-end.admin.settings.inner-pages.f_inner_banner')
        @else
            @include('back-end.admin.settings.inner-pages.f_inner_banner')
        @endif
    </div>
    <div class="wt-location wt-tabsinfo">
        <div class="wt-tabscontenttitle">
            <h2>{{{ trans('lang.emp_listing') }}}</h2>
        </div>
        <div class="wt-settingscontent">
            <div class="wt-description"><p>{{ trans('lang.seo_meta_title') }}</p></div>
            <div class="wt-formtheme wt-userform">
                <div class="form-group">
                    {!! Form::text('inner_page[0][emp_list_meta_title]', $emp_list_meta_title, array('class' => 'form-control')) !!}
                </div>
            </div>
        </div>
        <div class="wt-settingscontent">
            <div class="wt-description"><p>{{ trans('lang.seo_meta_desc') }}</p></div>
            <div class="wt-formtheme wt-userform">
                <div class="form-group">
                    {!! Form::textarea('inner_page[0][emp_list_meta_desc]', $emp_list_meta_desc, array('class' => 'form-control')) !!}
                </div>
            </div>
        </div>
        <div class="wt-settingscontent la-settingsradio">
            <div class="wt-description"><p>{{ trans('lang.show_emp_banner') }}</p></div>
            <switch_button v-model="show_emp_banner">{{{ trans('lang.show_hide_banner') }}}</switch_button>
            <input type="hidden" :value="show_emp_banner" name="inner_page[0][show_emp_banner]">
        </div>
        @if (file_exists(resource_path('views/extend/back-end/admin/settings/inner-pages/e_inner_banner.blade.php')))
            @include('extend.back-end.admin.settings.inner-pages.e_inner_banner')
        @else
            @include('back-end.admin.settings.inner-pages.e_inner_banner')
        @endif
    </div>
    <div class="wt-location wt-tabsinfo">
        <div class="wt-tabscontenttitle">
            <h2>{{{ trans('lang.job_listing') }}}</h2>
        </div>
        <div class="wt-settingscontent">
            <div class="wt-description"><p>{{ trans('lang.seo_meta_title') }}</p></div>
            <div class="wt-formtheme wt-userform">
                <div class="form-group">
                    {!! Form::text('inner_page[0][job_list_meta_title]', $job_list_meta_title, array('class' => 'form-control')) !!}
                </div>
            </div>
        </div>
        <div class="wt-settingscontent">
            <div class="wt-description"><p>{{ trans('lang.seo_meta_desc') }}</p></div>
            <div class="wt-formtheme wt-userform">
                <div class="form-group">
                    {!! Form::textarea('inner_page[0][job_list_meta_desc]', $job_list_meta_desc, array('class' => 'form-control')) !!}
                </div>
            </div>
        </div>
        <div class="wt-settingscontent la-settingsradio">
            <div class="wt-description"><p>{{ trans('lang.show_job_banner') }}</p></div>
            <switch_button v-model="show_job_banner">{{{ trans('lang.show_hide_banner') }}}</switch_button>
            <input type="hidden" :value="show_job_banner" name="inner_page[0][show_job_banner]">
        </div>
        @if (file_exists(resource_path('views/extend/back-end/admin/settings/inner-pages/job_inner_banner.blade.php')))
            @include('extend.back-end.admin.settings.inner-pages.job_inner_banner')
        @else
            @include('back-end.admin.settings.inner-pages.job_inner_banner')
        @endif
    </div>
    <div class="wt-location wt-tabsinfo">
        <div class="wt-tabscontenttitle">
            <h2>{{{ trans('lang.service_listing') }}}</h2>
        </div>
        <div class="wt-settingscontent">
            <div class="wt-description"><p>{{ trans('lang.seo_meta_title') }}</p></div>
            <div class="wt-formtheme wt-userform">
                <div class="form-group">
                    {!! Form::text('inner_page[0][service_list_meta_title]', $service_meta_title, array('class' => 'form-control')) !!}
                </div>
            </div>
        </div>
        <div class="wt-settingscontent">
            <div class="wt-description"><p>{{ trans('lang.seo_meta_desc') }}</p></div>
            <div class="wt-formtheme wt-userform">
                <div class="form-group">
                    {!! Form::textarea('inner_page[0][service_list_meta_desc]', $service_meta_desc, array('class' => 'form-control')) !!}
                </div>
            </div>
        </div>
        <div class="wt-settingscontent la-settingsradio">
            <div class="wt-description"><p>{{ trans('lang.show_service_banner') }}</p></div>
            <switch_button v-model="show_service_banner">{{{ trans('lang.show_hide_banner') }}}</switch_button>
            <input type="hidden" :value="show_service_banner" name="inner_page[0][show_service_banner]">
        </div>
        @if (file_exists(resource_path('views/extend/back-end/admin/settings/inner-pages/service_inner_banner.blade.php')))
            @include('extend.back-end.admin.settings.inner-pages.service_inner_banner')
        @else
            @include('back-end.admin.settings.inner-pages.service_inner_banner')
        @endif
    </div>
    <div class="wt-location wt-tabsinfo">
        <div class="wt-tabscontenttitle">
            <h2>{{{ trans('lang.article_listing') }}}</h2>
        </div>
        <div class="wt-settingscontent">
            <div class="wt-description"><p>{{ trans('lang.seo_meta_title') }}</p></div>
            <div class="wt-formtheme wt-userform">
                <div class="form-group">
                    {!! Form::text('inner_page[0][article_list_meta_title]', $article_meta_title, array('class' => 'form-control')) !!}
                </div>
            </div>
        </div>
        <div class="wt-settingscontent">
            <div class="wt-description"><p>{{ trans('lang.seo_meta_desc') }}</p></div>
            <div class="wt-formtheme wt-userform">
                <div class="form-group">
                    {!! Form::textarea('inner_page[0][article_list_meta_desc]', $article_meta_desc, array('class' => 'form-control')) !!}
                </div>
            </div>
        </div>
        <div class="wt-settingscontent la-settingsradio">
            <div class="wt-description"><p>{{ trans('lang.show_article_banner') }}</p></div>
            <switch_button v-model="show_article_banner">{{{ trans('lang.show_hide_banner') }}}</switch_button>
            <input type="hidden" :value="show_article_banner" name="inner_page[0][show_article_banner]">
        </div>
        @if (file_exists(resource_path('views/extend/back-end/admin/settings/inner-pages/article_inner_banner.blade.php')))
            @include('extend.back-end.admin.settings.inner-pages.article_inner_banner')
        @else
            @include('back-end.admin.settings.inner-pages.article_inner_banner')
        @endif
    </div>
    <div class="wt-updatall la-updateall-holder">
        <i class="ti-announcement"></i>
        <span>{{{ trans('lang.save_changes_note') }}}</span>
        {!! Form::submit(trans('lang.btn_save'),['class' => 'wt-btn']) !!}
    </div>
{!! Form::close() !!}
</div>
