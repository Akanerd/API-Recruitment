<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\ApiFormatter as ApiFormatter;
use App\Models\Jobs;
use Illuminate\Http\Request;
use Validator;
use Exception;
use Illuminate\Contracts\Queue\Job;

class JobController extends ApiFormatter
{
    public function index()
    {
        $job = Jobs::all();
        if ($job) {
            return ApiFormatter::createApi(200, 'list Data Job', $job);
        } else {
            return ApiFormatter::createApi(400, 'Gagal Membaca Data');
        }
    }

    public function store(Request $request)
    {
        try {
            $input = $request->all();
            $validator = Validator::make($input, [
                'name' => 'required'
            ], [
                'name.required' => 'Kolom Nama Harus Diisi'
            ]);

            if ($validator->fails()) {
                return ApiFormatter::createApi(400, $validator->errors());
            }

            $job = Jobs::create($input);
            $data = Jobs::where('id', '=', $job->id)->get();
            if ($data) {
                return ApiFormatter::createApi(200, 'Berhasil Insert Data', $data);
            } else {
                return ApiFormatter::createApi(400, 'Gagal dalam Insert Data');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
    public function show($id)
    {
        $job = Jobs::find($id);
        if (is_null($job)) {
            return ApiFormatter::createApi(400, 'Data Tidak Ditemukan');
        } else {
            return ApiFormatter::createApi(200, 'Pencarian Berhasil', $job);
        }
    }
    public function update(Request $request, $id)
    {
        try {
            $input = $request->all();
            $validator = Validator::make($input, [
                'name' => 'required'
            ], [
                'name.required' => 'Kolom Nama Harus Diisi'
            ]);
            if ($validator->fails()) {
                return ApiFormatter::createApi(400, $validator->errors());
            }
            $job = Jobs::findorfail($id);
            $job->name = $input['name'];
            $job->save();

            $data = Jobs::where('id', '=', $job->id)->get();
            if ($data) {
                return ApiFormatter::createApi(200, 'Berhasil Update Data', $data);
            } else {
                return ApiFormatter::createApi(400, 'Gagal Update Data');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
    public function destroy($id)
    {

        $job = Jobs::FindOrFail($id);
        $data = $job->delete();
        if ($data) {
            return ApiFormatter::createApi(200, 'Berhasil Menghapus data');
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
}
