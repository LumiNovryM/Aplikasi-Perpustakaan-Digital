<section class="bg-white dark:bg-gray-900">
    <div class="max-w-screen-xl px-4 py-8 mx-auto lg:py-24 lg:px-6">
        <div class="max-w-screen-md mx-auto mb-8 text-center lg:mb-12">
            <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">Ratusan Buku Menarik
            </h2>
            <p class="mb-5 font-light text-gray-500 sm:text-xl dark:text-gray-400">Cari dan pinjam buku yang anda
                inginkan.</p>
        </div>
        <div class="space-y-8 flex items-center sm:gap-6 xl:gap-10 lg:space-y-0">
            {{-- List Buku --}}
            @forelse ($buku as $item)
                <div
                    class="flex flex-col max-w-lg p-6 mx-auto text-center text-gray-900 bg-white border border-gray-100 rounded-lg shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                    <h3 class="mb-4 text-2xl font-semibold">{{ $item->judul }}</h3>
                    <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">{{ $item->penulis }}</p>
                    <div class="mx-auto items-center justify-center my-8 w-[100px]">
                      <img src="{{ asset('storage/buku/'. $item->sampul) }}" alt="{{ $item->judul }}">
                    </div>
                    <!-- List -->
                    <ul role="list" class="mb-8 space-y-4 text-left">
                        <li class="flex items-center space-x-3">
                            <i class="fa-solid fa-user"></i>
                            <span>Penerbit: {{ $item->penerbit }}</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <i class="fa-solid fa-calendar-days"></i>
                            <span>Tahun Terbit: {{ $item->tahun_terbit }}</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <i class="fa-solid fa-book"></i>
                            <span>Stock Buku: <span class="font-semibold">{{ $item->stock }}</span></span>
                        </li>
                       
                        <li class="flex items-center space-x-3">
                            @if ($item->stock != 0)
                            <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                                <span><span class="font-semibold">Tersedia</span></span>
                            @else
                            <i class="fa-solid fa-xmark text-red-600"></i>
                                <span<span class="font-semibold">Tidak Tersedia</span></span>
                            @endif
                        </li>
                    </ul>
                    <a href="#"
                        class="text-white bg-purple-600 hover:bg-purple-700 focus:ring-4 focus:ring-purple-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:text-white  dark:focus:ring-purple-900">Lihat</a>
                </div>
            @empty
                <div
                    class="flex flex-col max-w-lg p-6 mx-auto text-center text-gray-900 bg-white border border-gray-100 rounded-lg shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                    <h3 class="mb-4 text-2xl font-semibold">Maaf</h3>
                    <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">Data Buku Kosong</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
