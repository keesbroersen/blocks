<template>
  <div class="dev-button">
    <button 
      :class="className" 
      href="#">{{ name }}</button>
    <div class="dev-class">{{ className }}</div>
    <div 
      v-if="copyConfirm" 
      class="dev-button__confirm"><strong>{{ copyData }}</strong> copied to your clipboard!</div>
  </div>
</template>

<script>
export default {
  name: "DevStyleButton",
  props: {
    className: { type: String, required: true },
    name: { type: String, required: true }
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
.dev-button {
  position: relative;
  display: flex;
  align-items: center;

  .dev-class {
    margin: 0 0 0 15px;
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
