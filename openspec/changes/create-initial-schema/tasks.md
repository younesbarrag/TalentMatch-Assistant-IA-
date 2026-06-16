## 1. Enums Setup

- [ ] 1.1 Create `app/Enums/StatutAnalyse.php` with cases: `En attente`, `En cours`, `Terminé`, `Échec`.
- [ ] 1.2 Create `app/Enums/RecommandationAnalyse.php` with cases: `Favorable`, `Défavorable`, `Incertain`.
- [ ] 1.3 Create `app/Enums/RoleMessageAssistant.php` with cases: `user`, `assistant`, `system`.

## 2. Migrations

- [ ] 2.1 Create migration for `offres_emploi` table (title, description, user_id).
- [ ] 2.2 Create migration for `candidats` table (nom, email, cv_path, user_id).
- [ ] 2.3 Create migration for `analyses_candidats` table (offre_emploi_id, candidat_id, statut, recommandation, resultats_analyse json).
- [ ] 2.4 Create migration for `conversation_assistants` table (user_id, offre_emploi_id nullable, analyse_candidat_id nullable).
- [ ] 2.5 Create migration for `message_assistants` table (conversation_assistant_id, role, content).

## 3. Models

- [ ] 3.1 Create `app/Models/OffreEmploi.php` with `belongsTo(User)` and `hasMany(AnalyseCandidat)`.
- [ ] 3.2 Create `app/Models/Candidat.php` with `belongsTo(User)` and `hasMany(AnalyseCandidat)`.
- [ ] 3.3 Create `app/Models/AnalyseCandidat.php` with `belongsTo` relations, and casts for `statut`, `recommandation`, and `resultats_analyse` (json).
- [ ] 3.4 Create `app/Models/ConversationAssistant.php` with `belongsTo(User)`, `belongsTo(OffreEmploi)`, and `hasMany(MessageAssistant)`.
- [ ] 3.5 Create `app/Models/MessageAssistant.php` with `belongsTo(ConversationAssistant)` and cast for `role`.

## 4. User Model Update

- [ ] 4.1 Add `hasMany(OffreEmploi)` and `hasMany(Candidat)` relationships to `app/Models/User.php`.
