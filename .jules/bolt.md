## 2024-10-09 - Caching with Eager Loaded Relationships
**Learning:** When implementing caching for Eloquent models that use eager loading (like `Asesor::with('scheme')`), adding cache invalidation hooks (`saved`/`deleted`) to the primary model is insufficient. If the related model (`Scheme`) is updated, the cached primary model will retain stale nested data.
**Action:** Always add cache invalidation for a specific cache key in both the primary model and any eager-loaded related models to ensure data consistency across the application.
