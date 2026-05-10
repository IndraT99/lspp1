## 2024-05-10 - Unbounded Pagination

**Learning:** Unbounded user-generated content (e.g., Galleries and Documentation) using `->get()` without limits will lead to severe performance bottlenecks and memory exhaustion as the data grows. Using `->paginate()` efficiently manages database performance and prevents memory issues.

**Action:** Always default to using `->paginate()` instead of `->get()` for all user-generated content queries, except when explicit limits like `->take(n)` are enforced.
