<template>
  <div 
    :class="{'active': sidebar}" 
    class="dev-sidebar">
    <button
      v-if="!sidebar" 
      class="dev-button dev-button__open" 
      @click="sidebar = true">
      <svg 
        aria-hidden="true" 
        data-prefix="fal" 
        data-icon="angle-right" 
        role="img" 
        xmlns="http://www.w3.org/2000/svg" 
        viewBox="0 0 192 512" 
        class="svg-inline--fa fa-angle-right fa-w-6 fa-2x"><path 
          fill="currentColor" 
          d="M166.9 264.5l-117.8 116c-4.7 4.7-12.3 4.7-17 0l-7.1-7.1c-4.7-4.7-4.7-12.3 0-17L127.3 256 25.1 155.6c-4.7-4.7-4.7-12.3 0-17l7.1-7.1c4.7-4.7 12.3-4.7 17 0l117.8 116c4.6 4.7 4.6 12.3-.1 17z" 
          class=""/></svg>    </button>

    <div class="dev-sidebar__content">
      <button
        v-if="sidebar"
        class="dev-button dev-button__close" 
        @click="sidebar = false">
        <svg 
          aria-hidden="true" 
          data-prefix="fal" 
          data-icon="angle-left" 
          role="img" 
          xmlns="http://www.w3.org/2000/svg" 
          viewBox="0 0 192 512" 
          class="svg-inline--fa fa-angle-left fa-w-6 fa-2x"><path 
            fill="currentColor" 
            d="M25.1 247.5l117.8-116c4.7-4.7 12.3-4.7 17 0l7.1 7.1c4.7 4.7 4.7 12.3 0 17L64.7 256l102.2 100.4c4.7 4.7 4.7 12.3 0 17l-7.1 7.1c-4.7 4.7-12.3 4.7-17 0L25 264.5c-4.6-4.7-4.6-12.3.1-17z" 
            class=""/></svg>
      </button>
      <slot/>
    </div>

  </div>
</template>

<script>
export default {
  name: "DevSidebar",
  props: {
    //
  },
  data() {
    return {
      sidebar: true
    };
  },
  computed: {},
  mounted() {},
  methods: {
    // route(where) {
    //   this.$emit("route", where);
    // }
  }
};
</script>

<style lang="scss" scoped>
.dev-sidebar {
  position: relative;

  &.active {
    .dev-sidebar__content {
      display: flex;
    }
  }

  &__content {
    display: none;
    flex-direction: column;
    transition: all 0.3s;
    height: 100%;
    width: 250px;

    padding: 20px;
    background: #f7f7f7;
  }

  a {
    text-decoration: none;
    color: #333;
    margin: 0 0 20px;
  }

  .dev-button {
    z-index: 1;
    position: absolute;
    top: 32px;
    right: -20px;
    height: 32px;
    width: 20px;

    border-radius: 0 5px 5px 0;
    border: 1px solid #eee;
    border-left: none;
    background: transparent;

    svg {
      height: 100%;
      width: 100%;
      display: block;
      color: #999;
    }

    &__open {
      right: -20px;
    }
  }
}
</style>
