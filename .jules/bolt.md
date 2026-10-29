## 2023-10-29 - Cache invalidation for eager loaded relationships
**Learning:** When implementing caching for models with eager-loaded relationships (like Asesor with scheme), the cache invalidation must be applied to both the primary model and the related model to prevent stale nested data. Prefer Model Events to ensure global cache consistency rather than scattering invalidation logic across multiple CRUD controllers.
**Action:** Always implement model events for cache invalidation on both sides of the relationship when returning eager-loaded cached data.
