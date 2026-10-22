## 2025-02-12 - Eager-Loaded Model Caching Validation
**Learning:** When implementing caching for frequently accessed data with eager-loaded relationships (e.g. Asesor with scheme), the cache invalidation (forgetting the cache key) must be applied to both the primary model and the related model events (saved and deleted) to prevent stale nested data.
**Action:** Always inspect the query being cached for relationships and add `Cache::forget` to the `booted` method of all involved models.
