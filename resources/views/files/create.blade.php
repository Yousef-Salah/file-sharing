@extends('layouts.main-page')

@section('title','Upload New File')

@section('content')

<form style="color:black; font-size:16px;" class="form-horizontal">

    <x-forms.input name="file_name" id="file_name" type="text" placeholder="Enter File Name..." label="File Name"/>
    
    <div class="form-group">
        <label for="description" class="col-sm-2 control-label">Description</label>
        <textarea class="col-sm-10"></textarea>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </div>
</form>

@endsection