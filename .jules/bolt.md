## 2025-05-28 - Fix Unbounded Eloquent Queries
**Learning:** Unbounded Eloquent queries using `->get()` on rapidly growing user-generated content tables (like `galleries` and `documentations`) create severe memory exhaustion risks as the dataset grows.
**Action:** Always default to using `->paginate()` instead of `->get()` for unbounded lists of user-generated content, and add `{{ $collection->links() }}` to the corresponding Blade views.
