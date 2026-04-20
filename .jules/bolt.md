
## 2024-05-20 - Pagination over unbounded collections
**Learning:** `->get()` was being used for unbounded collections like Galleries and Documentations, which could lead to memory exhaustion and slow response times on the frontend as the database grows.
**Action:** Default to using `->paginate()` over `->get()` for user-generated or growing content sets to prevent scaling issues.
