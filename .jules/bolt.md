## YYYY-MM-DD - [Title]
**Learning:** [Insight]
**Action:** [How to apply next time]
## 2024-08-20 - Cache Invalidation for Eager-Loaded Relationships
**Learning:** When caching models with eager-loaded relationships (e.g., Asesor with scheme), applying cache invalidation only to the primary model leaves stale nested data if the related model changes.
**Action:** Always ensure cache invalidation model events (saved and deleted) are applied to both the primary and related models to ensure global cache consistency.
