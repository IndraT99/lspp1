## 2024-05-24 - Cached Eager Loaded Relationships Anti-Pattern
**Learning:** In this codebase, caching a model that has eager-loaded relationships (like `Asesor` with `scheme`) can lead to stale nested data if the related model (`Scheme`) is updated. The cache invalidation was only happening when the primary model was updated.
**Action:** Always add cache invalidation (`Cache::forget`) to the model events (`saved` and `deleted`) of BOTH the primary model and any related eager-loaded models to ensure global cache consistency.
