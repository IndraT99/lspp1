## 2024-07-28 - Caching Eager-Loaded Relations
**Learning:** When implementing caching for Eloquent models with eager-loaded relationships (e.g., Asesor with scheme), relying solely on cache invalidation in the primary model's `booted` method is insufficient. If the related model (Scheme) changes, the primary model's cached representation will contain stale nested data.
**Action:** Always ensure cache invalidation model events (`saved` and `deleted`) are applied to both the primary model and any eager-loaded related models to prevent stale nested data globally.
