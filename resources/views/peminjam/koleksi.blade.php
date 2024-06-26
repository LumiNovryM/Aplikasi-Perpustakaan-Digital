<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <section class="py-2">
    
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
                    Favorite Books
                </h2>
                <div class="featured__container container">
                    <div class="featured__swiper ">
                        <div class="column">
                            @forelse($data->sortByDesc('created_at') as $item)
                            {{-- @if ($item->buku->status_tunggu !== 'tunggu')  --}}
                                <article class="featured__card swiper-slide">
                                    <img src="{{ asset('storage/buku/' . $item->buku->sampul) }}" alt="" class="featured__img">
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
                                        <span class="featured__discount">
                                            {{ $item->peminjaman->status_peminjaman }}
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
                            {{-- @endif --}}
                            @empty
                                <p>No featured books available</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </section>
            @foreach($data->sortByDesc('created_at') as $item)
            <div class="modal fade" id="ModalBuku_{{ $item->id }}" tabindex="-1" aria-labelledby="ModalBukuLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="ModalBukuLabel">Buku yang dipinjam</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
    
                            @if ($item->peminjaman->status_peminjaman == 'Dipinjam' && $item->peminjaman->status_tunggu == "idle")
                            <!-- Form for Ulasan dan Rating -->
                            <form action="{{ route('pengembalian.buku', ['id' => $item->peminjaman->id]) }}" method="POST">
                                @csrf
                                <input type="hidden" name="booking_id" value="{{ $item->peminjaman->id }}">
                                <div class="form-group">
                                    <div class="rate">
                                        <input type="radio" id="star5_{{ $item->id }}" class="rate" name="rating" value="5"/>
                                        <label for="star5_{{ $item->id }}" title="5 stars">5 stars</label>
                                        <input type="radio" id="star4_{{ $item->id }}" class="rate" name="rating" value="4"/>
                                        <label for="star4_{{ $item->id }}" title="4 stars">4 stars</label>
                                        <input type="radio" id="star3_{{ $item->id }}" class="rate" name="rating" value="3"/>
                                        <label for="star3_{{ $item->id }}" title="3 stars">3 stars</label>
                                        <input type="radio" id="star2_{{ $item->id }}" class="rate" name="rating" value="2">
                                        <label for="star2_{{ $item->id }}" title="2 stars">2 stars</label>
                                        <input type="radio" id="star1_{{ $item->id }}" class="rate" name="rating" value="1"/>
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
                                    <button type="submit" class="btn btn-success">Kembalikan & beri rating</button>
                                </div>
                            </form>
                            @elseif ($item->peminjaman->status_peminjaman == 'Dipinjam' && $item->peminjaman->status_tunggu == "pengembalian")
                            <p class="card-text"><strong>Status peminjaman : Menunggu Di Approve oleh petugas</strong></p>
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
            
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>