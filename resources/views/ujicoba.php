<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Menggunakan warna setengah cerah untuk latar belakang */
        body {
            background-color: #f3f4f6; /* Warna abu-abu muda */
        }
        .card {
            background-color: #ffffff; /* Putih cerah */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
    </style>
</head>
<body class="font-sans antialiased">

    <div class="container mx-auto p-8">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-700">Dashboard</h1>
            <p class="text-lg text-gray-500">Welcome to your simple dashboard!</p>
        </div>

        <!-- Dashboard Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Card 1 -->
            <div class="card p-6">
                <h3 class="text-xl font-semibold text-gray-700">Card Title 1</h3>
                <p class="text-gray-500 mt-2">This is a description for card 1.</p>
            </div>

            <!-- Card 2 -->
            <div class="card p-6">
                <h3 class="text-xl font-semibold text-gray-700">Card Title 2</h3>
                <p class="text-gray-500 mt-2">This is a description for card 2.</p>
            </div>

            <!-- Card 3 -->
            <div class="card p-6">
                <h3 class="text-xl font-semibold text-gray-700">Card Title 3</h3>
                <p class="text-gray-500 mt-2">This is a description for card 3.</p>
            </div>
        </div>
    </div>

</body>
</html>
