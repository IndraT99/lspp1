## 2024-11-02 - Caching with Eager Loaded Relationships
**Learning:** When implementing caching for a model that eager loads its relationships (like Asesor with scheme), we need to invalidate the cache in the booted events of both the primary model and the related model. Otherwise, updates to the related model won't bust the cache, leading to stale nested data.
**Action:** Always implement cache busting via Eloquent events (saved, deleted) on all models involved in a cached eager-load query, rather than just the primary model.
