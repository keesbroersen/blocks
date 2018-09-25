<template>
  <div 
    :class="{ fullscreen: fullScreen }" 
    class="dev-block__code">
    <div class="code__header">
      <span 
        v-if="fileNameVisible" 
        @click="fileNameVisible = false"
        v-html="block.filename"/>
      <span 
        v-else 
        @click="fileNameVisible = true"
        v-html="block.path"/>
      <span 
        v-if="!fullScreen" 
        @click="fullScreen = true">
        <svg 
          aria-hidden="true" 
          data-prefix="fal" 
          data-icon="expand-alt" 
          role="img" 
          xmlns="http://www.w3.org/2000/svg" 
          viewBox="0 0 448 512" 
          class="dev__icon"><path 
            fill="currentColor" 
            d="M198.829 275.515l5.656 5.656c4.686 4.686 4.686 12.284 0 16.971L54.627 448H116c6.627 0 12 5.373 12 12v8c0 6.627-5.373 12-12 12H12c-6.627 0-12-5.373-12-12V364c0-6.627 5.373-12 12-12h8c6.627 0 12 5.373 12 12v61.373l149.858-149.858c4.687-4.687 12.285-4.687 16.971 0zM436 32H332c-6.627 0-12 5.373-12 12v8c0 6.627 5.373 12 12 12h61.373L243.515 213.858c-4.686 4.686-4.686 12.284 0 16.971l5.656 5.656c4.686 4.686 12.284 4.686 16.971 0L416 86.627V148c0 6.627 5.373 12 12 12h8c6.627 0 12-5.373 12-12V44c0-6.627-5.373-12-12-12z" 
            class=""/></svg>
      </span>
      <span 
        v-else 
        @click="fullScreen = false">
        <svg 
          aria-hidden="true" 
          data-prefix="fal" 
          data-icon="compress-alt" 
          role="img" 
          xmlns="http://www.w3.org/2000/svg" 
          viewBox="0 0 448 512" 
          class="dev__icon"><path 
            fill="currentColor" 
            d="M9.171 476.485l-5.656-5.656c-4.686-4.686-4.686-12.284 0-16.971L169.373 288H108c-6.627 0-12-5.373-12-12v-8c0-6.627 5.373-12 12-12h100c8.837 0 16 7.163 16 16v100c0 6.627-5.373 12-12 12h-8c-6.627 0-12-5.373-12-12v-61.373L26.142 476.485c-4.687 4.687-12.285 4.687-16.971 0zM240 256h100c6.627 0 12-5.373 12-12v-8c0-6.627-5.373-12-12-12h-61.373L444.485 58.142c4.686-4.686 4.686-12.284 0-16.971l-5.656-5.656c-4.686-4.686-12.284-4.686-16.971 0L256 201.373V140c0-6.627-5.373-12-12-12h-8c-6.627 0-12 5.373-12 12v100c0 8.837 7.163 16 16 16z" 
            class=""/></svg>
      </span>
    </div>
    <div class="code__content">
      <code v-html="highlight()"/>
    </div>
  </div>
</template>

<script>
export default {
  name: "DevBlockCode",
  props: {
    block: { type: Object, required: false, default: () => "" },
    code: { type: String, required: false, default: () => "" }
  },
  data() {
    return {
      fileNameVisible: true,
      fullScreen: false
    };
  },
  computed: {},
  mounted() {
    //this.highlight();
  },
  methods: {
    highlight() {
      return this.code.replace(
        new RegExp("php", "g"),
        match => '<span class="h-php">' + match + "</span>"
      );
      // .replace(
      //   new RegExp("//**", "g"),
      //   match => '<span class="h-var">' + match + "</span>"
      // );
    }
  }
};
</script>

<style lang="scss">
.dev-block__code {
  border: 1px solid #e6e6e6;
  background: #fff;

  &.fullscreen {
    position: fixed;
    height: 100vh;
    width: 100vw;
    top: 0;
    left: 0;
  }

  .h {
    &-php {
      color: #9013fe;
    }

    &-var {
      color: #f5a623;
    }
  }

  .code {
    &__header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 18px;
      height: 36px;
      font-size: 14px;
      border-bottom: 1px solid #e6e6e6;
    }

    &__content {
      padding: 18px;

      code {
        font-size: 14px;
        font-weight: 300;
      }
    }
  }
}
</style>
