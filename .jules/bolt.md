## 2025-02-12 - Caching Eager-Loaded Relationships

**Learning:** When implementing caching for models with eager-loaded relationships (e.g., `Asesor` with `scheme`), it's crucial to invalidate the cache using Eloquent Model Events (`saved` and `deleted` in the model's `booted` method) on BOTH the primary model and the related model. Failing to do so on the related model can lead to stale nested data if the related entity is updated.

**Action:** Always apply cache invalidation to all models involved in a cached eager-loaded query to ensure global cache consistency.
