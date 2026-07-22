## 2024-07-22 - Nested Model Caching Cache Invalidation
**Learning:** When implementing caching for models with eager-loaded relationships (e.g., `Asesor` with `scheme`), cache invalidation model events (`saved` and `deleted`) must be applied to BOTH the primary model and the related model to prevent stale nested data.
**Action:** Always inspect eager-loaded relationships when caching queries and ensure related models also trigger cache invalidation for the primary cache key.
