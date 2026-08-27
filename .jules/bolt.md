## 2024-05-24 - Eager-Loaded Model Caching Invalidation
**Learning:** When implementing caching for models with eager-loaded relationships (e.g., `Asesor` with `scheme`), cache invalidation must be applied to both the primary model and the related model. Otherwise, changes in the related model (like renaming a Scheme) will result in stale nested data being served from the cache.
**Action:** Always add `saved` and `deleted` cache invalidation events (e.g., `Cache::forget`) to all related models when caching eager-loaded collections.
