## Tactical Waifu 
Character Creator

A Laravel-based web application for creating, storing, viewing, and exporting Tactical Waifu RPG characters.

Users can:

Create a character via a browser form

Protect characters with an optional password

Retrieve characters by UUID

View character sheets online

Export character sheets as PDF

Automatically receive preset items

Add custom weapons, goals, and items

Tech Stack

Backend: Laravel 12

Frontend: Blade + Tailwind CSS

Database: MySQL

PDF Generation: barryvdh/laravel-dompdf

PHP: 8.3+
 
Features
Character Creation

Name

Dere Type

Hair color (HEX color picker)

Eye color (HEX color picker)

Height & Tactical/Waifu number

Player goal & character goal

Weapon (preset or custom)

Default + manual items

Optional password protection

Character Access

Each character gets a UUID

Characters with passwords require validation

Passwords are hashed (never stored in plain text)

Character Output

Web character sheet

Printable / downloadable PDF

Color previews for hair & eyes


 Installation
1️. Clone the repository
git clone https://github.com/your-username/tactical-waifu.git
cd tactical-waifu

2️. Install dependencies
composer install
npm install
npm run build

3. Configure environment
cp .env.example .env
php artisan key:generate


Update .env with your database credentials.

4️. Run migrations & seeders
php artisan migrate --seed

5️. Start the server
php artisan serve


Visit:

http://127.0.0.1:8000

 Password Handling

Passwords are optional

If provided:

Must be at least 3 characters

Stored using Laravel’s Hash::make

Password checks use Hash::check

Password is never retrievable, only verifiable

Color Handling

Instead of using lookup tables for hair/eye colors:

 Hair and eye colors are stored directly on the character as HEX values
Example:

hair_color_hex = #fdff8f
eye_color_hex = #0530b3


Why?

Works perfectly with <input type="color">

Simplifies database design

Improves PDF rendering

Removes unnecessary joins

 PDF Generation

PDFs are generated using:

Barryvdh\DomPDF\Facade\Pdf


Available actions:

View PDF in browser

Download PDF

PDF uses a simplified Blade view for print compatibility.

 Useful Commands
php artisan migrate:fresh --seed
php artisan tinker
php artisan route:list
php artisan optimize:clear


Exit Tinker:

exit

 Validation Rules (Highlights)

Weapon: either preset OR custom, not both

Character goal: either preset OR custom

Height: 120–210 cm

Tactical number: 2–5

Password: min 3 characters

Validation is enforced both client-side and server-side.

Future Improvements

Edit existing characters

Shareable public links

Image upload (character portrait)

Dice roller integration

Authentication for character owners

Credits

Inspired by the Tactical Waifu tabletop RPG.
Built as a learning and passion project using Laravel.
