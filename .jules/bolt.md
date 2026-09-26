## 2024-05-15 - Stale Nested Data in Cached Relationships
**Learning:** When implementing caching for models with eager-loaded relationships (like `Asesor` with `scheme`), invalidating the cache only on the primary model is insufficient. If a related `Scheme` is updated (e.g., name changed), the cached `Asesor` collection will continue serving the stale nested `Scheme` data.
**Action:** Always apply cache invalidation model events (`saved` and `deleted`) to both the primary model AND all related eager-loaded models to ensure global cache consistency and prevent stale nested data.
