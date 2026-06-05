## 2024-06-05 - Caching Eager Loaded Relationships
**Learning:** When implementing caching for models with eager-loaded relationships (e.g., `Asesor` with `scheme`), ensure cache invalidation is triggered not only by changes to the primary model but also by changes to the related model to prevent stale nested data in the cached results.
**Action:** When caching `Asesor::with('scheme')->get()`, invalidation must happen in `AsesorController` (Admin) and `SchemeController` (Admin).
