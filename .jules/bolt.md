## 2024-10-10 - Caching Eager-Loaded Relationships
**Learning:** When implementing caching for models with eager-loaded relationships (e.g., Asesor with scheme), cache invalidation must be handled on both the primary model AND the related model. Otherwise, changes to the related model (like a Scheme name change) will not bust the cache, leading to stale nested data.
**Action:** Always add model events (saved, deleted) for cache invalidation (`Cache::forget`) to all models involved in a cached eager-loaded query.
