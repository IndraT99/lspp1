## 2025-02-12 - Caching Eager-Loaded Relationships
**Learning:** When caching queries that include eager-loaded relationships (like `Asesor` with `scheme`), invalidating the cache only on the primary model is insufficient. If a related `Scheme` is updated, the cached `Asesor` data will contain stale `Scheme` data because the primary model's `saved` event is not triggered.
**Action:** Always implement cache invalidation model events (`saved` and `deleted`) in both the primary model and the related model's `booted` method to ensure global cache consistency.
