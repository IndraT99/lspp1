## 2024-07-02 - Caching Eager-Loaded Relationships
**Learning:** When caching models with eager-loaded relationships, cache invalidation must happen on both the primary model and the related model. Otherwise, updating the related model will not reflect in the cached data.
**Action:** Always add cache invalidation events (saved/deleted) to both models involved in an eager-loaded cached query.
