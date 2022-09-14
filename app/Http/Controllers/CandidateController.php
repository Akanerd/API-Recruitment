<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\ApiFormatter as ApiFormatter;
use App\Models\Candidates;
use Illuminate\Http\Request;
use Validator;
use Exception;

class CandidateController extends ApiFormatter
{
    public function index(Request $request)
    {
        $candidates = Candidates::with(['job' => function ($query) {
            $query->select('id', 'name');
        }, 'skills' => function ($query) {
            $query->select('id', 'name');
        }])->get();

        $candidates = $candidates->map(function ($item, $key) {
            return [
                'id' => $item['id'],
                'name' => $item['name'],
                'email' => $item['email'],
                'phone' => $item['phone'],
                'job' => $item['job']['name'],
                'skills' => collect($item['skills'])->pluck('name'),
            ];
        });
        return ApiFormatter::createApi(200, 'Success', $candidates);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make(
            $input,
            [
                'name' => 'required|string',
                'email' => 'required|email',
                'phone' => 'required|numeric|digits_between:10,12',
                'year' => 'required|numeric',
                'skill_ids' => 'required|array',
                'skill_ids.*' => "required|integer|distinct|exists:skills,id",
                'job_id' => 'required|integer|exists:jobs,id'
            ],
            [
                'name.required' => 'Kolom Nama Harus Diisi',
                'email.required' => 'Kolom Email Harus Diisi',
                'phone.required' => 'Kolom Phone Harus Diisi',
                'year.required' => 'Kolom Tahun Harus Diisi',
            ]
        );

        if ($validator->fails()) {
            return ApiFormatter::createApi(400, $validator->errors());
        }

        $candidate = new Candidates;
        $candidate->name = $request->name;
        $candidate->email = $request->email;
        $candidate->phone = $request->phone;
        $candidate->year = $request->year;
        $candidate->job_id = $request->job_id;
        $candidate->save();
        $candidate->skills()->attach($request->skill_ids);
        return ApiFormatter::createApi(200, 'Berhasil Insert Data', $candidate);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $validator = Validator::make(
            $input,
            [
                'name' => 'required|string',
                'email' => 'required|email',
                'phone' => 'required|numeric|digits_between:10,12',
                'year' => 'required|numeric',
                'skill_ids' => 'required|array',
                'skill_ids.*' => "required|integer|distinct|exists:skills,id",
                'job_id' => 'required|integer|exists:jobs,id'
            ],
            [
                'name.required' => 'Kolom Nama Harus Diisi',
                'email.required' => 'Kolom Email Harus Diisi',
                'phone.required' => 'Kolom Phone Harus Diisi',
                'year.required' => 'Kolom Tahun Harus Diisi',
            ]
        );

        if ($validator->fails()) {
            return ApiFormatter::createApi(400, $validator->errors());
        }

        $candidate = Candidates::findorfail($id);
        $candidate->name = $request->name;
        $candidate->email = $request->email;
        $candidate->phone = $request->phone;
        $candidate->year = $request->year;
        $candidate->job_id = $request->job_id;
        $candidate->skills()->attach($request->skill_ids);
        $candidate->save();
        return ApiFormatter::createApi(200, 'Berhasil Update Data', $candidate);
    }
    public function destroy($id)
    {
        $candidate = Candidates::FindOrFail($id);
        $data = $candidate->delete();
        if ($data) {
            return ApiFormatter::createApi(200, 'Berhasil Menghapus data');
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
}
