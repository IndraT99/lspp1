## 2024-05-23 - [Cache Invalidation for Eager-Loaded Relationships]
**Learning:** When caching Eloquent models that include eager-loaded relationships (like `Asesor` with `scheme`), cache invalidation must be handled on BOTH the primary model's and the related model's events. Otherwise, updates to the related model (e.g. `Scheme`) will leave stale nested data in the parent's cache.
**Action:** Always add `Cache::forget()` to the `saved` and `deleted` model events (via the `booted` method) of both the primary and related models when caching nested data structures.
