  @extends('layouts.app')
  @section('content')
  @if (Auth::user()->role == 1 )
  @if (Session::has('done'))
<div class="alert alert-success" role="alert">
   {{Session::get("done")}}
</div>
@endif
<h3>Branch/Add</h3>
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
          <form action="{{route('branch.store')}}" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
@csrf
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="branchName">Branch Name <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="branchName" id="branchName" required="required" class="form-control col-md-7 col-xs-12">
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
