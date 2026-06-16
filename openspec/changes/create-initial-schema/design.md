## Context

The TalentMatch application requires a structured database to manage job offers, candidates, and AI-driven analysis results. This design focuses on establishing the core data models and their relationships using Laravel's Eloquent ORM and PHP Enums.

## Goals / Non-Goals

**Goals:**
- Define the schema for `offres_emploi`, `candidats`, `analyses_candidats`, `conversations_assistants`, and `messages_assistants`.
- Implement Laravel Enums for status and role management.
- Set up Eloquent models with proper relationships, casts, and mass assignment protections.

**Non-Goals:**
- Implementing CRUD controllers or views.
- Integrating AI services (OpenAI/Anthropic).
- Implementing background jobs or queues.

## Decisions

### 1. PHP Native Enums for Status and Roles
We will use PHP 8.1+ backed enums for `StatutAnalyse`, `RecommandationAnalyse`, and `RoleMessageAssistant`.
- **Rationale**: Provides type safety, prevents invalid states in the database, and integrates seamlessly with Laravel's validation and casting.
- **Alternatives**: Using string constants or separate database tables. Enums are more lightweight and idiomatic for fixed sets of states.

### 2. JSON Casting for Analysis Results
The `analyses_candidats` table will include a `resultats_analyse` JSON column.
- **Rationale**: AI outputs are often deeply nested or variable. JSON allows for flexible storage without complex relational mapping for every field the AI might generate.
- **Alternatives**: Creating a granular relational schema. This would be too rigid for evolving AI models.

### 3. Separation of Candidates and Users
Candidates are stored in their own table, but are owned by a User (recruiter).
- **Rationale**: Allows recruiters to manage their own private pool of candidates.
- **Alternatives**: Global candidate pool. This violates the privacy requirements for recruiters.

## Risks / Trade-offs

- **[Risk]** Large JSON blobs in `analyses_candidats` could impact performance.
- **[Mitigation]** Use database-level JSON searching sparingly; prioritize indexing scalar fields like `statut` and `recommandation`.
- **[Risk]** Schema evolution for JSON fields.
- **[Mitigation]** Implement versioning or strict schemas within the application logic (e.g., using DTOs or dedicated cast classes) if the AI output format changes significantly.
