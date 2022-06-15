<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class StudentController extends Controller
{

    public function index()
    {
        $students = Student::paginate(40);

        return Inertia::render('Student/Index', [
            'students' => $students,
        ]);
    }


    public function create()
    {
        return Inertia::render('Student/Create');
    }


    public function store(StudentRequest $request)
    {
        $student = Student::create($request->except('certificate_path'));

        if ($request->certificate_path !== null) {
            $certificatePath = $request->certificate_path->store('public/certificates');
            $student->update([
                'certificate_path' => $certificatePath,
            ]);
        }

        return Redirect::route('students.index')->with([
            'message' => $request->name.' dengan nrp '.$request->nrp.' berhasil disimpan',
        ]);
    }


    public function show(Student $student)
    {
        $student->certificate_path = Storage::url($student->certificate_path);

        return Inertia::render('Student/Read', [
            'student' => $student,
        ]);
    }


    public function edit(Student $student)
    {
        $student->certificate_path = Storage::url($student->certificate_path);

        return Inertia::render('Student/Update', [
            'student' => $student,
        ]);
    }

    
    public function update(StudentRequest $request, Student $student)
    {
        $student->update($request->except('certificate_path'));

        if ($request->certificate_path !== null) {
            $oldCertificatePath = $student->certificate_path;
            $certificatePath = $request->certificate_path->store('public/certificates');
            $student->update([
                'certificate_path' => $certificatePath,
            ]);

            if ($oldCertificatePath != null) {
                Storage::delete($oldCertificatePath);
            }
        }

        return Redirect::route('students.index')->with([
            'message' => $student->name.' dengan nrp '.$student->nrp.' berhasil diubah',
        ]);
    }

    public function destroy(Student $student)
    {
        Storage::delete($student->certificate_path);

        $student->delete();

        return back();
    }
}
