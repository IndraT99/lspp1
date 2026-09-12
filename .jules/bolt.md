## 2024-09-12 - Caching Eager Loaded Relationships
**Learning:** When a model like `Asesor` eagerly loads a relationship like `scheme`, fetching all of them repeatedly can become a bottleneck. Caching the entire result set is a common pattern to avoid N+1 and general query overhead for frequently accessed read-only or read-mostly data.
**Action:** Implement caching for the `Asesor` index route, but ensure the cache is invalidated when any `Asesor` or `Scheme` is updated to prevent stale data.
