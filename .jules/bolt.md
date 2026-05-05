## 2024-05-05 - Unbounded Queries on User-Generated Content
**Learning:** The application was using ->get() for fetching galleries and documentations. Because this content grows continuously over time (user-generated unbounded growth), this pattern creates a silent memory leak and performance degradation (O(n) memory footprint) that worsens as the database grows.
**Action:** Always default to using ->paginate() instead of ->get() for unbounded user-generated collections to cap memory usage to a constant O(1) per request, regardless of total table size.
