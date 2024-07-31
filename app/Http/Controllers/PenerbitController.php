<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class PenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $penerbit;
    public function __construct()
    {
        $this->penerbit = new Penerbit();
    }
    public function index()
    {
        //
        $data = Penerbit::all();
        return view('penerbit.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('penerbit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $rules = [
            'kode' => 'required|max:25|unique:penerbit,kode',
            'nama_penerbit' => 'required|min:3|max:250',
            'kota' => 'required',
            'telp' => 'required',
            'alamat' => 'required',
           

        ];
        $messages = [
            'required' => ':attribute gak boleh kosong ',
            'unique' => ':attribute sudah ada, silahkan gunakan yang lain',
            'max' => ' jumlah :attribute terlalu banyak',
            'min' => 'jumlah :attribute terlalu terlalu sedikit',
        ];
        $this->validate($request, $rules, $messages);
       
        $this->penerbit->kode = $request->kode;
        $this->penerbit->nama = $request->nama_penerbit;
        $this->penerbit->kota = $request->kota;
        $this->penerbit->telpon = $request->telp;
        $this->penerbit->alamat = $request->alamat;


        
        
        $this->penerbit->save();
        Alert::success('Successpull', 'Data Berhasil di Tambahkan');
        return redirect()->route('penerbit');
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
        $item = Penerbit::findOrFail($id);
        return view('penerbit.edit',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $update = Penerbit::find($id);
        $update->kode = $request->kode;
        $update->nama = $request->nama_penerbit;
        $update->kota = $request->kota;
        $update->telpon = $request->telp;
        $update->alamat = $request->alamat;
        if ($update->isDirty()) {
            $rules = [
                'kode' => 'required',
                'nama_penerbit' => 'required|min:3|max:250',
                'kota' => 'required',
                'telp' => 'required',
                'alamat' => 'required',
               
    
            ];
            $messages = [
                'required' => ':attribute gak boleh kosong ',
                'unique' => ':attribute sudah ada, silahkan gunakan yang lain',
                'max' => ' jumlah :attribute terlalu banyak',
                'min' => 'jumlah :attribute terlalu terlalu sedikit',
            ];
            $this->validate($request, $rules, $messages);
           
            $update->kode = $request->kode;
            $update->nama = $request->nama_penerbit;
            $update->kota = $request->kota;
            $update->telpon = $request->telp;
            $update->alamat = $request->alamat;
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
        $data = Penerbit::findOrFail($id);
        
        $data->delete();
        Alert::success('Successpull', 'Data Berhasil di Hapus');
        // redirect
        return redirect()->route('penerbit');
    }
}
