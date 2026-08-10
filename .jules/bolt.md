## 2024-05-24 - Model Caching Performance Pattern
**Learning:** Found multiple controllers querying lists of models without caching (e.g. AsesorController, SkemaController). We can significantly speed up response times for public-facing pages by implementing Eloquent model event-driven caching (using the `booted` method for cache invalidation when models are saved/deleted).
**Action:** Implement model caching via the `booted` method in eloquent models to automatically handle cache invalidation globally instead of relying on controller-level cache logic.
