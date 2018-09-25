<template>
  <div 
    :id="block_name" 
    class="dev-block">
    <div class="dev-block__header">
      <h2 
        class="title" 
        v-html="block_name"/>
      <button 
        :class="{'active': design}" 
        @click="showDesign()">
        <svg 
          aria-hidden="true" 
          data-prefix="fal" 
          data-icon="cube" 
          role="img" 
          xmlns="http://www.w3.org/2000/svg" 
          viewBox="0 0 512 512" 
          class="dev__icon"><path 
            fill="currentColor" 
            d="M239.1 6.3l-208 78c-18.7 7-31.1 25-31.1 45v225.1c0 18.2 10.3 34.8 26.5 42.9l208 104c13.5 6.8 29.4 6.8 42.9 0l208-104c16.3-8.1 26.5-24.8 26.5-42.9V129.3c0-20-12.4-37.9-31.1-44.9l-208-78C262 2.2 250 2.2 239.1 6.3zM256 34.2l224 84v.3l-224 97.1-224-97.1v-.3l224-84zM32 153.4l208 90.1v224.7l-208-104V153.4zm240 314.8V243.5l208-90.1v210.9L272 468.2z" 
            class=""/></svg>
      </button>
      <button 
        :class="{'active': info}" 
        @click="showInfo()">
        <svg 
          aria-hidden="true" 
          data-prefix="fal" 
          data-icon="info" 
          role="img" 
          xmlns="http://www.w3.org/2000/svg" 
          viewBox="0 0 256 512" 
          class="dev__icon"><path 
            fill="currentColor" 
            d="M208 368.667V208c0-15.495-7.38-29.299-18.811-38.081C210.442 152.296 224 125.701 224 96c0-52.935-43.065-96-96-96S32 43.065 32 96c0 24.564 9.274 47.004 24.504 64H56c-26.467 0-48 21.533-48 48v48c0 23.742 17.327 43.514 40 47.333v65.333C25.327 372.486 8 392.258 8 416v48c0 26.467 21.533 48 48 48h144c26.467 0 48-21.533 48-48v-48c0-23.742-17.327-43.514-40-47.333zM128 32c35.346 0 64 28.654 64 64s-28.654 64-64 64-64-28.654-64-64 28.654-64 64-64zm88 432c0 8.837-7.163 16-16 16H56c-8.837 0-16-7.163-16-16v-48c0-8.837 7.163-16 16-16h24V272H56c-8.837 0-16-7.163-16-16v-48c0-8.837 7.163-16 16-16h104c8.837 0 16 7.163 16 16v192h24c8.837 0 16 7.163 16 16v48z" 
            class=""/></svg>
      </button>
      <button 
        :class="{'active': code}" 
        @click="showCode()">
        <svg 
          aria-hidden="true" 
          data-prefix="fal" 
          data-icon="code" 
          role="img" 
          xmlns="http://www.w3.org/2000/svg" 
          viewBox="0 0 576 512" 
          class="dev__icon"><path 
            fill="currentColor" 
            d="M228.5 511.8l-25-7.1c-3.2-.9-5-4.2-4.1-7.4L340.1 4.4c.9-3.2 4.2-5 7.4-4.1l25 7.1c3.2.9 5 4.2 4.1 7.4L235.9 507.6c-.9 3.2-4.3 5.1-7.4 4.2zm-75.6-125.3l18.5-20.9c1.9-2.1 1.6-5.3-.5-7.1L49.9 256l121-102.5c2.1-1.8 2.4-5 .5-7.1l-18.5-20.9c-1.8-2.1-5-2.3-7.1-.4L1.7 252.3c-2.3 2-2.3 5.5 0 7.5L145.8 387c2.1 1.8 5.3 1.6 7.1-.5zm277.3.4l144.1-127.2c2.3-2 2.3-5.5 0-7.5L430.2 125.1c-2.1-1.8-5.2-1.6-7.1.4l-18.5 20.9c-1.9 2.1-1.6 5.3.5 7.1l121 102.5-121 102.5c-2.1 1.8-2.4 5-.5 7.1l18.5 20.9c1.8 2.1 5 2.3 7.1.4z" 
            class=""/></svg>
      </button>
    </div>
    <div class="dev-block__content">
      <DevBlockDesign 
        v-if="design" 
        :design="block.design"/>
      <DevBlockCode 
        v-if="code" 
        :code="block.code" 
        :block="block"/>
      <DevBlockInfo 
        v-if="info" 
        :page="block.page"
        :comments="block.comments"
      />
    </div>
  </div>
</template>

<script>
import DevBlockCode from "./DevBlockCode.vue";
import DevBlockInfo from "./DevBlockInfo.vue";
import DevBlockDesign from "./DevBlockDesign.vue";
export default {
  name: "DevBlock",
  components: {
    DevBlockCode,
    DevBlockInfo,
    DevBlockDesign
  },
  props: {
    block: { type: Object, required: false, default: () => "" },
    block_name: { type: String, required: false, default: "" }
  },
  data() {
    return {
      design: true,
      code: false,
      info: false
    };
  },
  computed: {},
  mounted() {},
  methods: {
    showDesign() {
      this.design = true;
      this.code = false;
      this.info = false;
    },
    showCode() {
      this.design = false;
      this.code = true;
      this.info = false;
    },
    showInfo() {
      this.design = false;
      this.code = false;
      this.info = true;
    }
  }
};
</script>

<style lang="scss">
.dev {
  .dev-block {
    margin: 0 0 48px;

    &__header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      height: 36px;

      .title {
        font-size: 16px;
        margin: 0;
        font-weight: 300;
      }

      button {
        margin: 0;
        height: 100%;
        width: 80px;
        background: #f2f2f2;
        border: 1px solid #e6e6e6;
        border-bottom: 0;
        outline: none !important;

        &.active {
          background: #fff;
        }

        &:nth-child(2) {
          margin-left: auto;
          border-radius: 3px 0 0 0;
          border-right: none;
        }

        &:last-child {
          border-left: none;
          border-radius: 0 3px 0 0;
        }
      }
    }

    p {
      display: flex;
      justify-content: space-between;

      span {
        font-weight: normal;
        color: #999;
      }
    }
  }

  &__icon {
    height: 18px;
  }
}
</style>
