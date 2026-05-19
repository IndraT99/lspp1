## 2024-05-19 - Pagination for Unbounded Content
**Learning:** Defaulting to `->get()` on unbounded models like `Gallery` and `Documentation` can cause memory exhaustion as data grows.
**Action:** Always use `->paginate()` for user-generated content endpoints to maintain predictable memory usage.
