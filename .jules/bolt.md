## 2024-08-13 - Caching Eager-Loaded Relationships
**Learning:** Caching models with eager-loaded relationships requires cache invalidation on both the primary and related models to prevent stale nested data.
**Action:** When implementing caching for relationships (like Asesor with Scheme), add model event listeners (saved/deleted) to both models to clear the cache.
