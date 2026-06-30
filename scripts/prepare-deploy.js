const fs = require("fs");
const path = require("path");
const { minify } = require("html-minifier-terser");

const SRC = path.join(__dirname, "..");
const DIST = path.join(__dirname, "../static");

async function main() {
  fs.rmSync(DIST, { recursive: true, force: true });
  fs.mkdirSync(DIST);

  const VOLUME = "/mnt/volume_tor1_01";

  const html = fs.readFileSync(path.join(SRC, "index.html"), "utf8");
  const minified = await minify(html, {
    collapseWhitespace: true,
    removeComments: true,
    minifyCSS: true,
    minifyJS: true,
  });
  fs.writeFileSync(path.join(DIST, "index.html"), minified);

  fs.symlinkSync(path.join(VOLUME, "resume.pdf"), path.join(DIST, "resume.pdf"));
  fs.symlinkSync(path.join(VOLUME, "ico"), path.join(DIST, "ico"));
  fs.symlinkSync(path.join(VOLUME, "fonts"), path.join(DIST, "fonts"));

  console.log("static/ ready");
}

main();
