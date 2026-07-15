## 2024-07-15 - Eager-Loaded Model Cache Invalidation
**Learning:** When caching primary models that eager-load related models (e.g., Asesor with scheme), the cache must be invalidated not only when the primary model changes, but also when the related model changes. Otherwise, the cache will contain stale nested data.
**Action:** Always check `with()` eager-loading clauses when caching Eloquent queries, and apply `Cache::forget` hooks to the `saved` and `deleted` model events of all related models included in the cache.
