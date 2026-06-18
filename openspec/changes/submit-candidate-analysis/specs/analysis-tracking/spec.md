## ADDED Requirements

### Requirement: User can view candidate list for an offer
The system SHALL display a list of all candidates submitted for a specific job offer on that offer's detail page.

#### Scenario: Viewing submitted candidates
- **WHEN** an authenticated user views the detail page of an offer they own
- **THEN** the system displays a table of all candidates submitted for that offer, including their name and current analysis status

### Requirement: User can view detailed analysis of a candidate
The system SHALL provide a dedicated page to view the full details of a candidate's analysis.

#### Scenario: Accessing analysis details
- **WHEN** an authenticated user clicks on the analysis link for a candidate
- **THEN** the system displays the analysis detail page with candidate info, offer info, and analysis status

### Requirement: Analysis ownership protection
The system SHALL prevent users from viewing analysis details for job offers they do not own.

#### Scenario: Unauthorized analysis access
- **WHEN** a user attempts to access the analysis detail page for an offer owned by someone else
- **THEN** the system returns a 403 Forbidden error
