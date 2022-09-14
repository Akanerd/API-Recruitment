<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\ApiFormatter as ApiFormatter;
use App\Models\Skill;
use Illuminate\Http\Request;
use Validator;
use Exception;

class SkillController extends ApiFormatter
{
    public function index()
    {
        $skills = Skill::all();
        if ($skills) {
            return ApiFormatter::createApi(200, 'List Data Skill', $skills);
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

            $skill = Skill::create($input);
            $data = Skill::where('id', '=', $skill->id)->get();
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
        $skill = Skill::find($id);
        if (is_null($skill)) {
            return ApiFormatter::createApi(400, 'Data Tidak Ditemukan');
        } else {
            return ApiFormatter::createApi(200, 'Pencarian Berhasil', $skill);
        }
    }
    public function update(Request $request, $id)
    {
        try {
            $input = $request->all();
            $validator = Validator::make($input, [
                'name' => 'required'
            ],[
                'name.required' => 'Kolom Nama Harus Diisi'
            ]);
            if ($validator->fails()) {
                return ApiFormatter::createApi(400, $validator->errors());
            }
            $skill = Skill::findorfail($id);
            $skill->name = $input['name'];
            $skill->save();

            $data = Skill::where('id', '=', $skill->id)->get();
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
        $Skill = Skill::FindOrFail($id);
        $data = $Skill->delete();
        if ($data) {
            return ApiFormatter::createApi(200, 'Berhasil Menghapus data');
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
}
