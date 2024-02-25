<!doctype html>
<html class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="<?= base_url('js/preline.js') ?>"></script>
</head>

<body class="bg-gray-100 flex h-full items-center py-16">
    <main class="w-full max-w-lg mx-auto p-6">
        <div class="mt-7 bg-white border border-gray-200 rounded-xl shadow-sm">
            <div class="p-4 sm:p-7">
                <div class="text-center">
                    <img src="<?= base_url('img/logo.png') ?>" alt="">
                </div>

                <div class="mt-7">
                    <!-- Form -->
                    <form>
                        <div class="grid gap-y-4">
                            <!-- Form Group -->
                            <div>
                                <label for="username" class="block text-sm font-medium mb-2 text-gray-600">Username</label>
                                <input type="text" id="username" name="username" class="py-3 border px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" placeholder="Super Admin" autofocus required>
                            </div>
                            <!-- End Form Group -->
                            <!-- Form Group -->
                            <div>
                                <label for="password" class="block text-sm font-medium mb-2 text-gray-600">Password</label>
                                <input type="password" id="password" name="password" class="py-3 border px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" placeholder="********" autofocus required>
                            </div>
                            <!-- End Form Group -->

                            <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">Sign in</button>
                        </div>
                    </form>
                    <!-- End Form -->
                </div>

                <div class="text-center mt-6">
                    <small class="text-extrabold text-gray-400">Sistem Inventory Barang Pabrikasi - 2024</small>
                </div>
            </div>
        </div>
    </main>
</body>

</html>