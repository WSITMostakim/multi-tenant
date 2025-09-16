# Laravel Multi-Tenant SaaS Boilerplate

This project is a modern multi-tenant SaaS boilerplate built with Laravel, Stancl Tenancy, and Spatie Roles & Permissions. It supports both system and tenant user management, plan subscriptions, and domain-based tenant isolation.

## Features
- Central (system) and tenant user authentication
- Role and permission management for both system and tenant users
- Plan management and assignment to tenants
- Automatic tenant database and domain provisioning
- Admin user auto-creation for each new tenant
- Modern UI with Tailwind CSS

## Stack
- Laravel
- Stancl Tenancy
- Spatie Laravel Permission
- Tailwind CSS

## Setup
1. Clone the repository and install dependencies:
   ```bash
   composer install
   cp .env.example .env
   php artisan key:generate
   ```
2. Configure your `.env` for database and mail settings.
3. Run the central migrations and seeders:
   ```bash
   php artisan migrate --seed
   ```
4. Add your central domains to `config/tenancy.php`.
5. Tenant migrations are run automatically when a tenant is created.

## Usage
- System users (admins) can manage plans, tenants, and users from the central domain.
- Each tenant has its own users, roles, and permissions, isolated by domain.
- When a tenant is created, an admin user is automatically provisioned.

## Folder Structure
- `app/Http/Controllers/System/` - System (central) controllers
- `app/Http/Controllers/Tenant/` - Tenant controllers
- `app/Models/` - Shared and system models
- `resources/views/layout/system/` - System layouts
- `resources/views/layout/tenant/` - Tenant layouts
- `resources/views/ui/system/` - System UI (plans, tenants, users)
- `resources/views/ui/tenant/` - Tenant UI

## Customization
- Update roles, permissions, and plans in the seeders as needed.
- UI is built with Tailwind CSS and can be easily customized.

## License
MIT
