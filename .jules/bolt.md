## 2024-08-02 - Caching with Eager-Loaded Relationships
**Learning:** When implementing caching for models with eager-loaded relationships (e.g., `Asesor` with `scheme`), caching the primary model alone is insufficient. If the related model (`Scheme`) updates, the cached primary model (`Asesor`) will contain stale nested data.
**Action:** Ensure cache invalidation model events (`saved` and `deleted`) are applied to both the primary model and the related eager-loaded model to prevent stale nested data and maintain global cache consistency.
