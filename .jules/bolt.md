## 2025-02-19 - Caching Eager-Loaded Eloquent Relationships
**Learning:** When caching a model that includes eager-loaded relationships (e.g., `Asesor::with('scheme')`), cache invalidation model events (`saved` and `deleted`) must be applied to both the primary model AND the related model to prevent stale nested data.
**Action:** Always map out and apply cache invalidation to all models involved in an eager-loaded cache query, not just the primary model.
