# Mindly

A Laravel-based mental wellbeing app with daily mood check-ins, mood journals, and self-check screening.

## Requirements
- PHP 8.2+
- Composer
- Node.js 18+ and npm
- MySQL or MariaDB

## Installation
1. Install PHP dependencies:
   ```
   composer install
   ```
2. Install JS dependencies:
   ```
   npm install
   ```
3. Copy env and set credentials:
   ```
   cp .env.example .env
   php artisan key:generate
   ```
   - Set `DB_*` to your database.
   - Optionally set `ADMIN_EMAIL` / `ADMIN_PASSWORD` for the seeded admin.
4. Run migrations and seeders:
   ```
   php artisan migrate --seed
   ```
5. Build frontend assets (dev):
   ```
   npm run dev
   ```
   or for production:
   ```
   npm run build
   ```
6. Serve the app:
   ```
   php artisan serve
   ```

## Default accounts
- Admin: `ADMIN_EMAIL` / `ADMIN_PASSWORD` from `.env` (defaults: `admin@example.com` / `password`)
- Demo user: `test@example.com` / `password`

## Key features
- Daily mood logging (one per day per user)
- Mood journals linked to daily mood
- Self-check with admin-managed questions and per-question answer storage
- Admin dashboard for mood distribution, users, and self-check questions

## Docs
- ERD: `docs/erd.mmd`
- Physical data model: `docs/pdm.mmd`
- Flowchart: `docs/flowchart.mmd`
