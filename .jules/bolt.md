## 2024-09-20 - Global Cache Invalidation for Eager-loaded Relations
**Learning:** When implementing caching for models with eager-loaded relationships (e.g., Asesor with scheme), applying cache invalidation only to the primary model is insufficient and leads to stale nested data.
**Action:** Always implement cache invalidation model events (saved and deleted) on both the primary model and the related model to guarantee global cache consistency.
