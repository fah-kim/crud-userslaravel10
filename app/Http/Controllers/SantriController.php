<?php

namespace App\Http\Controllers;

use App\Exports\SantriExport;
use App\Imports\SantriImport;
use App\Models\Santri;
use Database\Seeders\Santri as SeedersSantri;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class SantriController extends Controller
{
    public function index(Request $request) {
        if($request->has('search')) {
            $data = Santri::where('nama','LIKE','%'.$request->search.'%')->paginate(5);

        } else{
            $data = Santri::paginate(5);

        }

        // dd($data);
        return view('santri', compact('data'));
    }

    public function tambahdata() {
        return view ('tambahdata');
    }

    public function insertdata(Request $request) {
        $data = Santri::create($request->all());
        if($request->hasFile('foto')){

            $request->file('foto')->move('fotosantri/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();

        }
        return redirect()->route('santri')->with('success', 'Data Berhasil Dimasukan');
    }
    public function tampilkandata($id) {
        $data = Santri::find($id);
        // dd($data);
        return view('tampildata', compact('data'));
    }
    public function updatedata(Request $request, $id) {
        $data = Santri::find($id);
        $data->update($request->all());
        return redirect()->route('santri')->with('success', 'Data Berhasil Diupdate');
    }
    public function delete($id) {
        $data = Santri::find($id);
        $data->delete();
        return redirect()->route('santri')->with('success', 'Data Berhasil Dihapus');
    }
    public function exportpdf () {
        $data = Santri::all();
        view()->share('data', $data);
        $pdf = PDF::loadview('datasantri-pdf');
        return $pdf->download('data.pdf');
    }

    public function exportexcel()
    {
        return Excel::download(new SantriExport, 'Data Santri.xlsx');
    }

    public function importexcel(Request $request){
        $data = $request->file('file');

        $namafile = $data->getClientOriginalName();
        $data->move('SantriData', $namafile);

        Excel::import(new SantriImport , \public_path('/SantriData/'.$namafile ));

        return \redirect()->back();
    }
}
