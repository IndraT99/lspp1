## 2025-02-14 - Eager-Loaded Model Caching Pattern
**Learning:** When caching Eloquent queries with eager-loaded relationships (e.g., Asesor with scheme), cache invalidation must be applied to BOTH the primary model and the related model to prevent stale nested data.
**Action:** Always implement `saved` and `deleted` cache invalidation events on all models involved in a cached eager-loaded query.
