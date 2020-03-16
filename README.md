# **Basic CRUD make in Laravel**

author: Christian Gil

## Set up

Install dependencies:

    composer install
    
Install autoload:

    composer dump-autoload
    
Populate database:

    php artisan migrate:refresh --seed

## **Tests**

Execute tests (for validate main urls status):

    vendor/bin/phpunit

#### **Available urls:**

- **/** (Laravel welcome page)
- **/departments** (Department CRUD)
- **/departments/create** (Department create form)
- **/departments/{id}** (Department detail view)
- **/departments/{id}/edit** (Department edit form)
- **/users** (User CRUD)
- **/users/create** (User create form)
- **/users/{id}** (User detail view)
- **/users/{id}/edit** (User edit form)

