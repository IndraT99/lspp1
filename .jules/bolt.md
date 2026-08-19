## 2024-08-19 - Caching Nested Relationships in Laravel
**Learning:** When implementing caching for a model that eager-loads a relationship (e.g., `Asesor` with `scheme`), cache invalidation using Eloquent Model Events must be applied to BOTH the primary model and the related model. Otherwise, updates to the related model won't trigger invalidation, leading to stale nested data in the cached payload.
**Action:** Always check the `with()` clauses in cached queries. Add `saved` and `deleted` event listeners to all models included in the eager load to ensure global cache consistency.
