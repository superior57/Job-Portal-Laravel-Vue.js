<div class="wt-tabscontenttitle la-switch-option">
    <h2>{{ trans('lang.explore_cat_sec') }}</h2>
    <switch_button v-model="cat_section_display">{{{ trans('lang.show_on_homepage') }}}</switch_button>
    <input type="hidden" :value="cat_section_display" name="section[0][cat_section_display]">
</div>
@if (file_exists(resource_path('views/extend/back-end/admin/home-page-settings/sections/explore-categories.blade.php'))) 
    @include('extend.back-end.admin.home-page-settings.sections.explore-categories')
@else 
    @include('back-end.admin.home-page-settings.sections.explore-categories')
@endif
<div class="wt-tabscontenttitle la-switch-option">
    <h2>{{ trans('lang.start_as_sec') }}</h2>
    <switch_button v-model="home_section_display">{{{ trans('lang.show_on_homepage') }}}</switch_button>
    <input type="hidden" :value="home_section_display" name="section[0][home_section_display]">
</div>
@if (file_exists(resource_path('views/extend/back-end/admin/home-page-settings/sections/background-image.blade.php'))) 
    @include('extend.back-end.admin.home-page-settings.sections.background-image')
@else 
    @include('back-end.admin.home-page-settings.sections.background-image')
@endif
@if (file_exists(resource_path('views/extend/back-end/admin/home-page-settings/sections/start-as.blade.php'))) 
    @include('extend.back-end.admin.home-page-settings.sections.start-as')
@else 
    @include('back-end.admin.home-page-settings.sections.start-as')
@endif
<div class="wt-tabscontenttitle la-switch-option">
    <h2>{{ trans('lang.download_app_sec_settings') }}</h2>
    <switch_button v-model="app_section_display">{{{ trans('lang.show_on_homepage') }}}</switch_button>
    <input type="hidden" :value="app_section_display" name="section[0][app_section_display]">
</div>
@if (file_exists(resource_path('views/extend/back-end/admin/home-page-settings/sections/download-app.php'))) 
    @include('extend.back-end.admin.home-page-settings.sections.download-app')
@else 
    @include('back-end.admin.home-page-settings.sections.download-app')
@endif
