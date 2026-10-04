## 2026-10-04 - Stale Nested Data in Cached Eager Loads
**Learning:** When caching queries that include eager-loaded relationships (e.g., `Asesor::with('scheme')`), caching only invalidates when the primary model (`Asesor`) updates. Modifying the related model (`Scheme`) leaves stale nested data in the cache.
**Action:** Apply cache invalidation model events (`saved` and `deleted`) to both the primary model and any eager-loaded related models used in the cached query.
