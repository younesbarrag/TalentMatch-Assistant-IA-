## Why

TalentMatch currently allows managing job offers but lacks the ability to submit candidates and track their analysis progress. This change introduces the candidate submission workflow and initializes the analysis record, setting the stage for future AI-assisted evaluation.

## What Changes

- **Candidate Submission**: Authenticated HR users can now submit candidates (name, optional email/phone, and CV text) directly for a specific job offer.
- **Analysis Initialization**: For every candidate submission, a corresponding `AnalyseCandidat` record is automatically created with an initial status of `en_attente` (pending).
- **Offer Detail Enhancement**: The job offer detail page will now list all submitted candidates for that offer, showing their basic info and current analysis status.
- **Analysis Detail Page**: A new page to view the detailed results of a candidate's analysis (initially showing basic info and pending status).
- **Ownership Protection**: Users can only submit candidates to and view analyses for job offers they own.

## Capabilities

### New Capabilities
- `candidate-submission`: Ability to submit a candidate's profile and CV for a specific job offer.
- `analysis-tracking`: Ability to track the status and view details of candidate analyses.

### Modified Capabilities
<!-- Existing capabilities whose REQUIREMENTS are changing (not just implementation).
     Only list here if spec-level behavior changes. Each needs a delta spec file.
     Use existing spec names from openspec/specs/. Leave empty if no requirement changes. -->

## Impact

- **Models**: `app/Models/Candidat.php` and `app/Models/AnalyseCandidat.php` will be actively used.
- **Controllers**: New `app/Http/Controllers/CandidatController.php` and potentially an updated `OffreEmploiController.php`.
- **Requests**: New `app/Http/Requests/StoreCandidatRequest.php`.
- **Routes**: New authenticated routes for candidate submission and analysis viewing.
- **Views**: 
    - Updated `resources/views/offres/show.blade.php`.
    - New `resources/views/candidats/create.blade.php`.
    - New `resources/views/analyses/show.blade.php`.
- **Enums**: Utilizes `app/Enums/StatutAnalyse.php`.
