<?php

namespace App\Modules\Simdes\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Modules\Core\Http\Controllers\AuthController;
use App\Modules\Simdes\Http\Requests\SuratKeluarMasukRequest;
use App\Modules\Simdes\Models\SuratKeluarMasuk;

class SuratKeluarMasukController extends AuthController
{
    protected $table;

    public function __construct($value='')
    {
        $this->table = new SuratKeluarMasuk;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->getAll($request, SuratKeluarMasuk::class);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SuratKeluarMasukRequest $request)
    {
        $store = $this->table->create($request->all());
        return $this->jsonResponseSuccess([
            'data' => $store
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->table->findOrFail($id);

        return $this->jsonResponseSuccess([
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SuratKeluarMasukRequest $request, $id)
    {
        $data = $this->table->findOrFail($id);
        $data->fill($request->all())->save();
        return $this->jsonResponseSuccess([
            'data' => $data
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data   = $this->table->findOrFail($id);
        $delete = $data->delete();

        if($delete){
            return $this->jsonResponseSuccess([
                'data' => ""
            ]);
        }
    }
}
