## 2024-06-06 - Caching Eager-Loaded Relationships
**Learning:** When caching models with eager-loaded relationships (like `Asesor` with `scheme`), the cache becomes stale if the related model updates, not just the primary model.
**Action:** Always invalidate the cache key in the administrative CRUD controllers for both the primary model AND the related model to prevent returning stale nested data.
