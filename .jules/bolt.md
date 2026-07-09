## 2026-07-09 - Caching Eager-Loaded Relationships Requires Multi-Model Invalidation
**Learning:** When caching a model that eager-loads a relationship (like `Asesor` with `Scheme`), invalidating the cache only when the primary model (`Asesor`) updates leaves stale nested data if the related model (`Scheme`) is updated.
**Action:** Always implement Cache::forget hooks in the `booted` events (`saved` and `deleted`) for BOTH the primary model and any eager-loaded related models to ensure complete global cache consistency across administrative CRUD operations.
