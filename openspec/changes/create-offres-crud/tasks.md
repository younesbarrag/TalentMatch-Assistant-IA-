## 1. Foundation and Security

- [ ] 1.1 Update `OffreEmploi` model with `$casts` for `competences_requises` to `array`.
- [ ] 1.2 Create `OffreEmploiPolicy` to handle authorization (view, update, delete).
- [ ] 1.3 Register `OffreEmploiPolicy` in `AuthServiceProvider` (if using an older Laravel version) or ensure it's auto-discovered.

## 2. Validation and Request Handling

- [ ] 2.1 Create `StoreOffreEmploiRequest` with validation rules for job offer fields.
- [ ] 2.2 Create `UpdateOffreEmploiRequest` with validation rules for job offer fields.
- [ ] 2.3 Implement skill transformation logic (comma-separated string to array) in the Form Requests or Controller.

## 3. Controller Implementation

- [ ] 3.1 Create `OffreEmploiController` with CRUD methods: `index`, `create`, `store`, `show`, `edit`, `update`, `destroy`.
- [ ] 3.2 Implement `index` method to only fetch job offers belonging to the authenticated user.
- [ ] 3.3 Implement `store` and `update` methods with data ownership enforcement.
- [ ] 3.4 Implement `show`, `edit`, and `destroy` methods with Policy-based authorization.

## 4. Routing and Navigation

- [ ] 4.1 Define resource routes for `OffreEmploi` in `routes/web.php` protected by `auth` middleware.
- [ ] 4.2 Add a link to "Mes Offres" in the main navigation bar.

## 5. Views Implementation

- [ ] 5.1 Create `resources/views/offres/index.blade.php` with a list of user's job offers.
- [ ] 5.2 Create `resources/views/offres/create.blade.php` with the job offer creation form.
- [ ] 5.3 Create `resources/views/offres/edit.blade.php` with the job offer edit form (reusing parts of create).
- [ ] 5.4 Create `resources/views/offres/show.blade.php` to display job offer details.

## 6. Verification

- [ ] 6.1 Manually verify that an HR user can create, view, edit, and delete their own offers.
- [ ] 6.2 Manually verify that a user cannot access job offers belonging to another user (via direct URL).
- [ ] 6.3 Verify that skills are correctly stored as JSON and displayed as comma-separated text in forms.
