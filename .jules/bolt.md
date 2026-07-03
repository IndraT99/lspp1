## 2024-05-23 - Database query caching for public pages
**Learning:** Public pages like Asesor and Skema were querying all active records (including eager-loaded relationships) on every request without caching, which caused unnecessary database overhead.
**Action:** Use `Cache::rememberForever` for public queries and invalidate them using Eloquent model `saved` and `deleted` events in the `booted` method to ensure global cache consistency across administrative CRUD controllers.
