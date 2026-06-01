## 2024-06-01 - Prevent Memory Exhaustion with Pagination
**Learning:** Unbounded database queries using `->get()` on user-generated content tables (like `galleries` and `documentations`) lead to memory exhaustion and N+1 rendering issues as data grows.
**Action:** Always use `->paginate()` for tables expected to grow indefinitely, ensuring O(1) memory complexity per request regardless of total database size.
