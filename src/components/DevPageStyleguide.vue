<template>
  <div class="dev__page">
    <div class="dev__sidebar">
      <a 
        href="#"
      />
    </div>
    <div class="dev__content">
      <div class="dev__container">
        <h2 class="dev-title">Colors</h2>
        <div class="dev-colors">
          <DevStyleColor 
            name="Primary" 
            color="#1860AF"/>
          <DevStyleColor 
            name="Secondary" 
            color="#FF6D00"/>
          <DevStyleColor 
            name="Black" 
            color="#000"/>
          <DevStyleColor 
            name="Black support" 
            color="#4A4A4A"/>
          <DevStyleColor 
            name="Light grey" 
            color="#000"/>
          <DevStyleColor 
            name="White" 
            color="#fff"
            light/>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import DevStyleColor from "./DevStyleColor.vue";

export default {
  name: "DevPageBlocks",
  components: {
    DevStyleColor
  },
  props: {},
  data() {
    return {
      data: { type: Object, required: false }
    };
  }
};
</script>

<style lang="scss">
.dev-colors {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr;
  grid-gap: 10px;
}
</style>
