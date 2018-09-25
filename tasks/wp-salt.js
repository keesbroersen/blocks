#!/usr/bin/env node
const https = require("https");
const fs = require("fs");
const path = require("path");

const filepath = path.join(__dirname, "../wp-salt.php");

if (fs.existsSync(filepath)) {
  process.stderr.write("wp-salt.php already exists\n");
  process.exit(0);
}

https
  .get("https://api.wordpress.org/secret-key/1.1/salt/", res => {
    if (res.statusCode !== 200) {
      throw new Error(
        `Failed to retrieve salt: ${res.statusCode} ${res.statusMessage}`
      );
    }
    let body = "";
    res.on("data", chunk => {
      body += chunk;
    });
    res.on("end", () => {
      fs.writeFileSync(filepath, "<?php\n" + body);
      process.stderr.write(`Written ${filepath}\n`);
    });
  })
  .on("error", e => {
    throw e;
  });
