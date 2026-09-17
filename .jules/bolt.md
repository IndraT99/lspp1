## 2024-05-10 - Caching Eager-Loaded Relations
**Learning:** When caching Eloquent models with eager-loaded relationships (like Asesor with scheme), cache invalidation must happen not just on the primary model, but also on the related models (Scheme) to avoid rendering stale nested data.
**Action:** Always add cache clearing (`Cache::forget()`) in the `booted` methods of BOTH the primary model and any related models that are included in the cached query payload.
