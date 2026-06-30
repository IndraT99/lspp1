## 2025-02-12 - Caching Eager Loaded Relationships
**Learning:** When implementing caching for models with eager-loaded relationships (e.g., `Asesor` with `scheme`), cache invalidation model events (`saved` and `deleted`) must be applied to both the primary model and the related model to prevent stale nested data.
**Action:** Always ensure related models in eager-loaded caches have cache invalidation logic applied to their events.
