# Config folder

Config folder contains every file that is associated to configuration.

## What are the files in config folder?

- The config files are there to give you the ability to change the settings of your application.
- However, if you are not going to make any changes inside these configuration files, feel free to delete  them.
- Because these configuration files are actually already exist in Laravel core and then the framework simply use the Laravel core version of it.

For example, if you decide that you are going to only modify the below settings inside the `config\database.php` file:

```php
'migrations' => [
        'table' => 'migrations', # change this line to 'my_migrations' for example
        'update_date_on_publish' => true,
    ],
```

You can delete everything inside the `config\database.php` file except the above modified settings.  
Laravel will take the default values from the vendor folder (from the Laravel core) and override the ones you have modified.

## If you want to publish new configuration files

Execute the following command:

```php
php artisan config:publish
```

The above code gives you list of configuration files that you can publish and ask which you want to publish. 

If you exactly know which file you want to publish, you can use the following command:

```php
# Example artisan command to publish broadcasting configuration file (the new file will be located at config/broadcasting.php)
php artisan config:publish broadcasting
```
