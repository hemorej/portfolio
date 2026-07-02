Portfolio
================

This is the code for my personal [website](https://jerome-arfouche.com). Open-sourced as a reference and code backup.

## Deployment status

[![Laravel Forge Site Deployment Status](https://img.shields.io/endpoint?url=https%3A%2F%2Fforge.laravel.com%2Fsite-badges%2F0c38d7b6-2675-4a1a-b138-a6d5c5ea4450%3Flabel%3D1&style=flat)](https://forge.laravel.com/servers/946705/sites/2807593)

## Development

Requires [pnpm](https://pnpm.io) (v11+).

```sh
pnpm install
pnpm build        # minifies index.html → static/index.html
```

The build step is handled by `scripts/prepare-deploy.js` using `html-minifier-terser`. It also creates symlinks from `static/` into the production volume (`/mnt/volume_tor1_01`) for large assets (`resume.pdf`, `ico/`, `fonts/`) that are stored outside the repo.

## Deployment

Deployment is managed by [Laravel Forge](https://forge.laravel.com). The deploy script (`scripts/forge_deploy.sh`) clones the repo and rsyncs the pre-built `static/` directory to the site root. The `static/` build must be committed before pushing to the production branch.
