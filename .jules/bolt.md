## 2024-06-05 - Paginate unbounded user-generated content
**Learning:** The application uses `->get()` for unbounded user-generated content (Galleries and Documentations), which is an anti-pattern that risks memory exhaustion and performance degradation as the database grows. Iterating over `LengthAwarePaginator` behaves exactly the same as iterating over a standard `Collection` in Blade views.
**Action:** Always default to using `->paginate()` instead of `->get()` in Eloquent queries for unbounded collections like Galleries and Documentations to maintain O(1) memory footprint per page.
