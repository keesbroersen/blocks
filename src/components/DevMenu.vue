<template>
  <div class="dev__menu">
    <h2>Projectname</h2>
    <a 
      :class="{'active': pages.info}"
      href="#"
      @click="route('info')">Info</a>
    <a 
      :class="{'active': pages.styleguide}"
      href="#"
      @click="route('styleguide')">Styleguide</a>
    <a href="#">Atoms</a>
    <a 
      :class="{'active': pages.blocks}" 
      href="#" 
      @click="route('blocks')">Components</a>
    <a 
      :class="{'active': pages.pages}" 
      href="#" 
      @click="route('pages')">Pages</a>
  </div>
</template>

<script>
export default {
  name: "DevMenu",
  props: {
    pages: { type: Object, required: false }
    // block_name: { type: String, required: false }
  },
  data() {
    return {
      // design: false,
      // code: false,
      // info: true
    };
  },
  computed: {},
  mounted() {},
  methods: {
    route(where) {
      this.$emit("route", where);
    }
  }
};
</script>

<style lang="scss" scoped>
.dev__menu {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 20px;
  height: 60px;
  background: #fff;
  border-bottom: 1px solid #e6e6e6;

  a {
    display: flex;
    align-items: center;
    margin: 0 42px;
    height: 100%;

    color: #666;
    text-decoration: none;
    font-weight: 300;

    &:nth-child(2) {
      margin-left: auto;
    }

    &.active {
      box-shadow: inset 0 -3px 0 #666;
    }
  }
}
</style>
