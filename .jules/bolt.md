## 2024-05-24 - Default Paginate on User-Generated Content Collections
**Learning:** Returning all items dynamically (`->get()`) in unbounded collections like galleries and documentations creates huge performance bottlenecks and crashes as data grows, unlike statically sized collections. The pagination behavior for iteration is completely identical in the view.
**Action:** Always default to using `->paginate()` instead of `->get()` on content collections that can grow infinitely to prevent performance degradation and OOMs.
