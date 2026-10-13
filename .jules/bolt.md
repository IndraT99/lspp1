## 2024-05-24 - Cache Invalidation for Eager-Loaded Relationships
**Learning:** When caching queries that include eager-loaded relationships (like `Asesor::with('scheme')`), updating the related model (`Scheme`) won't automatically invalidate the cache. This can lead to stale nested data being displayed.
**Action:** Always implement cache invalidation model events (`saved` and `deleted` in the `booted` method) on BOTH the primary model and any related eager-loaded models to guarantee global cache consistency.
