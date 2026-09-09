## 2026-09-09 - Caching Eager Loaded Relations
**Learning:** When caching a model that eager-loads relationships (e.g., `Asesor::with('scheme')`), we must ensure cache invalidation happens not just on the main model (`Asesor`), but ALSO on the related model (`Scheme`). Otherwise, updates to the related data will not be reflected until the cache expires or is manually cleared, resulting in stale nested data.
**Action:** Always inspect the `.with()` clauses when adding `Cache::remember()` to ensure all related models have appropriate cache invalidation logic in their `booted()` events.
