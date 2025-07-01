# Unicorn Rental 🦄

**Unicorn Rental** is a humorous Laravel web app for managing a magical unicorn rental business. It’s a playful project built to demonstrate modern Laravel architecture, role-based access, dynamic UI, and robust data handling—while not taking itself too seriously!

---

## Features

- User registration & login (Laravel Breeze)
- Role-based access (admin/user)
- Unicorn management (CRUD, soft delete for admins)
- Reservations with validation (date, duration)
- User reviews (1–5 stars, one per reservation)
- Dynamic ratings (star display, "No rating yet" if unrated)
- Responsive UI (Tailwind CSS, Blade components)
- Animated, pastel homepage slogan
- Secure policies & middleware
- Flash messages and error handling

---

## Getting Started

1. **Clone & install dependencies**
    ```
    git clone https://github.com/kriskensy/WSB_unicorn-rental
    cd unicorn-rental
    composer install
    npm install && npm run build
    cp .env.example .env
    php artisan key:generate
    ```
2. **Configure your `.env` file** (DB credentials, etc.)
3. **Run migrations and seeders**
    ```
    php artisan migrate --seed
    ```
4. **Start the server**
    ```
    php artisan serve
    ```
5. **Open [http://localhost:8000](http://localhost:8000)**

---

## Project Highlights

- **Humorous theme:** All about renting magical unicorns for parties, events, and fun!
- **Modern Laravel 12 stack:** MVC, Eloquent ORM, Blade, Tailwind CSS.
- **Role-based controls:** Admins manage unicorns; users book, review, and rate.
- **Animated homepage slogan:** Big, pastel, and glowing for that unicorn magic.
- **Ratings everywhere:** Average unicorn ratings and user reviews shown as stars.
- **Policies & middleware:** Secure, granular access to all actions.

---

## What Was Challenging?

- Managing route conflicts (e.g., `reviews/create` vs `reviews/{review}`).
- Implementing fine-grained authorization and policies in Laravel 12.
- Achieving a truly magical, responsive UI with custom CSS and Tailwind.

---

## What Would I Do Differently?

- Modularize components even earlier.
- Plan routes and policies more carefully.
- Focus more on accessibility and notifications.

---

## License

MIT

---

**Unicorn Rental – Where every ride is a fairy tale!**
