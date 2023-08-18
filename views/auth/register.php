<?php

require __DIR__.'/../../controllers/RegisterController.php';
require __DIR__ . '/../header.php';

?>
<?php
/**
 * Return the error class if error is found in the array $errors
 *
 * @param array $errors
 * @param string $field
 * @return string
 */
function error_class(array $errors, string $field): string
{
    return isset($errors[$field]) ? 'error' : '';
}
?>




<div class="min-h-screen flex flex-col justify-center py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <img class="mx-auto h-10 w-auto" src="https://www.svgrepo.com/show/301692/login.svg" alt="Workflow">
        <h2 class="mt-6 text-center text-3xl leading-9 font-extrabold text-gray-900">
            Create a new account
        </h2>
        <p class="mt-2 text-center text-sm leading-5 text-gray-500 max-w">
            Or
            <a href="login.php" class="font-medium text-blue-600 hover:text-blue-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                login to your account
            </a>
        </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
            <form action="<?php $_PHP_SELF ?>" method="POST">

                <div class="mt-6">
                    <label for="username" class="block text-sm font-medium leading-5 text-gray-700">Username</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input id="username" name="username" placeholder="john" type="text" required="" value="<?= $inputs['username'] ?? '' ?>" class="<?= error_class($errors, 'username') ?> appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                        <small class="text-red-500 text-xs italic"><?= $errors['username'] ?? '' ?></small>
                    </div>
                </div>

                <div class="mt-6">
                    <label for="email" class="block text-sm font-medium leading-5  text-gray-700">
                        Email address
                    </label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input id="email" name="email" placeholder="user@example.com" type="email" required="" value="<?= $inputs['email'] ?? '' ?>" class="<?= error_class($errors, 'email') ?> appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                        <small class="text-red-500 text-xs italic"><?= $errors['email'] ?? '' ?></small>
                        <div class="hidden absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">

                        </div>
                    </div>
                </div>

                <div class="mt-6">
                    <label for="password" class="block text-sm font-medium leading-5 text-gray-700">
                        Password
                    </label>
                    <div class="mt-1 rounded-md shadow-sm">
                        <input id="password" name="password" type="password" required="" value="<?= $inputs['password'] ?? '' ?>" class="<?= error_class($errors, 'password') ?> appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                        <small class="text-red-500 text-xs italic"><?= $errors['password'] ?? '' ?></small>
                    </div>
                </div>

                <div class="mt-6">
                    <label for="password2" class="block text-sm font-medium leading-5 text-gray-700">
                        Confirm Password
                    </label>
                    <div class="mt-1 rounded-md shadow-sm">
                        <input type="password" name="password2" id="password2" value="<?= $inputs['password2'] ?? '' ?>" required="" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                        <small class="text-red-500 text-xs italic"><?= $errors['password2'] ?? '' ?></small>
                    </div>
                </div>


                <div class="mt-6">
                    <label for="agree">
                        <input type="checkbox" name="agree" id="agree" value="checked" <?= $inputs['agree'] ?? '' ?> /> I
                        agree
                        with the term of services
                    </label>
                    <small class="text-red-500 text-xs italic"><?= $errors['agree'] ?? '' ?></small>
                </div>

                <div class="mt-6">
                    <span class="block w-full rounded-md shadow-sm">
                        <button type="submit" class="<?= error_class($errors, 'password2') ?> group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Create account
                        </button>
                    </span>
                </div>
            </form>

        </div>
    </div>
</div>


<?php
require __DIR__ . '/../footer.php';
?>