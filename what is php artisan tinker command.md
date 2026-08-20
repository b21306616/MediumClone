# `php artisan tinker` command

`php artisan tinker` command is used to interact with the Laravel application.  
It is a command line interface that allows you to interact with your application's database and models.  

**We can write valid Laravel (PHP) code into the tinker console.**

## Example Usage

```php
# We are using Str class and it's random() static method. 
Str::random() # The code generates a random string.

# Invoke the User model's  get() static method.
App\Models\User::get() # Gets every user in our database Users table.

App\Models\User::find(1) # Gets the user with id 1.
App\Models\User::where('name', 'John')->get() # Gets all users with name John.
App\Models\User::where('name', 'John')->first() # Gets the first user with name John.
App\Models\User::where('name', 'John')->count() # Counts the number of users with name John.
```

## Let's practice

```php
# Get the first user from database Users table.
$firstUser = App\Models\User::first();

# Change name of the first user to "John".
$firstUser->name = "John";

# Save the changes to database Users table.
$firstUser->save();
```

Now, if we get the first user again, we will see that the name is "John".

```php
$firstUser = App\Models\User::first();
echo $firstUser
```

The output will be:

```json
{
    id: 1,
    name: "John",
    email: "test@example.com",
    email_verified_at: "2026-08-19 07:09:01",
    #password: "\$2y\$12\$XenRODFr4yAoCyihAP/ACORrao0Bq9.7gya8zKHTR9.bo.Csbwhsy",
    #remember_token: "IYe6YTNqoKGO2DoKdDlqnFoiZB38zyzvhKqznGoiHKUmoWmg4OOvtLWad6xO",
    created_at: "2026-08-19 07:09:02",
    updated_at: "2026-08-19 07:09:02",
}
```  
