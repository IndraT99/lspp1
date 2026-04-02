## 2024-04-02 - Missing Index on Public Search Query
**Learning:** Found an O(N) full table scan bottleneck on the `/cek-sertifikat` public search endpoint. Users search their certificate numbers here, but the `certificate_number` column on the `assessments` table lacked a database index.
**Action:** Always add an index to columns that are heavily queried or used as primary search fields on public-facing endpoints to prevent unnecessary O(N) database reads.
