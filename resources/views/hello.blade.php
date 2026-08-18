<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Hello view</title>

        <style>
            body {
                background-color: black;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }

            h1 {
                color: azure;
                font-size: 5rem;
            }
        </style>
    </head>

    <body>
        <h1> Hello {{ $name }} </h1>
    </body>
</html>
