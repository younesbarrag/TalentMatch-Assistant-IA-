## ADDED Requirements

### Requirement: User can submit a candidate for a job offer
The system SHALL allow an authenticated HR user to submit a candidate's information (name, optional email, optional phone, and CV text) for a job offer they own.

#### Scenario: Successful candidate submission
- **WHEN** an authenticated user submits the candidate form with valid data (nom, cv_texte) for an offer they own
- **THEN** the system creates a `Candidat` record linked to the user and an `AnalyseCandidat` record with status `en_attente` linked to the offer and candidate

### Requirement: Candidate submission validation
The system SHALL validate that the candidate's name and CV text are provided during submission.

#### Scenario: Validation failure on missing fields
- **WHEN** a user submits the candidate form without a name or CV text
- **THEN** the system returns a validation error and does not create any records
