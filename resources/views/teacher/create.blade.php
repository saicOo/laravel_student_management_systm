
  @extends('layouts.app')

  @section('content')
  @if (Auth::user()->role == 1 )

  @if (Session::has('done'))
  <div class="alert alert-success" role="alert">
      {{Session::get("done")}}
    </div>
    @endif
    <h3>Teacher/Add</h3>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="x_content">
                    <br />
                    <form action="{{route("teacher.store")}}" method="POST" id="demo-form2"  enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                        @csrf
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">teacher Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{ old('fName') }}" name="fName" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Father's Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input name="lName" type="text" id="last-name" value="{{ old('lName') }}" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Phone Number<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input value="{{ old('phone') }}" name="phone"  class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="branchId">Branch name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="branchId" id="branchId" class="branches form-control col-md-7 col-xs-12">
                                    <option value="">-- Select Branchs --</option>
                                    @foreach ($branchs as $item)
                                    <option value="{{$item->id}}">{{$item->branchName}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Course: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="course_id" id="course_id" class="courses form-control col-md-7 col-xs-12">
                                    <option>-- Select Course --</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Image: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input  name="image" id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="file">
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button class="btn btn-primary" type="reset">Reset</button>
                                <button type="submit" name="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    @else
 <!-- page content 404 -->
 <div class="col-md-12">
    <div class="col-middle">
      <div class="text-center text-center">
        <h1 class="error-number">404</h1>
        <h2>Sorry but we couldn't find this page</h2>
        <p>This page you are looking for does not exist
        </p>
      </div>
    </div>
  </div>
  <!-- /page content 404 -->
    @endif
    @endsection
    @push('footer-scripts')
    <script type="text/javascript">
    $(document).on('change','.branches',function(){
    branchId = $(this).val();
    $.ajax({
        url: '{{route("courses.get")}}',
        dataType: "json",
        data: {"id":branchId, "_token": "{{ csrf_token() }}"},
        method: "post",
        success: function(data){
            var courses = '<option>-- Select Course --</option>';
            var arr = data.Course.length;
            var aa = data.Course;
            for(var i=0;i<arr;i++){
               courses += '<option value="'+aa[i].id+'">'+aa[i].coursName+'</option>';
            }
            $(".courses").html(courses);
        }
    });
});
</script>
@endpush
