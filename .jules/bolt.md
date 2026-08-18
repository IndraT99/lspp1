## 2026-08-18 - Caching Nested Relationships in Eloquent
**Learning:** When caching models with eager-loaded relationships (e.g., Asesor with Scheme), the cache must be invalidated not only when the primary model changes, but also when the related model changes. Otherwise, stale nested data will be served.
**Action:** Always implement Cache::forget in model events (`saved`, `deleted`) for BOTH the parent and eager-loaded models to maintain global cache consistency.
