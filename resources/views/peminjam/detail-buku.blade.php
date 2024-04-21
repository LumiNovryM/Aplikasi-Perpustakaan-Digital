@php
    use Carbon\Carbon;    
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Buku</title>


    {{-- Flowbite CSS --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"
        integrity="sha512-4CrzvWKAMiv1znMPFPA/lqlo9ykTDj9GdHwq3iujHBNSnopB7UpRz45dQ/gGn5ed7DF1NsA8OmUp7YHEV+mFKg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- TailwindCSS --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="bg-gray-50">

    <div class="fixed top-4 left-4">
        <a href="{{ redirect()->back()->getTargetUrl() }}"
            class="bg-purple-700 text-white font-semibold  py-2 px-4 rounded-md shadow-lg">
            Kembali
        </a>
    </div>


    <section class="py-8 bg-gray-50 md:py-16 dark:bg-gray-900 antialiased">
        <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
            <div class="lg:grid lg:grid-cols-2 lg:gap-8 xl:gap-16">
                <div class="shrink-0 max-w-md lg:max-w-lg mx-auto">
                    <img class="w-full dark:hidden" src="{{ asset('storage/buku/' . $buku->sampul) }}"
                        alt="{{ $buku->judul }}" />
                    <img class="w-full hidden dark:block" src="{{ asset('storage/buku/' . $buku->sampul) }}"
                        alt="{{ $buku->judul }}" />
                </div>

                <div class="mt-6 sm:mt-8 lg:mt-0">
                    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                        {{ $buku->judul }}
                    </h1>
                    <div class="mt-2 sm:items-center sm:gap-4 sm:flex">
                        <p class="font-semibold text-gray-900 sm:text-3xl dark:text-white">
                            Penulis : {{ $buku->penulis }}
                        </p>
                    </div>
                    <div class="mt-2 sm:items-center sm:gap-4 sm:flex">
                        <p class="font-semibold text-gray-900 sm:text-3xl dark:text-white">
                            Penerbit : {{ $buku->penerbit }}
                        </p>
                    </div>
                    <div class="mt-2 sm:items-center sm:gap-4 sm:flex">
                        <p class="font-semibold text-gray-900 sm:text-3xl dark:text-white">
                            Tahun Terbit : {{ $buku->tahun_terbit }}
                        </p>
                    </div>
                    <div class="mt-2 sm:items-center sm:gap-4 sm:flex">
                        <p class="font-semibold text-gray-900 sm:text-3xl dark:text-white">
                            Jumlah Stock : {{ $buku->stock }}
                        </p>
                    </div>
                    <div class="mt-2 sm:items-center sm:gap-4 sm:flex">
                        <p class="font-semibold text-gray-900 sm:text-3xl dark:text-white">
                            @php
                                $ratingValue = $buku->ulasan->avg('rating'); // Dapatkan nilai rating dari database
                                $fullStars = (int) $ratingValue;
                                $halfStar = $ratingValue - $fullStars >= 0.5;
                                $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
                            @endphp

                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $fullStars)
                                    ⭐️ <!-- Bintang penuh -->
                                @elseif ($i == $fullStars + 1 && $halfStar)
                                    🌟 <!-- Bintang setengah -->
                                @else
                                    ☆ <!-- Bintang kosong -->
                                @endif
                            @endfor
                        </p>
                    </div>

                    <div class="mt-6 sm:gap-4 sm:items-center sm:flex sm:mt-8">
                        <form action="{{ route('addFavorite', $buku->id) }}" method="POST">
                            @csrf
                            <button type="submit" title=""
                                class="flex items-center justify-center py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                                role="button">
                                <svg class="w-5 h-5 -ms-2 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z" />
                                </svg>
                                Add to favorites
                            </button>
                        </form>


                        @if ($buku->stock == 0)
                            <a href="#" title=""
                                class="justmt-4 sm:mt-0 text-white bg-purple-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 border font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800 flex items-center justify-center"
                                role="button">
                                <i class="fa-solid fa-xmark text-red-600"></i>
                                &nbsp;
                                <span<span class="font-semibold">Tidak Tersedia</span></span>
                            </a>
                        @else
                            {{-- Logika Peminjaman --}}
                            @auth
                                @php
                                    $role = auth()->user()->role;
                                @endphp

                                @if ($role == 'peminjam')
                                    @if (isset($status) && $status->status_tunggu === 'tunggu' && $status->status_peminjaman === null)
                                        <form action="{{ route('peminjam.buku', ['id' => $buku->id]) }}" method="POST"
                                            class="d-flex">
                                            @csrf
                                            <button disabled
                                                class="flex items-center justify-center py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                                                type="submit">
                                                <i class="fa-solid fa-clock"></i>
                                                &nbsp;
                                                Menunggu Approval Pinjaman
                                            </button>
                                        </form>
                                    @elseif (isset($status) && $status->status_tunggu === 'idle' && $status->status_peminjaman === 'Dipinjam')
                                        <form action="{{ route('peminjam.buku', ['id' => $buku->id]) }}" method="POST"
                                            class="d-flex">
                                            @csrf
                                            <button disabled
                                                class="flex items-center justify-center py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                                                type="submit">
                                                <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400"
                                                    fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                &nbsp;
                                                Pinjaman Anda Telah Di Approve
                                            </button>
                                        </form>
                                    @elseif(isset($status) && $status->status_tunggu === 'pengembalian')
                                        <form action="{{ route('peminjam.buku', ['id' => $status->id]) }}" method="POST"
                                            class="d-flex">
                                            @csrf
                                            <button disabled
                                                class="flex items-center justify-center py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                                                type="submit">
                                                <i class="fa-solid fa-clock"></i>
                                                &nbsp;
                                                Menunggu Approval Pengembalian
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('peminjam.buku', ['id' => $buku->id]) }}" method="POST"
                                            class="d-flex">
                                            @csrf
                                            <button
                                                class="flex items-center justify-center py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                                                type="submit">
                                                <i class="bi bi-book-half"></i>
                                                Pinjam
                                            </button>
                                        </form>
                                    @endif
                                @elseif($role == 'admin' || $role == 'petugas')
                                    <form action="{{ route('peminjam.buku', ['id' => $buku->id]) }}" method="POST"
                                        class="d-flex">
                                        @csrf
                                        <button
                                            class="flex items-center justify-center py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                                            type="button" disabled>
                                            <i class="bi bi-book-half"></i>
                                            Pinjam
                                        </button>
                                    </form>
                                @endif

                            @endauth
                            {{-- Logika Peminjaman --}}
                            <a href="#" title=""
                                class="mt-4 sm:mt-0 text-white bg-purple-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 border font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800 flex items-center justify-center"
                                role="button">
                                <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                &nbsp;
                                <span><span class="font-semibold">Tersedia</span></span>
                            </a>
                        @endif
                    </div>

                    <hr class="my-6 md:my-8 border-gray-200 dark:border-gray-800" />


                </div>
            </div>
        </div>

        <section class="bg-white dark:bg-gray-900 py-8 lg:py-16 antialiased">
            <div class="max-w-2xl mx-auto px-4">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Ulasan Buku</h2>
                </div>
                @foreach ($buku->ulasan as $item)
                    <article class="p-6 text-base bg-white rounded-lg dark:bg-gray-900">
                        <footer class="flex justify-between items-center mb-2">
                            <div class="flex items-center">
                                <p
                                    class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold">
                                    <img class="mr-2 w-6 h-6 rounded-full"
                                        src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"
                                        alt="Michael Gough">{{ $item->user->name_lengkap }}
                                </p>
                                <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate
                                        datetime="2022-02-08" title="February 8th, 2022">{{ Carbon::parse($item->created_at)->diffForHumans() }}</time></p>
                            </div>
                            <button id="dropdownComment1Button" data-dropdown-toggle="dropdownComment1"
                                class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 dark:text-gray-400 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                                type="button">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 16 3">
                                    <path
                                        d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                </svg>
                                <span class="sr-only">Comment settings</span>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="dropdownComment1"
                                class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdownMenuIconHorizontalButton">
                                    <li>
                                        <a href="#"
                                            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                                    </li>
                                </ul>
                            </div>
                        </footer>
                        <p class="text-gray-500 dark:text-gray-400">{{ $item->ulasan }}</p>
                        <div class="flex items-center mt-4 space-x-4">
                            <button type="button"
                                class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 font-medium">
                                <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 20 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M5 5h5M5 8h2m6-3h2m-5 3h6m2-7H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z" />
                                </svg>
                                Reply
                            </button>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>
    </section>

    {{-- Flowbite JS --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"
        integrity="sha512-eNB1lPVKSAW5mXqnboj6QX9kTZKEq4t2f2c5ytUhb+QzPudY3imnjHyXYhIXavZo9e3slCjhDpOJhuMm9uSwzw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>
