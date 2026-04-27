## 2024-10-18 - Unbounded Query Memory Exhaustion
**Learning:** Found public endpoints for rapidly growing content (galleries, documentation) using `->get()`. In Laravel, this causes memory exhaustion and performance degradation as the dataset scales.
**Action:** Always default to `->paginate()` for unbounded data collections. It prevents out-of-memory errors and seamlessly integrates with existing Blade `@foreach` loops.
