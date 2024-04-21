@php
    use Carbon\Carbon;    
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ Auth::user()->name_lengkap }} | Profile</title>

    {{-- Flowbite CSS --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"
        integrity="sha512-4CrzvWKAMiv1znMPFPA/lqlo9ykTDj9GdHwq3iujHBNSnopB7UpRz45dQ/gGn5ed7DF1NsA8OmUp7YHEV+mFKg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- TailwindCSS --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-300 antialiased">
    <div class="container mx-auto mt-[100px]">
        <div>

            <div class="bg-white relative shadow rounded-lg w-5/6 md:w-5/6  lg:w-4/6 xl:w-3/6 mx-auto">
                <div class="flex justify-center">
                    <img src="https://avatars0.githubusercontent.com/u/35900628?v=4" alt=""
                        class="rounded-full mx-auto absolute -top-20 w-32 h-32 shadow-md border-4 border-white transition duration-200 transform hover:scale-110">
                </div>

                <div class="mt-16">
                    <h1 class="font-bold text-center text-3xl text-gray-900">{{ Auth::user()->username }}</h1>
                    <p class="text-center text-sm text-gray-400 font-medium">{{ Auth::user()->name_lengkap }}</p>
                    <p>
                        <span>

                        </span>
                    </p>
                    <div class="my-5 px-6">
                        <a href="#" @disabled(true)
                            class="text-gray-200 block rounded-lg text-center font-medium leading-6 px-6 py-3 bg-gray-900 hover:bg-black hover:text-white">{{ Auth::user()->role == 'peminjam' ? 'Peminjam' : '' }}</a>
                    </div>
                    <div class="w-full">
                        <h3 class="font-medium text-gray-900 text-left px-6">Recent activites</h3>
                        <div class="mt-5 w-full flex flex-col items-center overflow-hidden text-sm">
                            @forelse ($data as $item)
                                <a href="#"
                                    class="border-t border-gray-100 text-gray-600 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150">
                                    <img src="{{ asset('asset/images/logo.svg') }}" alt=""
                                        class="rounded-full h-6 shadow-md inline-block mr-2">
                                        @if ($item->status_peminjaman == 'Dipinjam')
                                            {{ Auth::user()->name_lengkap }} Melakukan Peminjaman Buku {{ $item->buku->judul }}
                                        @elseif($item->status_peminjaman == 'Dikembalikan')
                                            {{ Auth::user()->name_lengkap }} Melakukan Pengembalian Buku {{ $item->buku->judul }} 
                                        @endif
                                        <span class="text-gray-500 text-xs">{{ Carbon::parse($item->created_at)->diffForHumans() }}</span>
                                </a>
                            @empty
                                <a href="#"
                                    class="border-t border-gray-100 text-gray-600 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150">
                                    <img src="{{ asset('asset/images/logo.svg') }}" alt=""
                                        class="rounded-full h-6 shadow-md inline-block mr-2">
                                    No Activities
                                </a>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>
