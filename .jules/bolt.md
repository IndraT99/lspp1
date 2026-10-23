
## 2025-02-12 - Caching Eager-Loaded Relationships
**Learning:** When implementing caching for a model that eager-loads related models (e.g. Asesor with Scheme), the cache must be invalidated when *either* the primary model or the related model is modified to prevent stale data.
**Action:** Use Eloquent's `booted` method with `saved` and `deleted` events on both the primary and related models to handle cache invalidation consistently instead of relying on controller-level invalidation.
