## 2024-05-24 - Stale nested data in cached relationships
**Learning:** When caching models with eager-loaded relationships (like Asesor with scheme), modifying the related model (Scheme) won't automatically invalidate the parent's cache, leading to stale nested data.
**Action:** Always add cache invalidation events (`saved`, `deleted`) to BOTH the primary model and its related models when caching eager-loaded collections.
