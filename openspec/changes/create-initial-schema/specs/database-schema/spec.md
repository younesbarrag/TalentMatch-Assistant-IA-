## ADDED Requirements

### Requirement: Job Offer Storage
The system SHALL provide a mechanism to store job offer details, including title, description, and user ownership.

#### Scenario: Successful job offer persistence
- **WHEN** a user provides a title and description
- **THEN** the system SHALL store a record in the `offres_emploi` table linked to the user

### Requirement: Candidate Profile Storage
The system SHALL store candidate information including name, email, and CV file path.

#### Scenario: Successful candidate persistence
- **WHEN** a candidate is added with a name and email
- **THEN** the system SHALL store a record in the `candidats` table linked to the user

### Requirement: Candidate Analysis Linking
The system SHALL link candidates to job offers through an analysis record that stores status and recommendations.

#### Scenario: Linking candidate to job for analysis
- **WHEN** an analysis is created for a candidate and job offer
- **THEN** a record in `analyses_candidats` SHALL be created with `offre_emploi_id` and `candidat_id`

### Requirement: Structured Analysis Insights
The system SHALL store detailed AI-generated analysis results in a structured JSON format.

#### Scenario: Persisting JSON analysis results
- **WHEN** analysis results are generated
- **THEN** they SHALL be stored in a JSON column with Eloquent casting

### Requirement: Persistent Assistant Conversations
The system SHALL support persistent chat conversations linked to users, with optional links to job offers or specific analyses.

#### Scenario: Creating a contextual conversation
- **WHEN** a conversation is started for a specific job offer
- **THEN** a record in `conversations_assistants` SHALL be created with `user_id` and `offre_emploi_id`

### Requirement: Message History Storage
The system SHALL store individual messages in a conversation, tracking the role (user, assistant, system) and content.

#### Scenario: Storing message history
- **WHEN** a message is exchanged in a conversation
- **THEN** a record in `messages_assistants` SHALL be created with the message role and content

### Requirement: Typed Enums for Status and Roles
The system SHALL use PHP Enums for tracking analysis status, recommendations, and message roles.

#### Scenario: Validating enum usage
- **WHEN** a record is saved with a status or role
- **THEN** it MUST use one of the predefined Enum cases (`StatutAnalyse`, `RecommandationAnalyse`, `RoleMessageAssistant`)
