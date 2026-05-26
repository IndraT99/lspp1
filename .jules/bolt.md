## 2024-05-24 - Unbounded User-Generated Content Default Query
**Learning:** Defaulting to `->get()` in Eloquent queries for unbounded or rapidly growing user-generated content (like galleries and documentation) is a major performance and memory exhaustion risk, especially as the data scales.
**Action:** Always use `->paginate()` instead of `->get()` for these types of resources to prevent performance degradation and memory limits from being reached.
