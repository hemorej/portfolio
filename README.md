Porftfolio
================

This is the code for my personal [website](http://jerome-arfouche.com) of the same name. I intended to open source it and have this repo as a code backup. 

Deployment status
================

[![Laravel Forge Site Deployment Status](https://img.shields.io/endpoint?url=https%3A%2F%2Fforge.laravel.com%2Fsite-badges%2F0c38d7b6-2675-4a1a-b138-a6d5c5ea4450%3Flabel%3D1&style=flat)](https://forge.laravel.com/servers/946705/sites/2807593)

To deploy, compile static build from panel and push `/dist` to production branch

### local setup and start  
`ddev config --php-version=8.3 --omit-containers=db`
`ddev xdebug`  
`ddev start`  
`ddev launch`  

### submodule update

`cd <submodule>`  
`git checkout tag`    
`cd ..`  
`git commit -m ''`  
`git submodule update --init --recursive`  


### license activation

1. Download license file  
2. Rename the file to .license (without extensions)  
3. Place it in the /site/config/ folder of your Kirby installation  