## 2024-10-14 - Prevent Stale Eager-Loaded Cache
**Learning:** When caching a model that eager loads relationships (like `Asesor::with('scheme')`), modifying the related model (`Scheme`) will not automatically invalidate the parent model's cache. This leads to stale nested data being displayed.
**Action:** Always implement cache invalidation (e.g., `Cache::forget`) in the `booted` method for BOTH the primary model and the related eager-loaded model.
