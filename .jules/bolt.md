## 2024-05-15 - Prevent memory exhaustion on unbounded content
**Learning:** Using `->get()` in Eloquent queries for user-generated or unbounded content like galleries and documentations creates a significant memory and performance risk as the dataset grows over time.
**Action:** Always default to using `->paginate()` instead of `->get()` for lists of content that can grow indefinitely, especially in user-facing media pages and admin list views.
