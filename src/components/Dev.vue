<template>
  <div class="dev">
    <DevMenu 
      :pages="pages" 
      @route="setRoute"/>
    <DevPageBlocks 
      v-if="pages.blocks" 
      :prop_data="prop_data"/>
    <DevPageStyleguide v-if="pages.styleguide"/>
    <DevPageInfo v-if="pages.info"/>
  </div>
</template>

<script>
import DevPageBlocks from "./DevPageBlocks.vue";
import DevPageStyleguide from "./DevPageStyleguide.vue";
import DevPageInfo from "./DevPageInfo.vue";
import DevPages from "./DevPages.vue";
import DevMenu from "./DevMenu.vue";

export default {
  name: "Dev",
  components: {
    DevPageBlocks,
    DevPageStyleguide,
    DevPageInfo,
    DevMenu,
    DevPages
  },
  props: {
    prop_data: { type: Object, required: true }
  },
  data() {
    return {
      data: { type: Object, required: false },
      pages: {
        info: true,
        styleguide: false,
        atoms: false,
        blocks: false,
        pages: false
      }
    };
  },
  methods: {
    setRoute(where) {
      const pos = where;
      for (const page in this.pages) {
        this.pages[page] = false;
      }
      this.pages[pos] = true;
    }
  }
};
</script>

<style lang="scss">
// @import "../main.scss";
// @import "../variables.scss";
.dev {
  // display: grid;
  // grid-template-columns: 20% 80%;
  // grid-template-rows: 60px auto;
  // grid-template-areas:
  //   "menu menu"
  //   "sidebar content";

  * {
    font-family: -apple-system, BlinkMacSystemFont, sans-serif;
  }

  .dev__page {
    display: flex;
    width: 100%;
  }

  &__content {
    // grid-area: content;
    position: relative;
    overflow-y: scroll;
    scroll-behavior: smooth;
    width: 100%;
    height: calc(100vh - 60px);
    background: #fff;

    .dev__container {
      margin: 0 auto;
      padding: 45px;
      max-width: 1280px;
    }
  }

  .item {
    margin: 0 0 5px;
    padding: 15px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    border: none;

    p {
      font-weight: bold;
    }
  }
}
</style>
