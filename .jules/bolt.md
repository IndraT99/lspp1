## 2025-02-12 - Caching Eager Loaded Data
**Learning:** When implementing caching for frequently accessed data that eagerly loads related models (e.g., Asesor with Scheme), cache invalidation (`Cache::forget`) must be applied in the Eloquent Model Events (`saved` and `deleted` in `booted`) for BOTH the primary model and the related model to prevent stale nested data.
**Action:** Always inspect `.with(...)` queries before caching and ensure invalidation covers all joined entities.
