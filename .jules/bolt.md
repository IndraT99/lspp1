## 2024-06-05 - Model Event Caching for Eager Relationships
**Learning:** When caching models with eager-loaded relationships (like Asesor with Scheme), the cache must be invalidated on both models' `saved` and `deleted` events to prevent stale nested data in the view.
**Action:** Always apply cache invalidation (`Cache::forget`) via model `booted` events on both the primary model and its related models to ensure global cache consistency across all administrative operations.
