## 2024-05-03 - Pagination for Unbounded Content
**Learning:** Found a codebase-specific anti-pattern where unbounded user-generated content (galleries, documentation) was loaded entirely into memory using `->get()`, leading to potential memory exhaustion.
**Action:** Always default to using `->paginate()` instead of `->get()` in Eloquent queries for unbounded content, and render `{{ $collection->links() }}` in Blade views.
