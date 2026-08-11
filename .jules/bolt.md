## 2024-05-18 - Caching Eager-Loaded Relationships Requires Dual Invalidation
**Learning:** When caching models with eager-loaded relationships (like Asesor with scheme), applying cache invalidation only to the primary model leaves stale nested data if the related model (Scheme) is updated.
**Action:** Always implement cache invalidation (`saved` and `deleted` events) on BOTH the primary model and any related models included in the cached query to ensure global cache consistency.
