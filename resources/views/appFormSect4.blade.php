@extends('appForm')

@section('tabTitle')
Financial Details
@endsection

@section('sectBody')
<form class="form-horizontal" method="post" action="{{ url('/sct4Save') }}">
    @csrf
    <input type="hidden" id="appId" name="appId" value="{{ $appForm['id'] ?? '' }}">
    <input type="hidden" id="act" name="act" value="{{ $loadData['act'] ?? '' }}">
    <div class="card-body">
        <p>View sample form here <a href=""><i class="fa fa-eye"></i></a></p>
<!-- Table Part B --> 
<table class="table table-bordered" >
  <caption>Note: Please provide Management Account for Year3 if audited account is not available</caption>
  <thead class="thead-dark">
    <tr>
      <th class="thalign" style="width:  30%" scope="col">Financial (RM)/Year</th>
      <th class="thalign" style="width:  20%" scope="col">2017</th>
      <th class="thalign" style="width:  20%" scope="col">2018</th>
      <th class="thalign" style="width:  20%" scope="col">2019</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Revenue /Sales</th>
      <td><input type="number" min=0 oninput="validity.valid||(value='');" class="textboxalign" 
        id="inputRevYear1" name="inputRevYear1" value="{{ $appForm['inputRevYear1'] ?? '' }}">
        <span class="text-danger" >
          @isset($errMsg['inputRevYear1'])
          {{$errMsg['inputRevYear1']}}
          @endisset
        </span>
      </td>
      <td><input type="number" min=0 oninput="validity.valid||(value='');" class="textboxalign" 
        id="inputRevYear2" name="inputRevYear2" value="{{ $appForm['inputRevYear2'] ?? '' }}">
        <span class="text-danger" >
          @isset($errMsg['inputRevYear2'])
          {{$errMsg['inputRevYear2']}}
          @endisset
        </span>
      </td>
      <td><input type="number" min=0 oninput="validity.valid||(value='');" class="textboxalign" 
        id="inputRevYear3" name="inputRevYear3" value="{{ $appForm['inputRevYear3'] ?? '' }}">
        <span class="text-danger" >
          @isset($errMsg['inputRevYear2'])
          {{$errMsg['inputRevYear2']}}
          @endisset
        </span>
      </td>
    </tr>
    <tr>
      <th scope="row">Net Profit/ (Loss) Before Tax</th>
      <td><input type="number" min=0 oninput="validity.valid||(value='');" class="textboxalign" 
        id="inputNetYear1" name="inputNetYear1" value="{{ $appForm['inputNetYear1'] ?? '' }}">
        <span class="text-danger" >
          @isset($errMsg['inputNetYear1'])
          {{$errMsg['inputNetYear1']}}
          @endisset
        </span></td>
      <td><input type="number" min=0 oninput="validity.valid||(value='');" class="textboxalign" 
        id="inputNetYear2" name="inputNetYear2" value="{{ $appForm['inputNetYear2'] ?? '' }}">
        <span class="text-danger" >
          @isset($errMsg['inputNetYear2'])
          {{$errMsg['inputNetYear2']}}
          @endisset
        </span></td>
      <td><input type="number" min=0 oninput="validity.valid||(value='');" class="textboxalign" 
        id="inputNetYear3" name="inputNetYear3" value="{{ $appForm['inputNetYear3'] ?? '' }}">
        <span class="text-danger" >
          @isset($errMsg['inputNetYear3'])
          {{$errMsg['inputNetYear3']}}
          @endisset
        </span></td>
    </tr>
    <tr>
      <th scope="row">Capital Expenditure</th>
      <td><input type="number" min=0 oninput="validity.valid||(value='');" class="textboxalign" 
        id="inputCapYear1" name="inputCapYear1" value="{{ $appForm['inputCapYear1'] ?? '' }}">
        <span class="text-danger" >
          @isset($errMsg['inputCapYear1'])
          {{$errMsg['inputCapYear1']}}
          @endisset
        </span></td>
      <td><input type="number" min=0 oninput="validity.valid||(value='');" class="textboxalign" 
        id="inputCapYear2" name="inputCapYear2" value="{{ $appForm['inputCapYear2'] ?? '' }}">
        <span class="text-danger" >
          @isset($errMsg['inputCapYear2'])
          {{$errMsg['inputCapYear2']}}
          @endisset
        </span></td>
      <td><input type="number" min=0 oninput="validity.valid||(value='');" class="textboxalign" 
        id="inputCapYear3" name="inputCapYear3" value="{{ $appForm['inputCapYear3'] ?? '' }}">
        <span class="text-danger" >
          @isset($errMsg['inputCapYear3'])
          {{$errMsg['inputCapYear3']}}
          @endisset
        </span></td>
    </tr>
    <tr>
      <th scope="row">Operational Expenditure</th>
      <td><input type="number" min=0 oninput="validity.valid||(value='');" class="textboxalign" 
        id="inputOpYear1" name="inputOpYear1" value="{{ $appForm['inputOpYear1'] ?? '' }}">
        <span class="text-danger" >
          @isset($errMsg['inputOpYear1'])
          {{$errMsg['inputOpYear1']}}
          @endisset
        </span></td>
      <td><input type="number" min=0 oninput="validity.valid||(value='');" class="textboxalign" 
        id="inputOpYear2" name="inputOpYear2" value="{{ $appForm['inputOpYear2'] ?? '' }}">
        <span class="text-danger" >
          @isset($errMsg['inputOpYear2'])
          {{$errMsg['inputOpYear2']}}
          @endisset
        </span></td>
      <td><input type="number" min=0 oninput="validity.valid||(value='');" class="textboxalign" 
        id="inputOpYear3" name="inputOpYear3" value="{{ $appForm['inputOpYear3'] ?? '' }}">
        <span class="text-danger" >
          @isset($errMsg['inputOpYear3'])
          {{$errMsg['inputCapYear3']}}
          @endisset
        </span></td>
    </tr>
  </tbody>
</table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <button type="submit" class="btn btn-success save-btn float-right">Save</button>
    </div>
    <!-- /.card-footer -->
  </form>
@endsection