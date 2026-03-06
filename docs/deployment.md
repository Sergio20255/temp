# Deployment Guide

## Shared Hosting
- Use PHP 8.1+ and set `public` as web root if allowed.
- If `public` cannot be web root, copy front controller and protect private folders via `.htaccess`.

## VPS / Cloud (AWS, DigitalOcean)
- Nginx or Apache virtual host with `public/` document root.
- Redis service enabled for queue.
- Supervisor/systemd recommended to keep worker alive.

### Worker Example
`php /var/www/fileforge/scripts/worker.php`

### Cron Example
`0 * * * * php /var/www/fileforge/scripts/cleanup.php`
