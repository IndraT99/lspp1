## 2024-05-24 - Model Event Caching for Eager Relationships
**Learning:** When caching eager-loaded queries (e.g., `Asesor::with('scheme')`), adding cache invalidation (`Cache::forget`) to the parent model is insufficient. The cache must also be invalidated when the related model (e.g., `Scheme`) changes, or the nested data will become stale.
**Action:** Always add `saved` and `deleted` model events for cache invalidation to both the parent AND all eagerly loaded relation models when implementing global query caching.
