## 2025-10-24 - [Cache Invalidation for Eager-Loaded Relationships]
**Learning:** When implementing caching for a primary model that eager-loads a related model (e.g., Asesor with Scheme), modifying the related model (Scheme) can result in stale nested data in the cache if cache invalidation is only applied to the primary model.
**Action:** Always apply cache invalidation (`Cache::forget`) to the model events (`saved`, `deleted`) of BOTH the primary model and the eager-loaded related model to ensure global cache consistency.
