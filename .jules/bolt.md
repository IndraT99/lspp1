## 2024-08-03 - Cache Invalidation for Eager Loaded Relationships
**Learning:** When caching models with eager-loaded relationships (like Asesor with scheme), invalidating the cache only on the primary model leads to stale nested data if the related model changes.
**Action:** Always add cache invalidation events (saved/deleted) to both the primary model and the related model when caching eager-loaded data.
