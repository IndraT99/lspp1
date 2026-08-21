## 2026-08-21 - Caching Nested Relationships
**Learning:** When caching models with eager-loaded relationships (e.g., Asesor with Scheme), the cache must be invalidated when either the parent or the related model changes to prevent stale nested data.
**Action:** Always add cache invalidation events (saved, deleted) to both the primary model and the related model.
