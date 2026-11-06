## 2024-11-06 - Cache Invalidation for Eager Loaded Relationships
**Learning:** When caching models with eager-loaded relationships (like Asesor with scheme), invalidating only the parent model's cache on save/delete leaves stale nested data if the related model (Scheme) updates.
**Action:** Always bind cache invalidation events (`saved`, `deleted`) to BOTH the primary model and any eager-loaded related models to ensure global cache consistency without manual intervention in controllers.
