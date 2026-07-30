## 2024-07-30 - Caching Eager-Loaded Relationships
**Learning:** When caching Eloquent collections that include eager-loaded relationships (like `Asesor` with `Scheme`), invalidating only the primary model's cache is insufficient. Updates to the related model (e.g., `Scheme`) will result in stale nested data within the cached primary models.
**Action:** Always implement cache invalidation (e.g., `Cache::forget`) in the `booted` method's `saved` and `deleted` events for BOTH the primary model and any related models included in the eager load.
