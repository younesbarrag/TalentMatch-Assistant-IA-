## Why

TalentMatch needs a robust database foundation to support its core features: managing job offers, tracking candidates, and providing AI-powered insights. This change establishes the initial schema, models, and enums required for the application to function.

## What Changes

- **Database Migrations**: Creation of tables for `offres_emploi`, `candidats`, `analyses_candidats`, `conversations_assistants`, and `messages_assistants`.
- **Eloquent Models**: Definition of models for each table with proper relationships, casts, and mass assignment protections.
- **Enums**: Implementation of Laravel Enums for status tracking and role management (`StatutAnalyse`, `RecommandationAnalyse`, `RoleMessageAssistant`).
- **Relationships**: Linking users to their job offers and candidates, and associating analyses with both offers and candidates.

## Capabilities

### New Capabilities
- `database-schema`: Core data models, migrations, and enums for the TalentMatch platform.

### Modified Capabilities
- (None)

## Impact

- **Database**: 5 new tables added to the schema.
- **Models**: 5 new Eloquent models in `app/Models`.
- **Enums**: 3 new Enum classes in `app/Enums`.
- **Authentication**: `User` model will be updated with relationships to `OffreEmploi` and `Candidat`.
