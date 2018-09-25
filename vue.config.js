/* eslint-env node */
/* eslint-disable import/no-commonjs, no-console */
/* globals process */
const LiveReloadPlugin = require("webpack-livereload-plugin");
const gaze = require("gaze");

module.exports = {
  configureWebpack(config) {
    if (process.argv.indexOf("--watch") !== -1) {
      const start = LiveReloadPlugin.prototype.start;
      LiveReloadPlugin.prototype.start = function(...args) {
        const retval = start.apply(this, args);
        gaze(
          __dirname + "/wp-content/themes/noprotocol/**/*.php",
          (err, watcher) => {
            if (err) {
              console.error(err);
              return;
            }
            watcher.on("changed", filepath => {
              console.log(filepath + " changed");
              this.server.notifyClients([filepath]);
            });
          }
        );
        return retval;
      };

      config.plugins.push(new LiveReloadPlugin());
    }
  }
};
