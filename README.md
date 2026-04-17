Pet Adoption System (Middleware + CRUD Integration)

Project Overview
This project is an integration of **Activity 2 (Eloquent Relationships)** and the current **Middleware + CRUD Integration Activity**. It demonstrates a working Laravel application with a User Interface (UI), full CRUD functionality, and role-based access control using Middleware.



Activity Transition & Integration Notes
Originally, this repository was created for **Activity 2: Eloquent Relationships** (Pet Adoption System). For this new activity, I integrated the new requirements directly into the same repository as per the guidelines ("do not create a separate repo").

What happened during the update?
- Repository Sync: During the `git push --force`, the remote files (including the old ERD photo) were overwritten to ensure the local Laravel project (which contains the full application) is perfectly synced with the GitHub repository.

- ERD Note: If the ERD image is no longer visible in the root directory, it is because the project structure was updated to a full Laravel directory. All relationship logics from Activity 2 are still intact and functional within the Models.



Features (Tasks Completed)

1. Build CRUD + UI
- Blade Views: Created custom views for `Customers`, `Products`, and `Orders`.

- Full CRUD: Users can Create, Read, Update, and Delete records for the entities they own.

- Eloquent Relationships: No manual SQL joins were used. 

- Eager Loading: Implemented `with(['customer', 'product'])` in the Order controller to optimize performance and display related data.

2. Apply Access Rules (Security)
- Ownership: Authenticated users can only manage (Edit/Delete) the entities they created.

- Admin Role: An `is_admin` column was added to the Users table. Only users with `is_admin = 1` can access the `Manage Users` section.

- URL Security: Even if a regular user manually types the `/users` URL, the `AdminMiddleware` will trigger a **403 Forbidden** error.

3. UI Behavior
- Restricted action buttons (Edit/Delete) are hidden from the UI if the user is not the owner or an admin.

- Navigation links are dynamically displayed based on the user's role.



Eloquent Relationships (From Activity 2)
The following relationships are still active and used within the system:
- One-to-One: A `Pet` has one `MedicalRecord`.
- One-to-Many: A `Shelter` has many `Pets`.
- Many-to-Many: A `Pet` belongs to many `Adopters` (via the `Adoptions` table).

- New Relationships: 
    - `User` has many `Products`/`Customers`/`Orders`.
    - `Order` belongs to `Customer` and `Product`.



Installation & Setup
1. Clone the repository.
2. Run `composer install` and `npm install`.
3. Configure `.env` file and database settings.
4. Run `php artisan migrate` to set up the tables and the `is_admin` column.
5. Run `php artisan serve`.



Video Demonstration
[Link to Functional Video Demonstration] 
(https://drive.google.com/drive/folders/19cRAAqEEU2kYAgxaucX2-yAlKfKpXQTI?usp=drive_link)

Submitted by:
- Maynard Villar
