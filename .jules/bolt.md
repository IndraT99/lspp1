## 2024-10-25 - Cache Invalidation for Eager-Loaded Relationships
**Learning:** When implementing caching for models with eager-loaded relationships (e.g., `Asesor` with `scheme`), cache invalidation model events must be applied to both the primary model and the related model to prevent stale nested data.
**Action:** Always verify if cached queries include eager-loaded relationships, and if so, ensure the `saved` and `deleted` model events on the related models also clear the cache.
