<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Mhs;
use App\Helpers\ResponseHelper;
use Validator;

class MhsController extends Controller
{
	public function __construct()
	{
		$this->responHelper = new ResponseHelper;
	}

    public function getmhs(Request $request)
    {
    	$query = $request->get('angkatan');

    	$datamhs = Mhs::where('angkatan', 'LIKE', '%'.$query.'%')->get();

    	if($datamhs->isEmpty())
    	{
    		return $this->responHelper->errorCustom(404, 'Data Mahasiswa tidak ada');
    	}

    	return $this->responHelper->successWithData($datamhs);
    }

    public function getnim($id)
    {
    	$datamhs = Mhs::where('nim', $id)->first();

    	if($datamhs == null)
    	{
    		return $this->responHelper->errorCustom(404, 'Not Found');
    	}

    	return $this->responHelper->successWithData($datamhs);
    }

    public function addmhs(Request $request)
    {
    	
    	$validation = Validator::make($request->all(),[ 
							        'nim' => 'required|numeric|unique:mhs,nim|digits:8',
        							'nama' => 'required',
        							'angkatan' => 'required|numeric|digits:4',
							    ]);
    	if($validation->fails())
    	{
    		// $errors = $validation->errors();

    		// return $this->responHelper->errorWithInfo(406, $errors);
               return $validation;
    	}
    	// echo json_encode($request->nim);die;

    	$insert = new Mhs;

    	$insert->nim = $request->nim;
    	$insert->nama = $request->nama;
    	$insert->angkatan = $request->angkatan;

    	$insert->save();

    	return $this->responHelper->successWithData($insert);
    	
    }

    public function updatemhs(Request $request, $id)
    {
        $validation = Validator::make($request->all(),[ 
                                    'nim' => 'required|numeric|digits:8',
                                    'nama' => 'required',
                                    'angkatan' => 'required|numeric|digits:4',
                                ]);
        if($validation->fails())
        {
            // $errors = $validation->errors();

            // return $this->responHelper->errorWithInfo(406, $errors);
               return $validation;
        }

        $update = Mhs::where('nim', $id)->first();

        $update->nim = $request->nim;
        $update->nama = $request->nama;
        // $update->angkatan = $request->angkatan;

        $update->save();

        return $this->responHelper->successWithData($update);
    }

    public function delmhs($id)
    {
    	$data = Mhs::find($id);

    	if($data)
    	{
    		$data->delete();

    		return $this->responHelper->successWithoutData('Data berhasil dihapus');
    	}else
    	{
    		return $this->responHelper->errorCustom(406, 'Data tidak ditemukan');
    	}
    }
}
