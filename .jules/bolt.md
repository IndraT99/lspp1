## 2024-06-28 - Cache Invalidation for Eager-Loaded Relationships
**Learning:** When caching models that include eager-loaded relationships (like `Asesor` with `scheme`), cache invalidation model events (`saved` and `deleted`) must be applied to BOTH the primary model and the related model to prevent stale nested data.
**Action:** Always inspect the `.with()` clause in the query being cached and add `Cache::forget` hooks to all related models included in the payload.
