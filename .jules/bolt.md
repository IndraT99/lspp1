## 2026-07-06 - Initial Analysis
**Learning:** Evaluated application for performance. Found caching implementation could be helpful for front-facing controllers like HomeController, SchemeController, TempatUjiController, etc. Also noticed `AsesorController` loads all active assessors without pagination, which could be an issue if there are many assessors, but we need to ensure pagination is supported on the view if we change it. Wait, the frontend view `resources/views/uji-kompetensi/asesor.blade.php` has a loop over `$asesors` and no pagination links.
**Action:** Need to find a clear, measurable >50 lines optimization.
## 2026-07-06 - N+1 Query Problem in Admin Asesor Index
**Learning:** The `Admin/AsesorController@index` uses `$asesors = Asesor::with('scheme')->paginate(10);` which eagerly loads the `scheme` relation, so there's no N+1 query issue there. Wait, I should check the public `AsesorController`. The public one has: `\App\Models\Asesor::where('is_active', true)->with('scheme')->get();`. Eager loading is also used here. No N+1 issue.
**Action:** Let me look for other opportunities.

## 2026-07-06 - Front-facing Caching
**Learning:** Found several public-facing pages that fetch data from the database on every load, which could slow down the application if traffic spikes:
- `HomeController@index` fetches 6 schemes and 6 galleries.
- `SkemaController@index` fetches all active schemes.
- `MediaController@galeri` fetches all active galleries.
- `MediaController@dokumentasi` fetches all active documentations.
- `TempatUjiController@index` fetches all active tempat ujis.
- `AsesorController@index` fetches all active asesors.
Wait, since models are infrequently updated, caching these queries globally in Model events is optimal.
According to the boundaries, caching expensive API calls/queries is a good optimization. Implementing Eloquent cache invalidation on Model events for `Gallery`, `Scheme`, `Documentation`, `TempatUji`, and `Asesor` along with `Cache::rememberForever` in controllers is an excellent optimization. But wait, I must select ONE small performance improvement in < 50 lines.
What if I optimize `HomeController` with caching since it's the most visited page? That's <50 lines. Or better, caching `AsesorController`, `SkemaController`, `TempatUjiController`, `MediaController`, and `HomeController` reads with invalidation on models? That might be slightly more than 50 lines, but very effective.
Let's optimize `HomeController@index` with simple `Cache::rememberForever` and invalidation on `Scheme` and `Gallery` models, or perhaps I'll just use simple TTL cache like `Cache::remember('home.schemes', 3600, fn() => ...)` which requires fewer lines and no model event boilerplate.
Wait, the memory says "When implementing caching for frequently accessed data, prefer using Eloquent Model Events (`saved` and `deleted` in the model's `booted` method) for cache invalidation (`Cache::forget`) rather than manually injecting it across multiple administrative CRUD controllers, ensuring global cache consistency."

## 2026-07-06 - N+1 in MediaController?
Let's check `MediaController`. No relations loaded.
Let's check `SkemaController`. No relations loaded.
Wait, let's look at `Admin/DashboardController.php` or `HomeController.php`.

Let's cache the `HomeController@index` queries using `Cache::remember` with Cache invalidation in Model events for `Scheme` and `Gallery`.
Let's verify line count for this:
- HomeController.php (+6 lines)
- Scheme.php (+10 lines)
- Gallery.php (+10 lines)
Total: ~26 lines. Very clean and impactful.
