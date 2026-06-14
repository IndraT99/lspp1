## 2024-06-14 - Cache Eager Loaded Relationships
**Learning:** Caching models with eager-loaded relationships (like `Asesor` with `scheme`) creates a hidden dependency. If the cached result includes the nested related model, any update to that related model (e.g., updating a `Scheme`'s name) will not reflect in the cached `Asesor` result unless explicitly invalidated.
**Action:** When caching queries that include `with('relation')`, add cache invalidation (`Cache::forget`) to the administrative controllers of both the primary model AND the related model.
