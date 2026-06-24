const fs = require("fs");
const path = require("path");

const SRC = path.join(__dirname, "..");
const DIST = path.join(__dirname, "../static");


fs.rmSync(DIST, { recursive: true, force: true });
fs.mkdirSync(DIST);

const VOLUME = "/mnt/volume_tor1_01";

fs.copyFileSync(path.join(SRC, "index.html"), path.join(DIST, "index.html"));
fs.symlinkSync(path.join(VOLUME, "resume.pdf"), path.join(DIST, "resume.pdf"));
fs.symlinkSync(path.join(VOLUME, "ico"), path.join(DIST, "ico"));
fs.symlinkSync(path.join(VOLUME, "fonts"), path.join(DIST, "fonts"));

console.log("static/ ready");
