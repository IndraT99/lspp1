## 2025-02-19 - N+1 Memory Exhaustion via `get()` in Gallery Views
**Learning:** Found classic unbounded query bottleneck (`Gallery::latest()->get()`) in `MediaController` and `Admin\GalleryController`. These load the entire media library into memory and create runaway DOM nodes as the table/grid grows.
**Action:** Replaced `->get()` with `->paginate(10)` and `->paginate(12)` respectively. This eliminates scaling risks to memory bounds and ensures O(1) memory complexity relative to total gallery count.
