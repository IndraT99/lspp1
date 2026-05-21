## 2024-05-21 - Pagination on Unbounded Content
**Learning:** Fetching unbounded user-generated content like galleries and documentation using `->get()` causes memory exhaustion and performance degradation.
**Action:** Always default to using `->paginate()` instead of `->get()` in Eloquent queries for unbounded or rapidly growing user-generated content.
