## 2025-02-12 - Model Event Caching for Eager-Loaded Relationships
**Learning:** When implementing caching for models with eager-loaded relationships (e.g., `Asesor` with `scheme`), cache invalidation via model events must be applied to both the primary model and the related model. Otherwise, changes to the related model won't trigger cache invalidation, resulting in stale nested data.
**Action:** Always check `with()` eager-loaded relationships when caching queries and ensure related models also clear the corresponding cache keys on `saved` and `deleted` events.
