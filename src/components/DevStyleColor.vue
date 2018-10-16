<template>
  <div class="dev-color">
    <div 
      :style="'background:'+ color+';'"
      :class="[{ light: light}, 'dev-color__colorblock']" 
      @click="copy(color)" >
      <p class="dev-color__name">{{ name }}</p>
      <p class="dev-color__color">{{ color }}</p>
    </div>
    <div 
      v-if="mixin"
      class="dev-color__mixin"
      @click="copy(mixin)">{{ mixin }}</div>
    <div 
      v-if="copyConfirm" 
      class="dev-color__confirm"><strong>{{ copyData }}</strong> copied to your clipboard!</div>
  </div>
</template>

<script>
export default {
  name: "DevStyleColor",
  props: {
    name: { type: String, required: true },
    color: { type: String, required: true },
    mixin: { type: String, required: false, default: false },
    light: { type: Boolean, required: false, default: false }
  },
  data() {
    return {
      copyData: null,
      copyConfirm: null
    };
  },
  computed: {},
  mounted() {},
  methods: {
    copy(copy) {
      this.copyData = copy;
      const textArea = document.createElement("textarea");
      textArea.value = copy;
      document.body.appendChild(textArea);
      textArea.select();
      document.execCommand("Copy");
      textArea.remove();

      this.copyConfirm = copy;

      const that = this;
      setTimeout(() => {
        that.copyConfirm = null;
        that.copyData = null;
      }, 1500);
    }
  }
};
</script>

<style lang="scss">
.dev-color {
  position: relative;
  overflow: hidden;
  color: #fff;
  cursor: pointer;

  &__colorblock {
    position: relative;
    border-radius: 5px 5px 0 0;

    &:before {
      content: "";
      padding-top: 140%;
      display: block;
    }

    &.light {
      border: 1px solid #eee;
      color: #000;
    }
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

  &__mixin {
    padding: 8px 10px;
    border-radius: 0 0 5px 5px;
    border: 1px solid #eee;
    border-top: none;
    color: #aaa;
    font-size: 12px;
  }

  &__confirm {
    position: absolute;
    top: 0;
    left: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 10px;
    height: 100%;
    width: 100%;
    background: #fff;
    color: #000;
    text-align: center;
    border: 1px solid #eee;
    border-radius: 5px;
    font-weight: 300;
  }
}
</style>
