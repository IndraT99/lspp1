## 2026-07-20 - Global Cache Invalidation for Eager-Loaded Relations
**Learning:** When implementing global caching for a model that eager-loads related models (e.g., `Asesor` with `scheme`), the cached data becomes stale if the related model (Scheme) is updated, even if the primary model (Asesor) is untouched.
**Action:** Always add cache invalidation events (`saved`, `deleted`) to BOTH the primary model and any eager-loaded related models to guarantee cache consistency.
