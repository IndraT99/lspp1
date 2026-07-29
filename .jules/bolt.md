## 2024-07-29 - Cache Invalidation for Eager-Loaded Relations
**Learning:** When caching queries that include eager-loaded relationships (like `Asesor::with('scheme')`), cache invalidation logic must be added to BOTH the primary model and the related model. If it's only added to the primary model, updates to the related model won't clear the cache, leading to stale nested data.
**Action:** Always verify relationship dependencies when implementing query caching and ensure `saved`/`deleted` events trigger cache clears on all involved models.
