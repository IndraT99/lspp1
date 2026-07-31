## 2024-07-31 - Caching Eager-Loaded Relationships
**Learning:** When implementing caching for models with eager-loaded relationships (e.g., `Asesor` with `scheme`), ensuring cache invalidation model events (`saved` and `deleted`) are applied to both the primary model and the related model is critical to prevent stale nested data.
**Action:** Always verify related models and add global cache invalidation to them if their data is included in a cached eager-load query.
