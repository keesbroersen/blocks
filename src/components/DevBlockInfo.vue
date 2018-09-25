<template>
  <div class="dev-block__info">
    <div>
      <strong>Developer</strong>
      Kees

      <strong>Comments</strong>
      {{ comments }}
    </div>
    <div>
      <strong>ACF fields used</strong>
    </div>
    <div>
      <strong>Currently used on pages:</strong>
      <ul>
        <li 
          v-for="(this_page, key) in page" 
          :key="key">{{ this_page }}</li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  name: "DevBlockInfo",
  props: {
    page: { type: Array, required: false, default: () => [] },
    comments: { type: String, required: false, default: () => "" }
  },
  data() {
    return {
      visible: false
    };
  },
  computed: {},
  mounted() {},
  methods: {}
};
</script>

<style lang="scss" scoped>
.dev-block__info {
  display: flex;
  padding: 32px;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
  border-radius: 5px;
  border: none;
  background: #fff;

  > div {
    flex: 1;
    white-space: pre-line;
  }
}
</style>
