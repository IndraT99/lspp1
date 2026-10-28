## 2024-05-18 - Model Event Cache Invalidation for Eager-Loaded Relations
**Learning:** When caching models with eager-loaded relationships (like Asesor loading Scheme), cache invalidation must be implemented on both the primary model AND the related model's events. If we only invalidated on Asesor, updating a Scheme's name would leave stale nested data in the Asesor cache.
**Action:** Always check the with() eager-loads when caching Eloquent queries, and add corresponding Cache::forget hooks in the booted method of all related models.
