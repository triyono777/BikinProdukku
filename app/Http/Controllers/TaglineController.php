<?php

namespace App\Http\Controllers;

use App\Models\Tagline\Tagline;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TaglineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($kode_invoice)
    {
        $tagline = Tagline::where('kode_invoice', $kode_invoice)->get()->toArray();

        $datatables = DataTables::of($tagline)
            ->editColumn('isi', function($data) {
                return strip_tags($data['isi']);
            })
            ->addColumn('action', function($data) {
                return '<a href="#modal-edit" data-toggle="modal" data-id="'.$data['id_tagline'].'" data-nama="'.$data['nama'].'" data-isi="'.$data['isi'].'" class="btn btn-warning edit"><i class="fa fa-edit"></i></a> <a href="#!" class="btn btn-danger delete" data-id="'.$data['id_tagline'].'"><i class="fa fa-trash"></i></a>';
            })
            ->addIndexColumn();

        return $datatables->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $kode_invoice)
    {
        $tagline = Tagline::create([
            'kode_invoice' => $kode_invoice,
            'nama' => $request['nama'],
            'isi' => $request['isi'],
        ]);

        return response()->json($tagline);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kode_invoice, $id)
    {
        $tagline = Tagline::where('id_tagline', $request['id'])->first();
        $tagline->update([
            'nama' => $request['nama'],
            'isi' => $request['isi'],
        ]);
        return response()->json($tagline);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $kode_invoice, $id)
    {
        $tagline = Tagline::where('id_tagline', $id)->delete();
        return response()->json($tagline);
    }
}
