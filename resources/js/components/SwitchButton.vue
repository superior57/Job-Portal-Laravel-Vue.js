<template>
  <div class="switch-button-control" v-if="isShow" v-cloak>
    <div class="switch-button" :class="{ enabled: isEnabled }" @click="toggle" :style="{'--color': color}">
      <div class="button"></div>
    </div>
    <div class="switch-button-label">
      <slot></slot>
    </div>
  </div>
</template>

<script>
export default {
  model: {
    prop: "isEnabled",
    event: "toggle"
  },
  props: {
    isEnabled: Boolean,
    color: {
      type: String,
      required: false,
      default: "#4D4D4D"
    }
  },
  data() {
    return {
      isShow: false
    }
  },
  methods: {
    toggle: function() {
      this.$emit("toggle", !this.isEnabled);
    }
  },
  mounted: function() {
      let self = this;
      setTimeout(function () {
          self.isShow = true;
      }, 400);
  },
};
</script>
<style>
.switch-button-control {
  display: flex;
  flex-direction: row;
  align-items: center;
}
.switch-button-control .switch-button {
    margin: 0;
    width: 35px;
    height: 21px;
    display: block;
    border-radius: 13px;
    transition: all 0.3s;
    box-shadow: inset 0 0 0 2px #e4e4e4;
    transition: all 0.4s;
    -webkit-transition: all 0.4s;
    cursor: pointer;
}
.switch-button-control .switch-button .button {
    left: 0;
    top: 1px;
    width: 18px;
    height: 18px;
    background: #fff;
    border-radius: 60px;
    border: 1px solid #e2e2e2;
    display: inline-block;
    position: relative;
    pointer-events: none;
    transition: all 0.3s ease 0s;
    -webkit-box-shadow: 0 1px 2px 0 rgba(0,0,0,0.40);
    box-shadow: 0 1px 2px 0 rgba(0,0,0,0.40);
}
.switch-button-control .switch-button.enabled {
  background-color: #26de81;
  box-shadow: none;
}
.switch-button-control .switch-button.enabled .button {
  background: white;
  transform: translateX(calc(calc( 1.6em - (2 * 2px) ) + (2 *-1px)));
}
.switch-button-control .switch-button-label {
  margin-left: 10px;
}
</style>