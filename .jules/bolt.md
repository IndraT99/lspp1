## 2024-02-14 - Cache Invalidation for Eager-Loaded Relationships
**Learning:** When implementing caching for models with eager-loaded relationships (e.g., Asesor with scheme), applying cache invalidation model events (saved and deleted) to just the primary model is insufficient. If the related model changes, the cached nested data becomes stale.
**Action:** Always ensure cache invalidation events (like `Cache::forget`) are registered in the `booted` methods of BOTH the primary model and the related model to maintain global cache consistency.
