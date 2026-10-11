## 2024-05-30 - [Caching Eager-Loaded Relationships]
**Learning:** When implementing caching for models with eager-loaded relationships (e.g., `Asesor` with `scheme`), the cache must be invalidated on both the primary model and the related model's events to prevent stale nested data from persisting.
**Action:** Always apply `Cache::forget` to the `saved` and `deleted` model events of all related models included in a cached eager-loaded query.
