import Vue from "vue";
import Example from "./components/Example.vue";
import Dev from "./components/Dev.vue";

const components = { Example, Dev };
Vue.config.productionTip = false;

document.addEventListener("DOMContentLoaded", () => {
  for (const [name, Component] of Object.entries(components)) {
    const Wrapped = Vue.extend(Component);

    for (const el of document.querySelectorAll(`[data-component="${name}"]`)) {
      const propsData = {};
      for (const attr of el.attributes) {
        if (attr.name === "data-component") {
          continue;
        }
        // Convert dash-naming to camelCased
        const parts = attr.name.split("-");
        let prop = "";
        for (const i in parts) {
          const part = parts[i];
          if (i === "0") {
            prop += part;
          } else {
            prop += part[0].toUpperCase() + part.substr(1);
          }
        }
        if (prop[0] === ":") {
          propsData[prop.substr(1)] = JSON.parse(attr.value);
        } else {
          propsData[prop] = attr.value;
        }
      }
      new Wrapped({ el, propsData }); // eslint-disable-line no-new
    }
  }
});
