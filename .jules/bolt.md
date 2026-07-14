## 2024-07-14 - Caching Eager-Loaded Relationships
**Learning:** Caching models with eager-loaded relationships (like `Asesor` with `scheme`) leads to stale nested data if only the primary model invalidates the cache.
**Action:** Always apply cache invalidation (`Cache::forget`) to both the primary model and the related model's `saved` and `deleted` events to ensure global cache consistency.
