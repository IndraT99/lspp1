## 2025-02-12 - Eager-loaded Relationship Caching
**Learning:** When caching models that eager-load relationships (like Asesor with scheme), invalidating the cache only on the primary model is insufficient, as updates to the nested model will not clear the cache and result in stale data.
**Action:** Always add cache invalidation events (saved/deleted) to both the primary model and any eager-loaded related models.
