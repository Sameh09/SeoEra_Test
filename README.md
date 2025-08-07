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
⚠️ During the development process, I executed the migrate:fresh command as part of the php artisan install:project setup automation. Unfortunately, this action reset the database and resulted in the removal of previously logged data, including entries recorded by Laravel Telescope.

I sincerely apologize for this oversight, as it may have affected the completeness of historical logs and database data intended for review.

### Included Files

- [Postman Collection](./SeoEra.postman_collection.json)
- [Database Dump](./seoera.sql)

### Many thanks for your interest and your time .
