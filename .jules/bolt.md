## 2024-06-24 - Eager-Loaded Cache Invalidation
**Learning:** When implementing caching for models with eager-loaded relationships (e.g., Asesor with scheme), cache invalidation must be triggered not only by changes to the primary model (Asesor) but also by changes to the related model (Scheme) to prevent stale nested data in the cached results.
**Action:** Always verify nested relationships when caching eloquent query results and add Cache::forget in the CRUD controllers for all related models.
