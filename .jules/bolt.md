## 2024-04-19 - Replace ->get() with ->paginate() for Unbounded Data
**Learning:** For rapidly growing user-generated content like galleries and documentation, using `->get()` in Eloquent queries can lead to memory exhaustion and significant performance degradation as the database grows.
**Action:** Always default to using `->paginate()` instead of `->get()` when fetching collections of data that will continuously expand over time, such as in media or documentation controllers.
