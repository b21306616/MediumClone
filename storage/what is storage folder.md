# storage folder

The storage contains the user uploaded data and framework generated data.

User uploaded data is stored in the "storage\app" folder.  
The "storage\framework" folder is framework generated data and we do not need to touch it at all.

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
- **How it works**: To access a private file, the user must send a request to a Laravel Controller route.  
Your code then verifies if the user has permission to see the file before sending it back.

> <span style="color:lightgreen"> Browser Request -> Laravel Route -> Check Auth / Policy -> Serve File via Storage::download() </span>

When to use `private`:
- User ID Documents (Passport scans, driver's licenses, tax forms)
- Paid Digital Downloads (PDF e-books or software installers after a user purchases them)
- Financial Invoices & Receipts (Personal billing history)
- Medical / Confidential Records
- Database Backups & System Exports

Saving the private file:

```php
// This takes $pdfContent and creates a physical file on the server at storage/app/private/invoices/inv_1001.pdf
Storage::disk('local')->put('invoices/inv_1001.pdf', $pdfContent);  # Storage::put() writes a file to the server's filesystem.
```

Serving the private file safely through a Controller:

```php
public function downloadInvoice(Invoice $invoice)
{
    // 1. Check if the logged-in user owns this invoice
    $this->authorize('view', $invoice);

    // Forces the browser to download the file from the server
    return Storage::disk('local')->download('invoices/inv_1001.pdf');

    // OR streams/displays the PDF directly inside the browser tab
    return response()->file(storage_path('app/private/invoices/inv_1001.pdf'));
}
```
