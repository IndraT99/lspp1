
## 2025-02-12 - Caching Eager-Loaded Relationships
**Learning:** When implementing caching for models with eager-loaded relationships, invalidation must be triggered by changes to both the primary model and the related model. If only the primary model triggers invalidation, updates to the related model will result in stale nested data.
**Action:** Always trace eager-loaded relationships in cached queries and add Cache::forget to the administrative CRUD controllers of all involved models.
