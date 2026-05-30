## 2024-05-23 - Unbounded queries on User-Generated Content
**Learning:** Using `->get()` on rapidly growing tables like galleries and documentation without limits creates a severe memory exhaustion bottleneck.
**Action:** Default to using `->paginate()` for all user-generated content models instead of `->get()`.
