## 2024-05-18 - Caching Model Relationships
**Learning:** When eager loading relationships using caching, you must invalidate the cache on both the parent and related models' `saved`/`deleted` events to avoid stale nested data.
**Action:** Always check models in `with()` clauses when implementing query caching, and apply `Cache::forget` hooks symmetrically across all involved Eloquent models.
