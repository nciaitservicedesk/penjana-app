@extends('appForm')

@section('tabTitle')
Section 5: Recruitment Plan
@endsection

@section('sectBody')
<form class="form-horizontal" method="post" action="{{ url('/sct5Save') }}">
    @csrf
    <input type="hidden" id="appId" name="appId" value="{{ $appForm['id'] ?? '' }}">
    <input type="hidden" id="act" name="act" value="{{ $loadData['act'] ?? '' }}">
    <input type="hidden" id="useFormula" name="useFormula" value="{{ $appForm['useFormula'] ?? '' }}">
    <div class="card-body">
        <!--<p>View sample form here <a href=""><i class="fa fa-eye"></i></a></p>-->

        <!-- Part A --> 
        <div class="form-group row">
          <label  class="col-sm-2 col-form-label">PART A</label>
        </div>

        <!-- First Button --> 
        <span class="table-add float-right mb-3 mr-2">
          <button type="button" class="btn btn-block btn-success save-btn">Add Row</button>
        </span>

        <!-- First Table --> 
        <table class="table table-bordered table-responsive-md" id="tbl1">
          <caption>Note: Fund is capped at a maximum of RM1,000 per month per participant for a period of 6 months. It is inclusive of 100% EPF contribution and salary. Fund payment is by reimbursement method once per quarter. 
          </caption>
          <thead class="thead-dark">
            <tr>
              <th class="thalign align-text-top" style="width:  5%"  scope="col">No.</th>
              <th class="thalign align-text-top" style="width:  25%" scope="col">Position (Position must be same as per stated in the offered letter)</th>
              <th class="thalign align-text-top" style="width:  33%" scope="col">Qualification</th>
              <th class="thalign align-text-top" style="width:  15%" scope="col">Minimum Salary (RM)</th>
              <th class="thalign align-text-top" style="width:  10%" scope="col">No. of pax (Hiring 2020)</th>
              <th class="thalign align-text-top" style="width:  15%" scope="col">Funding Request (RM)</th>
              <th class="thalign align-text-top" style="width:  5%"  scope="col"></th>
            </tr>
          </thead>
          <tbody>
            @if (count($appForm['tbl1']) > 1)
            @foreach ($appForm['tbl1'] as $tmp)
            <tr class="item" onchange="calculateAmount1(this.value)" required >
              <td class="addrow align-middle" scope="row"><input type="text" class="textboxalign" id="No1" name="No1" value="1" readonly="readonly"></td>
              <td class="align-middle"><input type="text" class="textboxalign border border-dark" id="inputPosition" name="inputPosition[]" value="{{ $tmp['inputPosition'] ?? '' }}"></td>
              <td class="align-middle">
                <select class="form-control" id="degree" name="degree[]">
                <option @if (1 == ($tmp['degree'] ?? '')) selected @endif value="1">Degree/Master/PhD</option>
                <option @if (2 == ($tmp['degree'] ?? '')) selected @endif value="2">Advance Dip/Diploma</option>
                <option @if (3 == ($tmp['degree'] ?? '')) selected @endif value="3">Certificate (SKM3 or equivalent)</option>
                <option @if (4 == ($tmp['degree'] ?? '')) selected @endif value="4">School Leavers</option>
              </select>
              </td>
              <td class="align-middle"><input type="number" min=0 oninput="validity.valid||(value='');" step="0.01" 
                class="textboxalign text-right border border-dark" id="inputSalary" name="inputSalary[]" value="{{ $tmp['inputSalary'] ?? '' }}"></td>
              <td class="align-middle"><input type="number" min=0 oninput="validity.valid||(value='');" 
                class="textboxalign border border-dark" id="inputPax" name="inputPax[]" value="{{ $tmp['inputPax'] ?? '' }}"></td>
              <td class="text-center">
                <label id="lbFormula" name="lbFormula[]"></label>
                <input type="number" class="textboxalign boldformula text-right" id="funding" name="funding" readonly="readonly"></td>
              <td>
                <span class="delete">
                  <button type="button" class="btn btn-block btn-danger">Remove</button>
                </span>
              </td>
            </tr>
            @endforeach
            @else
            <tr class="item" onchange="calculateAmount1(this.value)" required >
              <td class="addrow align-middle" scope="row"><input type="text" class="textboxalign" id="No1" name="No1" value="1" readonly="readonly"></td>
              <td class="align-middle"><input type="text" class="textboxalign border border-dark" id="inputPosition" name="inputPosition[]" value="{{ $appForm['tbl1'][0]['inputPosition'] ?? '' }}"></td>
              <td class="align-middle">
                <select class="form-control" id="degree" name="degree[]">
                <option @if (1 == ($appForm['tbl1'][0]['degree'] ?? '')) selected @endif value="1">Degree/Master/PhD</option>
                <option @if (2 == ($appForm['tbl1'][0]['degree'] ?? '')) selected @endif value="2">Advance Dip/Diploma</option>
                <option @if (3 == ($appForm['tbl1'][0]['degree'] ?? '')) selected @endif value="3">Certificate (SKM3 or equivalent)</option>
                <option @if (4 == ($appForm['tbl1'][0]['degree'] ?? '')) selected @endif value="4">School Leavers</option>
              </select>
              </td>
              <td class="align-middle"><input type="number" min=0 oninput="validity.valid||(value='');" step="0.01" 
                class="textboxalign text-right border border-dark" id="inputSalary" name="inputSalary[]" value="{{ $appForm['tbl1'][0]['inputSalary'] ?? '' }}"></td>
              <td class="align-middle"><input type="number" min=0 oninput="validity.valid||(value='');" 
                class="textboxalign border border-dark" id="inputPax" name="inputPax[]" value="{{ $appForm['tbl1'][0]['inputPax'] ?? '' }}"></td>
              <td class="text-center">
                <label id="lbFormula" name="lbFormula[]"></label>
                <input type="number" class="textboxalign boldformula text-right" id="funding" name="funding" readonly="readonly"></td>
              <td>
                <span class="delete">
                  <button type="button" class="btn btn-block btn-danger">Remove</button>
                </span>
              </td>
            </tr>
            @endif
          </tbody>
          <tfoot>
            <tr>
              <th colspan="4" style="text-align: right">TOTAL</th>
              <th><input type="number" class="textboxalign boldformula" name="totalpax" id="totalpax"  readonly="readonly"></th>
              <th><input type="number" class="textboxalign boldformula text-right" name="totalfunding" id="totalfunding"  readonly="readonly"></th>
              
            </tr>
          </tfoot>
        </table>
        <span class="text-danger" >
          @isset($errMsg['tbl1'])
          {{$errMsg['tbl1']}}
          @endisset
        </span>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label"></label>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label"></label>
        </div>

        <!-- Part B --> 
        <div class="form-group row">
          <label  class="col-sm-2 col-form-label">PART B</label>
        </div>

        <!-- Second Button --> 
        <span class="table-add2 float-right mb-3 mr-2">
          <button type="button" class="btn btn-block btn-success save-btn">Add Row</button>
        </span>

        <!-- Second Table --> 
        <table  class="table table-bordered table-responsive-md" id="tbl2">
          <caption>Note: Hiring period to commence within the first month of approval date. All hiring must be completed in Year 2020.  
          </caption>
          <thead class="thead-dark">
          <tr>
            <th class="thalign align-text-top" style="width:  5%" scope="col" colspan="2" rowspan="2">No.</th>
            <th class="thalign align-text-top" colspan="2" rowspan="2" style="width:  20%" >Position (Position must be same as per stated in the offered letter)</th>
            <th class="thalign" colspan="3" >Hiring Plan (Please state your hiring plan for the requested penjanaNCER Participants as per part A)</th>
			      <th class="thalign align-text-top" style="width:  20%" scope="col" colspan="2" rowspan="2">Total</th>										  
            <th class="thalign align-text-top" style="width:  5%" scope="col" colspan="2" rowspan="2"></th>
          </tr>
          <tr>
            <th class="thalign">Month 1</th>
            <th class="thalign">Month 2</th>
            <th class="thalign">Month 3</th>
          </tr>
        </thead>
        <tbody>
          @if (count($appForm['tbl2']) > 1)
          @foreach ($appForm['tbl2'] as $tmp)
          <tr class="item2"  onchange="calculateAmount2(this.value)" required >
            <td colspan="2"><input type="text" class="textboxalign" id="No2" name="No2" value="1" readonly="readonly"></td>
            <td colspan="2"><input type="text" class="textboxalign border border-dark" 
              id="inputPosition2" name="inputPosition2[]" value="{{ $tmp['inputPosition2'] ?? '' }}"></td>
            <td class="tdtextboxalign"><input type="number" min=0 oninput="validity.valid||(value='');" 
              class="textboxalign border border-dark" 
              id="inputMonth1" name="inputMonth1[]" value="{{ $tmp['inputMonth1'] ?? '' }}"></td>
            <td class="tdtextboxalign"><input type="number" min=0 oninput="validity.valid||(value='');" 
              class="textboxalign border border-dark" 
              id="inputMonth2" name="inputMonth2[]" value="{{ $tmp['inputMonth2'] ?? '' }}"></td>
            <td class="tdtextboxalign"><input type="number" min=0 oninput="validity.valid||(value='');" 
              class="textboxalign border border-dark" 
              id="inputMonth3" name="inputMonth3[]" value="{{ $tmp['inputMonth3'] ?? '' }}"></td>
			      <td colspan="2"><input type="number" class="textboxalign boldformula" name="totalfundingmonth" id="totalfundingmonth"  readonly="readonly"></td>
            <td colspan="2">
              <span class="delete">
                <button type="button" class="btn btn-block btn-danger">Remove</button>
              </span>
            </td>
          </tr>
          @endforeach
          @else
          <tr class="item2"  onchange="calculateAmount2(this.value)" required >
            <td colspan="2"><input type="text" class="textboxalign" id="No2" name="No2" value="1" readonly="readonly"></td>
            <td colspan="2"><input type="text" class="textboxalign" 
              id="inputPosition2" name="inputPosition2[]" value="{{ $appForm['tbl2'][0]['inputPosition2'] ?? '' }}"></td>
            <td class="tdtextboxalign"><input type="number" min=0 oninput="validity.valid||(value='');" class="textboxalign" 
              id="inputMonth1" name="inputMonth1[]" value="{{ $appForm['tbl2'][0]['inputMonth1'] ?? '' }}"></td>
            <td class="tdtextboxalign"><input type="number" min=0 oninput="validity.valid||(value='');" class="textboxalign" 
              id="inputMonth2" name="inputMonth2[]" value="{{ $appForm['tbl2'][0]['inputMonth2'] ?? '' }}"></td>
            <td class="tdtextboxalign"><input type="number" min=0 oninput="validity.valid||(value='');" class="textboxalign" 
              id="inputMonth3" name="inputMonth3[]" value="{{ $appForm['tbl2'][0]['inputMonth3'] ?? '' }}"></td>
			      <td colspan="2"><input type="number" class="textboxalign boldformula" name="totalfundingmonth" id="totalfundingmonth"  readonly="readonly"></td>
            <td colspan="2">
              <span class="delete">
                <button type="button" class="btn btn-block btn-danger">Remove</button>
              </span>
            </td>
          </tr>
          @endif
        </tbody>
		    <tfoot>
            <tr>
              <th colspan="7" style="text-align: right">TOTAL</th>
              <th colspan="2"><input type="number" class="textboxalign boldformula" name="totalpax2" id="totalpax2"  readonly="readonly"></th>
            </tr>
        </tfoot>
        </table>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label"></label>
        </div>
        <span class="text-danger" >
          @isset($errMsg['tbl2'])
          {{$errMsg['tbl2']}}
          @endisset
        </span>
        <!-- /.card-body -->
        <div class="card-footer">
          <button type="submit" class="btn btn-success save-btn float-right">Save and Proceed</button>
        </div>
              <!-- /.card-footer -->
    </div>
  </form>
