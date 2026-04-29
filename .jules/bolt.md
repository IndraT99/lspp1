## 2026-04-29 - Prevent memory exhaustion on unbounded content
**Learning:** Unbounded or rapidly growing user-generated content (like galleries and documentation) default to using `->get()` in Eloquent queries which causes memory exhaustion and performance degradation.
**Action:** Always default to using `->paginate()` instead of `->get()` for lists of unbounded or rapidly growing user-generated content.
