## 2024-10-31 - [Pagination for User-Generated Content]
**Learning:** Using `->get()` for unbounded content like galleries and documentations can cause memory exhaustion and performance degradation. Always prefer `->paginate()`.
**Action:** Default to `->paginate()` in Eloquent queries for user-generated content to prevent memory exhaustion.
