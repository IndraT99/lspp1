## 2025-02-12 - Missing Pagination on Growing Data Sets
**Learning:** Found that admin list views for Galleries and Documentations were using `->get()` instead of `->paginate()`. In a production environment, as these records grow, it will lead to significant memory consumption and slower page load times because the entire table is loaded into application memory at once.
**Action:** Always default to `->paginate()` for list views, especially in admin panels where records have no theoretical upper bound. Only use `->get()` when `->take()` or `->limit()` is explicitly applied.
