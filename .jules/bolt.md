## 2024-03-24 - Model Event Caching for Eager Relationships
**Learning:** When caching a model with eager-loaded relationships (like Asesor with Scheme), cache invalidation must be applied to BOTH models using model events (saved/deleted). Otherwise, updates to the related model (Scheme) won't invalidate the primary model's cache, leading to stale nested data on the frontend.
**Action:** Always map out eager-loaded relationships when caching Eloquent queries, and add cache invalidation hooks to all related models.
