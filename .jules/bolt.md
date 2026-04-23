## 2026-04-23 - Adding RefreshDatabase to ExampleTest.php to fix schema errors during initial test run
**Learning:** Running `php artisan test` immediately on a fresh clone might fail if tests depend on database structure but don't explicitly use the RefreshDatabase trait or if the test DB isn't fully migrated. The ExampleTest expects to test the index page which queries models, leading to a "no such table" error. Adding RefreshDatabase fixes it.
**Action:** Always ensure tests interacting with the DB use RefreshDatabase, and keep testing environment clean to avoid confusing schema errors.
