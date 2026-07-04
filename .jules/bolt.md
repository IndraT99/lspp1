## 2024-05-23 - Caching Eager-Loaded Relationships
**Learning:** When implementing caching for models with eager-loaded relationships (e.g., `Asesor` with `scheme`), cache invalidation model events (`saved` and `deleted`) must be applied to BOTH the primary model and the related model to prevent stale nested data from being served from the cache.
**Action:** Always inspect the `.with(...)` relationships on any database query being cached, and add corresponding `Cache::forget` hooks to all involved models.
