const fs = require("fs");
const path = require("path");
const { minify } = require("html-minifier-terser");

const SRC = path.join(__dirname, "..");
const DIST = path.join(__dirname, "../static");

/** Persistent volume mount on the production server where large assets live. */
const VOLUME = "/mnt/volume_tor1_01";

/**
 * Builds the static output directory for deployment.
 *
 * Steps:
 *  1. Wipes and recreates `static/`.
 *  2. Minifies `index.html` (CSS and JS inline) and writes it to `static/`.
 *  3. Creates symlinks into the production volume for `resume.pdf`, `ico/`, and `fonts/`
 *     so those assets are served without being stored in the repo or the build artifact.
 *
 * @returns {Promise<void>}
 */
async function main() {
  fs.rmSync(DIST, { recursive: true, force: true });
  fs.mkdirSync(DIST);

  const html = fs.readFileSync(path.join(SRC, "index.html"), "utf8");
  const minified = await minify(html, {
    collapseWhitespace: true,
    removeComments: true,
    minifyCSS: true,
    minifyJS: true,
  });
  fs.writeFileSync(path.join(DIST, "index.html"), minified);

  // Symlink large assets from the persistent volume rather than copying them.
  fs.symlinkSync(path.join(VOLUME, "resume.pdf"), path.join(DIST, "resume.pdf"));
  fs.symlinkSync(path.join(VOLUME, "ico"), path.join(DIST, "ico"));
  fs.symlinkSync(path.join(VOLUME, "fonts"), path.join(DIST, "fonts"));

  console.log("static/ ready");
}

main();
