<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penerbit;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public $buku;
     public function __construct()
     {
         $this->buku = new Buku();
     }
    public function index()
    {
        //

        $data = Buku::all();
        return view('buku.index',compact('data'));
    }
    public function Pengadaan()
    {
        $data = Buku::orderBy('stok', 'asc')
        ->get();
        
        // $data = Buku::all();
        return view('pengadaan.index',compact('data'));
    }
    public function dashboard(Request $request)
    {
        //
        $cari = $request->get('search');
        $data = Buku::where('nama_buku', 'like', "%$cari%");
        // $data = Buku::all();
        return view('dashboard',compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data = Kategori::all();
        $penerbit = Penerbit::all();
        return view('buku.create',compact('data','penerbit'));
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $rules = [
            'kode' => 'required|min:5|max:25|unique:buku,kode',
            'nama_buku' => 'required|min:3|max:250',
            'harga' => 'required',
            'stok' => 'required',
            'kategori' => 'required',
            'penerbit' => 'required',
           

        ];
        $messages = [
            'required' => ':attribute gak boleh kosong ',
            'unique' => ':attribute sudah ada, silahkan gunakan yang lain',
            'max' => ' jumlah :attribute terlalu banyak',
            'min' => 'jumlah :attribute terlalu terlalu sedikit',
        ];
        $this->validate($request, $rules, $messages);
       
        $this->buku->kode = $request->kode;
        $this->buku->nama_buku = $request->nama_buku;
        $this->buku->harga = $request->harga;
        $this->buku->stok = $request->stok;
        $this->buku->kategori_id = $request->kategori;
        $this->buku->penerbit_id = $request->penerbit;


        
        
        $this->buku->save();
        Alert::success('Successpull', 'Data Berhasil di Tambahkan');
        return redirect()->route('buku.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $ktg = Kategori::all();
        $data = Buku::findOrFail($id);
        $penerbit = Penerbit::all() ;
        return view('buku.edit',compact('ktg','data','penerbit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $update = Buku::find($id);
        $update->kode = $request->kode;
        $update->nama_buku = $request->nama_buku;
        $update->stok = $request->stok;
        $update->harga = $request->harga;
        $update->kategori_id = $request->kategori;
        $update->penerbit_id = $request->penerbit;
        if ($update->isDirty()) {
            $rules = [
                'kode' => 'required|min:5|max:25',
                'nama_buku' => 'required|min:3|max:250',
                'harga' => 'required',
                'stok' => 'required',
                'kategori' => 'required',
                'penerbit' => 'required',
               
    
            ];
            $messages = [
                'required' => ':attribute gak boleh kosong ',
                'unique' => ':attribute sudah ada, silahkan gunakan yang lain',
                'max' => ' jumlah :attribute terlalu banyak',
                'min' => 'jumlah :attribute terlalu terlalu sedikit',
            ];
            $this->validate($request, $rules, $messages);
           
            $update->kode = $request->kode;
            $update->nama_buku = $request->nama_buku;
            $update->stok = $request->stok;
            $update->harga = $request->harga;
            $update->kategori_id = $request->kategori;
            $update->penerbit_id = $request->penerbit;
            $update->save();
            Alert::success('Successpull', 'Data Berhasil di Update');
            return redirect()->route('penerbit');
        } else {
            Alert::warning('Why??', 'Data tidak di Ubah');
            return redirect()->route('penerbit');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data = Buku::findOrFail($id);
        
        $data->delete();
        Alert::success('Successpull', 'Data Berhasil di Hapus');
        // redirect
        return redirect()->route('buku.index');
    }
}
