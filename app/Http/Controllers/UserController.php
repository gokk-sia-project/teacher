<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use App\Models\User;
use DB;

Class UserController extends Controller {

use ApiResponser;
private $request;
public function __construct(Request $request){
$this->request = $request;
}

    public function getUser(){ //LISTUSER - list all user data
        $users = DB::connection('mysql')
        ->select("Select * from tbl_user");
        return $this->successResponse($users);
    }


    public function getID($id){ //GETID - get using with id
        $user = User::where('id', $id)->first();
        if($user){
            return $this->successResponse($user);
        }
        {
            return $this->errorResponse('User ID Does Not Exist', Response::HTTP_NOT_FOUND);
        }
    }


    public function addUser(Request $request ){ //ADDUSER - shows one user data
        $rules = [
            'username' => 'required|max:30',
            'password' => 'required|max:30',
            'gender' => 'required|in:Male,Female',
        ];
        $this->validate($request,$rules);
        $user = User::create($request->all());
        return $this->successResponse($user, Response::HTTP_CREATED);
    }


    public function updateUser(Request $request,$id){ //UPDATEUSER - updates the user
        $rules = [
            'username' => 'max:30',
            'password' => 'max:30',
        ];
        $this->validate($request, $rules);
        $user = User::findOrFail($id);
        $user->fill($request->all());
        
        if ($user->isClean()) {
            return $this->errorResponse('At least one value must
            change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $user->save();
        return $user;
    }


    public function deleteUser($id){ //DELETUSER - delete existing user
        $user = User::where('id', $id)->delete();
        if($user){
            return $this->successResponse($user);
        }
        {
            return $this->errorResponse('User ID Does Not Exist', Response::HTTP_NOT_FOUND);
        }
    }
}