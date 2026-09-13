## 2025-02-13 - Eager-Loaded Model Caching Pattern
**Learning:** When caching Eloquent models with eager-loaded relationships (like Asesor with scheme) in this architecture, cache invalidation must happen not just on the primary model, but also on the related models. Otherwise, updates to related models won't invalidate the cache, leading to stale nested data in the UI.
**Action:** Always implement `saved` and `deleted` cache invalidation events (using `Cache::forget`) on both the primary model and any related models that are eager-loaded in the cached query.
