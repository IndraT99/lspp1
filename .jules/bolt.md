## 2024-05-18 - Caching Eager-Loaded Relationships
**Learning:** In this Laravel architecture, caching a model that eager-loads relationships (like Asesor with scheme) creates a potential stale data bug if the related model updates. If only the primary model invalidates the cache, updates to the related model won't reflect in the UI.
**Action:** Always add cache invalidation events (saved, deleted) to BOTH the primary model and any eager-loaded related models (e.g., Scheme) when implementing cache for eager-loaded queries.
