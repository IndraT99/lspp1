## 2024-05-18 - Caching Models with Eager Loaded Relationships
**Learning:** When caching models that eager-load relationships (e.g. Asesor with Scheme), adding cache invalidation hooks (`saved`/`deleted`) to the primary model is insufficient. If the related model (Scheme) changes, the primary model's cache will contain stale nested data.
**Action:** Always apply cache invalidation (`Cache::forget`) to the model events of *both* the primary model and any eager-loaded related models to ensure global cache consistency.
