## 2024-10-24 - Eager-Loaded Cache Invalidation
**Learning:** When caching Eloquent collections with eager-loaded relations (like `Asesor::with('scheme')`), the cache must be invalidated not just when the primary model updates, but ALSO when the related model (`Scheme`) updates, to prevent returning stale nested data.
**Action:** Always add cache invalidation events to all models involved in an eager-loaded cached query.
