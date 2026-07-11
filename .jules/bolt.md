## 2024-07-11 - Caching Eager Loaded Relationships
**Learning:** When implementing caching for models with eager-loaded relationships (e.g., `Asesor` with `scheme`), ensure cache invalidation model events (`saved` and `deleted`) are applied to both the primary model and the related model to prevent stale nested data.
**Action:** Always check the `with()` relationships in the cached query and add cache invalidation hooks to those related models as well.
