<div id="application-sidebar" class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full transition-all duration-300 transform hidden fixed top-0 start-0 bottom-0 z-[60] w-64 bg-white border-e border-gray-200 pt-7 pb-10 overflow-y-auto lg:block lg:translate-x-0 lg:end-auto lg:bottom-0 [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300">
    <div class="px-6">
        <a class="flex-none text-xl font-semibold" href="#" aria-label="Brand">
            <img src="<?= base_url('img/logo.png') ?>" alt="" class="w-full">
        </a>
    </div>

    <nav class="flex flex-col flex-wrap w-full p-6 hs-accordion-group" data-hs-accordion-always-open>
        <ul class="space-y-1.5">
            <li class="mb-4">
                <a class="flex font-bold items-center gap-x-3 py-2 px-2.5 text-base text-slate-500 rounded-lg hover:bg-gray-100" href="<?= site_url('dashboard') ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                        <path d="M8.543 2.232a.75.75 0 0 0-1.085 0l-5.25 5.5A.75.75 0 0 0 2.75 9H4v4a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1a1 1 0 1 1 2 0v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1V9h1.25a.75.75 0 0 0 .543-1.268l-5.25-5.5Z" />
                    </svg>
                    Dashboard
                </a>
            </li>
            <?php if (session('peran') == 'admin' || session('peran') == 'manager' || session('peran') == 'gudang') : ?>
                <li class="pb-1 text-sm font-bold text-slate-400">Halaman</li>
            <?php endif; ?>

            <?php if (session('peran') == 'admin' || session('peran') == 'manager') : ?>
                <li>
                    <a class="flex font-bold items-center gap-x-3 py-2 px-2.5 text-base text-slate-500 rounded-lg hover:bg-gray-100" href="<?= site_url('pengguna') ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                            <path d="M8.5 4.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0ZM10.9 12.006c.11.542-.348.994-.9.994H2c-.553 0-1.01-.452-.902-.994a5.002 5.002 0 0 1 9.803 0ZM14.002 12h-1.59a2.556 2.556 0 0 0-.04-.29 6.476 6.476 0 0 0-1.167-2.603 3.002 3.002 0 0 1 3.633 1.911c.18.522-.283.982-.836.982ZM12 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z" />
                        </svg>
                        Data Pengguna
                    </a>
                </li>
            <?php endif; ?>

            <?php if (session('peran') == 'admin' || session('peran') == 'gudang') : ?>
                <li>
                    <a class="flex font-bold items-center gap-x-3 py-2 px-2.5 text-base text-slate-500 rounded-lg hover:bg-gray-100" href="<?= site_url('satuan') ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                            <path fill-rule="evenodd" d="M4.5 2A2.5 2.5 0 0 0 2 4.5v2.879a2.5 2.5 0 0 0 .732 1.767l4.5 4.5a2.5 2.5 0 0 0 3.536 0l2.878-2.878a2.5 2.5 0 0 0 0-3.536l-4.5-4.5A2.5 2.5 0 0 0 7.38 2H4.5ZM5 6a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z" clip-rule="evenodd" />
                        </svg>
                        Data Satuan
                    </a>
                </li>

                <li>
                    <a class="flex font-bold items-center gap-x-3 py-2 px-2.5 text-base text-slate-500 rounded-lg hover:bg-gray-100" href="<?= site_url('pemasok') ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                            <path d="M8 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5ZM3.156 11.763c.16-.629.44-1.21.813-1.72a2.5 2.5 0 0 0-2.725 1.377c-.136.287.102.58.418.58h1.449c.01-.077.025-.156.045-.237ZM12.847 11.763c.02.08.036.16.046.237h1.446c.316 0 .554-.293.417-.579a2.5 2.5 0 0 0-2.722-1.378c.374.51.653 1.09.813 1.72ZM14 7.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0ZM3.5 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3ZM5 13c-.552 0-1.013-.455-.876-.99a4.002 4.002 0 0 1 7.753 0c.136.535-.324.99-.877.99H5Z" />
                        </svg>
                        Data Pemasok
                    </a>
                </li>
            <?php endif; ?>

            <?php if (session('peran') == 'admin' || session('peran') == 'gudang' || session('peran') == 'manager') : ?>
                <li>
                    <a class="flex font-bold items-center gap-x-3 py-2 px-2.5 text-base text-slate-500 rounded-lg hover:bg-gray-100" href="<?= site_url('barang') ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                            <path d="M3 2a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H3Z" />
                            <path fill-rule="evenodd" d="M3 6h10v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6Zm3 2.75A.75.75 0 0 1 6.75 8h2.5a.75.75 0 0 1 0 1.5h-2.5A.75.75 0 0 1 6 8.75Z" clip-rule="evenodd" />
                        </svg>
                        Data Barang
                    </a>
                </li>
            <?php endif; ?>

            <?php if (session('peran') == 'admin' || session('peran') == 'gudang' || session('peran') == 'pembelian' || session('peran') == 'manager') : ?>
                <li class="pt-4 pb-1 text-sm font-bold text-slate-400">Transaksi</li>
            <?php endif; ?>

            <?php if (session('peran') == 'admin' || session('peran') == 'gudang' || session('peran') == 'manager') : ?>
                <li>
                    <a class="flex font-bold items-center gap-x-3 py-2 px-2.5 text-base text-slate-500 rounded-lg hover:bg-gray-100" href="<?= site_url('barang-masuk') ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                            <path d="M8.75 6h-1.5V3.56L6.03 4.78a.75.75 0 0 1-1.06-1.06l2.5-2.5a.75.75 0 0 1 1.06 0l2.5 2.5a.75.75 0 1 1-1.06 1.06L8.75 3.56V6H11a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h2.25v5.25a.75.75 0 0 0 1.5 0V6Z" />
                        </svg>
                        Barang Masuk
                    </a>
                </li>

                <li>
                    <a class="flex font-bold items-center gap-x-3 py-2 px-2.5 text-base text-slate-500 rounded-lg hover:bg-gray-100" href="<?= site_url('barang-keluar') ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                            <path d="M8 1a.75.75 0 0 1 .75.75V5h-1.5V1.75A.75.75 0 0 1 8 1ZM7.25 5v4.44L6.03 8.22a.75.75 0 0 0-1.06 1.06l2.5 2.5a.75.75 0 0 0 1.06 0l2.5-2.5a.75.75 0 1 0-1.06-1.06L8.75 9.44V5H11a2 2 0 0 1 2 2v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h2.25Z" />
                        </svg>
                        Barang Keluar
                    </a>
                </li>
            <?php endif; ?>

            <?php if (session('peran') == 'admin' || session('peran') == 'pembelian' || session('peran') == 'gudang' || session('peran') == 'manager') : ?>
                <li>
                    <a class="flex font-bold items-center gap-x-3 py-2 px-2.5 text-base text-slate-500 rounded-lg hover:bg-gray-100" href="<?= site_url('permintaan') ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                            <path fill-rule="evenodd" d="M1 8.74c0 .983.713 1.825 1.69 1.943.904.108 1.817.19 2.737.243.363.02.688.231.85.556l1.052 2.103a.75.75 0 0 0 1.342 0l1.052-2.103c.162-.325.487-.535.85-.556.92-.053 1.833-.134 2.738-.243.976-.118 1.689-.96 1.689-1.942V4.259c0-.982-.713-1.824-1.69-1.942a44.45 44.45 0 0 0-10.62 0C1.712 2.435 1 3.277 1 4.26v4.482Zm3-3.49a.75.75 0 0 1 .75-.75h6.5a.75.75 0 0 1 0 1.5h-6.5A.75.75 0 0 1 4 5.25ZM4.75 7a.75.75 0 0 0 0 1.5h2.5a.75.75 0 0 0 0-1.5h-2.5Z" clip-rule="evenodd" />
                        </svg>
                        Permintaan Barang
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</div>