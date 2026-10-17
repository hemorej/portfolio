cd /tmp

rm -rf portfolio
git clone --depth 1 --branch=$FORGE_SITE_BRANCH --recurse-submodules=false $REPO_URL 
cd portfolio
rsync -a --remove-source-files static/* $FORGE_SITE_PATH

rm -rf /tmp/portfolio
