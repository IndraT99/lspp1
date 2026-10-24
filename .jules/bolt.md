## 2024-10-24 - Cache Invalidation Strategy
**Learning:** When implementing caching for frequently accessed data using Eloquent Model Events (`saved` and `deleted` in the model's `booted` method), it's critical to also invalidate caches for eager-loaded relations (e.g. invalidating `active_asesors` cache when a `Scheme` is modified, because Assessors load Schemes).
**Action:** Always map out model relationships and apply cache invalidation logic across all related models to maintain global cache consistency.
