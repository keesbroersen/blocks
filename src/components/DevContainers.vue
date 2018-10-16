<template>
  <div  
    class="dev-containers">
    <div class="dev-containers__header">
      <button 
        :class="{'active': width == '100%'}"
        class="dev-button" 
        @click="width = '100%'">
        <svg 
          aria-hidden="true" 
          data-prefix="fal" 
          data-icon="arrows-h" 
          role="img" 
          xmlns="http://www.w3.org/2000/svg" 
          viewBox="0 0 512 512" 
          class="svg-inline--fa fa-arrows-h fa-w-16 fa-2x"><path 
            fill="currentColor" 
            d="M399.959 170.585c-4.686 4.686-4.686 12.284 0 16.971L451.887 239H60.113l51.928-51.444c4.686-4.686 4.686-12.284 0-16.971l-7.071-7.07c-4.686-4.686-12.284-4.686-16.97 0l-84.485 84c-4.686 4.686-4.686 12.284 0 16.971l84.485 84c4.686 4.686 12.284 4.686 16.97 0l7.071-7.07c4.686-4.686 4.686-12.284 0-16.971L60.113 273h391.773l-51.928 51.444c-4.686 4.686-4.686 12.284 0 16.971l7.071 7.07c4.686 4.686 12.284 4.686 16.97 0l84.485-84c4.687-4.686 4.687-12.284 0-16.971l-84.485-84c-4.686-4.686-12.284-4.686-16.97 0l-7.07 7.071z" 
            class=""/></svg>
        100%
      </button>
      <button 
        :class="{'active': width == '1280px'}"
        class="dev-button" 
        @click="width = '1280px'">
        <svg 
          aria-hidden="true" 
          data-prefix="fal" 
          data-icon="desktop" 
          role="img"
          xmlns="http://www.w3.org/2000/svg" 
          viewBox="0 0 576 512" 
          class="svg-inline--fa fa-desktop fa-w-18 fa-2x"><path 
            fill="currentColor" 
            d="M528 0H48C21.5 0 0 21.5 0 48v288c0 26.5 21.5 48 48 48h192l-24 96h-72c-8.8 0-16 7.2-16 16s7.2 16 16 16h288c8.8 0 16-7.2 16-16s-7.2-16-16-16h-72l-24-96h192c26.5 0 48-21.5 48-48V48c0-26.5-21.5-48-48-48zM249 480l16-64h46l16 64h-78zm295-144c0 8.8-7.2 16-16 16H48c-8.8 0-16-7.2-16-16V48c0-8.8 7.2-16 16-16h480c8.8 0 16 7.2 16 16v288z" 
            class=""/></svg>
        1280px
      </button>
      <button 
        :class="{'active': width == '768px'}"
        class="dev-button" 
        @click="width = '768px'">
        <svg 
          aria-hidden="true" 
          data-prefix="fal" 
          data-icon="tablet" 
          role="img" 
          xmlns="http://www.w3.org/2000/svg" 
          viewBox="0 0 448 512" 
          class="svg-inline--fa fa-tablet fa-w-14 fa-2x"><path 
            fill="currentColor" 
            d="M256 416c0 17.7-14.3 32-32 32s-32-14.3-32-32c0-21.3 14.3-32 32-32s32 14.3 32 32zM448 48v416c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V48C0 21.5 21.5 0 48 0h352c26.5 0 48 21.5 48 48zm-32 0c0-8.8-7.2-16-16-16H48c-8.8 0-16 7.2-16 16v416c0 8.8 7.2 16 16 16h352c8.8 0 16-7.2 16-16V48z" 
            class=""/></svg>
        768px
      </button>
      <button 
        :class="{'active': width == '375px'}"
        class="dev-button" 
        @click="width = '375px'">
        <svg 
          aria-hidden="true" 
          data-prefix="fal" 
          data-icon="mobile" 
          role="img" 
          xmlns="http://www.w3.org/2000/svg" 
          viewBox="0 0 320 512" 
          class="svg-inline--fa fa-mobile fa-w-10 fa-2x"><path 
            fill="currentColor" 
            d="M192 416c0 17.7-14.3 32-32 32s-32-14.3-32-32 14.3-32 32-32 32 14.3 32 32zM320 48v416c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V48C0 21.5 21.5 0 48 0h224c26.5 0 48 21.5 48 48zm-32 0c0-8.8-7.2-16-16-16H48c-8.8 0-16 7.2-16 16v416c0 8.8 7.2 16 16 16h224c8.8 0 16-7.2 16-16V48z" 
            class=""/></svg>
        375px
      </button>
    </div>
    <div 
      :style="{ width: width }" 
      class="dev-containers__content">
      <div 
        :class="{'dev-mobile': width == '375px', 'dev-tablet': width == '768px', 'dev-desk': width == '1280px', 'dev-responsive': width == '100%'}" 
        class="dev-columns">
        <div 
          v-for="n in 12" 
          :key="n">
          {{ n }}</div>
      </div>

      <!-- Via an object so we can switch desk/tablet/mobile on a whim -->
      <object 
        type="text/html" 
        data="/wp-content/themes/noprotocol/templates/containers.php"/>
    </div>
  </div>
