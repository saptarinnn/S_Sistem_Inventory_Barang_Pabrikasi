<?= $this->extend('layouts/app') ?>

<?= $this->section('sub-title') ?> <?= $sub_title ?> <?= $this->endSection() ?>
<?= $this->section('main-title') ?>Edit <?= $main_title ?> <?= $this->endSection() ?>

<?= $this->section('content') ?>


<div class="w-full py-5 mx-auto">
    <!-- Card -->
    <div class="p-4 bg-white shadow rounded-xl sm:p-7">

        <form method="post" action="<?= site_url('users/' . $user->id . '/update') ?>">
            <?= csrf_field(); ?>
            <!-- Username -->
            <div class="mb-4">
                <label for="username" class="block mb-2 font-bold">Username</label>
                <input type="text" id="username" name="username" class="block w-full px-3 py-2 font-bold border border-gray-200 rounded-lg" placeholder="Input username" required value="<?= $user->username ?>" />
                <!-- Error -->
                <?php if ($validation->getError('username')) : ?>
                    <div class='mt-1 mb-4 font-bold text-red-500'>
                        <?= $error = $validation->getError('username'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Role -->
            <div class="mb-4">
                <label for="role" class="block mb-2 font-bold">Role</label>
                <select name="role" id="role" required class="block w-full px-3 py-2 font-bold border border-gray-200 rounded-lg">
                    <option value="">Select One</option>
                    <?php foreach ($roles as $role) : ?>
                        <option value="<?= $role ?>" <?= ($role == $user->role) ? 'selected' : '' ?>><?= ucwords($role) ?></option>
                    <?php endforeach; ?>
                </select>
                <!-- Error -->
                <?php if ($validation->getError('role')) : ?>
                    <div class='mt-1 mb-4 font-bold text-red-500'>
                        <?= $error = $validation->getError('role'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Fullname -->
            <div class="mb-4">
                <label for="fullname" class="block mb-2 font-bold">Fullname</label>
                <input type="text" id="fullname" name="fullname" class="block w-full px-3 py-2 font-bold border border-gray-200 rounded-lg" placeholder="Input fullname" required value="<?= $user->fullname ?>" />
                <!-- Error -->
                <?php if ($validation->getError('fullname')) : ?>
                    <div class='mt-1 mb-4 font-bold text-red-500'>
                        <?= $error = $validation->getError('fullname'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Button -->
            <div class="w-full">
                <button type="submit" class="w-full py-3 font-semibold text-white rounded-lg bg-slate-600 hover:bg-slate-700">Save Data</button>
            </div>
        </form>

    </div>
    <!-- End Card -->
</div>

<?= $this->endSection() ?>