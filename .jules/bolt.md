## 2024-04-28 - Unbounded Query Optimization
**Learning:** Calling `->get()` on unbounded models (like Gallery and Documentation) scales poorly as data volume grows, creating memory and processing bottlenecks inside Laravel collections and blade loops. Iterating over a `LengthAwarePaginator` in Blade (`$collection->links()`) behaves exactly like a standard `Collection` loop, making this a safe drop-in replacement.
**Action:** Default to `->paginate()` over `->get()` in index controller methods for list views, especially for media-heavy or indefinitely growing models.
