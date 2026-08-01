## 2024-08-01 - Cache invalidation for eager-loaded relationships
**Learning:** When caching models with eager-loaded relationships (e.g., Asesor with scheme), the cache must be invalidated not only when the primary model changes, but also when the related model (Scheme) changes, to prevent stale nested data in the cache.
**Action:** Always add cache invalidation events (saved/deleted) to all related models that are eager-loaded in a cached query.
