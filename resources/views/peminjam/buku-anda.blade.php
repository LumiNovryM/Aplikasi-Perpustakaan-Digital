<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Responsive book website - Bedimcode</title>
</head>

{{-- Flowbite CSS --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"
    integrity="sha512-4CrzvWKAMiv1znMPFPA/lqlo9ykTDj9GdHwq3iujHBNSnopB7UpRz45dQ/gGn5ed7DF1NsA8OmUp7YHEV+mFKg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

{{-- TailwindCSS --}}
<script src="https://cdn.tailwindcss.com"></script>


<style>
    .rate {
        float: left;
        height: 46px;
        padding: 0 10px;
    }

    .rate:not(:checked)>input {
        position: absolute;
        display: none;
    }

    .rate:not(:checked)>label {
        float: right;
        width: 1em;
        overflow: hidden;
        white-space: nowrap;
        cursor: pointer;
        font-size: 30px;
        color: #ccc;
    }

    .rated:not(:checked)>label {
        float: right;
        width: 1em;
        overflow: hidden;
        white-space: nowrap;
        cursor: pointer;
        font-size: 30px;
        color: #ccc;
    }

    .rate:not(:checked)>label:before {
        content: '★ ';
    }

    .rate>input:checked~label {
        color: #ffc700;
    }

    .rate:not(:checked)>label:hover,
    .rate:not(:checked)>label:hover~label {
        color: #deb217;
    }

    .rate>input:checked+label:hover,
    .rate>input:checked+label:hover~label,
    .rate>input:checked~label:hover,
    .rate>input:checked~label:hover~label,
    .rate>label:hover~input:checked~label {
        color: #c59b08;
    }

    .star-rating-complete {
        color: #c59b08;
    }

    .rating-container .form-control:hover,
    .rating-container .form-control:focus {
        background: #fff;
        border: 1px solid #ced4da;
    }

    .rating-container textarea:focus,
    .rating-container input:focus {
        color: #000;
    }

    .rated {
        float: left;
        height: 46px;
        padding: 0 10px;
    }

    .rated:not(:checked)>input {
        position: absolute;
        display: none;
    }

    .rated:not(:checked)>label {
        float: right;
        width: 1em;
        overflow: hidden;
        white-space: nowrap;
        cursor: pointer;
        font-size: 30px;
        color: #ffc700;
    }

    .rated:not(:checked)>label:before {
        content: '★ ';
    }

    .rated>input:checked~label {
        color: #ffc700;
    }

    .rated:not(:checked)>label:hover,
    .rated:not(:checked)>label:hover~label {
        color: #deb217;
    }

    .rated>input:checked+label:hover,
    .rated>input:checked+label:hover~label,
    .rated>input:checked~label:hover,
    .rated>input:checked~label:hover~label,
    .rated>label:hover~input:checked~label {
        color: #c59b08;
    }

    .product {
        transition: transform 0.3s ease-in-out;
    }

    .product:hover {
        transform: scale(1.05);
    }

    .column {
        display: flex;
        /* gap: 1px; */
        text-align: center;
        flex-wrap: wrap;
    }
</style>

<body>


    <div class="fixed top-4 left-4">
        <a href="{{ route('peminjam.dashboard') }}"
            class="bg-purple-700 text-white font-semibold  py-2 px-4 rounded-md shadow-lg">
            Kembali
        </a>
    </div>

    <section class="bg-white dark:bg-gray-900">
        {{-- Card Book --}}
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
                            <img src="{{ asset('storage/buku/' . $item->buku->sampul) }}"
                                alt="{{ $item->buku->judul }}">
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
                        <button data-modal-target="default-modal-{{ $item->id }}"
                            data-modal-toggle="default-modal-{{ $item->id }}" type="button"
                            class="text-white bg-purple-600 hover:bg-purple-700 focus:ring-4 focus:ring-purple-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:text-white  dark:focus:ring-purple-900">Detail</button>
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


        {{-- Modal --}}
        @foreach ($data->sortByDesc('created_at') as $item)
            <div id="default-modal-{{ $item->id }}" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-2xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div
                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Pengembalian Buku
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="default-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 md:p-5 space-y-4 flex justify-between items-center flex-row">
                            {{-- Book Description --}}
                            <div
                                class="items-center bg-gray-50 rounded-lg shadow sm:flex dark:bg-gray-800 dark:border-gray-700">
                                <a href="#">
                                    <img class="w-full rounded-lg sm:rounded-none sm:rounded-l-lg"
                                        src="{{ asset('storage/buku/' . $item->buku->sampul) }}"
                                        alt="{{ $item->buku->judul }}">
                                </a>
                                <div class="p-5">
                                    <h3 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        <a href="#">{{ $item->buku->judul }}</a>
                                    </h3>
                                    <span class="text-gray-500 dark:text-gray-400">{{ $item->buku->penulis }}</span>
                                    <p class="mt-3 mb-4 font-light text-gray-500 dark:text-gray-400">Tahun Terbit :
                                        {{ $item->buku->tahun_terbit }}</p>
                                    <p class="mt-3 mb-4 font-light text-gray-500 dark:text-gray-400">Penerbit :
                                        {{ $item->buku->penerbit }}</p>
                                    <p class="mt-3 mb-4 font-light text-gray-500 dark:text-gray-400">Stock :
                                        {{ $item->buku->stock }}</p>
                                    <p class="mt-3 mb-4 font-light text-gray-500 dark:text-gray-400">Rate :<span
                                            class="text-yellow-400">
                                            ★{{ number_format($item->buku->ulasan->avg('rating'), 1) }}/5
                                        </span></p>
                                </div>
                            </div>
                            {{-- Form Rating & Ulasan --}}
                            <div
                                class="items-center bg-gray-50 rounded-lg shadow sm:flex dark:bg-gray-800 dark:border-gray-700 p-5">
                                <form action="{{ route('pengembalian.buku', ['id' => $item->peminjaman->id]) }}"
                                    method="POST">
                                    @csrf
                                    <input type="hidden" name="booking_id" value="{{ $item->peminjaman->id }}">
                                    @if ($item->buku->ulasan->where('user_id', Auth::user()->id))
                                    <div class="form-group">
                                        
                                    </div>
                                    @else
                                        <div class="form-group">
                                            <div class="rate">
                                                <input type="radio" id="star5_{{ $item->id }}" class="rate"
                                                    name="rating" value="5" />
                                                <label for="star5_{{ $item->id }}" title="5 stars">5 stars</label>
                                                <input type="radio" id="star4_{{ $item->id }}" class="rate"
                                                    name="rating" value="4" />
                                                <label for="star4_{{ $item->id }}" title="4 stars">4
                                                    stars</label>
                                                <input type="radio" id="star3_{{ $item->id }}" class="rate"
                                                    name="rating" value="3" />
                                                <label for="star3_{{ $item->id }}" title="3 stars">3
                                                    stars</label>
                                                <input type="radio" id="star2_{{ $item->id }}" class="rate"
                                                    name="rating" value="2">
                                                <label for="star2_{{ $item->id }}" title="2 stars">2
                                                    stars</label>
                                                <input type="radio" id="star1_{{ $item->id }}" class="rate"
                                                    name="rating" value="1" />
                                                <label for="star1_{{ $item->id }}" title="1 star">1 star</label>
                                            </div>
                                            @error('rating')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <textarea disabled
                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-purple-700 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            name="comment" rows="6" placeholder="Comment" maxlength="200">
@foreach ($item->buku->ulasan->where('user_id', Auth::user()->id) as $ulasan)
{{ $ulasan->ulasan }}
@endforeach
</textarea>
                                        @error('comment')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div
                            class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                            @if ($item->buku->ulasan->where('user_id', Auth::user()->id))
                                <button disabled data-modal-hide="default-modal" type="submit"
                                class="text-white bg-purple-700 hover:bg-purpl-800 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">Anda Sudah Memberikan Rating</button>
                            @else
                                <button data-modal-hide="default-modal" type="submit"
                                class="text-white bg-purple-700 hover:bg-purpl-800 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">Nilai dan Kembalikan</button>
                            @endif
                            
                            <button data-modal-hide="default-modal" type="button"
                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Batal</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </section>





    @foreach ($data->sortByDesc('created_at') as $item)
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

                        @if ($item->peminjaman->status_peminjaman == 'Dipinjam' && $item->peminjaman->status_tunggu == 'idle')
                            <!-- Form for Ulasan dan Rating -->
                            <form action="{{ route('pengembalian.buku', ['id' => $item->peminjaman->id]) }}"
                                method="POST">
                                @csrf
                                <input type="hidden" name="booking_id" value="{{ $item->peminjaman->id }}">
                                <div class="form-group">
                                    <div class="rate">
                                        <input type="radio" id="star5_{{ $item->id }}" class="rate"
                                            name="rating" value="5" />
                                        <label for="star5_{{ $item->id }}" title="5 stars">5
                                            stars</label>
                                        <input type="radio" id="star4_{{ $item->id }}" class="rate"
                                            name="rating" value="4" />
                                        <label for="star4_{{ $item->id }}" title="4 stars">4
                                            stars</label>
                                        <input type="radio" id="star3_{{ $item->id }}" class="rate"
                                            name="rating" value="3" />
                                        <label for="star3_{{ $item->id }}" title="3 stars">3
                                            stars</label>
                                        <input type="radio" id="star2_{{ $item->id }}" class="rate"
                                            name="rating" value="2">
                                        <label for="star2_{{ $item->id }}" title="2 stars">2
                                            stars</label>
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
                                    <button type="submit" class="btn btn-success">Kembalikan & beri
                                        rating</button>
                                </div>
                            </form>
                        @elseif ($item->peminjaman->status_peminjaman == 'Dipinjam' && $item->peminjaman->status_tunggu == 'pengembalian')
                            <p class="card-text"><strong>Status peminjaman : Menunggu Di Approve oleh
                                    petugas</strong></p>
                            <button class="btn btn-outline-dark flex-shrink-0 btn-lg" type="button"
                                data-bs-dismiss="modal">
                                Tutup
                            </button>
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


    {{-- Flowbite JS --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"
        integrity="sha512-eNB1lPVKSAW5mXqnboj6QX9kTZKEq4t2f2c5ytUhb+QzPudY3imnjHyXYhIXavZo9e3slCjhDpOJhuMm9uSwzw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>
