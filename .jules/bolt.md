## 2026-11-08 - Caching Eager-Loaded Relationships
**Learning:** When implementing Eloquent caching for frequently accessed data with eager-loaded relationships (like `Asesor` with `scheme`), it's critical to add cache invalidation events (`saved`, `deleted`) to BOTH the primary model and the related model to prevent stale nested data.
**Action:** Always inspect the `.with('relation')` clauses in cached queries and ensure the related models also trigger `Cache::forget` on modifications.
