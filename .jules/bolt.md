## 2025-02-18 - Eager-Loaded Model Cache Invalidation
**Learning:** When caching data that eager-loads relationships (like `Asesor` with `Scheme`), cache invalidation model events (`saved` and `deleted`) must be applied to BOTH the primary model and the related model to prevent stale nested data in the cache.
**Action:** Always check the `with()` clauses when caching Eloquent collections, and add global cache invalidation logic in the `booted` method of all related models, not just the primary one.
