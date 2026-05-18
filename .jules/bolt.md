## 2024-05-15 - Unpaginated Backend Data Fetching
**Learning:** Discovered that unpaginated `->get()` calls in backend controllers (`Admin/GalleryController`, `Admin/DocumentationController`, etc.) for potentially large, growing datasets like images and docs can cause significant memory bottlenecks as content grows. This differs from simple static lists.
**Action:** Use `->paginate(10)` instead of `->get()` and update Blade views with `$collection->links()` for unbounded data collections.
