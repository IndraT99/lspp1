## 2024-05-23 - Caching Eager-Loaded Relationships Safely
**Learning:** When implementing caching for frequently accessed lists that include eager-loaded relationships (e.g., Asesor with Scheme), simply adding cache invalidation on the primary model is insufficient. Changes to the related model can result in stale nested data being served from the cache.
**Action:** Always implement cache invalidation model events (saved and deleted) on both the primary model and the eager-loaded related models to ensure global cache consistency.
