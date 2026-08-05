## 2025-08-05 - Eager-Loaded Model Caching Invalidation

**Learning:** When implementing `Cache::rememberForever` on a model that eagerly loads its relationships (e.g., `Asesor::with('scheme')`), cache invalidation model events (`saved` and `deleted`) must be added not only to the primary model (`Asesor`) but also to the related model (`Scheme`) to prevent stale nested data.

**Action:** Always check the `with()` clauses when caching Eloquent queries. Ensure that every related model included in the query also has a model event hook to invalidate the shared cache key when modified.
