<template>
  <div class="dev">
    <DevMenu 
      :pages="pages" 
      @route="setRoute"/>
    <DevPageBlocks 
      v-if="pages.blocks" 
      :prop_data="prop_data"/>
    <DevPageStyleguide v-if="pages.styleguide"/>
  </div>
</template>

<script>
import DevPageBlocks from "./DevPageBlocks.vue";
import DevPageStyleguide from "./DevPageStyleguide.vue";
import DevMenu from "./DevMenu.vue";

export default {
  name: "Dev",
  components: {
    DevPageBlocks,
    DevPageStyleguide,
    DevMenu
  },
  props: {
    prop_data: { type: Object, required: true }
  },
  data() {
    return {
      data: { type: Object, required: false },
      pages: {
        info: false,
        styleguide: true,
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
// @import "../mixins.scss";
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

  &__sidebar {
    // grid-area: sidebar;
    width: 30%;
    max-width: 250px;
    display: flex;
    flex-direction: column;

    padding: 20px;
    background: #f7f7f7;

    a {
      text-decoration: none;
      color: #333;
      margin: 0 0 20px;
    }
  }

  &__content {
    // grid-area: content;
    position: relative;
    overflow-y: scroll;
    width: 100%;
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

  // button {
  //   padding: 5px 10px;
  //   background: #fff;
  //   border: 1px solid #ccc;
  //   border-radius: 5px;
  //   margin-bottom: 5px;

  //   &:not(:last-child) {
  //     margin-right: 5px;
  //   }

  //   &.active {
  //     background: #ccc;
  //     font-weight: bold;
  //   }
  // }
}
</style>
