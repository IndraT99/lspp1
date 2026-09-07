## 2025-03-07 - Caching Eager Loaded Relationships
**Learning:** When implementing caching for models with eager-loaded relationships (e.g., `Asesor` with `scheme`), cache invalidation model events (`saved` and `deleted`) must be applied to both the primary model and the related model to prevent stale nested data.
**Action:** Always check the `with()` clauses when caching Eloquent queries and ensure cache invalidation is hooked into all related models involved in the cached result.
