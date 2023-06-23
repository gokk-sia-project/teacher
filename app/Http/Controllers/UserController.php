<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use App\Models\User;
use App\Models\UserCourses;
use App\Models\UserSubjects;
use DB;

Class UserController extends Controller {

use ApiResponser;
private $request;
public function __construct(Request $request){
$this->request = $request;
}

    public function getUser(){ //LISTUSER - list all user data
        $users = DB::connection('mysql')
        ->select("Select * from teachers");
        return $this->successResponse($users);
    }


    public function getID($id){ //GETID - get using with id
        $user = User::where('teacher_id', $id)->first();
        if($user){
            return $this->successResponse($user);
        }
        {
            return $this->errorResponse('Teacher ID Does Not Exist', Response::HTTP_NOT_FOUND);
        }
    }


    public function addUser(Request $request ){ //ADDUSER - create one user data
        $rules = [
            'firstname' => 'required|max:100',
            'lastname' => 'required|max:100',
            'middlename' => 'required|max:100',
            'gender' => 'required|in:Male,Female',
            'contact_number' => 'required|max:100',
            'email_address' => 'required|max:100',
            'course_id' => 'required|numeric|min:1|not_in:0',
        ];
        $this->validate($request,$rules);
        $usercourses = UserCourses::findOrFail($request->course_id);
        $user = User::create($request->all());
        return $this->successResponse($user, Response::HTTP_CREATED);
    }

    
    public function updateUser(Request $request,$id){ //UPDATEUSER - updates the user
        $rules = [
            'firstname' => 'max:100',
            'lastname' => 'max:100',
            'middlename' => 'max:100',
            'gender' => 'in:Male,Female',
            'contact_number' => 'max:100',
            'email_address' => 'max:100',
            'course_id' => 'required|numeric|min:1|not_in:0',
        ];
        $this->validate($request, $rules);
        $usercourses = UserCourses::findOrFail($request->course_id);
        $user = User::findOrFail($id);
        $user->fill($request->all());
        
        if ($user->isClean()) {
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $user->save();
        return $user;
    }


    public function deleteUser($id){ //DELETUSER - delete existing user
        $user = User::where('teacher_id', $id)->delete();
        if($user){
            return $this->successResponse($user);
        }
        {
            return $this->errorResponse('Teacher ID Does Not Exist', Response::HTTP_NOT_FOUND);
        }
    }

}