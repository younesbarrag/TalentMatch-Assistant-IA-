## Context

TalentMatch is a Laravel-based application. The database schema for `offre_emplois` already exists, including fields like `user_id`, `titre`, `description`, `competences_requises` (JSON), and `niveau_experience_min`. This change focuses on providing the UI and logic for HR users to manage these records.

## Goals / Non-Goals

**Goals:**
- Provide a standard CRUD interface for job offers.
- Implement robust validation for all job offer fields.
- Ensure that users can only interact with job offers they created.
- Support a user-friendly way to input skills (comma-separated text) while storing them as structured data (JSON array).

**Non-Goals:**
- Implementation of the candidate side (viewing or applying to offers).
- Any AI-related processing of job offers or candidates.
- Real-time features or assistant chat integration.

## Decisions

### 1. Data Ownership and Security
- **Decision**: Use a Laravel Policy (`OffreEmploiPolicy`) to authorize actions (`view`, `update`, `delete`).
- **Rationale**: Policies are the idiomatic way in Laravel to handle authorization and keep controller logic clean. For the `index` method, we will scope the query to the authenticated user.

### 2. Validation and Form Requests
- **Decision**: Create `StoreOffreEmploiRequest` and `UpdateOffreEmploiRequest`.
- **Rationale**: Encapsulating validation logic in Form Requests keeps the controller thin and reusable.

### 3. Skill Handling (UI to Database)
- **Decision**: Use Eloquent attribute casting in the `OffreEmploi` model.
- **Rationale**: Casting `competences_requises` to `array` in the model allows us to work with native PHP arrays while Eloquent handles the JSON serialization/deserialization automatically.
- **Decision**: Perform string-to-array transformation in the controller (or request `passedValidation` hook).
- **Rationale**: Converting the comma-separated string from the view into an array before passing it to the model's `create` or `update` methods ensures data consistency.

### 4. Routing
- **Decision**: Group all job offer routes under the `auth` middleware.
- **Rationale**: Only authenticated HR users should be able to manage job offers.

## Risks / Trade-offs

- **[Risk]**: Accidental data exposure across users.
  - **Mitigation**: Use both query scoping (`OffreEmploi::where('user_id', auth()->id())`) and Policy-based authorization.
- **[Risk]**: Inconsistent skill formatting (extra spaces, etc.).
  - **Mitigation**: Use `explode` with `trim` and `array_filter` to clean up the skill array before saving.
