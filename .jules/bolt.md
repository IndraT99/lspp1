## 2025-06-08 - Caching Models with Eager-Loaded Relationships
**Learning:** When caching a model that includes eager-loaded relationships (like `Asesor::with('scheme')`), changes to the related model (`Scheme`) can result in stale nested data being served from the cache, even if the primary model (`Asesor`) hasn't changed.
**Action:** Always implement cache invalidation (e.g., `Cache::forget`) in the CRUD controllers of BOTH the primary model and the related model whenever caching eager-loaded query results.
