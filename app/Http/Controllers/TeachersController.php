<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\DivisionTeacher;
use App\Subject;
use App\Division;
use App\User;
use App\Mail\Email;
use Illuminate\Support\Facades\Mail;
use App\InternalTest;
class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $detail = DivisionTeacher::where('teacher_id',$user->id)->get();
        for($i=0;$i<count($detail);$i++)
        {
            $detail[$i]['div_name'] = Division::where('id',$detail[$i]['division_id'])->first()['class'];
            $detail[$i]['subject_name'] = Subject::where('id',$detail[$i]['subject_id'])->first()['subject'];
        }
        return view('Teacher.home')->with('detail',$detail);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = Auth::user();
        $students = User::where('division',$request['division_id'])->orderBy('roll_no')->get();
        $request->session()->put('subject_no'.$user->id,$request['subject_no']);
        $request->session()->put('division_no'.$user->id,$request['division_id']);
        $request->session()->put('test_no'.$user->id,$request['test_no']);
        return view('Teacher.putMarks')->with('students',$students);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $user = Auth::user();
        if($request->session()->get('test_no'.$user->id) == '1')
        {
            foreach($_POST as $roll=>$mark)
            {
                if(is_numeric($roll))
                InternalTest::updateOrCreate
                (
                    [
                    'division_id' =>$request->session()->get('division_no'.$user->id,'Error'),
                    'roll_no' => $roll,
                    'subject_id' => $request->session()->get('subject_no'.$user->id,'Error')
                ],
                    [
                        'ia1' => $mark,
                ]
            );
            }
        }
        else if($request->session()->get('test_no'.$user->id) == '2')
        {
            foreach($_POST as $roll=>$mark)
            {
                if(is_numeric($roll))
                {
                    $data=InternalTest::where('division_id',session()->get('division_no'.$user->id,'Error'))->where('roll_no',$roll)->where('subject_id',session()->get('subject_no'.$user->id,'Error'))->get();
                    $data[0]->ia2=$mark;
                    $data[0]->save();
                }
            }
        }
        $subject_no = $request->session()->get('subject_no'.$user->id,'Error');
        $subject = Subject::where('id',$subject_no)->first()['subject'];
        $division = Division::where('id',session()->get('division_no'.$user->id,'Error'))->first();
        $request->session()->forget(['division_no'.$user->id, 'subject_no'.$user->id,'test_no'.$user->id]);
        $request->session()->flash('success', 'Marks Updated and Students Notified Successfully');
        return redirect('teacher\putmarks');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function checkstatus()
    {
        $user = Auth::user();
        $detail = DivisionTeacher::where('teacher_id' , $user->id)->get();
        for($i=0;$i<count($detail);$i++)
        {
            $detail[$i]['div_name'] = Division::where('id',$detail[$i]['division_id'])->first()['class'];
            $detail[$i]['subject_name'] = Subject::where('id',$detail[$i]['subject_id'])->first()['subject'];
        }
        
        return view('Teacher.checkstatus')->with('detail',$detail);
    }

    public function send($subject,Division $division)
    {
        $teacher = Auth::user();
        Mail::to($division['email'])
        ->cc($teacher->email)
        ->send(new Email($subject , $division));
        return $this->index();
    }

    public function status(Request $request)
    {
        $user = Auth::user();
        $students = InternalTest::where('division_id',$request['division_id'])->where('subject_id',$request['subject_no'])->orderBy('roll_no')->get();
        for($i=0;$i<count($students);$i++)
        {
            $students[$i]['name'] = User::where('division',$request['division_id'])->where('roll_no',$students[$i]['roll_no'])->first()['name'];
        }
        return view('Teacher.status')->with('students',$students)->with('test_no',$request['test_no']);
    }

    public function show($id)
    {
        //
    }
    public function marks(Request $request)
    {
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}