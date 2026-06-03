## 2024-06-03 - Unbounded Data Queries Bottleneck
**Learning:** Using `->get()` on unbounded, user-generated content like Galleries and Documentations leads to memory exhaustion and database data transfer bottlenecks as the data grows.
**Action:** Always default to `->paginate()` instead of `->get()` for lists of user-generated content to ensure stable performance and O(1) memory usage per request.
