<?php
namespace App\Http\Controllers;
use App\Models\UserGrader;
use App\Models\User;
use App\Models\UserSubjects;
use App\Models\UserDetailsStudent;
use App\Models\UserDetailsTeacher;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use DB;

Class UserGraderController extends Controller {

    use ApiResponser;
    private $request;

    public function __construct(Request $request){
        $this->request = $request;
    }
    
    public function index(){
        $usergrades = UserGrader::all();
        return $this->successResponse($usergrades);
    }
    
    public function show($id){
        $usergrades = UserGrader::findOrFail($id);
        return $this->successResponse($usergrades);
    }

    public function add(Request $request ){
        $rules = [
            'grade_id' => 'numeric|min:1|not_in:0',
            'teacher_subject_details_id' => 'required|numeric|min:1|not_in:0',
            'student_subject_details_id' => 'required|numeric|min:1|not_in:0',
            'grade' => 'required|numeric|min:1|not_in:0'
        ];
        $this->validate($request,$rules);
        $userdetailstudent = UserDetailsStudent::findOrFail($request->student_subject_details_id);
        $userdetailteacher = UserDetailsTeacher::findOrFail($request->teacher_subject_details_id);
        $usergrader = UserGrader::create($request->all());
        return $this->successResponse($usergrader, Response::HTTP_CREATED);
    }
}