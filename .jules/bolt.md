## 2024-05-24 - Model Event Caching for Eager Relationships
**Learning:** When implementing caching for frequently accessed models with eager-loaded relationships (like `Asesor` with `scheme`), we must invalidate the cache from the related model events too, not just the primary model. Otherwise, changes to the related models won't reflect in the cached nested data.
**Action:** Always add cache invalidation (`saved` and `deleted` model events) to both the primary model and the eager-loaded related model when caching eager relationships.
