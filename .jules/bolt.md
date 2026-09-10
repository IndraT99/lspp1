## 2025-02-12 - Caching Eager-Loaded Relationships
**Learning:** When caching models with eager-loaded relationships (like Asesor with scheme), applying cache invalidation model events (`saved` and `deleted`) only on the primary model is insufficient. If the related model updates, the cached data becomes stale because the primary model's events aren't triggered.
**Action:** Always implement cache invalidation (`Cache::forget`) in the `booted` method of BOTH the primary model and any eagerly-loaded related models to ensure global cache consistency.
