## 2023-10-24 - Model Events for Caching Nested Relationships
**Learning:** When implementing caching for models with eager-loaded relationships (e.g., Asesor with scheme), relying only on cache invalidation for the primary model leaves stale nested data if the related model updates.
**Action:** Always apply cache invalidation (`Cache::forget`) via Eloquent Model Events (`saved` and `deleted` in the `booted` method) to BOTH the primary model and the eager-loaded related models.
