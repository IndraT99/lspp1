## 2025-02-15 - Eager Loaded Model Caching and Invalidation
**Learning:** When caching models with eager-loaded relationships (`with('scheme')`), cache invalidation must be applied not only to the primary model (`Asesor`) but also to the related model (`Scheme`). If only the primary model is invalidated, updates to the related model will not be reflected in the cached response.
**Action:** Always implement `saved` and `deleted` model events on both the primary and any eager-loaded related models when caching complex queries to prevent stale nested data.
