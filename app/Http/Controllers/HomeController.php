<?php
namespace App\Http\Controllers;
use Auth;
use App\DivisionTeacher;
use App\InternalTest;
use App\Division;
use App\Subject;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
       $test = InternalTest::where('division_id',$user->division)->where('roll_no',$user->roll_no)->get();
       for($i=0;$i<count($test);$i++)
        {
            $test[$i]['div_name'] = Division::where('id',$test[$i]['division_id'])->first()['class'];
            $test[$i]['subject_name'] = Subject::where('id',$test[$i]['subject_id'])->first()['subject'];
        }
        return view('auth.marks')->with('test',$test);
    }
    public function store(Request $request)
    {
        $user = Auth::user();
        foreach($_POST as $key=>$value)
        {
            if($value == 1 || $value == 0)
            {
                $sub_list = explode('_',$key);
                if($sub_list['1'] == 1)
                {
                    $data=InternalTest::where('division_id',$user->division)->where('roll_no',$user->roll_no)->where('subject_id',$sub_list['0'])->first();
                    $data->status1 = $value;
                    $data->save();
                }
                elseif($sub_list['1'] == 2)
                {
                    $data=InternalTest::where('division_id',$user->division)->where('roll_no',$user->roll_no)->where('subject_id',$sub_list['0'])->first();
                    $data->status2 = $value;
                    $data->save();
                }
            }
        }
      
        return back()->with('success','Choice Updated!');
    }
}