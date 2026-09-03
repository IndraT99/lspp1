## 2024-05-24 - Caching Eager-Loaded Relationships
**Learning:** When implementing caching for a model that eager-loads a relationship (like `Asesor::with('scheme')`), it is critical to invalidate the cache not only on the primary model (`Asesor`) but also on the related model (`Scheme`) to prevent stale nested data.
**Action:** Always map out all loaded relationships when caching database queries and apply cache invalidation events (`saved`, `deleted`) to all involved models.
