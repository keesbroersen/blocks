<template>
  <div 
    :style="'background:'+ color+';'" 
    :class="[{ light: light}, 'dev-color' ]" >
    <p class="dev-color__name">{{ name }}</p>
    <p class="dev-color__color">{{ color }}</p>
  </div>
</template>

<script>
export default {
  name: "DevStyleColor",
  props: {
    name: { type: String, required: true },
    color: { type: String, required: true },
    light: { type: Boolean, required: false, default: false }
  },
  data() {
    return {};
  },
  computed: {},
  mounted() {},
  methods: {}
};
</script>

<style lang="scss">
.dev-color {
  position: relative;
  color: #fff;

  &.light {
    border: 1px solid #eee;
    color: #000;
  }

  &__name {
    position: absolute;
    top: 15px;
    left: 15px;
  }

  &__color {
    position: absolute;
    bottom: 15px;
    left: 15px;
    opacity: 0.5;
  }

  &:before {
    content: "";
    padding-top: 140%;
    display: block;
  }
}
</style>
