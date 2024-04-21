<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buku Favorite</title>

    {{-- Flowbite CSS --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"
        integrity="sha512-4CrzvWKAMiv1znMPFPA/lqlo9ykTDj9GdHwq3iujHBNSnopB7UpRz45dQ/gGn5ed7DF1NsA8OmUp7YHEV+mFKg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- TailwindCSS --}}
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>

    <div class="fixed top-4 left-4">
        <a href="{{ route('peminjam.dashboard') }}"
            class="bg-purple-700 text-white font-semibold  py-2 px-4 rounded-md shadow-lg">
            Kembali
        </a>
    </div>

    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6 ">
            <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">List Buku
                    Berdasarkan Kategori
                </h2>
                <p class="font-light text-gray-500 lg:mb-16 sm:text-xl dark:text-gray-400">Baca Ratusan Buku Sesuai
                    Kategori Kesukaanmu🤩</p>
            </div>
            @forelse ($kategori as $item)
                <div
                    class="my-4 flex flex-col max-w-lg p-6 mx-auto text-center text-gray-900 bg-white border border-gray-100 rounded-lg shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">
                        {{ $item->nama_kategori }}
                    </h2>
                </div>

                <div class="flex flex-wrap justify-center gap-[25px] items-center">
                    @forelse ($buku as $bukuItem)
                        @if ($bukuItem->kategori_id == $item->id)
                            <div class="flex justify-start items-center gap-2 flex-wrap">
                                <div
                                    class="my-4 flex flex-col max-w-lg p-6 mx-auto text-center text-gray-900 bg-white border border-gray-100 rounded-lg shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                                    <h3 class="mb-4 text-2xl font-semibold">{{ $bukuItem->judul }}</h3>
                                    <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">
                                        {{ $bukuItem->penulis }}</p>
                                    <div class="mx-auto items-center justify-center my-8 w-[100px]">
                                        <img src="{{ asset('storage/buku/' . $bukuItem->sampul) }}"
                                            alt="{{ $bukuItem->judul }}">
                                    </div>
                                    <ul role="list" class="mb-8 space-y-4 text-left">
                                    </ul>
                                    <a href="{{ route('detail_buku', $bukuItem->id) }}"
                                        class="text-white bg-purple-600 hover:bg-purple-700 focus:ring-4 focus:ring-purple-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:text-white  dark:focus:ring-purple-900">Lihat</a>
                                </div>
                            </div>
                        @else
                        @endif
                    @empty
                    @endforelse
                </div>

            @empty
                <div
                    class="my-4 flex flex-col max-w-lg p-6 mx-auto text-center text-gray-900 bg-white border border-gray-100 rounded-lg shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">
                        Tidak Ada Kategori
                    </h2>
                </div>
            @endforelse
        </div>
    </section>

    {{-- Flowbite JS --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"
        integrity="sha512-eNB1lPVKSAW5mXqnboj6QX9kTZKEq4t2f2c5ytUhb+QzPudY3imnjHyXYhIXavZo9e3slCjhDpOJhuMm9uSwzw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>
