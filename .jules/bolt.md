## 2025-06-11 - Caching Eager-Loaded Relationships
**Learning:** When caching models with eager-loaded relationships (e.g., `Asesor` with `scheme`), cache invalidation must be triggered not only by changes to the primary model but also by changes to the related model to prevent stale nested data in the cached results.
**Action:** Always add cache invalidation logic in the administrative controllers of both the primary model and all eager-loaded related models.
