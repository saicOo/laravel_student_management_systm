
  @extends('layouts.app')

  @section('content')
  @if (Session::has('done'))
<div class="alert alert-success" role="alert">
   {{Session::get("done")}}
</div>
@endif
  @if (Session::has('delete'))
<div class="alert alert-danger" role="alert">
   {{Session::get("delete")}}
</div>
@endif
<div class="x_content" style="overflow-x: auto;">
    <h3>Courses/List</h3>

    <table class="table table-bordered">
      <thead>
        <tr>
            <th>Course Name</th>
            <th>Branch Name</th>
            @if (Auth::user()->role == 1 )
          <th>Edit</th>
          <th>Delete</th>
          @endif
        </tr>
      </thead>
      <tbody>
          @foreach ($courses as $item)
          <tr>
              <td>{{$item->coursName}}</td>
              <td>{{$item->branchName}}</td>
              @if (Auth::user()->role == 1 )
              <td><a class="btn btn-info" href="{{route('course.edit',$item->id)}}">Edit</a></td>
              <td><a class="btn btn-danger" href="{{route('course.destroy',$item->id)}}">Delete</a></td>
              @endif
            </tr>
            @endforeach

      </tbody>
    </table>
    {{$courses->links()}}

  </div>
    @endsection
