## 2024-06-22 - Caching Models with Eager-Loaded Relationships
**Learning:** When implementing caching for models with eager-loaded relationships (e.g., `Asesor` with `scheme`), cache invalidation must be triggered not only by changes to the primary model (Asesor) but also by changes to the related model (Scheme) to prevent stale nested data in the cached results.
**Action:** Always verify related model CRUD operations and add appropriate cache invalidation logic (e.g., `Cache::forget`) there as well.
