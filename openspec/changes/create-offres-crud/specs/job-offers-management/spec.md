## ADDED Requirements

### Requirement: HR user can list their own job offers
The system SHALL provide a list view where an authenticated HR user can see all job offers they have created. This list MUST NOT include job offers created by other users.

#### Scenario: Listing own job offers
- **WHEN** an authenticated HR user accesses the job offers index page
- **THEN** the system displays only the job offers belonging to that user

### Requirement: HR user can create a job offer
The system SHALL allow an authenticated HR user to create a new job offer by providing a title, description, required skills, and minimum experience level.

#### Scenario: Successful job offer creation
- **WHEN** an HR user submits the job offer creation form with valid data (titre, description, competences_requises, niveau_experience_min)
- **THEN** the system converts the comma-separated skills into a JSON array, saves the offer associated with the current user, and redirects to the index with a success message

### Requirement: HR user can view details of their own job offer
The system SHALL allow an authenticated HR user to view the full details of a job offer they own.

#### Scenario: Viewing own job offer details
- **WHEN** an HR user accesses the show page of one of their job offers
- **THEN** the system displays all the fields of the job offer

### Requirement: HR user can edit their own job offer
The system SHALL allow an authenticated HR user to update the details of a job offer they own.

#### Scenario: Successful job offer update
- **WHEN** an HR user submits the edit form for their own job offer with updated valid data
- **THEN** the system updates the record, converting the comma-separated skills to a JSON array, and redirects to the index with a success message

### Requirement: HR user can delete their own job offer
The system SHALL allow an authenticated HR user to delete a job offer they own.

#### Scenario: Deleting own job offer
- **WHEN** an HR user triggers the delete action for their own job offer
- **THEN** the system removes the job offer from the database and redirects to the index

### Requirement: Access control for job offers
The system SHALL strictly prevent any user from viewing, editing, or deleting job offers that they do not own.

#### Scenario: Unauthorized access attempt
- **WHEN** an authenticated user attempts to access (view, edit, or delete) a job offer belonging to another user
- **THEN** the system returns a 403 Forbidden error or redirects with an unauthorized message
