<!-- ![Laravel Ecommerce Example](https://user-images.githubusercontent.com/4316355/36414878-d41987b2-15f1-11e8-9f2c-6c3a68e4a14b.gif) -->

# eKart (EEI-EDCI)

Code for YouTube video series: [https://www.youtube.com/watch?v=o5PWIuDTgxg&list=PLEhEHUEU3x5oPTli631ZX9cxl6cU_sDaR](https://www.youtube.com/watch?v=o5PWIuDTgxg&list=PLEhEHUEU3x5oPTli631ZX9cxl6cU_sDaR)

<!-- Website Demo: [https://laravelecommerceexample.ca](https://laravelecommerceexample.ca). The demo has limited permissions. Install locally for full access. -->

## Installation

1. Clone the repo `git clone https://github.com/itadgeei-cci/e-comm.git`
1. `cd /e-comm` into it 
1. `composer install` or `composer update`
1. Rename or copy `.env.example` file to `.env`
1. `php artisan key:generate`
1. Create "ecomm" database
1. Set your database credentials in your `.env` file
1. Set your `APP_URL` in your `.env` file. This is needed for Voyager to correctly resolve asset URLs. `APP_URL=http://e-comm`
1. `php artisan ecommerce:install`. This will migrate the database and run any seeders necessary. 
<!-- See [this episode](https://www.youtube.com/watch?v=L3EbWJmmyjo&index=18&list=PLEhEHUEU3x5oPTli631ZX9cxl6cU_sDaR). -->
1. `chmod -R 777 storage`
1. `composer require maatwebsite/excel`

1. Visit `/admin` if you want to access the Voyager admin backend. 
Developer       User/Password: `admin@admin.com/password`. 
EEI-EDC Admin   User/Password: `adminweb@adminweb.com/password`
