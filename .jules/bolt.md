## 2025-02-12 - Caching Eager-Loaded Relationships
**Learning:** When caching a model that eager-loads a relationship (like `Asesor` with `scheme`), the cache becomes stale not only when the primary model changes, but also when the related model changes.
**Action:** Always apply cache invalidation (`Cache::forget`) to the `booted` events (`saved` and `deleted`) of BOTH the primary model and the related models that are eager-loaded in the cached query.
