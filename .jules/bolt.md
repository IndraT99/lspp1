## 2024-08-26 - Eager-Loaded Model Caching Requires Multi-Model Invalidation
**Learning:** When caching models with eager-loaded relationships (like `Asesor` with `scheme`), setting up cache invalidation events (`saved`, `deleted`) on just the primary model is insufficient. If the related model (`Scheme`) is updated, the cached data for the primary model will contain stale nested data.
**Action:** Always implement cache invalidation model events on *both* the primary model and any eager-loaded related models to ensure global cache consistency.
