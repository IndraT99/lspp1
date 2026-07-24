## 2024-07-24 - Caching eager-loaded relationships
**Learning:** When implementing caching for Eloquent models with eager-loaded relationships (e.g., Asesor with scheme), cache invalidation must be applied to both the primary model and the related model to prevent stale nested data.
**Action:** Always add cache invalidation events (saved/deleted) to the related models as well when caching a query that includes `with('relation')`.
