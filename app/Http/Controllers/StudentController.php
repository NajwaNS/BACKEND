<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index() {
        $students = Student::all();

        $data = [
            'massage' => 'Get all students',
            'data'=> $students,
            ];

            return response()->json($data, 200);
        }

    public function store(Request $request) {
        validator = validator::make($request->all(), [
            'name'=>'required',
            'nim' =>'numeric|required',
            'email'=> 'email|required',
            'majority'=> 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'massage'=>'validation errors',
                'errors'=>'validator->errors()',
                ],422);
            }

            $Student = Student::create($request->all());

            $data = [
                'massage' => 'Student is created successfully'
                'data'=> $students,
                ];
    
                return response()->json($data, 201);
            }

    public function update(Request $request, $id) {
        $student = student::find ($id);

            if ($student) {
                $input = [
                    'name'=> $request->name?? $student ->name,
                    'nim'= $request->nim?? $student -> nim,
                    'email'=> $request->email?? $student -> email,
                    'majority'=> $request->majority?? $student -> majority,
                ];

                $Student->update($input);
                $data = [
                    'massage'=> 'Student is update'
                    'data'=> $student,
                    ];

                return response()->json($input, 200);
            }
            else {
                $data = [
                    'massage'=> 'Student not found'
                ];
                return response()->json($data, 404);
            }
        }

        public function destroy($id) {
            $student = student::find ($id);

            if ($student) {
                $student->delete();
                $data = [
                    'massage'=> 'Student is deleted'
                ];
                return response()->json($data, 200);
            }
            else {
                $data = [
                    'massage'=> 'Student not found'
                    ];
                    return response()->json($data,404);
            }
        }

        public function show($id) {
            $student = student::find ($id);

            if ($student) {
                    $data = [
                        'massage'=> 'Get detail student'
                    ];
                    return response()->json($data, 200);
                }
                else {
                    $data = [
                        'massage'=> 'Student not found'
                        ];
                        return response()->json($data,404);
                }
            }
        }