@endsection

@section('jsscript')
<script>
  // Add Row and Remove Row for Table 1
  const newTr = `
            <tr class="item" onchange="calculateAmount1(this.value)" required >
              <td class="addrow" scope="row"><input type="text" class="textboxalign" id="No1" name="No1" value=""></td>
              <td><input type="text" class="textboxalign" id="inputPosition" name="inputPosition[]"></td>
              <td>
                <select class="form-control" id="degree" name="degree[]">
                <option value="1">Degree/Master/PhD</option>
                <option value="2">Advance Dip/Diploma</option>
                <option value="3">Certificate (SKM3 or equivalent)</option>
                <option value="4">School Leavers</option>
              </select>
              </td>
              <td><input type="number" min=0 oninput="validity.valid||(value='');" class="textboxalign text-right" id="inputSalary" name="inputSalary[]"></td>
              <td><input type="number" min=0 oninput="validity.valid||(value='');" class="textboxalign" id="inputPax" name="inputPax[]"></td>
              <td  class="text-center"><label id="lbFormula" name="lbFormula[]"></label><input type="number" class="textboxalign boldformula text-right" id="funding" name="funding" readonly="readonly"></td>
              <td>
                <span class="delete">
                  <button type="button" class="btn btn-block btn-danger">Remove</button>
                </span>
              </td>
            </tr>`;

    $(document).ready(function(){
      setRowNoTbl1();
      setRowNoTbl2();
      calculateAmount1();
      calculateAmount2();
    });
  function setRowNoTbl1(){
    var count = 1;
    $("tr.item").each(function() {
      $(this).find("input#No1").val(count++);
    });
  }

  function setRowNoTbl2(){
    var count = 1;
    $("tr.item2").each(function() {
      $(this).find("input#No2").val(count++);
    });
  }
  
  $('.table-add').on('click', 'button', () => {
    if ($('#tbl1 tbody tr:last').length==0){
      $('#tbl1 tbody').after(newTr);  
    }
    else{
      $('#tbl1 tbody tr:last').after(newTr);
    }
    setRowNoTbl1();
  });

  
  $(document).on("click", ".delete", function(){
      $(this).parents("tr").remove();
      $(".add-new").removeAttr("disabled");
      setRowNoTbl1();
      calculateAmount1();
  });

  // Calculate Funding Request for Table 1
  function calculateAmount1(val1) {
    var useFormula = document.getElementById("useFormula").value;
    var total = 0, totalpax = 0 ;
    $("tr.item").each(function() {
          var salary = $(this).find("input#inputSalary").val(),
          degree = $(this).find("select#degree").children("option:selected").val(),
          //pax = $(this).find("input#inputPax").val();
          pax = $(this).find("input#inputPax").val()!=""? parseInt($(this).find("input#inputPax").val(), 10) : 0;
          debugger;
          if(useFormula=='0' && degree=='1'){
            ntep = 1000;
          }else{
            ntep = (salary / 2)>1000? 1000 : (salary / 2);
          }
          $(this).find("#lbFormula").text((ntep.toString() + " X " + pax.toString()));
          $(this).find("input#funding").val((ntep * pax).toFixed(2));
          

          total += (ntep * pax);
          totalpax += pax;
    });
    //put in total value
    $('#totalpax').val(totalpax);
    $('#totalfunding').val(total.toFixed(2));

  }

  // Add Row and Remove Row for Table 2
  const newTr2 = `
          <tr class="item2"  onchange="calculateAmount2(this.value)" required >
            <td colspan="2"><input type="text" class="textboxalign" id="No1" name="No1" value=""></td>
            <td colspan="2"><input type="text" class="textboxalign" id="inputPosition2" name="inputPosition2[]"></td>
            <td class="tdtextboxalign"><input type="number" min=0 oninput="validity.valid||(value='');" class="textboxalign" id="inputMonth1" name="inputMonth1[]"></td>
            <td class="tdtextboxalign"><input type="number" min=0 oninput="validity.valid||(value='');" class="textboxalign" id="inputMonth2" name="inputMonth2[]"></td>
            <td class="tdtextboxalign"><input type="number" min=0 oninput="validity.valid||(value='');" class="textboxalign" id="inputMonth3" name="inputMonth3[]"></td>
			<td colspan="2"><input type="number" class="textboxalign boldformula" name="totalfundingmonth" id="totalfundingmonth"  readonly="readonly"></td>	   
            <td colspan="2">
              <span class="delete">
                <button type="button" class="btn btn-block btn-danger">Remove</button>
              </span>
            </td>
          </tr>`;

  $('.table-add2').on('click', 'button', () => {
    if ($('#tbl2 tbody tr:last').length == 0 ){
      $('#tbl2 tbody').after(newTr2);
    }
    else{
      $('#tbl2 tbody tr:last').after(newTr2);
    }
    setRowNoTbl2();
  });

  
  $(document).on("click", ".delete", function(){
    $(this).parents("tr").remove();
    $(".add-new").removeAttr("disabled");
    setRowNoTbl2();
    calculateAmount2();
  });

  function calculateAmount2(val2) {
    var totalfunding = 0 ;
    $("tr.item2").each(function() {
        var month1 = $(this).find("input#inputMonth1").val();
        var month2 = $(this).find("input#inputMonth2").val();
        var month3 = $(this).find("input#inputMonth3").val();
        var sum = Number(month1) + Number(month2) + Number(month3);
        $(this).find("input#totalfundingmonth").val(sum);

        totalfunding += sum;
    });
    //put in total value
    $('#totalpax2').val(totalfunding);
    setRowNoTbl2();
  }

</script>
@endsection