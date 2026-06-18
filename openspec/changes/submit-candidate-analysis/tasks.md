## 1. Foundation and Security

- [ ] 1.1 Create `CandidatPolicy` to ensure users only manage candidates they created.
- [ ] 1.2 Create `AnalyseCandidatPolicy` to ensure users only view analyses for their own job offers.
- [ ] 1.3 Add relationships to `User` and `OffreEmploi` models if missing (e.g., `candidates` through `analyses`).

## 2. Candidate Submission

- [ ] 2.1 Create `StoreCandidatRequest` with validation rules for `nom`, `cv_texte`, and optional fields.
- [ ] 2.2 Create `CandidatController` with `create` and `store` methods.
- [ ] 2.3 In `CandidatController@store`, implement logic to create both `Candidat` and `AnalyseCandidat` (status: `en_attente`).
- [ ] 2.4 Create `resources/views/candidats/create.blade.php` for the submission form.
- [ ] 2.5 Add "Submit Candidate" link on the `offres.show` page.

## 3. Analysis Display

- [ ] 3.1 Update `OffreEmploiController@show` to load submitted candidates and their analysis status.
- [ ] 3.2 Update `resources/views/offres/show.blade.php` to display the table of submitted candidates.
- [ ] 3.3 Create `AnalyseCandidatController` with `show` method.
- [ ] 3.4 Create `resources/views/analyses/show.blade.php` to display analysis details (basic info for now).

## 4. Routing

- [ ] 4.1 Define routes for candidate submission (`candidats.create`, `candidats.store`) under `auth` middleware.
- [ ] 4.2 Define route for analysis detail (`analyses.show`) under `auth` middleware.

## 5. Verification

- [ ] 5.1 Manually verify candidate submission correctly creates records in both tables.
- [ ] 5.2 Verify that the list of candidates appears correctly on the offer detail page.
- [ ] 5.3 Verify that a user cannot submit a candidate to an offer they don't own.
- [ ] 5.4 Verify that a user cannot view an analysis for an offer they don't own.
