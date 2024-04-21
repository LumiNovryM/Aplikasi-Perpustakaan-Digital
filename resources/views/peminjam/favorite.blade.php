{{-- <section class="py-2">

    <div class="container">
        <div class="pt-10 mx-5">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <section class="featured section" id="featured">
            <h2 class="section__title">
                Featured Books
            </h2>
            <div class="featured__container container">
                <div class="featured__swiper ">
                    <div class="column">
                        @forelse($collection->sortByDesc('created_at') as $item)
                            <article class="featured__card swiper-slide">
                                <img src="{{ asset('storage/buku/' . $item->buku->sampul) }}" alt=""
                                    class="featured__img">
                                <h2 class="featured__title">
                                    {{ $item->buku->judul }}
                                </h2>
                                <h2 class="featured__title">
                                    {{ $item->buku->penulis }}
                                </h2>
                                <div class="featured__prices">
                                    <span class="featured__discount">
                                        {{ $item->buku->penerbit }}
                                    </span>
                                    <span class="featured__discount">
                                        {{ $item->buku->tahun_terbit }}
                                    </span>

                                </div>
                                <button class="button" data-bs-toggle="modal"
                                    data-bs-target="#ModalBuku_{{ $item->id }}" type="button">
                                    Detail
                                </button>
                                <div class="featured__actions">
                                    <button><i class="ri-search-line"></i></button>
                                    <button><i class="ri-heart-fill"></i></button>
                                    <button><i class="ri-eye-line"></i></button>
                                </div>
                            </article>
                        @empty
                            <p>No featured books available</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </section>
        @foreach ($collection->sortByDesc('created_at') as $item)
            <div class="modal fade" id="ModalBuku_{{ $item->id }}" tabindex="-1" aria-labelledby="ModalBukuLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="ModalBukuLabel">Buku yang dipinjam</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <h3 class="card-text">{{ $item->buku->judul }}</h3>
                                    <h5 class="card-text">{{ $item->buku->penulis }}</h5>
                                    <h5 class="card-text">{{ $item->buku->penerbit }}</h5>
                                    <h5 class="card-text">{{ $item->buku->tahun_terbit }}</h5>
                                </div>
                                <div class="col-md-4">
                                    <img src="{{ asset('storage/buku/' . $item->buku->sampul) }}"
                                        class="img-thumbnail w-100 mb-3" style="margin-left: -15px">
                                    <span class="ms-auto text-warning fw-bold d-block text-center rate"><span
                                            class="text-dark">Rate:
                                        </span>★{{ number_format($item->buku->ulasan->avg('rating'), 1) }}/5</span>
                                </div>
                            </div>

                            @if ($item->peminjaman->status_peminjaman == 'Dipinjam')
                                <!-- Form for Ulasan dan Rating -->
                                <form action="{{ route('pengembalian.buku', ['id' => $item->peminjaman->id]) }}"
                                    method="POST">
                                    @csrf
                                    <input type="hidden" name="booking_id" value="{{ $item->peminjaman->id }}">
                                    <div class="form-group">
                                        <div class="rate">
                                            <input type="radio" id="star5_{{ $item->id }}" class="rate"
                                                name="rating" value="5" />
                                            <label for="star5_{{ $item->id }}" title="5 stars">5 stars</label>
                                            <input type="radio" id="star4_{{ $item->id }}" class="rate"
                                                name="rating" value="4" />
                                            <label for="star4_{{ $item->id }}" title="4 stars">4 stars</label>
                                            <input type="radio" id="star3_{{ $item->id }}" class="rate"
                                                name="rating" value="3" />
                                            <label for="star3_{{ $item->id }}" title="3 stars">3 stars</label>
                                            <input type="radio" id="star2_{{ $item->id }}" class="rate"
                                                name="rating" value="2">
                                            <label for="star2_{{ $item->id }}" title="2 stars">2 stars</label>
                                            <input type="radio" id="star1_{{ $item->id }}" class="rate"
                                                name="rating" value="1" />
                                            <label for="star1_{{ $item->id }}" title="1 star">1 star</label>
                                        </div>
                                        @error('rating')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" name="comment" rows="6" placeholder="Comment" maxlength="200"></textarea>
                                        @error('comment')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mt-3 text-right">
                                        <button type="submit" class="btn btn-success">Pengembalian</button>
                                    </div>
                                </form>
                            @else
                                <!-- Informasi peminjaman -->
                                <p class="card-text"><strong>Tanggal Peminjaman:</strong>
                                    {{ date('d-m-Y', strtotime($item->peminjaman->tanggal_peminjaman)) }}</p>
                                <p class="card-text"><strong>Tanggal Pengembalian:</strong>
                                    {{ date('d-m-Y', strtotime($item->peminjaman->tanggal_pengembalian)) }}</p>
                                <button class="btn btn-outline-dark flex-shrink-0 btn-lg" type="button"
                                    data-bs-dismiss="modal">
                                    Tutup
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</section> --}}

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
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Buku Favorite Anda
                </h2>
                <p class="font-light text-gray-500 lg:mb-16 sm:text-xl dark:text-gray-400">Simpan Dulu Kemudian Baca
                    Nanti!🤩</p>
            </div>
            <div class="flex justify-start items-center gap-2 flex-wrap">
                {{-- List Buku --}}
                @forelse ($data as $item)
                    <div
                        class="my-4 flex flex-col max-w-lg p-6 mx-auto text-center text-gray-900 bg-white border border-gray-100 rounded-lg shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                        <h3 class="mb-4 text-2xl font-semibold">{{ $item->buku->judul }}</h3>
                        <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">{{ $item->buku->penulis }}</p>
                        <div class="mx-auto items-center justify-center my-8 w-[100px]">
                            <img src="{{ asset('storage/buku/' . $item->buku->sampul) }}" alt="{{ $item->buku->judul }}">
                        </div>
                        <!-- List -->
                        <ul role="list" class="mb-8 space-y-4 text-left">
                            <li class="flex items-center space-x-3">
                                <i class="fa-solid fa-user"></i>
                                <span>Penerbit: {{ $item->buku->penerbit }}</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <i class="fa-solid fa-calendar-days"></i>
                                <span>Tahun Terbit: {{ $item->buku->tahun_terbit }}</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <i class="fa-solid fa-book"></i>
                                <span>Stock Buku: <span class="font-semibold">{{ $item->buku->stock }}</span></span>
                            </li>

                            <li class="flex items-center space-x-3">
                                @if ($item->buku->stock != 0)
                                    <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
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
                        <a href="{{ route('detail_buku', $item->buku->id) }}"
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

    {{-- Flowbite JS --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"
        integrity="sha512-eNB1lPVKSAW5mXqnboj6QX9kTZKEq4t2f2c5ytUhb+QzPudY3imnjHyXYhIXavZo9e3slCjhDpOJhuMm9uSwzw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>
