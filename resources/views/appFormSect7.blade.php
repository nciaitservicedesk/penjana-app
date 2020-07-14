@extends('appForm')

@section('tabTitle')
Section 7: Declaraction
@endsection

@section('sectBody')
<form class="form-horizontal" method="post" action="{{ url('/sct7Save') }}">
    @csrf
    <input type="hidden" id="appId" name="appId" value="{{ $appForm['id'] ?? '' }}">
    <div class="card-body">
        <h5>Application Preview</h5>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label"></label>
        </div>
        @php
            $prevData = $loadData['previewData'];
        @endphp
        <div style="height:700px; width:880px; border:none; overflow:scroll; overflow-x:hidden; overflow-y:scroll;">
          <p>
          <x-preview  :previewData=$prevData />
          </p>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label"></label>
        </div>
        
        <div class="col-12">
          <span class="text-danger" style="font-weight: bold;" >
            @isset($errMsg['chkTnc'])
            {{$errMsg['chkTnc']}}<br/>
            @endisset
          </span>
          <div class="custom-control custom-checkbox">
            <input class="custom-control-input" type="checkbox" id="chkTnc" name="chkTnc" value="checked" />
            <label for="chkTnc" class="custom-control-label">I/We take full responsibility for all information submitted to NCIA. I/We, duly authorized on behalf of the Company:</label>
          </div>
          <ol>
             <li>hereby confirm and declare that to the best of my/our knowledge all information given above is true and complete and in agreement to the terms and conditions,</li>
             <li>hereby furnished all the required documents as specified in the checklist,</li>
             <li>agree and understand that NCIA, in its carrying out its function pursuant to Northern Corridor Implementation Authority Act, 2008 [Act 687] may disclose the Company’s information as and when necessary and only for purposes under Act 687 to relevant Ministries, government bodies or government appointed bodies,</li>
             <li>agree and understand that NCIA, at its absolute discretion, may raise queries or concerns and/ or request for further information/ clarifications, if needed. In such an event, I/We hereby warrant that I/We will provide all necessary assistance and information/ documents requested by NCIA to NCIA’s satisfaction.</li>
            </ol> 
         </div>

         <div class="form-group row">
          <label class="col-sm-2 col-form-label"></label>
        </div>


         <table class="table table-bordered table-sm" align="center" style="width:350px" >
          <thead class="thead-dark">
            <tr>
              <th class="thalign" scope="col">Application Signature</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              
            </tr>
            <tr>
              <th scope="row">
                <div class="row">
                  <div class="col-sm-4">
                      <label>NAME:</label>
                  </div>
                  <div class="col-sm-8">
                    <span class="text-danger" >
                      @isset($errMsg['name'])
                      {{$errMsg['name']}}<br/>
                      @endisset
                    </span>
                    <input type="text" class="text-sm-left border" name="inputSignName" id="inputSignName" 
                    value="{{ $appForm['inputSignName'] ?? '' }}">
                  </div>
                </div>
              </th>
            </tr>
            <tr>
              <th scope="row">
                <div class="row">
                  <div class="col-sm-4">
                      <label>POSITION:</label>
                  </div>
                  <div class="col-sm-8">
                    <span class="text-danger" >
                      @isset($errMsg['position'])
                      {{$errMsg['position']}}<br/>
                      @endisset
                    </span>
                    <input type="text" class="text-sm-left border" 
                    name="inputSignPosition" id="inputSignPosition" value="{{ $appForm['inputSignPosition'] ?? '' }}">
                  </div>
                </div>
              </th>
            </tr>
            <tr>
              <th scope="row">
                <div class="row">
                  <div class="col-sm-4">
                      <label>DATE:</label>
                  </div>
                  <div class="col-sm-8">
                      <input type="text" class="text-sm-left border" name="inputSignDate" id="inputSignDate"
                      value="{{ $appForm['inputSignDate'] ?? '' }}" readonly>
                </div>
              </th>
            </tr>
            <tr>
              <th scope="row">
                <div class="row">
                  <div class="col-sm-4">
                      <label>CONTACT NO:</label>
                  </div>
                  <div class="col-sm-8">
                    <span class="text-danger" >
                      @isset($errMsg['contact_no'])
                      {{$errMsg['contact_no']}}<br/>
                      @endisset
                    </span>
                    <input type="number" class="text-sm-left border" name="inputSignContact" id="inputSignContact" 
                    min=0 oninput="validity.valid||(value='');" value="{{ $appForm['inputSignContact'] ?? '' }}">
                  </div>
                </div>
              </th>
            </tr>
            <tr>
              <th scope="row">
                <div class="row">
                  <div class="col-sm-4">
                      <label>EMAIL:</label>
                  </div>
                  <div class="col-sm-8">
                    <span class="text-danger" >
                      @isset($errMsg['email'])
                      {{$errMsg['email']}}<br/>
                      @endisset
                    </span>
                    <input type="text" class="text-sm-left border" 
                    name="inputSignEmail" id="inputSignEmail" value="{{ $appForm['inputSignEmail'] ?? '' }}">
                  </div>
                </div>
              </th>
            </tr>
            <tr>
              <th scope="row">
                <div class="row">
                  <div class="col-sm-4">
                      <label>IC NO:</label>
                  </div>
                  <div class="col-sm-8">
                    <span class="text-danger" >
                      @isset($errMsg['ic_no'])
                      {{$errMsg['ic_no']}}<br/>
                      @endisset
                    </span>
                    <input type="text" class="text-sm-left border" name="inputSignIc" id="inputSignIc"
                    value="{{ $appForm['inputSignIc'] ?? '' }}">
                  </div>
                </div>
              </th>
            </tr>
            <tr>
              <th scope="row">
                <div class="row">
                  <div class="col-sm-4">
                      <label>LOGIN PASSWORD:</label>
                  </div>
                  <div class="col-sm-8">
                    <span class="text-danger" >
                      @isset($errMsg['inputPassword'])
                      {{$errMsg['inputPassword']}}<br/>
                      @endisset
                    </span>
                    <input type="password" class="text-sm-left border" name="inputPassword" id="inputPassword">
                  </div>
                  </div>
                </div>
              </th>
            </tr>
          </tbody>
        </table>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label"></label>
        </div>

    <!-- /.card-body -->
    <div class="card-footer">
      <button type="submit" class="btn btn-success save-btn float-right">Submit</button>
    </div>
    <!-- /.card-footer -->
  </form>
@endsection

@section('jsscript')
<script>
  $(document).ready(function(){
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    today = dd + '-' + mm  + '-' + yyyy;
    document.getElementById("inputSignDate").value = today;
  });
  
</script>
@endsection 