<template>
  <div class="dev__page">
    <div class="dev__sidebar">
      <a 
        v-for="(block, key) in prop_data" 
        :key="key" 
        :href="'#'+key" 
        v-html="key"/>
    </div>
    <div class="dev__content">
      <div class="dev__container">
        <DevBlock 
          v-for="(block, key) in prop_data" 
          :key="key" 
          :block_name="key" 
          :block="block"/>
      </div>
    </div>
  </div>
</template>

<script>
import DevBlock from "./DevBlock.vue";
export default {
  name: "DevPageBlocks",
  components: {
    DevBlock
  },
  props: {
    prop_data: { type: Object, required: true }
  },
  data() {
    return {
      data: { type: Object, required: false }
    };
  }
};
</script>

<style lang="scss">
</style>