</template>

<script>
export default {
  name: "DevContainers",
  props: {},
  data() {
    return {
      width: "100%"
    };
  },
  computed: {},
  mounted() {},
  methods: {}
};
</script>

<style lang="scss">
@import "../main.scss";

.dev-containers {
  position: relative;

  &__header {
    display: flex;
    align-content: center;
    justify-content: flex-start;
    width: 100%;
    height: 70px;

    .dev-button {
      display: flex;
      flex-direction: column;
      cursor: pointer;
      height: 60px;
      width: 60px;
      padding: 10px;
      margin: 0 5px 0 0;

      border-radius: 5px;
      border: 1px solid #f7f7f7;
      background: transparent;
      color: #999;
      outline: none !important;

      &.active {
        background: #999;
        border-color: #999;
        color: #fff;

        svg {
          color: #fff;
        }
      }

      svg {
        margin: 0 0 4px;
        height: 26px;
        width: 26px;
        display: block;
        color: #999;
      }
    }
  }

  &__content {
    border: 1px solid #f7f7f7;
    position: relative;
    padding: 35px 0 20px;
  }

  object {
    position: relative;
    display: block;
    width: 100%;
    height: 100%;
    min-height: 600px;
  }

  .dev-columns {
    position: absolute;
    top: 0;
    display: flex;
    height: 100%;
    width: 100%;
    min-height: 200px;
    background: rgba(0, 0, 0, 0.5);

    div {
      background: rgba(255, 255, 255, 0.1);
      margin: 0 10px;
      padding: 10px 0 0;
      width: 100%;
      color: #ccc;
      text-align: center;
    }

    &.dev-mobile {
      div:nth-child(n + 5) {
        display: none;
      }
    }

    &.dev-tablet {
      div:nth-child(n + 9) {
        display: none;
      }
    }
  }

  // .dev-row {
  //   display: flex;
  //   flex-direction: row;
  //   flex-wrap: wrap;
  //   width: 100%;
  // }

  // .dev-block {
  //   display: flex;
  //   align-items: center;
  //   justify-content: center;
  //   flex: 1;
  //   position: relative;
  //   z-index: 2;
  //   background: rgba(0, 0, 0, 0.1);
  //   padding: 0 10px;
  //   margin-bottom: 10px;
  //   width: 100%;
  //   min-width: 375px;
  //   height: 50px;
  //   // border: 1px solid #fff;
  //   color: #fff;
  //   background: linear-gradient(
  //     135deg,
  //     rgba(0, 0, 0, 0.1) 0%,
  //     rgba(0, 0, 0, 0.25) 100%
  //   );

  //   &__content {
  //     display: flex;
  //     align-items: center;
  //     justify-content: center;
  //     height: calc(100% - 2px);
  //     width: 100%;
  //     background: #fff;
  //     color: #999;
  //   }

  //   &--tablet {
  //     max-width: 1024px;
  //   }

  //   &--mobile {
  //     max-width: 768px;
  //   }

  //   &--half {
  //     max-width: 50%;

  //     @include mobile {
  //       max-width: 100%;
  //     }
  //   }

  //   &--third {
  //     max-width: calc(100% / 3);

  //     @include mobile {
  //       max-width: 100%;
  //     }
  //   }

  //   &--quarter {
  //     max-width: 25%;

  //     @include mobile {
  //       max-width: 100%;
  //     }
  //   }
  // }
}
</style>
