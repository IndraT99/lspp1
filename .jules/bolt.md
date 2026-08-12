## 2025-02-12 - Caching Eager-Loaded Relationships
**Learning:** When implementing caching for a model that eager-loads another model (e.g., Asesor caching Scheme), cache invalidation must be applied to BOTH models. Forgetting to invalidate the cache on the nested model (`Scheme`) results in stale nested data if the related model's properties change.
**Action:** Always map out and apply `saved` and `deleted` model events for cache invalidation across all models involved in an eager-loaded cached query.
