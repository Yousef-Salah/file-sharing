@extends('layouts.main-page')

@section('content')

          <!-- top tiles -->
          <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-file"></i> Total Uploaded Files </span>
              <div class="count">{{ $totalFiles }}</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>

            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i> Number of Previews  </span>
              <div class="count">123.50</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-download"></i> Total successful Downloaded </span>
              <div class="count green">2,500</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-users"></i> Total Friends </span>
              <div class="count">4,567</div>
              <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Collections</span>
              <div class="count">2,315</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-trash"></i> Trashed Files </span>
              <div class="count">7,325</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
          </div>
          <!-- /top tiles -->


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
                <a onclick="event.preventDefault(); CopyLink(' {{config('app.url') . '/down/'.  $file->link->url }}');" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Copy Link">
                    <i class="fa fa-link"></i>
                </a>

                <a href="{{ route('files.info',$file->id) }}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="File Info">
                    <i class="fa fa-info"></i>
                </a>
                            
                <a href="{{ route('files.edit', $file->id) }}" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Edit">&#9998;</a>

                <form id="delete" hidden method="post" action="{{ route('files.destroy',$file->id) }}">
                    @csrf
                    @method('delete')
                </form>

                <a  onclick="event.preventDefault(); $('#delete').submit()" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete">
                    <i class="fa fa-trash"></i>
                </a>
                
                <a href="{{ route('files.download',$file->id) }} " class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Download">
                    <i class="fa fa-download"></i>
                </a>
            </td>        
        </tr>
    @endforeach
</table>

@endsection

@push('script')
<script src="{{ asset('js/copyLink.js') }}"></script>
@endpush
