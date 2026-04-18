## 2023-10-27 - Unbounded Memory Growth on Media Fetching
**Learning:** Using `->get()` without chunking or pagination for user-generated content (like galleries and documentation) leads to severe performance degradation and memory exhaustion as the dataset grows over time.
**Action:** Always default to `->paginate()` for list views of unbounded resources to ensure consistent performance.
