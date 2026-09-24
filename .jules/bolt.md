## 2024-06-11 - [Adding N+1 Query Fix]
**Learning:** Found N+1 query in `AsesorController` when fetching active asesors, because `scheme` relationship was loaded for each record inside the view due to `with('scheme')` being called, but maybe we can just cache the results or use indexing to optimize database queries. Actually looking closely, there's N+1 in many controllers that fetch data without caching, and they hit the db on every request.
**Action:** Implement cache invalidation with Model Events.

## 2025-02-14 - [Eager-Loaded Relationship Cache Invalidation]
**Learning:** When caching models with eager-loaded relationships (like Asesor with scheme) in this codebase, updating the related model (Scheme) causes stale nested data if the cache is only invalidated on the primary model (Asesor) events.
**Action:** Always apply cache invalidation model events (saved and deleted) to both the primary model and the related model.
