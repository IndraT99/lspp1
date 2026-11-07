## 2024-05-15 - Missing Model Caching on Public Listing Route
**Learning:** In standard Laravel applications, iterating through eager-loaded relations is common. However, fetching complex relations across public pages (like fetching active `Asesor` with `scheme`) without caching introduces a significant overhead since the query runs on every request.
**Action:** Always implement Cache::remember or eloquent model events to invalidate Cache::forget on frequently accessed list endpoints to significantly improve response times for concurrent visitors.
