## 2024-02-18 - Caching Models with Eager-Loaded Relationships
**Learning:** When implementing caching for frequently accessed data that eager-loads related models (e.g., `Asesor::with('scheme')`), you must invalidate the cache from both the primary model's (`Asesor`) and the related model's (`Scheme`) events to prevent stale nested data.
**Action:** Always map out related eager-loaded models when implementing model-level caching and ensure `saved` and `deleted` events are handled across all relevant models.
