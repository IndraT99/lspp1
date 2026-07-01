## 2024-07-01 - Cache Invalidation for Eager Loaded Models
**Learning:** When caching models with eager-loaded relationships (e.g., `Asesor` with `scheme`), cache invalidation model events (`saved` and `deleted`) must be applied to BOTH the primary model and the related model to prevent stale nested data.
**Action:** Always verify related models when caching eager-loaded data and ensure cache invalidation is implemented on all relevant models.
