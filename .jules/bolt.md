## 2024-05-24 - Cached Asesor Data with Eloquent Events
**Learning:** Caching models with eager-loaded relationships (e.g., Asesor with scheme) requires cache invalidation events on both the primary and related models to prevent stale nested data when related records are updated.
**Action:** Always implement Eloquent model events (saved, deleted) for cache invalidation on both primary and related models when caching eager-loaded queries.
