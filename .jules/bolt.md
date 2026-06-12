## 2025-02-13 - Caching Eager-Loaded Relationships
**Learning:** When caching models with eager-loaded relationships (e.g., Asesor with scheme), the cache must be invalidated not only when the primary model changes, but also when the related model is updated or deleted, to prevent displaying stale nested data.
**Action:** Always add explicit cache invalidation (\Illuminate\Support\Facades\Cache::forget) to the administrative controllers of both the primary and related models.
