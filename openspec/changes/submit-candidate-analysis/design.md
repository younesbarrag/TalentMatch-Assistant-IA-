## Context

TalentMatch is a Laravel application where HR users manage job offers and candidates. This design focuses on the transition from "Offer Management" to "Candidate Evaluation" by implementing the submission workflow and initializing the analysis process.

## Goals / Non-Goals

**Goals:**
- Enable candidate submission linked to specific job offers.
- Automatically create a pending analysis record for every submission.
- Provide visibility of candidates and their analysis status on the offer detail page.
- Ensure strict data ownership (users only see their own candidates and analyses).

**Non-Goals:**
- Implementing the AI logic to perform the analysis.
- Background processing/Queues for analysis.
- Candidate self-submission (portal).

## Decisions

### 1. Data Model Usage
- **Decision**: Use the existing `Candidat` and `AnalyseCandidat` models.
- **Rationale**: The database schema already provides these tables. `Candidat` stores the profile and CV text, while `AnalyseCandidat` acts as a junction between `Candidat` and `OffreEmploi` and stores the evaluation results.

### 2. Controller Structure
- **Decision**: Create `CandidatController` for submission and `AnalyseCandidatController` for viewing results.
- **Rationale**: Keeps responsibilities separated. `CandidatController` handles the "action" of submission, while `AnalyseCandidatController` handles the "resource" of the analysis results.

### 3. Submission Workflow
- **Decision**: Add a "Submit Candidate" button on the `offres.show` page that redirects to a creation form (`candidats.create`) with the `offre_id` pre-filled.
- **Rationale**: Provides a seamless UX starting from the context of the job offer.

### 4. Automatic Analysis Creation
- **Decision**: Create the `AnalyseCandidat` record within the `CandidatController@store` method (or a service) immediately after creating the `Candidat`.
- **Rationale**: Ensures consistency. A candidate submission for an offer always implies a pending analysis.

### 5. Status Handling
- **Decision**: Use `StatutAnalyse::EnAttente` for the initial status.
- **Rationale**: Clearly indicates that the analysis is pending future processing (AI evaluation).

### 6. Security and Authorization
- **Decision**: Use Laravel Policies (`CandidatPolicy` and `AnalyseCandidatPolicy`).
- **Rationale**: Standard way to enforce that users can only interact with candidates and analyses related to their own job offers.

## Risks / Trade-offs

- **[Risk]**: Duplicate candidate profiles if the same person is submitted multiple times.
  - **Mitigation**: For this phase, we accept duplicates. Future versions may implement candidate deduplication based on email.
- **[Risk]**: Large CV text causing performance issues in views.
  - **Mitigation**: Only show a summary or link to the full CV in the analysis detail page.
