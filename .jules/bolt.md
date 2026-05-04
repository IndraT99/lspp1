## 2024-05-04 - Unbounded User-Generated Content Causes Memory Exhaustion
**Learning:** Using ->get() without limits on unbounded user-generated content like galleries and documentation in Laravel can lead to memory exhaustion and server performance degradation as the data grows.
**Action:** Always default to using ->paginate() instead of ->get() for lists of user-generated content in Eloquent queries. Use ->links() in Blade templates to render the pagination controls.
