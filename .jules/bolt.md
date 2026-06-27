## 2025-02-12 - Caching Eager-Loaded Relationships Safely
**Learning:** When caching Eloquent collections that include eager-loaded relationships (like `Asesor` with `scheme`), invalidating the cache only on the primary model is insufficient. If the related model (`Scheme`) is updated, the cached data becomes stale because the primary model's events aren't triggered.
**Action:** Always implement cache invalidation model events (`saved` and `deleted`) on both the primary model and any related models that are eagerly loaded into the cached dataset to ensure global consistency.
