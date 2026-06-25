## 2024-02-14 - Missing Pagination in Assessor View
**Learning:** Missing pagination on potentially unbounded lists (like assessors) causes OOM errors and significant view rendering slow-downs (from 20ms to 200+ms) due to massive model binding loops.
**Action:** Always verify if a public index view with potentially hundreds of records uses `paginate()` instead of `get()`.
