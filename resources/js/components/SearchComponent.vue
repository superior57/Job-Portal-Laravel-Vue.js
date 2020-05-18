<template>
    <form class="wt-formtheme wt-formbanner wt-formbannertwo" id="main-search-form" v-if="this.widget_type == 'home'">
        <fieldset>
            <div class="wt-dropdown"  @click="toggleDropdown">
                <span>{{trans('lang.in')}} <em class="selected-search-type">{{selected_type}} </em><i class="lnr lnr-chevron-down"></i></span>
            </div>
            <div class="wt-radioholder" v-bind:style='{"display" : (isActive? "block" : "none" )}'>
                <span class="wt-radio" v-for="(filter, index) in filters" :key="index">
                    <input :id="'wt-'+filter.value" type="radio" name="searchtype" :value="filter.value" v-model="types" v-on:change="getSearchableData(types), emptyField(types)">
                    <label :for="'wt-'+filter.value">{{filter.title}}</label>
                </span>
            </div>
            <div class="form-group">
                <vue-bootstrap-typeahead
                    class="mb-4"
                    size="sm"
                    v-model="query"
                    :data="searchable_data"
                    :placeholder=placeholder
                    :serializer="item => item.name"
                    ref="searchfield"
                    @input="watchSearchResults(types)"
                    inputClass="search-field"
                    @hit="recordSelected"
                >
                    <template slot="suggestion" slot-scope="{ data, htmlText }">
                        <div class="d-flex align-items-center">
                            <span class="ml-4" v-html="htmlText"></span>
                        </div>
                        <input type="hidden" name="keyword" :value="data.slug" id="hidden_field">
                    </template>
                </vue-bootstrap-typeahead>
                <span v-if="is_show" class="no-record-span">{{no_record}}</span>
                <div class="wt-formoptions">
                    <a href="#" class="wt-searchbtn" v-on:click.prevent="submitSearchForm(types)"><i class="lnr lnr-magnifier"></i></a>
                </div>
            </div>
        </fieldset>
    </form>
    <form class="wt-formtheme wt-formbanner wt-formbannervtwo" v-else>
        <fieldset>
            <div class="form-group">
                <vue-bootstrap-typeahead
                    class="mb-4"
                    size="sm"
                    v-model="query"
                    :data="searchable_data"
                    :placeholder=placeholder
                    :serializer="item => item.name"
                    ref="searchfield"
                    @input="watchSearchResults(types)"
                    inputClass="search-field"
                    @hit="recordSelected"
                >
                <template slot="suggestion" slot-scope="{ data, htmlText }">
                    <div class="d-flex align-items-center">
                        <span class="ml-4" v-html="htmlText"></span>
                    </div>
                    <input type="hidden" name="keyword" :value="data.slug" id="hidden_field">
                </template>
            </vue-bootstrap-typeahead>
            <span v-if="is_show" class="no-record-span">{{no_record}}</span>
                <div class="wt-formoptions">
                    <div class="wt-dropdown"  @click="toggleDropdown">
                        <span>In: <em class="selected-search-type">{{selected_type}} </em><i class="lnr lnr-chevron-down"></i></span>
                    </div>
                    <div class="wt-radioholder" v-bind:style='{"display" : (isActive? "block" : "none" )}'>
                        <span class="wt-radio" v-for="(filter, index) in filters" :key="index">
                            <input :id="filter.value" type="radio" name="searchtype" :value="filter.value" v-model="types" v-on:change="getSearchableData(types), emptyField(types), changeFilter()">
                            <label :for="filter.value">{{filter.title}}</label>
                        </span>
                    </div>
                    <a href="#" class="wt-searchbtn" v-on:click.prevent="submitSearchForm(types)"><i class="lnr lnr-magnifier"></i><span>{{trans('lang.search_now')}}</span></a>
                </div>
            </div>
            <div class="wt-btn-remove-holder">
                <a href="javascript:;" class="wt-search-remove">{{trans('lang.cancel')}}</a>
                <a href="javascript:;" class="wt-search-remove"><i class="fa fa-close"></i></a>
            </div>
        </fieldset>
    </form>
