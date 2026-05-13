## 2024-05-13 - Replace get() with paginate() on unbounded tables
**Learning:** For unbounded or rapidly growing user-generated content (like galleries and documentation), using `->get()` in Eloquent queries can lead to memory exhaustion and performance degradation over time as the table grows.
**Action:** Always default to using `->paginate()` instead of `->get()` for indexing models that can grow indefinitely.
