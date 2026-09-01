## 2024-05-15 - Eloquent Caching with Eager Loaded Relationships
**Learning:** When caching Eloquent models with eager-loaded relationships (e.g., `Asesor` with `scheme`), the cache becomes stale if the related model (e.g., `Scheme`) is updated. Relying solely on the primary model's lifecycle events for cache invalidation is insufficient.
**Action:** Apply cache invalidation (`Cache::forget`) in the `booted` method's `saved` and `deleted` events for BOTH the primary model and the related model to ensure global cache consistency and prevent stale nested data.
