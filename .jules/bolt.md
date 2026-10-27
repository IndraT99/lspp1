## 2026-10-27 - Cache Invalidation for Eager Loaded Relationships
**Learning:** When caching models with eager-loaded relationships (like `Asesor` with `Scheme`), cache invalidation model events must be applied to both the primary model and the related model. Otherwise, changes to the related model's data will not be reflected in the cached query, leading to stale nested data.
**Action:** Always map out all eagerly loaded relationships when implementing query caching and ensure cache invalidation hooks (`saved`, `deleted`) are placed on all models involved in the cached result set.
