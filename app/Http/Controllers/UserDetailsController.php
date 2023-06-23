<?php
namespace App\Http\Controllers;
use App\Models\UserDetailsTeacher;
use App\Models\User;
use App\Models\UserSubjects;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use DB;

Class UserDetailsController extends Controller {

    use ApiResponser;
    private $request;

    public function __construct(Request $request){
        $this->request = $request;
    }
    
    public function index(){
        $userdetails = UserDetailsTeacher::all();
        return $this->successResponse($userdetails);
    }
    
    public function show($id){
        $userdetails = UserDetailsTeacher::findOrFail($id);
        return $this->successResponse($userdetails);
    }

    public function add(Request $request ){
        $rules = [
            'teacher_subject_details_id' => 'numeric|min:1|not_in:0',
            'subject_id' => 'required|numeric|min:1|not_in:0',
            'teacher_id' => 'required|numeric|min:1|not_in:0',
        ];
        $this->validate($request,$rules);
        $user = User::findOrFail($request->teacher_id);
        $userdetails = UserDetailsTeacher::create($request->all());
        return $this->successResponse($userdetails, Response::HTTP_CREATED);
        return $this->successResponse($user);
    }
}