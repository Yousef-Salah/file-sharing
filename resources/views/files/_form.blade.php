<x-forms.input value="{{old('file_name', $file->file_name)}}" name="file_name" id="file_name" type="text" placeholder="Enter File Name..." label="File Name" />

<div class="form-group">
    <label for="description" class="col-sm-2 control-label">Description</label>
    <textarea name="description" class="col-sm-10">{{ old('description', $file->description) }}</textarea>
</div>

<div class="form-group">
    <label for="status" class="col-sm-2 control-label">Status</label>
    <select name="status" class="coll-sm-10">
            <option value="">Select one..</option>
        @foreach($status as $key => $value)
            <option  @if($key == old('status',$file->status)) selected @endif name="{{ $key }}"> {{ $key }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="file" class="col-sm-2 control-label">Upload File</label>
    <input type="file" name="file" id="file" onchange="loadImage(event)">
</div>

<div class="form-group">
    <img id="image" width="200px">
</div>


<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Create</button>
    </div>
</div>

@push('script')
    <script>
        var  loadImage = function(event){
            var image = document.getElementById('image');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endpush