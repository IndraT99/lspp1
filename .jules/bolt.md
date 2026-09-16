## 2024-09-16 - Prevent Stale Nested Data in Cached Eloquent Relationships
**Learning:** When implementing caching for models with eager-loaded relationships (e.g., Asesor with scheme), you must ensure cache invalidation model events (`saved` and `deleted`) are applied to both the primary model AND the related model, otherwise nested data becomes stale.
**Action:** Always map out all `with()` relationship dependencies when caching an Eloquent query, and attach `Cache::forget` to the `booted` method of every model in that dependency tree to maintain global cache consistency.
