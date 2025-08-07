#  SeoEra Test Project

This Laravel 11 project is a full-stack web application and API that includes a JWT-based authentication system, an admin dashboard, and user-generated posts with detailed control and management features.

---

## ✅ Features

-  **JWT Authentication**
-  **User Registration with Mobile, Email, Username, and Password**
-  **Admin Panel with CRUD for Users & Posts**
-  **Post Creation for Authenticated Users**
-  **Paginated Public Posts API**
-  **Laravel Telescope Integration** (logs all actions and errors)
-  **Database Migrations & Seeders**
-  **Daily Report Email for New Users & Posts**
-  **Custom Laravel Installer Command (`install:project`)**
-  **Login via Mobile & Password**
-  **Post Descriptions Limited to 2KB**
-  **Posts Preview Truncated to 512 Characters in Lists**
-  **Sorted by Most Recent Posts First**
-  **AdminLTE UI for Admin Panel**
-  **Laravel ORM & Relationships**
-  **Soft Deletes & Restore functionally **


---

## 📦 Project Installation

To deploy and test this application locally:

### 1. Clone the repository
<pre>
git clone https://github.com/Sameh09/SeoEra_Test.git
cd SeoEra_Test
</pre>
### 2. Install Dependencies
<pre>
composer install
</pre>
### 3. Install the Project Automatically
<pre>
php artisan install:project
</pre>
> ⚠️❗ **IMPORTANT:** On some systems, the `php artisan install:project` command may fail the **first time** due to database cache dependencies.  
> If that happens, **simply run the command again** after the database has been created.

⚠️ During the development process, I executed the migrate:fresh command as part of the php artisan install:project setup automation. Unfortunately, this action reset the database and resulted in the removal of previously logged data, including entries recorded by Laravel Telescope.
I sincerely apologize for this oversight, as it may have affected the completeness of historical logs and database data intended for review.

# Scheduled Tasks
A daily report email of new users and posts is automatically sent to the admin at midnight.

This is handled via Laravel's scheduler (schedule:run), configured in routes/console.php.

To enable it on production (via cron job):

* * * * * php /path/to/artisan schedule:run >> /dev/null 2>&1


## 🧪 Default Accounts

The following user accounts are created automatically using seeders for testing and development:

| Role     | Email            | Password  |
|----------|------------------|-----------|
| Admin    | admin@mail.com   | password  |
| User     | user@mail.com    | password  |


### Included Files

- [Postman Collection](./SeoEra.postman_collection.json)
- [Database Dump](./seoera.sql)

### Many thanks for your interest and your time .
