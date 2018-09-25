<template>
  <div class="dev-block__design">
    <div v-html="design"/>
  </div>
</template>

<script>
export default {
  name: "DevBlockDesign",
  props: {
    design: { type: String, required: false, default: () => "" }
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

<style lang="scss">
.dev-block__design {
  padding: 0;

  .component {
    border: 1px solid #e6e6e6;
  }
}
</style>
