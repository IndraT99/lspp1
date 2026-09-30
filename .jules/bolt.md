## 2023-10-27 - Cache frequently accessed static reference data
**Learning:** Repeatedly querying static configuration-like reference data across multiple controllers causes unnecessary database load.
**Action:** Implement cache wrapping for active models and utilize Eloquent Model lifecycle events (`booted()`) to invalidate cache rather than manually handling it in CRUD controllers.
