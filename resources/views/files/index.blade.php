@extends('layouts.main-page')

@section('name', Auth::user()->name)

@section('content')

<table class="table table-striped">
    <tr style="color:black;">
        <th>No.</th>
        <th>File Name</th>
        <th>Description</th>
        <th class="text-center">Downloaded No.</th>
        <th>status</th>
        <th class="text-center">Accessible From</th>
        <th>Actions</th>        
    </tr>
    @foreach($files as $file)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $file->file_name }}</td>
            <td>{{ $file->description }}</td>
            <td class="text-center">{{ $file->number_of_downloads }}</td>

            
            <td class="col-centered">
                <div style="width:100px; text-align:center;" class="btn-round  btn-sm btn-{{ $status[$file->status] }}"> {{ $file->status }} </div>
            </td>
            
            
            <td style="text-align: center;">{{ $file->number_of_people }}</td>
            <td>    
                <a  class="btn btn-info btn-sm">copy link</a>
                <a href="{{ route('files.info',$file->id) }}" class="btn btn-info btn-sm">info</a>
                            
                <a href="{{ route('files.edit', $file->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <a class="btn btn-danger btn-sm">Delete</a>
                <a href="{{ route('files.download',$file->id) }} " class="btn btn-danger btn-sm">Download</a>
            </td>        
        </tr>
    @endforeach
</table>

@endsection

