## 2024-07-12 - Caching Eager-Loaded Relationships
**Learning:** Caching queries that include eager-loaded relationships (`with()`) can result in stale nested data if only the primary model invalidates the cache.
**Action:** Always add cache invalidation events (`saved`, `deleted`) to both the primary model and the related models to ensure global cache consistency.
