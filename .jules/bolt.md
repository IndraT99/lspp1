## 2025-02-14 - Eager-Loaded Cache Invalidation
**Learning:** When caching a model with eager-loaded relationships (like `Asesor` with `scheme`), invalidating the cache only on the primary model's events is insufficient. If the related model (`Scheme`) is updated, the cached primary model will still hold stale nested data, leading to inconsistent UI states.
**Action:** Always apply cache invalidation model events (`saved` and `deleted`) to BOTH the primary model and any related models that are eager-loaded into the cached dataset.
