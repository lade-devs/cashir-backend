## Configurations
#### Please note: The system would ping every minute to update the default payment provider. more details: "routes/console.php".
#### The system relies on a ping url if available by the payment providers. 
After cloning the repo
````
composer install
````
Set database and Run migration
````
php artisan migrate
````
Seed default payment provider
````
php artisan db:seed --class=SetDefaultPaymentProviderSeeder
````
## Update env
Update ping info and url for both providers, available via "config/env.php".
