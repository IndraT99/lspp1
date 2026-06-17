## 2024-06-17 - Cache Invalidation Requirement for Dashboard Entities
**Learning:** When implementing caching for frequently accessed dashboard entities (like `Scheme` and `Gallery` in `HomeController`), the local database setup and frontend verification process will fail if stale data is served.
**Action:** Always include explicit cache invalidation (`\Illuminate\Support\Facades\Cache::forget`) in the respective administrative CRUD controllers (`store`, `update`, `destroy`) whenever adding `Cache::remember` to public-facing queries.
