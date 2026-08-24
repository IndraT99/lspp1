## 2024-05-18 - Caching Eager-Loaded Relationships
**Learning:** When implementing caching for models with eager-loaded relationships (e.g., `Asesor` with `scheme`), we must apply cache invalidation (`saved` and `deleted` model events) to both the primary model and the related model to prevent stale nested data.
**Action:** Always add cache invalidation logic for nested query caches inside the `booted` method of all relevant related models.
