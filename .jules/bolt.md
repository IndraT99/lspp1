## 2023-10-24 - Caching Eager Loaded Relationships
**Learning:** When caching models that eager load relationships (e.g., `Asesor` with `Scheme`), updating the related model (Scheme) can result in stale nested data if the cache isn't invalidated from the related model's events too.
**Action:** Always add cache invalidation (`Cache::forget`) to the `booted` events (`saved`, `deleted`) of BOTH the primary model and the eager-loaded related model.
