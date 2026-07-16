## 2024-07-16 - Prevent Stale Nested Data in Cached Relationships
**Learning:** When caching models that eagerly load relationships (like `Asesor::with('scheme')`), adding cache invalidation hooks (`saved`/`deleted`) to only the primary model is insufficient. If the related model (`Scheme`) is updated, the cached data for the primary model will become stale because the primary model's hooks aren't triggered.
**Action:** Always implement cache invalidation events (`saved`, `deleted`) on *both* the primary model and the related model to ensure cache consistency when caching eager-loaded data.
