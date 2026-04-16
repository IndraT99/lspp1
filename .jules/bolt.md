## 2026-04-16 - Adding Index to certificate_number
**Learning:** Found a missing index on the `certificate_number` column in the `assessments` table, which is heavily queried during certificate verification. Adding an index improves performance from O(N) to O(log N).
**Action:** Always verify if heavily queried fields have indexes.
