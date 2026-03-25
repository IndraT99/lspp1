## 2024-03-25 - Home Page Optimization via Caching
**Learning:** The `HomeController` fetches public-facing entities (`Scheme`, `Gallery`) that change very infrequently but are queried on every single load of the root URL. Since the home page is typically the highest-traffic route, this un-cached database access creates a bottleneck.
**Action:** Utilize Laravel's `Cache::remember` to cache the results of these common queries for an appropriate duration (e.g., 1 hour). This pattern should be considered for any public-facing page fetching relatively static content.
