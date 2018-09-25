<template>
  <div class="example">
    {{ label }}: {{ count }}
    <button @click="add">Add</button>
  </div>
</template>

<script>
export default {
  props: {
    label: { type: String, required: true }
  },
  data: () => ({
    count: 0
  }),
  methods: {
    add() {
      this.count++;
    }
  }
};
</script>

<style lang="scss">
.example {
  background: #ddd;
  padding: 25px;
  display: inline-block;
}
</style>
