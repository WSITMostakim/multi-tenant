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

## Subdomain Configuration

To use tenant subdomains in your local development environment, you need to map each tenant's subdomain to `127.0.0.1` in your hosts file.

### For Windows (Laragon)
1. Open Notepad as Administrator.
2. Open the file: `C:\Windows\System32\drivers\etc\hosts`
3. Add a line for each tenant subdomain you want to use. For example:
   ```
   127.0.0.1   tenant1.tenant.test
   127.0.0.1   tenant2.tenant.test
   ```
   Replace `tenant1` and `tenant2` with your actual tenant IDs.
4. Save the file.

### For Linux / macOS
1. Open a terminal.
2. Edit the `/etc/hosts` file with sudo:
   ```bash
   sudo nano /etc/hosts
   ```
3. Add a line for each tenant subdomain you want to use. For example:
   ```
   127.0.0.1   tenant1.tenant.test
   127.0.0.1   tenant2.tenant.test
   ```
   Replace `tenant1` and `tenant2` with your actual tenant IDs.
4. Save and close the file (in nano, press `Ctrl+O` to save, then `Ctrl+X` to exit).

Now you can access your tenants at `http://tenant1.tenant.test` and `http://tenant2.tenant.test` in your browser.

## License
MIT
