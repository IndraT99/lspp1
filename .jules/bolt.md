## 2025-02-14 - Eager-Loaded Model Cache Invalidation
**Learning:** When implementing caching for frequently accessed data that includes eager-loaded relationships (e.g., `Asesor` with `scheme`), cache invalidation model events (`saved` and `deleted`) must be applied to both the primary model and the related model to prevent stale nested data.
**Action:** Always check the `with()` relationships in cached queries and apply `Cache::forget` to the `booted` method of all involved Eloquent models.
