<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModalModel;
use App\Models\ModalGModel;
use App\Models\ModalSModel;
use App\Models\ModalUModel;
use Yajra\DataTables\DataTables;

class DataController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|min:3',
            'department'=>'required|string|min:3',
            'gender'=>'required',
            'mobile'=>'required|min:10|max:10',
            'dob'=>'required',
            'address'=>'required|min:4',
            'state'=>'required',
            'user_type'=>'required',
            'email'=>'required|string|email|unique:table|max:50',
            'password'=>'required|confirmed',
            'password_confirmation'=>'required',
            'checked'=>'accepted',
        ]);

    //    $ema=$request->get('email');
    //    $post=ModalModel::all();
    //    foreach($post as $eng)
    //    {
    //                 if($eng->Email==$ema)
    //                 {
    //                 // echo "email is not unique";
    //                 return redirect('/add')->with('success',"* Email already exist..");
    //                 break;
    //                 }
    //    }

        $post=new ModalModel;
        $post->Name=$request->get('name');
        $post->Department=$request->get('department');
        $post->Gender=$request->get('gender');
        $post->Mobile=$request->get('mobile');
        $post->DOB=$request->get('dob');
        $post->Address=$request->get('address');
        $post->State=$request->get('state');
        $post->userType=$request->get('user_type');
        $post->Email=$request->get('email');
        $post->Password=md5($request->get('password'));
        $post->repeatPassword =md5($request->get('password_confirmation'));
        $post->checked=$request->get('checked');
        $post->save();
        // $st=$request->get('name');

        return response()->json([
            'status'=>200,
            'message'=>"Data send successfully",
        ]);
     
    }

    
    public function show()
    {
        $post=ModalModel::with('genderG','stateS','userU')->get();
        // $post=ModalModel::with('genderG','stateS','userU')->paginate();


        // return view('show',['posts'=>$post,'gn'=>$g,'st'=>$s,'us'=>$u]);

        return response()->json(['post'=>$post]);


    }

    public function insert()
    {
        $g=ModalGModel::all();
        $s=ModalSModel::all();
        $u=ModalUModel::all();
        return view('show',['gn'=>$g,'st'=>$s,'us'=>$u]);
    }

    public function edit($id)
    {
        $post=ModalModel::with('genderG','stateS','userU')->find($id);
        if($post){
            return response()->json(['status'=>200,'post'=>$post]);
        }
        else {
             return response()->json([
                    'status'=>404,
                    'message'=>"Student not exist...",
             ]);
            }
        }



    
    public function update(Request $request,$id)
    {
        $request->validate([
            'name'=>'required|min:3',
            'department'=>'required|string|min:3',
            'gender'=>'required',
            'mobile'=>'required|min:10|max:10',
            'dob'=>'required',
            'address'=>'required|min:4',
            'state'=>'required',
            'user_type'=>'required',
            'email'=>'required|string|email|max:50',
            'password'=>'required|confirmed',
            'password_confirmation'=>'required',
            'checked'=>'accepted',
        ]);
    
            // $post=ModalModel::with('genderG','stateS','userU')->find($id);
            $post=ModalModel::find($id);
            if($post)
            {
                $post->Name=$request->get('name');
                $post->Department=$request->get('department');
                $post->gender=$request->get('gender');
                $post->Mobile=$request->get('mobile');
                $post->DOB=$request->get('dob');
                $post->Address=$request->get('address');
                $post->state=$request->get('state');
                $post->userType=$request->get('user_type');
                $post->Email=$request->get('email');
                $post->Password=$request->get('password');
                $post->repeatPassword=$request->get('password_confirmation');
                $post->checked=$request->get('checked');
    
                // $st=$post->id;
                $post->save();

             return response()->json([
                    'status'=>200,
                    'message'=>"Data Updated Successfully...",
             ]);
            }
            else {
                 return response()->json([
                        'status'=>404,
                        'message'=>"Student not exist...",
                 ]);
                }
            
        // }
        // return redirect('/show')->with("success",'ID No.-'.$st."  ->Data Updated Successfully..");
    }

    
    public function delete($id)
    {
       $post=ModalModel::find($id);
       $post->delete();
    //    $st=$post->id;
    //    return redirect('show')->with("success",'ID No.-'.$st."  ->Data Deleted Successfully..");
    return response()->json([
        'status'=>200,
        'message'=>"Data Deleted Successfully...",]);

    }

    public function Status($id)
    {
     $post=ModalModel::find($id);
     if($post->status=='1')
     {
        $post->status=0;
     }
     else{
        $post->status=1;
    }
     $post->save();

     return response()->json([
        'status'=>200,
        'message'=>"Status Changed Successfully...",
     ]);
    //  return redirect('/')->with("success",'ID No.-'.$st."  Status changed Successfully..");

    }

    public function anyData()
    {
        $post=ModalModel::with('genderG','stateS','userU')->get();
        return Datatables::of($post)->addIndexColumn()
        ->addColumn('edit',function($row){
            $edit="<button class='btn btn-primary' onclick='edit_func(".$row->id.");'>Edit</button>";
            return $edit;
        })
        ->addColumn('delete',function($row){
            $delete="<button class='btn btn-danger' onclick='del_func(".$row->id.");'>Delete</button>";
            return $delete;
        })
        ->addColumn('status',function($row){
            if($row->status=='1')
             {
                $status="<button class='btn btn-success' onclick='sta_func(".$row->id.");'>Active</button>";
             }
             else                 
             {
                $status="<button class='btn btn-secondary' onclick='sta_func(".$row->id.");'>Inactive</button>";
             }
            return $status;
        })
        ->rawColumns(['edit','delete','status'])
        ->make(true);
    }
}
