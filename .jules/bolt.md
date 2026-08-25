## 2024-05-18 - Caching Eager-Loaded Relationships

**Learning:** When caching models that have eager-loaded relationships (like `Asesor` with `scheme`), we need to invalidate the cache not only when the primary model (`Asesor`) changes, but also when the related model (`Scheme`) changes to prevent stale nested data being displayed.
**Action:** Always add cache invalidation events (`saved`, `deleted`) to all models involved in a cached eager-loaded query to ensure global cache consistency.
