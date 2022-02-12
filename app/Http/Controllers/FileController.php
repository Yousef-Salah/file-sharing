<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Url;
use Illuminate\Support\str;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Validation\ValidationException;

class FileController extends Controller
{
    public function index()
    {
        
        $file = File::with('link')->findOrFail(47);
        dd($file->link->url);


        $files = File::all();

        

        return view('files.index')->with([
            'files' => $files,
            'status' => File::statusOptions(),
        ]);
    }

    public function create()
    {
        $status = File::statusOptions();
      
        return view('files.create')
                ->with(['status' => $status])
                ->with('file', new File());
    }

    public function store(Request $request)
    {
        $request->validate($this->rules());
        $data = $request->all();


    
     
        // if($request->hasFile('file')){   
        //     $data['file_path'] = $this->uploadFile($request->file('file'));
        // }


        if($request->hasFile('file')){
            $file = $request->file('file');
            if($file->isValid()){
                $data['file_path'] = $file->store('files',['disk' => 'local']);
            } else {
                throw ValidationException::withMessages(['file' => 'in-valid File']);
            }
        }

        $data['user_id'] = Auth::user()->id;
        File::create($data);

        return redirect()->route('files.my-files');
    }

    public function edit($id)
    {
        $fileData = File::findOrFail($id);

        return view('files.edit')
                ->with('file',$fileData)
                ->with('status',File::statusOptions());

    }

    public function update()
    {

    }

    public function destroy()
    {

    }

    public function restore()
    {

    }

    public function trashed()
    {
        
    }

    private function rules()
    {
        return [
            'status' => 'required',
            'file' => 'required|image',
            'file_name' => 'required|string|min:5|max:70',
            'description' => 'nullable|string|min:5',
            //'number_of_people' ///////////////////////////////////////////////////////////////////////////////////////////////////////////
        ];
    }

    public  function download($fileID) // model binding
    {
        $file_path = File::findOrFail($fileID)->file_path;
        return Storage::download($file_path);
    }

    public function fileInfo($fileID) // model binding
    {
        $file = File::findOrFail($fileID);
        
        return view('files.file-info',compact('file'));
    }

    public function createLink($fileID)
    {
        $data = [
            'user_id' => Auth::user()->id,
            'file_id' => $fileID,
            'is_valid' => 1,
            'url' =>  Str::random(rand(5, 255)),
            'is_reusable' => 0,
        ];

        Url::create($data);

        return redirect()->route('files.my-files');
    }

    private function uploadFile(UploadedFile $file)
    {
         if($file->isValid()){
             return $file->store('files',[
                 'disk' => 'local',
             ]); 
         } else{
             throw ValidationException::withMessages([
                 'file' => 'File corrupted !!!'
             ]);
         }
    }
}
