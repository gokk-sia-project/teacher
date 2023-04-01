<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
Class UserController extends Controller {
private $request;
public function __construct(Request $request){
$this->request = $request;
}
    public function getUser(){ //LISTUSER - list all user data
        $users = User::all();
        return response()->json($users, 200);
    }
    public function getID($id) //GETID - Get using with id
    {
        return User::where('id','like','%'.$id.'%')->get();
    }
    public function addUser(Request $request ){ //ADDUSER - shows one user data
        $rules = [
        'username' => 'required|max:30',
        'password' => 'required|max:30',
        'id' => 'required|max:10',
        ];
        $this->validate($request,$rules);
        $user = User::create($request->all());
        return $user;
       
}
    public function updateUser(Request $request,$id) //UPDATEUSER - updates the user
    {
    $rules = [
    'username' => 'max:30',
    'password' => 'max:30',
    'id' => 'required|max:10',
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
    public function deleteUser($id) //DELETUSER - delete existing user
    {
    $user = User::findOrFail($id);
    $user->delete();

    }
}