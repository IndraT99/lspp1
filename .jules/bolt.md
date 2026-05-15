## 2025-02-12 - Pagination Memory Leak Protection
**Learning:** For unbounded or rapidly growing user-generated content (like galleries and documentation), `->get()` loads all records into memory, which can cause performance degradation or out-of-memory errors as the application scales. `->paginate()` limits the memory footprint.
**Action:** Always default to using `->paginate()` instead of `->get()` in Eloquent queries for administrative list views (like indices) to prevent memory exhaustion and performance degradation.
