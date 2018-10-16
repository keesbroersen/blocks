<template>
  <div class="dev__page">
    <DevSidebar>
      <a 
        href="#dev-info"
      >Pages</a>
    </DevSidebar>
    <div class="dev__content">
      <section class="dev__section">
        <div class="dev__container">
          <h2 class="dev-title">Devpages</h2>
          
        </div>
      </section>
    </div>
  </div>
</template>

<script>
import DevSidebar from "./DevSidebar.vue";

export default {
  name: "DevPages",
  components: {
    DevSidebar
  },
  props: {},
  data() {
    return {
      data: { type: Object, required: false }
    };
  },
  mounted() {}
};
</script>

<style lang="scss">
</style>
