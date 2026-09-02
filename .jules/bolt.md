## 2025-02-12 - Prevent Stale Nested Data in Cached Relationships
**Learning:** When caching Eloquent queries with eager-loaded relationships (e.g., `Asesor::with('scheme')`), caching events on the primary model alone are insufficient. Updates to the related model (Scheme) can result in stale nested data being served from the cache.
**Action:** Always implement cache invalidation hooks (`saved`, `deleted`) on BOTH the primary model and any eager-loaded related models to ensure global cache consistency for nested data structures.
