<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Student;

class StudentsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::orderBy('first_name', 'desc')->paginate(3);
        return view('student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'fname' => 'required',
            'lname' => 'required',
            'age' => 'required',
            'email' => 'required',
            'adresse' => 'required'
        ]);
        
        $student = new Student;
        $student->first_name = $request->input('fname');
        $student->last_name = $request->input('lname');
        $student->age = $request->input('age');
        $student->email = $request->input('email');
        $student->adresse = $request->input('adresse');
        $student->save();

        return redirect('/students')->with('success', 'Student Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
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
        $student = Student::find($id);
        return view('student.edit')->with('student', $student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'fname' => 'required',
            'lname' => 'required',
            'age' => 'required',
            'email' => 'required',
            'adresse' => 'required'
        ]);
        
        $student = Student::find($id);
        $student->first_name = $request->input('fname');
        $student->last_name = $request->input('lname');
        $student->age = $request->input('age');
        $student->email = $request->input('email');
        $student->adresse = $request->input('adresse');
        $student->save();

        return redirect('/students')->with('success', 'Student Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect('/students')->with('success', 'Student Removed');
    }

    public function search(Request $request){
        $students = Student::where('first_name', $request->input('fname'))->get();
        return view('student.results')->with('students', $students);
    }
}
