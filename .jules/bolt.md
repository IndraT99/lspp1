## 2024-05-18 - Eager Loaded Model Cache Invalidation
**Learning:** When implementing caching for a model that eager loads a relation (like `Asesor` with `scheme`), you must invalidate the cache from the `saved` and `deleted` events of *both* models to prevent stale related data in the cache.
**Action:** Always check `with()` calls when caching, and add `Cache::forget` to the `booted` methods of all related models involved in the cached query.
