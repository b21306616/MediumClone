# storage folder

The storage contains the user uploaded data and framework generated data.

User uploaded data is stored in the "storage\app" folder.

## Public Folder (storage/app/public)

- **What it is**: Files stored in storage/app/public are intended to be directly accessible to anyone on the web via a URL, without going through any authentication or PHP logic.

- **How it works**: By default, web browsers cannot access the `storage/` directory directly.  
However, when you run the Artisan command `php artisan storage:link`,  
Laravel creates a symbolic link (shortcut) pointing from `public/storage` to `storage/app/public` (configured in `config/filesystems.php`).

- This allows the browser to request the file directly: `https://yourdomain.com/storage/avatars/user123.jpg`

When to use `public`:
- User profile pictures / avatars
- Blog post cover images & thumbnails
- Public product images in an e-commerce store
- Public event flyers or brochures

How to use in code:

```php
# In blade files
<img src="{{ asset('storage/avatars/user123.jpg') }}" alt="User Avatar">    #  Use asset() helper

# In php files (controller, model, etc)
$imagePath = public_path('storage/avatars/user123.jpg');
```

## Private Folder (storage/app/private)

- **What it is**: Files stored in `storage/app/private (or storage/app/)` are completely hidden from the web. A user cannot open or download these files by typing a URL into their browser.

> <span style="color:lightgreen"> Browser Request -> Laravel Route -> Check Auth / Policy -> Serve File via Storage::download() </span>


When to use `private`:
- User ID Documents (Passport scans, driver's licenses, tax forms)
- Paid Digital Downloads (PDF e-books or software installers after a user purchases them)
- Financial Invoices & Receipts (Personal billing history)
- Medical / Confidential Records
- Database Backups & System Exports
