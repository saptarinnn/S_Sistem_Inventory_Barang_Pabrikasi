<!doctype html>
<html class="h-full">

<head>
    <?= $this->include('layouts/_head') ?>
    <style>
        body {
            font-family: "Fredoka", sans-serif !important;
        }
    </style>
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
                    <form method="post" action="<?= site_url('login') ?>">
                        <?= csrf_field() ?>
                        <div class="grid gap-y-4">
                            <!-- Form Group -->
                            <div>
                                <label for="username" class="block text-sm font-medium mb-2 text-gray-600">Username</label>
                                <input type="text" id="username" name="username" class="py-3 border px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-slate-500 focus:ring-slate-500 disabled:opacity-50 disabled:pointer-events-none" placeholder="Super Admin" autofocus required>
                            </div>
                            <!-- End Form Group -->
                            <!-- Form Group -->
                            <div>
                                <label for="password" class="block text-sm font-medium mb-2 text-gray-600">Password</label>
                                <input type="password" id="password" name="password" class="py-3 border px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-slate-500 focus:ring-slate-500 disabled:opacity-50 disabled:pointer-events-none" placeholder="********" required>
                            </div>
                            <!-- End Form Group -->

                            <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-slate-600 text-white hover:bg-slate-700 disabled:opacity-50 disabled:pointer-events-none">Sign in</button>
                        </div>
                    </form>
                    <!-- End Form -->
                </div>

                <div class="text-center mt-6">
                    <span class="font-medium text-xs text-gray-400">Sistem Inventory Barang Pabrikasi - 2024</span>
                </div>
            </div>
        </div>
    </main>

    <?= $this->include('layouts/_script') ?>

    <?= $this->section('script') ?>
    <?php if (session()->has('error')) : ?>
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 5000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "error",
                title: "Username atau Password Salah!"
            });
        </script>
    <?php endif; ?>
</body>

</html>