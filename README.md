# Muledraws

Muledraws is a CodeIgniter 3 portfolio website for a graphic designer and illustrator.

## Overview

- Project: Muledraws
- Owner: Gunali Rezqi Mauludi
- Focus: branding, illustration, editorial design, packaging, and contemporary art.
- Technology: PHP, CodeIgniter 3, Bootstrap.

## Features

- Frontend pages: Work, About, Artwork gallery, Contact.
- Admin pages for managing carousel slides, works, clients, awards, and profile business settings.
- SEO-ready meta tags and social share metadata added to frontend pages.
- Seed data and combined schema + seed file included.

## Setup

1. Copy `application/config/database.php` or set your local DB credentials.
2. Import the database schema and seed data from:
   - `database/schema_seed_muledraws.sql` for schema + seed in a single file
3. Ensure the `assets/media/uploads/{logos,carousel,work}` folders contain the required images.
4. Run the app with your PHP web server or built-in server.

## Git Repository

This workspace should be connected to:

`git@github.com:gunalirezqimauludi/muledraws.git`

## Notes

- The workspace uses a single combined SQL file: `database/schema_seed_muledraws.sql`.
- Old separate `schema.sql` and `seed_muledraws.sql` files are no longer present.
- Unused asset folders under `assets/media/` have been removed to keep the project clean.
- Passwords in the seed use MD5 hashing, matching the existing login implementation.
- The SEO metadata includes descriptions, keywords, canonical URLs, Open Graph, and Twitter share tags.
