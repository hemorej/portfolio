const fs = require("fs");
const path = require("path");

const SRC = path.join(__dirname, "..");
const DIST = path.join(__dirname, "../static");

function copyDir(src, dest) {
  fs.mkdirSync(dest, { recursive: true });
  for (const entry of fs.readdirSync(src, { withFileTypes: true }).filter(e => !e.name.startsWith("."))) {
    fs.copyFileSync(
      path.join(src, entry.name),
      path.join(dest, entry.name)
    );
  }
}

fs.rmSync(DIST, { recursive: true, force: true });
fs.mkdirSync(DIST);

fs.copyFileSync(path.join(SRC, "index.html"), path.join(DIST, "index.html"));
fs.copyFileSync(path.join(SRC, "resume.pdf"), path.join(DIST, "resume.pdf"));
copyDir(path.join(SRC, "ico"), path.join(DIST, "ico"));
copyDir(path.join(SRC, "fonts"), path.join(DIST, "fonts"));

console.log("static/ ready");
