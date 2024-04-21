<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\User;
use App\Models\Ulasan;
use App\Models\Koleksi;
use App\Models\Favorite;
use App\Models\Kategori;
use App\Models\Peminjaman;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KoleksiController extends Controller
{
    public function index()
    {
        $favorite = Favorite::with(['user','buku'])->get();

        return view('peminjam.favorite', ['data' => $favorite]);
    }

    public function AddFavorite($id)
    {
        try{
            $user_id = Auth::user()->id;
            $data = Favorite::where('user_id', $user_id)->where('buku_id', $id)->get()->first();
            if($data){
                return redirect()->route('favorite.index')->with('message', 'Buku Sudah Pernah Ditambahkan');
            }else{

                $buku_id = $id;
                Favorite::insert([
                    'user_id' => $user_id,
                    'buku_id' => $buku_id
                ]);
            }
            return redirect()->route('favorite.index')->with('message', 'Favorite Baru Ditambahkan');
        } catch (\Exception $e){
            return redirect()->route('peminjam.dashboard')->with('message', 'Favorite Gagal Ditambahkan');
        }   
    }
}
