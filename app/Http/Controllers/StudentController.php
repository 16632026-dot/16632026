<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\MockObject\Builder\Stub;

class StudentController extends Controller
{



public function index(Request $request)
{
          $students = Student::when($request->input('search'), function ($query) use ($request) {
            return $query->where('name', 'like', '%' . $request->input('search') . '%')
                         ->orWhere('email', 'like', '%' . $request->input('search') . '%')
                         ->orWhere('address', 'like', '%' . $request->input('search') . '%')
                         ->orWhere('date_of_birth', 'like', '%' . $request->input('search') . '%')
                         ->orWhere('gender', 'like', '%' . $request->input('search') . '%')
                         ->orWhere('age', 'like', '%' . $request->input('search') . '%')
                         ->orWhere('salary', 'like', '%' . $request->input('search') . '%');
        })->get(); // Fetch all students from the database
    return view('students.index', compact('students'));
}
    
    // public function index()
    // {
    //     //Logis to retrieve and display a list of students
    //     return ('Hello from  controller'); //ให้แสดงข้อความคำว่า Hello from controller
    // }

    public function aboutUS($id,$name)
    {
        //return ('ID : '.$id . ' Name : '.$name);
        return view('aboutus', compact('id','name'));
    }

    public function addData()
    {
        // DB::table('students')->insert([
        //     'name' => 'khong',
        //     'email' => '16632021@ggg.com',
        //     'age' => 22,
        //     'address' => '124 Main St',
        //     'date_of_birth' => '2000-01-01',
        //     'gender' => 'm',
        //     'salary' => 25000
        // ],[
        //     'name' => 'aaa',
        //     'email' => '16632021@aaa.com',
        //     'age' => 20,
        //     'address' => '124 Main St',
        //     'date_of_birth' => '2000-01-01',
        //     'gender' => 'm',
        //     'salary' => 25000
        // ],[
        //     'name' => 'sss',
        //     'email' => '16632021@sss.com',
        //     'age' => 30,
        //     'address' => '124 Main St',
        //     'date_of_birth' => '2000-01-01',
        //     'gender' => 'm',
        //     'salary' => 25000
        // ]
    // );
    $students = new Student();
    $students->name = 'khong';
    $students->email = '16632021@ggg.com';
    $students->age = 22;
    $students->address = '124 Main St';
    $students->date_of_birth = '2000-01-01';
    $students->gender = 'm';
    $students->salary = 25000;
    $students->save();

    return ('added student successfully');

    }
    public function getData()
    {
        // $students = DB::table('students')
        // ->where('age', '>=', 20)
        // ->where('gender', 'f')
        //->orWhere('id', '=', 1)
        // ->first();
        // ->limit(5)
        // ->select(
        //     'id',
        //     'name',
        //     'email'
        // )
        // ->get();
        // ->where('id', '1')
        // ->update([
        //     'name' => 'khong',
        //     'email' => '16632021@ggg.com',]);
        // $students = Student::all();
        $students = Student::select('id', 'name', 'email')->get();
        return $students;

        return ('updated  successfully');
    }
     public function updateData()
    {
        // DB::table('students')
        // ->where('id', '1')
        // ->update([
        //     'name' => 'khong',
        //     'email' => '16632021@ggg.com',]);
        // return ('updated  successfully');
        $students = Student::findOrFaill(1);
        $students->name = 'khong';
        $students->email = '16632021@ggg.com';
        $students->update();

        return ('updated  successfully');
    }
    public function deleteData()
    {
        // DB::table('students')
        // ->where('id', '10')
        // ->delete();
        // return ('deleted  successfully');
        $students = Student::findOrFaill(10);
        $students->delete();

        return ('deleted  successfully');
    }
    

}
