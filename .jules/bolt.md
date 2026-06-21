## 2024-06-21 - Cache Invalidation for Eager-Loaded Relationships
**Learning:** When caching models with eager-loaded relationships (like Asesor with scheme), cache invalidation must be triggered by changes to both the primary model AND the related model to prevent stale nested data.
**Action:** Always add Cache::forget in the CRUD controllers of all related models included in a cached eager-loaded query.
