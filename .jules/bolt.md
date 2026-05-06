## 2024-05-06 - Memory Exhaustion Prevention for User Content
**Learning:** Unbounded user-generated content like galleries and documentations can quickly lead to memory exhaustion and performance degradation when loaded entirely into memory using `->get()` in Eloquent.
**Action:** Always default to using `->paginate()` instead of `->get()` for lists of user-generated content, especially for public-facing media endpoints, to cap memory usage and ensure scalable query performance.
