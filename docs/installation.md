# Installation Guide

## Server Requirements
- PHP 8.1+
- PDO + fileinfo extensions
- MySQL 8+ (or compatible)
- Redis
- FFmpeg, ImageMagick, LibreOffice headless, Pandoc

## One-Click Installer Flow
1. **Requirement check** (`/install.php?step=1`)
2. **Database setup** (`/install.php?step=2`)
3. **Admin account** (`/install.php?step=3`)
4. **System setup** (`/install.php?step=4`)

## Manual Installation
1. Upload files.
2. Run `composer install --no-dev`.
3. Configure `.env` from `.env.example`.
4. Import SQL schema and seed plans.
5. Point web root to `public`.
6. Ensure writable storage:
   - `storage/app/uploads`
   - `storage/app/converted`
   - `storage/app/tmp`
   - `storage/app/logs`
