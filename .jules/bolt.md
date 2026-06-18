## 2024-06-18 - Caching Models with Eager Loaded Relationships
**Learning:** When caching a query that eager-loads a relationship (e.g., `Asesor::with('scheme')`), cache invalidation must be triggered not only when the primary model (`Asesor`) changes, but also when the related model (`Scheme`) changes. Otherwise, the cached data will contain stale related model data.
**Action:** Always inspect `.with()` clauses when caching Eloquent queries and ensure cache invalidation logic (`Cache::forget()`) is added to the administrative controllers of all related models as well.
