@extends('master')

@section('content')
<section class="content">

  <!-- Application Status tittle--> 
<h5 class="mt-4 mb-2">Application Appeal Form</h5>
<form method="post" enctype="multipart/form-data" action="{{ url('/appeal') }}">
  <div class="card-body">
      @csrf
      <div class="form-group row ">
        <p>If you decide that you have eligible grounds for appeal you should write down your reason in the comment box
          and upload any (can submit as many as you want) supporting documentary evidence.
        </p>
      </div>
    <div class="col-sm-8" style="display:flex;flex-direction:column;margin:auto;">
      
      <div class="form-group row">
        <div class="col-sm-2">
          <label>Comment:<span> &nbsp;&nbsp;</span> </label> 
        </div>
        <div class="col-sm-10" style="box-sizing:border-box;padding-right:0px;">
          <textarea id="textarea" name="textarea" rows="6" style="box-sizing:border-box;width:100%" 
          placeholder="Type your reason for appeal here"></textarea>
        </div>
      </div>
      <div class="form-group row ">
        <label class="col-sm-2 col-form-label"></label>
      </div>
      <div class="input-group form-group row">
        <span class="text-danger" for="supportFile">
          @isset($errMsg['errFile'])
          {{$errMsg['errFile']}}
          @endisset
        </span>
      </div>
      <div class="input-group form-group row">
        
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="supportFile" name="supportFile" value="inputGroupFile01"
            aria-describedby="inputGroupFileAddon01">
          <label class="custom-file-label" for="supportFile">Choose file</label>
        </div>
        <div class="input-group-prepend">
          <button type="submit" class="btn btn-success save-btn">Upload</button>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label"></label>
      </div>
      <div class="form-group row">
        <table class="table table-bordered" style="" >
          <thead class="thead-dark">
            <tr>
                <th>
                  Files
                </th>
                <th>
                </th>
            </tr>
          </thead>
          <tbody>
              @if (count($fileList) > 0)
              @foreach ($fileList as $row)
              <tr>
                <td><a href="{{ url("/appFile/".$appId."/".urlencode($row['original_name'])) }}" target="_blank"> {{ $row['original_name'] }}</a></td>
                <td><button type="submit" name="btnRemove" 
                value="{{$row['id']}}"
                  class="btn btn-danger">Remove</button></td>
              </tr>
              @endforeach
              @endif
            </tbody>
        </table>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label"></label>
      </div>
    </div>
  
  </div>
  <!-- /.card-body -->
  <div class="card-footer">
    <button type="submit" name="btnSubmit" value="submission" class="btn btn-success save-btn float-right">
      Submit Appeal</button>
  </div>
</form>
  <!-- /.card-footer -->

</section>
@endsection

@section('jsscript')
<!-- Page script -->
<script>
  $(document).ready(function () {
    bsCustomFileInput.init();
  });
</script>
@endsection















