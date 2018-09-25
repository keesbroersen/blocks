import "./main.scss";
import "./bootstrap-vue";

// Include css-only components
const scss = require.context("./components", false, /\.scss$/);
scss.keys().forEach(scss);
