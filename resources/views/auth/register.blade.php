<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>

    {{-- Flowbite CSS --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"
        integrity="sha512-4CrzvWKAMiv1znMPFPA/lqlo9ykTDj9GdHwq3iujHBNSnopB7UpRz45dQ/gGn5ed7DF1NsA8OmUp7YHEV+mFKg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- TailwindCSS --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 dark:bg-gray-900">

    <div class="fixed top-4 left-4">
        <a href="{{ redirect()->back()->getTargetUrl() }}"
            class="bg-purple-700 text-white font-semibold  py-2 px-4 rounded-md shadow-lg">
            Kembali
        </a>
    </div>

    <section>
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto my-[100px] md:h-screen lg:py-0">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                <img src="{{ asset('asset/images/logo.svg') }}" class="h-6 mr-3 sm:h-9" alt="Landwind Logo" />
                PustakaPlus
            </a>
            <div
                class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1
                        class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Create and account
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="{{ route('register_action') }}" method="POST">
                        @csrf
                        <div>
                            <label for="username"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                username</label>
                            <input type="text" name="username" id="username"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="john_doe" required="">
                        </div>
                        <div>
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                email</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="name@company.com" required="">
                        </div>
                        <div>
                            <label for="fullname"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                fullname</label>
                            <input type="text" name="name_lengkap" id="fullname"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="John Doe" required="">
                        </div>
                        <div>
                            <label for="address"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                address</label>
                            <input type="text" name="alamat" id="address"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Street Pekapuran" required="">
                        </div>
                        <div>
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required="">
                        </div>
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="terms" checked aria-describedby="terms" type="checkbox"
                                    class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800"
                                    required="">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="terms" class="font-light text-gray-500 dark:text-gray-300">I accept the
                                    <a class="font-medium text-primary-600 hover:underline dark:text-primary-500"
                                        href="#">Terms and Conditions</a></label>
                            </div>
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Create
                            an account</button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Already have an account? <a href="{{ route('login') }}"
                                class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign In
                                here</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>

    {{-- Flowbite JS --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"
        integrity="sha512-eNB1lPVKSAW5mXqnboj6QX9kTZKEq4t2f2c5ytUhb+QzPudY3imnjHyXYhIXavZo9e3slCjhDpOJhuMm9uSwzw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>
