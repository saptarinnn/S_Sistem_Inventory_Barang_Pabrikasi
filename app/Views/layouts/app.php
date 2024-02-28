<!DOCTYPE html>
<html lang="en">

<head>
    <?= $this->include('layouts/_head') ?>
</head>

<body class="bg-gray-50">
    <!-- ========== HEADER ========== -->
    <?= $this->include('layouts/_navbar') ?>
    <!-- ========== END HEADER ========== -->

    <!-- ========== MAIN CONTENT ========== -->
    <!-- Sidebar Toggle -->
    <div class="sticky top-0 inset-x-0 z-20 bg-white border-y px-4 sm:px-6 md:px-8 lg:hidden">
        <div class="flex items-center py-4">
            <!-- Navigation Toggle -->
            <button type="button" class="text-gray-500 hover:text-gray-600" data-hs-overlay="#application-sidebar" aria-controls="application-sidebar" aria-label="Toggle navigation">
                <span class="sr-only">Toggle Navigation</span>
                <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="3" x2="21" y1="6" y2="6" />
                    <line x1="3" x2="21" y1="12" y2="12" />
                    <line x1="3" x2="21" y1="18" y2="18" />
                </svg>
            </button>
            <!-- End Navigation Toggle -->

            <!-- Breadcrumb -->
            <ol class="ms-3 flex items-center whitespace-nowrap" aria-label="Breadcrumb">
                <li class="flex items-center text-sm text-gray-800">
                    Application Layout
                    <svg class="flex-shrink-0 mx-3 overflow-visible size-2.5 text-gray-400" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 1L10.6869 7.16086C10.8637 7.35239 10.8637 7.64761 10.6869 7.83914L5 14" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    </svg>
                </li>
                <li class="text-sm font-semibold text-gray-800 truncate" aria-current="page">
                    Dashboard
                </li>
            </ol>
            <!-- End Breadcrumb -->
        </div>
    </div>
    <!-- End Sidebar Toggle -->

    <!-- Sidebar -->
    <?= $this->include('layouts/_sidebar') ?>
    <!-- End Sidebar -->

    <!-- Content -->
    <div class="w-full pt-10 px-4 sm:px-6 md:px-8 lg:ps-72">
        <!-- Page Heading -->
        <header>
            <!-- Starter Pages & Examples -->
            <p class="font-bold text-blue-600"> <?= $this->renderSection('sub-title') ?></p>
            <h1 class="block text-2xl font-bold text-gray-800 sm:text-3xl"><?= $this->renderSection('main-title') ?></h1>
            <?= $this->renderSection('content') ?>
        </header>
        <!-- End Page Heading -->
    </div>
    <!-- End Content -->
    <!-- ========== END MAIN CONTENT ========== -->
    <?= $this->include('layouts/_script') ?>

    <?= $this->renderSection('script') ?>

</body>

</html>