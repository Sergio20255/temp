# FileForge - Multi-Format File Conversion SaaS Script

FileForge is a production-oriented PHP 8+ conversion platform that can run as:

- SaaS web application
- Self-hosted converter script
- White-label commercial product (CodeCanyon ready structure)

## Highlights

- Modern SaaS frontend with drag-and-drop upload, progress UI, mobile responsive layout, dark/light mode.
- Conversion categories: documents, images, video, audio, archives, and eBooks.
- Queue-first architecture (Redis + worker) for scalable conversion processing.
- Security controls: strict extension validation, upload size caps, malware scan integration hook, CSRF-ready architecture, safe shell escaping.
- Admin dashboard skeleton for users, conversions, plans, storage, analytics.
- One-click installer entrypoint with 4-step wizard.
- White-label settings table + branding hooks.
- SEO-friendly converter routes (`/pdf-to-docx`, `/png-to-webp`, etc.).
- Localization structure (`lang/en`, `lang/es`).

## Quick Start

1. `cp .env.example .env`
2. `composer install`
3. Import schema from `database/migrations/001_initial_schema.sql`
4. Seed plans with `database/seeders/plans.sql`
5. Serve public directory:
   - Apache/Nginx document root => `public/`
6. Start worker:
   - `php scripts/worker.php`
7. Configure cron cleanup:
   - `0 * * * * php /path/to/project/scripts/cleanup.php`

## Required Processing Binaries

- FFmpeg
- ImageMagick (`magick`)
- LibreOffice (headless)
- Pandoc

## CodeCanyon Packaging

See:
- `docs/installation.md`
- `docs/deployment.md`
- `docs/converters.md`
- `docs/troubleshooting.md`
- `docs/white-label.md`
