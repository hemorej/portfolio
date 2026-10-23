# infra — jerome-arfouche.ca

Production runs on the shared DigitalOcean droplet described in
`~/Code/util/infra/` (OS, nginx globals, backups, restore). This directory is
everything specific to this site. Facts as of 2026-10-23.

## Where it lives

| | |
|---|---|
| Domain | `jerome-arfouche.ca` only — `jerome-arfouche.com` no longer points at this server |
| Stack | Plain HTML/CSS/JS built locally into `static/` and committed; nginx serves it. PHP-FPM is only there to answer probes |
| Site root | `/home/forge/jerome-arfouche.ca/` — the contents of `static/` rsynced in; no `releases/`, no `current` |
| TLS | Let's Encrypt via Forge, renewed Fri 17:12 (`/root/.letsencrypt-renew/3679037`) |
| Runs as | `forge` |

No daemons, cron jobs or database.

## Files here

| File | Purpose | Applied how |
|---|---|---|
| `forge_deploy.sh` | The deploy script — identical to the one in Forge's *Deploy Script* box | Keep the two in step by hand (it isn't on the server, so `snapshot.sh` can't check it) |
| `nginx.conf` | The vhost (`/etc/nginx/sites-available/jerome-arfouche.ca`) | By hand; `./snapshot.sh` flags drift |
| `forge-conf/` | Forge-generated includes, read-only reference | Refreshed by `./snapshot.sh` |
| `env.example` | Names of the variables in the server-side `.env` | — |
| `manifest`, `snapshot.sh` | What to compare with the server, and the script | `./snapshot.sh` |

## Server layout

```
/home/forge/jerome-arfouche.ca/
  .env                     REPO_URL, VOLUME_NAME
  index.html, robots.txt, sitemap-llm.xml, ai/ …   from static/ (rsync)
  fonts      -> /mnt/data-volume/fonts
  ico        -> /mnt/data-volume/ico
  resume.pdf -> /mnt/data-volume/resume.pdf
```

The three symlinks come from `scripts/prepare-deploy.js` (they're in the committed `static/`), the large
assets live on the block volume so they aren't in git.

## Deploy

1. Push to `master` → `.github/workflows/deploy.yml` (environment `production`) calls the Forge
   deploy-trigger URL (secret `FORGE_DEPLOY_URL`).
2. Forge runs `forge_deploy.sh`: shallow-clones the branch into `/tmp/portfolio`, `rsync -a
   --remove-source-files static/* $FORGE_SITE_PATH`, removes the clone. Nothing is built on the server, and no
   reload is needed.

`infra/forge_deploy.sh` is the one Forge runs. `scripts/forge_deploy.sh` is an older copy that still carries
commented-out `assets/images` / `assets/font` symlink blocks; it isn't used and can be deleted.

## nginx

`nginx.conf` is self-contained: it sets its own TLS protocols/ciphers, security headers, gzip, long-lived caching
for fonts/images, the GEO/AI-crawler locations (`/.well-known/ai.txt`, `/ai/`, `/sitemap-llm.xml`) and its own
error log (`/var/log/nginx/jerome-arfouche.ca-error.log`; access log off). Shared pieces come from
`~/Code/util/infra/nginx/` (`snippets/bot-mitigation.conf`, the `portfolio_api` zone — commented out).
The PHP block points at `php8.5-fpm.sock` (it said 8.3 here before — that socket no longer exists).

`forge-conf/` holds `before/redirect.conf` (`www.` → apex, 301), `before/ssl_redirect.conf` (80 → 443) and
`server/letsencrypt_challenge.conf` (ACME alias to `/home/forge/.letsencrypt`).

## Leaving Forge — what needs a new owner

- **Deploy trigger** — replace the curl in `deploy.yml` with an SSH step (rsync `static/` into the site root).
  No sudo, no reload involved.
- **vhost includes** — inline the `before/` redirects, drop the `# FORGE …` include lines.
- **TLS** — Forge-managed `ssl_certificate` paths (`/etc/nginx/ssl/jerome-arfouche.ca/<cert-id>/`), rewritten on
  every renewal; keep `/.well-known/acme-challenge/` served from `/home/forge/.letsencrypt/`.
