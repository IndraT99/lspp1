## 2024-05-14 - Pagination for Unbounded Content
**Learning:** Using `->get()` without pagination for unbounded or rapidly growing user-generated content (like galleries and documentation) is a critical performance bottleneck in this app that can lead to memory exhaustion and degraded query performance as content volume grows.
**Action:** Always default to using `->paginate()` instead of `->get()` in Eloquent queries for unbounded content, and ensure views support rendering `{{ $collection->links() }}`.
