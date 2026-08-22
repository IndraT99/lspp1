## 2024-03-05 - Eager-Loaded Relationships Cache Invalidation
**Learning:** When caching models with eager-loaded relationships (e.g., `Asesor::with('scheme')`), adding `Cache::forget` to only the primary model (`Asesor`) leaves nested data stale if the related model (`Scheme`) changes.
**Action:** Always apply cache invalidation events (`saved`, `deleted`) to BOTH the primary model and any related models included in the cached query to ensure full global consistency.
