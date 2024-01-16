<?php

namespace App\Http\Controllers\Admin;



use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\SubjectFormRequest;
use Illuminate\Support\Str;


class SubjectController extends Controller
{
    public function index(){

        $subject= Subject::all();
        
        return view('admin.index',compact('subject'));
    }
    
    public function create(){
        return view('admin.create');
    }
    
    public function  store(SubjectFormRequest $request){
        
        $data = $request->validated();
        $subject = new Subject;
        $subject->name = $data['name'];
        $subject->slug = Str::slug($data['slug']); 
        $subject->description = $data['description'];

        if($request->hasfile('image')){
            $file = $request->file('image');
            $filename=time().".".$file->getClientOriginalExtension();
             $file->move('uploads/subject/',$filename);
             $subject->image = $filename;
        

        }
        $subject->meta_title = $data['meta_title'];
        $subject->meta_description = $data['meta_description'];
        $subject->meta_keyword = $data['meta_keyword'];

        $subject->navbar_status =$request->navbar_status == true ? '1':'0';
        $subject->status =$request->status == true ? '1':'0';
        $subject->created_by = Auth::user()->id;
        $subject->save();

        return redirect('admin/subject')->with('message','Subject added successfully');
    }
    public function edit($subject_id){
        $subject = Subject::find($subject_id);
        return view('admin.edit',compact('subject'));
    }

    public function update(SubjectFormRequest $request, $subject_id){
        
        $data = $request->validated();

        $subject = Subject::find($subject_id);
        $subject->name = $data['name'];
        $subject->slug = Str::slug($data['slug']); 
        $subject->description = $data['description'];

        if($request->hasfile('image')){

           $destination = 'uploads/subject/'.$subject->image;
           if(File::exists($destination)){
             File::delete($destination);

           }
            $file = $request->file('image');
            $filename=time().".".$file->getClientOriginalExtension();
             $file->move('uploads/subject/',$filename);
             $subject->image = $filename;
        

        }
        $subject->meta_title = $data['meta_title'];
        $subject->meta_description = $data['meta_description'];
        $subject->meta_keyword = $data['meta_keyword'];

        $subject->navbar_status =$request->navbar_status == true ? '1':'0';
        $subject->status =$request->status == true ? '1':'0';
        $subject->created_by = Auth::user()->id;
        $subject->update();

        return redirect('admin/subject')->with('message','Subject updated successfully');

    }
     public function destroy($subject_id){
        $subject = Subject::find($subject_id);
        if($subject){
            $destination = 'uploads/subject/'.$subject->image;
           if(File::exists($destination)){
             File::delete($destination);

           }
            $subject->delete();
            return redirect('admin/subject')->with('message','Subject deleted successfully');
        }else{
            return redirect('admin/subject')->with('message','No Subject Id found');

        }
     }
}
