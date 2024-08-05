# Kantongku

Kantongku is a financial tracking application that helps you record expenses and income, categorizing them by source of funds or account and category. The application also features reminders that will notify you based on user input, with reminders sent via email.

## Features

1. **Financial Tracking**
   - Record expenses and income.
   - Categorize transactions by source of funds (account) and category.

2. **Reminders**
   - Notify users based on input.
   - Reminders are sent via email.

## Technologies Used

- Laravel
- Bootstrap

## Installation

1. Clone the repository:
    ```bash
    git clone https://github.com/yourusername/kantongku.git
    ```

2. Navigate to the project directory:
    ```bash
    cd kantongku
    ```

3. Install the dependencies:
    ```bash
    composer install
    npm install
    ```

4. Set up the environment file:
    ```bash
    cp .env.example .env
    ```

5. Generate the application key:
    ```bash
    php artisan key:generate
    ```

6. Migrate the database and seed demo data:
    ```bash
    php artisan migrate --seed
    ```

7. Serve the application:
    ```bash
    php artisan serve
    ```

## Demo Data

The application comes with demo data to help you get started quickly. You can log in with the following credentials:

- **Email:** user1@example.com
- **Password:** 12345678

- **Email:** user2@example.com
- **Password:** 12345678
