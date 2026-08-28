## 2024-05-24 - Cache Invalidation for Eager-Loaded Relationships
**Learning:** When caching models with eager-loaded relationships (e.g., `Asesor` with `scheme`), cache invalidation must be applied to both the primary model and the related model using Eloquent Model Events (`saved` and `deleted`). Otherwise, updates to the nested related model will not be reflected in the cached result, leading to stale nested data.
**Action:** Implement cache invalidation (`Cache::forget`) in the `booted` method for both the primary and related models whenever caching queries involving `with()`.
