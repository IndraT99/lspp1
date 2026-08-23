## 2025-03-01 - Global Cache Invalidation for Eager-Loaded Relationships
**Learning:** When implementing caching for a model that relies on eager-loaded relationships (e.g., `Asesor` with `Scheme`), invalidating the cache only on the primary model's events leads to stale nested data if the related model changes.
**Action:** Always apply cache invalidation (`Cache::forget`) via Eloquent Model Events (`saved`, `deleted` in the `booted` method) to BOTH the primary model and the related model to guarantee global cache consistency.
