# Useful migration artisan commands

```bash
php artisan migrate # Create database tables (those are not created yet) based on the migration files.

php artisan migrate:fresh  # Delete all tables and recreate them in the database.
php artisan migrate:rollback # Revert (undo) the last `php artisan migrate` command.

php artisan db:show # Show the information about the database.

php artisan db:table # Inspect an individual DB table.

php artisan db:seed --class=PostSeeder # Seed the data of PostSeeder class ONLY, into the DB.

php artisan db:seed # Seed all the data into the DB.
```
