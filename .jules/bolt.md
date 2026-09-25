## 2023-10-25 - Eager-loaded Relationship Caching
**Learning:** When implementing caching for models with eager-loaded relationships (e.g., `Asesor` with `scheme`), cache invalidation must be applied to both the primary model and the related model's events, otherwise the cached nested data becomes stale.
**Action:** Always verify related models and add `Cache::forget` to their `saved` and `deleted` events to ensure global cache consistency.
