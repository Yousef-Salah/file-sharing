@extends('layouts.main-page')

@section('content')

<table class="table table-striped">
    <tr style="color:black;">
        <th>File Name</th>
        <th>Description</th>
        <th>Downloaded Numbers</th>
        <th>status</th>
        <th>Accessible From</th>
        <th>Actions</th>        
    </tr>
    <tr>
        <td>File Name</td>
        <td>Description</td>
        <td>Downloaded Numbers</td>
        <td>status</td>
        <td>Accessible From</td>
        <td>
            <a class="btn btn-info btn-sm">Preview</a>
            <a class="btn btn-primary btn-sm">Share</a>
            <a class="btn btn-warning btn-sm">Edit</a>
            <a class="btn btn-danger btn-sm">Delete</a>
        </td>        
    </tr>
</table>

@endsection

