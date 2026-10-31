## 2025-02-28 - Caching nested eager-loaded relationships
**Learning:** When implementing caching for models with eager-loaded relationships (e.g., Asesor with scheme), it's not enough to just invalidate the cache on the primary model's events.
**Action:** Always ensure cache invalidation model events (saved and deleted) are applied to both the primary model and the related model to prevent stale nested data from persisting in the cache.
