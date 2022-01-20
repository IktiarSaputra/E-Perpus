<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Str;
use App\Models\Peminjam;
use Auth;
use App\Models\Notification;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pinjam = Peminjam::where('user_id',auth()->user()->id)->get();
        $dikembalikan = Peminjam::where('user_id',auth()->user()->id)->where('status','3')->get();
        $belumdikembalikan = Peminjam::where('user_id',auth()->user()->id)->where('status','2')->get();
        return view('home',compact('pinjam','dikembalikan','belumdikembalikan'));
    }

    public function book()
    {
        $book = Book::all();
        $invoice = Str::random(12);
        return view('buku', compact('book','invoice'));
    }

    public function pinjam(Request $request)
    {
        $pinjam = Peminjam::create([
            'invoice' => $request->invoice,
            'book_id' => $request->book_id,
            'user_id' => $request->user_id,
            'start' => $request->start,
            'end' => $request->end,
            'status' => "0",
        ]);

        return redirect()->back()->with('pinjam',"sukses");
    }

    public function list_dipinjam()
    {
        $pinjam = Peminjam::all();
        $datenow = \Carbon\Carbon::now()->format('Y-m-d');
        foreach ($pinjam as $key => $value) {
            if ($datenow >= $value->end) {
                $pinjaman = Peminjam::find($value->id);
                $pinjaman->update([
                    'status' => "2",
                ]);

                $notification = Notification::create([
                    'title' => "Buku Belum DiKembalikan",
                    'user_id' => auth()->user()->id,
                    'status' => 0,
                    'text' => "Buku Yang Anda Pinjam Belum Dikembalikan Segera Kembalikan Buku , Jika Anda Tidak Ingin Dikenakan Denda"
                ]);
            }
        }
        $notif = Notification::where('user_id',auth()->user()->id)->get();
        return view('list_pinjam', compact('pinjam','notif'));
    }

    public function notif()
    {
        $user_id = Auth::user()->id;
        $notif = Notification::where('user_id', $user_id)->where('status','0')->first();
        $notif->update([
            'status' => 1,
        ]);
    }
}
