## Why

TalentMatch needs a way for HR users to manage job offers. This change implements the basic CRUD functionality for job offers, which is the essential first step before implementing candidate submissions and AI-assisted analysis.

## What Changes

- Implementation of a complete CRUD for job offers (`OffreEmploi`).
- New controller `OffreEmploiController` to handle web requests.
- Form request classes `StoreOffreEmploiRequest` and `UpdateOffreEmploiRequest` for robust validation.
- Authenticated routes in `routes/web.php` to protect job offer management.
- Blade views for indexing, creating, showing, and editing job offers, styled to match the existing application.
- Logic to ensure HR users can only manage their own job offers.
- Support for comma-separated skill input, stored as a JSON array in the database.

## Capabilities

### New Capabilities
- `job-offers-management`: Core CRUD operations for job offers, including ownership protection and skill array handling.

### Modified Capabilities
<!-- Existing capabilities whose REQUIREMENTS are changing (not just implementation).
     Only list here if spec-level behavior changes. Each needs a delta spec file.
     Use existing spec names from openspec/specs/. Leave empty if no requirement changes. -->

## Impact

- **Models**: `app/Models/OffreEmploi.php` (will likely need `$casts` for `competences_requises`).
- **Controllers**: New `app/Http/Controllers/OffreEmploiController.php`.
- **Requests**: New `app/Http/Requests/StoreOffreEmploiRequest.php` and `app/Http/Requests/UpdateOffreEmploiRequest.php`.
- **Routes**: `routes/web.php` will be updated with job offer routes.
- **Views**: New directory `resources/views/offres/` containing the CRUD templates.
- **Auth**: Leverages existing Laravel Breeze/Jetstream authentication.
