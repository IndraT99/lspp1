## 2024-05-27 - Frontend API Caching for Eager Loaded Relations
**Learning:** Found that public-facing pages load models like Asesor with eagerly loaded relationships (Scheme) without caching. Caching them requires invalidating the cache not just on the primary model (Asesor) but also on the related model (Scheme) to prevent stale nested data.
**Action:** Implement query caching for Asesor and apply cache invalidation via model events on both Asesor and Scheme models.
