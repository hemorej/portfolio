cd /tmp

rm -rf portfolio
git clone --depth 1 --branch=$FORGE_SITE_BRANCH --recurse-submodules=false $REPO_URL 
cd portfolio
rsync -a --remove-source-files static/* $FORGE_SITE_PATH

if [ ! -e $FORGE_SITE_PATH/assets/images ]; then
    cd $FORGE_SITE_PATH/assets && ln -s /mnt/$VOLUME_NAME/assets/images .
fi
if [ ! -e $FORGE_SITE_PATH/assets/font ]; then
    cd $FORGE_SITE_PATH/assets && ln -s /mnt/$VOLUME_NAME/assets/font .
fi
if [ ! -e $FORGE_SITE_PATH/media ]; then
    cd $FORGE_SITE_PATH && ln -s /mnt/$VOLUME_NAME/media .
fi