</template>
<script>
 export default{
    props: ['widget_type', 'no_record_message', 'placeholder', 'freelancer_placeholder', 'employer_placeholder', 'job_placeholder', 'service_placeholder'],
        data(){
            return {
                filters:[],
                isActive: false,
                searchable_data:[],
                freelancers:[],
                employers:[],
                jobs:[],
                query:'',
                types:'freelancer',
                selected_type:'',
                no_record:this.no_record_message,
                is_show: false,
                related_results:false,
                url: APP_URL + '/search-results',
                type_change:false,
            }
        },
        methods: {
            displayFiltersName(type) {
                if(type == 'freelancer') {
                    this.selected_type = this.freelancer_placeholder;
                } else if(type == 'employer') {
                    this.selected_type = this.employer_placeholder;
                } else if(type == 'job') {
                    this.selected_type = this.job_placeholder;
                } else if(type == 'service') {
                    this.selected_type = this.service_placeholder;
                }
            },
            getFilters(){
                let self = this;
                axios.get(APP_URL + '/search/get-search-filters')
                .then(function (response) {
                    if ( response.data.type == 'success') {
                        self.filters = response.data.result;
                    }
                });
            },
            changeFilter(){
                this.type_change = true;
            },
            getSearchableData: function(type, newQuery){
                this.displayFiltersName(type);
                let self = this;
                axios.post(APP_URL + '/search/get-searchable-data',{
                    type:type
                })
                .then(function (response) {
                    if (type == 'freelancer') {
                        self.searchable_data = response.data.searchables;
                    } else if (type == 'employer') {
                        self.searchable_data = response.data.searchables;
                    } else if (type == 'job') {
                        self.searchable_data = response.data.searchables;
                    } else if (type == 'service') {
                        self.searchable_data = response.data.searchables;
                    }
                });
            },
            emptyField:function(types){
                this.$refs.searchfield.inputValue = '';
                this.isActive = false;
            },
            watchSearchResults:function(types){
                if(jQuery('.wt-radioholder').css('display') == 'block') {
                    jQuery('.wt-radioholder').css("display", "none");
                }
                if ( !(jQuery('.list-group').hasClass( "input-searching" )) ) {
                    jQuery('.list-group').addClass('input-searching');
                }
                if(this.$refs.searchfield.$children[0].matchedItems == '') {
                    jQuery('.search-field').parents('.form-group').find('span.no-record-span').css("display", "block");
                    jQuery('.wt-related-result').remove();
                    this.is_show = true;
                } else {
                    let keyword = this.query;
                    var urlParams = new URLSearchParams(window.location.search);
                    if (urlParams.get('type') && this.type_change == false) {
                        var type = urlParams.get('type');
                    } else {
                        var type = types;
                    }
                    if(type == 'Freelancers') {
                        type = 'freelancer';
                    } else if(type == 'Employers') {
                        type = 'employer';
                    } else if(type == 'Jobs') {
                        type = 'job';
                    } else if(type == 'Services') {
                        type = 'service';
                    }
                    jQuery('.search-field').parents('.form-group').find('span.no-record-span').css("display", "none");
                    jQuery('.wt-related-result').remove();
                    var html = '<a href="'+this.url+'?s='+keyword+'&type='+type+'" class="wt-related-result"><span v-if="related_results">show all result related to'+' <em>'+ keyword+'</em></span></a>';
                    jQuery(".list-group").append(html);
                    this.related_results = true;
                    this.is_show = false;
                }
            },
            recordSelected:function(){
                if (jQuery('.list-group').hasClass( "input-searching" )) {
                    jQuery('.list-group').removeClass('input-searching');
                }
            },
            toggleDropdown: function(){
                if (this.isActive == false) {
                    this.isActive = true;
                    jQuery('.wt-related-result').remove();
                } else {
                    this.isActive = false;
                }
            },
            submitSearchForm: function(type) {
                var urlParams = new URLSearchParams(window.location.search);
                if (urlParams.get('type') && this.type_change == false) {
                    var type = urlParams.get('type');
                }   else {
                        if(type == 'Freelancers') {
                            type = 'freelancer';
                    }   else if(type == 'Employers') {
                            type = 'employer';
                    }   else if(type == 'Jobs') {
                            type = 'job';
                    } else if(type == 'Services') {
                            type = 'service';
                    }
                }
                if (this.$refs.searchfield.inputValue != '') {
                    let slug = document.getElementById('hidden_field').value;
                    let keyword = this.query;
                    if (type == 'job') {
                        window.location.replace(APP_URL+'/job/'+slug);
                    } else if (type == 'service'){
                        window.location.replace(APP_URL+'/service/'+slug);
                    } 
                    else {
                        window.location.replace(APP_URL+'/profile/'+slug);
                    }
                } else {
                    window.location.replace(APP_URL+'/search-results?type='+type);
                }

            },
        },
        watch: {
            query: _.debounce(function(newQuery) { this.getSearchableData(newQuery) }, 250)
        },
        mounted: function () {
            var urlParams = new URLSearchParams(window.location.search);
            if (urlParams.get('type')) {
                var type = urlParams.get('type');
                this.displayFiltersName(type);
            }
            jQuery(".search-field").keydown(function(){
                var input = jQuery('.search-field');
                input.on('keydown', function() {
                    var key = event.keyCode || event.charCode;
                    if( key == 8 || key == 46 ) {
                        if(!jQuery(this).val()) {
                            jQuery(this).parents('.form-group').find('span.no-record-span').css("display", "none");
                        } else {
                            jQuery('.wt-related-result').remove();
                            this.is_show = true;
                        }
                    }
                });
            });
        },
        created: function() {
            this.getFilters();
            var urlParams = new URLSearchParams(window.location.search);
            if (urlParams.get('type')) {
                var type = urlParams.get('type');
                this.displayFiltersName(type);
                this.getSearchableData(type);
            } else {
                this.getSearchableData('freelancer');
            }
        }
    }
</script>
<style>
.wt-radioholder{transition: 1s;}
</style>

