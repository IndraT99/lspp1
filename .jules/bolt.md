## 2024-08-06 - Caching Models with Eager-Loaded Relationships
**Learning:** When implementing caching for models with eager-loaded relationships (like Asesor with scheme), applying cache invalidation (saved/deleted events) only on the primary model leads to stale nested data if the related model (Scheme) is updated.
**Action:** Always ensure cache invalidation model events are applied to both the primary model and the related model to maintain global cache consistency.
