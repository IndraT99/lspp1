## 2024-06-02 - Unbounded Queries on Media Pages
**Learning:** Using `->get()` without limits on unbounded user-generated content (Gallery, Documentation) can cause memory exhaustion as data scales.
**Action:** Always default to using `->paginate()` for Eloquent queries returning unbounded user-generated content unless explicitly instructed otherwise.
