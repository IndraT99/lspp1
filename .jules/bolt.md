## 2024-05-23 - Eager-Loaded Model Cache Invalidation
**Learning:** When implementing caching for Eloquent models with eager-loaded relationships (e.g., Asesor with scheme), relying solely on the primary model's lifecycle events for cache invalidation is insufficient. Modifying the related model (Scheme) can result in stale nested data within the cached Asesor objects.
**Action:** Always apply cache invalidation logic (`Cache::forget`) to the `saved` and `deleted` events in the `booted` methods of both the primary model AND any related models included in the cached query.
