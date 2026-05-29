## 2024-05-15 - [Missing Pagination on Unbounded Content]
**Learning:** The application was loading all gallery and documentation records into memory using `->get()`. This is a significant bottleneck that scales poorly as user-generated content grows.
**Action:** Always default to using `->paginate()` instead of `->get()` for unbounded content like galleries and documentations to prevent memory exhaustion.
