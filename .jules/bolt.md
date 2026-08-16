## 2024-08-16 - Caching Eager-Loaded Relations
**Learning:** When caching models with eager-loaded relationships (e.g., Asesor with scheme) in Laravel, cache invalidation must happen on both the primary model and the related model, otherwise nested data becomes stale.
**Action:** Always add model events (saved/deleted) to both the parent and child models when caching a `->with()` query.
