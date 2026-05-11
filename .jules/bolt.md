## 2026-05-11 - Bounded Content Retrieval
**Learning:** Using `->get()` without limits on unbounded or rapidly growing user-generated content (like galleries or documentation) causes severe memory exhaustion and degraded query performance over time as the dataset grows.
**Action:** Always default to using `->paginate()` in Eloquent queries for unbounded lists, rather than fetching the entire result set into memory at once.
