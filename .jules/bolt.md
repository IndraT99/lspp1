## 2024-10-15 - Caching Eager-Loaded Relationships
**Learning:** When caching a model that includes eager-loaded relationships (like `Asesor::with('scheme')`), we must ensure cache invalidation is triggered not only by changes to the primary model (`Asesor`) but also by changes to the related model (`Scheme`). Failing to do so results in stale nested data.
**Action:** Always add cache invalidation hooks (`saved` and `deleted` model events) to both the primary and related models when caching queries with eager-loaded relations.
