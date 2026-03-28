#  Laravel Blog Application
### Technical Assessment for Ominimo Insurance

This is a lightweight, robust Blog Application built with Laravel 12. It features a full authentication system, post management, and a guest-friendly commenting engine.

---

##  Core Features

* Authentication: Powered by Laravel Breeze for secure Login, Registration, and Password management.
* Post CRUD: Authenticated users can create, edit, and delete their own blog posts.
* Smart Guest Access: Guests can browse all posts and leave comments without needing an account.
* Security & Policies: Robust authorization ensures users can only modify content they actually own.
* Database Architecture: Clean Eloquent relationships linking Users -> Posts -> Comments with cascading deletes.

---

##  Quick Setup Guide

If you have PHP, Composer, and Node installed, you can get this running in under 2 minutes:

### 1. Environment Setup
Clone the repository and install the dependencies:
git clone <YOUR_REPO_URL>
cd <YOUR_FOLDER_NAME>
composer install
npm install && npm run build

### 2. Configuration
Copy the environment file and generate your unique app key:
cp .env.example .env
php artisan key:generate

*Note: Update your .env with your local database credentials (DB_DATABASE, DB_USERNAME, etc.).*

### 3. Database Initialization
This command handles the table migrations and populates the blog with 15 sample posts for immediate testing:
php artisan migrate:fresh --seed

### 4. Launch
php artisan serve
The app will be live at: http://127.0.0.1:8000/posts

---

##  Testing Credentials
To save you time, the seeder creates a default test user:
* Email: test@example.com
* Password: password

---

## Technical Implementation
* Framework: Laravel 12.x
* Frontend: Tailwind CSS & Blade Templating
* Database: MySQL
* Authorization: Laravel Policies (PostPolicy)
* Assets: Compiled via Vite

---

##  Deployment Checklist
1. Save this text into your README.md file.
2. Run: git add README.md
3. Run: git commit -m "docs: finalized project readme"
4. Run: git push
