## 2023-10-25 - Cache invalidation for eager-loaded relationships
**Learning:** When caching queries that include eager-loaded relationships (like `Asesor::with('scheme')`), invalidating the cache only on the primary model (`Asesor`) leaves stale nested data if the related model (`Scheme`) is updated.
**Action:** Always add cache invalidation events (`saved`, `deleted`) to both the primary model and the related models when caching eager-loaded data.
