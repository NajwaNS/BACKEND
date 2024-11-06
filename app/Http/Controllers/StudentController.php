<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $student = Student::all();

        $data = [
            'message' => 'get all resource student',
            'data' => $student
        ];

        return response()->json($data,200);
    }

    public function store(Request $request)
    {
        $input = [
            'Nama' => $request->Nama,
            'NIM' => $request->NIM,
            'Email' => $request->Email,
            'Jurusan' => $request->Jurusan,
        ];

        $students = Student::create($input);

        $data = [
            'message' => 'Student is create success!!',
            'data' => $students,
        ];
        return response()->json($data, 200);}

        
    public function update(Request $request, $id) {
        $student = Student::find ($id);

        if ($student) {
            $input = [
                'nama' => $request->nama ?? $student->nama,
                'nim' => $request->nim ?? $student->nim,
                'email'=> $request->email ?? $student->email,
                'jurusan'=> $request->Jurusan ?? $student->jurusan
            ];
            $student->update($input);

            $data = [
                'message'=> 'Student is update',
                'data'=> $student
            ];

            return response()->json($data,200);
            } else {
                $data = [
                    'message'=> 'Student not found'
                ];
                    return response()->json($data,404);}
            
    public function destroy($id) {
        $student = Student::find ($id);
        if ($student) {
            $student->delete();

            $data = [
                'message'=> 'Student is delete'
                ];

                return response()->json($data,200);
    }
    else {
        $data = [
            'message'=> 'Student not found'
            ];
            return response()->json($data,404);
    }}

    public function show ($id) {
        $student = Student::find ($id);
        if ($student) {
            $data = [
                'massage' => 'Get detail student',
                'data'=> $student
            ];

            return response()->json($data,200);
        } else {
            $data = [
                'massage' => 'Student not found',
            ];
            return response()->json($data,404);
    }}

