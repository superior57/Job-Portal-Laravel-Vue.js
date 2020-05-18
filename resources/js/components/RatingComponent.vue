<template>
  <div>
    <div v-if="max_inputs > 0">
      <div v-for="(input, index) in max_inputs" :key="index">
        <div class="form-group wt-ratingholder">
            <div class="wt-ratepoints">
                <vue-stars
                  :name="'rate['+[index]+']'"
                  :active-color="'#fecb02'"
                  :inactive-color="'#999999'"
                  :shadow-color="'#ffff00'"
                  :hover-color="'#fecb02'"
                  :max="5"
                  :value="0"
                  :readonly="false"
                  :char="'★'"
                />
                <div class="counter wt-pointscounter">{{index}}</div>
            </div>
            <span class="wt-ratingdescription">{{ trans('lang.pro_behaviour')</span> }}
        </div>
      </div>  
    </div>
    <div v-else>  
    <div class="counter wt-pointscounter">{{rate}}</div>
    <vue-stars
    name="demo"
    :active-color="'#fecb02'"
    :inactive-color="'#999999'"
    :shadow-color="'#ffff00'"
    :hover-color="'#fecb02'"
    :max="5"
    :value="0"
    :readonly="false"
    v-model="rate"
    :char="'★'"
  />
    </div>
  </div>
</template>

<script>
export default {
  props: ['name', 'max_inputs'],
  data () {
    return {
      max_input:this.max_inputs,
      rate:0,
    }
  },
  methods: {
    
  }
}
</script>

<style>
    .fade-enter{
        opacity: 0;
    }
    .fade-enter-active{
        transition: opacity 1s;
    }
    .fade-leave-active{
        transition: opacity 1s;
        opacity: 0;
    }
</style>