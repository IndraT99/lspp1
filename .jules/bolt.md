## 2024-09-23 - Caching Eager Loaded Relationships
**Learning:** When caching models with eager-loaded relationships (like `Asesor` with `scheme`), it's crucial to invalidate the cache not only when the primary model updates, but also when the related model updates. Otherwise, the cached data will contain stale nested relationship objects.
**Action:** Always add cache invalidation events (`saved` and `deleted`) to both the primary model and all eager-loaded related models to ensure complete cache consistency.
