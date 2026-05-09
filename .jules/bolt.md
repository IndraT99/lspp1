## 2024-05-09 - Missing Pagination on Unbounded Content
**Learning:** The application was using ->get() for unbounded user-generated content (galleries and documentation), leading to memory exhaustion and N+1 query risks on large datasets.
**Action:** Defaulted to using ->paginate() instead of ->get() in Eloquent queries for unbounded content and added corresponding ->links() to Blade views.
