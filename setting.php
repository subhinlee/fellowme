<?php
include ("header.php");
?>
<!--css for setting.php-->
<link rel="stylesheet" href="css/setting.css">
<script src="js/setting.js"></script>

<div class="main-content">
    <div class="main">
				<div class="widget">
                    <div class="title">
                      Regular Income  
                      <button class="btn-regIncome" onclick="regIncomeClicked();"><i class="material-icons btn-setting">add_circle</i></button>
                    </div>
					          <div class="regIncome-container">
                    <table class="table">
    <thead>
      <tr>
        <th>Category</th>
        <th>Amount</th>
        
      </tr>
    </thead>
    <tbody id="income-table">
     
    </tbody>
  </table>
                    </div>
        </div>
                <div class="widget">
                    <div class="title">
                      Regular Expense 
                      <button class="btn-regExpense" onclick="regExpenseClicked();"><i class="material-icons btn-setting">remove_circle</i></button>
                    </div>
					          <div class="regExpense-container">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Category</th>
                              <th>Amount</th>
                            </tr>
                          </thead>
                          <tbody id="expense-table">
     
                          </tbody>
                        </table>
                    </div>
                </div>
                <div class="widget">
                    <div class="title">
                      Saving
                      <button class="btn-saving" onclick="savingClicked();"><i class="material-icons btn-setting">monetization_on</i></button>
                    </div>
					          <div class="saving-container">
                          <table class="table">
                            <thead>
                              <tr>
                                <th>Category</th>
                                <th>Amount</th>
                              </tr>
                            </thead>
                            <tbody id="saving-table">
                            </tbody>
                          </table>
                    </div>
                </div>
        
	  </div>
</div>

 <!-- Modal regular Income -->
 <div class="modal fade" id="myModal-regIncome" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Regular Income</h4>
        </div>
        <div class="modal-body">
		   <p>Amount</p>
		  <input type="number" id="regIncome_amount" class="form-control" ></input>
		  <hr/>
          
		<div data-toggle="buttons" id="regIncome_desc_group">
          <label class="btn btn-default btn-circle btn-lg tool" title="Wage">
			  		<input type="radio" name="q1" value="wage">
			  		<i class="material-icons">work</i>
		      </label>
          <label class="btn btn-default btn-circle btn-lg tool" title="Student loans">
			  		<input type="radio" name="q1" value="student loan">
			  		<i class="material-icons">account_balance</i>
          </label>
          <label class="btn btn-default btn-circle btn-lg tool" title="Extra Income">
			  		<input type="radio" name="q1" value="other income">
			  		<i class="material-icons">star_rate</i>
		      </label>
    </div>
		  
        </div>
        <div class="modal-footer">
          <button onclick="addregIncomeClicked();"type="button" class="btn btn-default" data-dismiss="modal">Add</button>
        </div>
      </div>
      
    </div>
  </div>
<!-- Modal regular Expense -->
<div class="modal fade" id="myModal-regExpense" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Regular Expense</h4>
        </div>
        <div class="modal-body">
		   <p>Amount</p>
		  <input type="number" id="regExpense_amount" class="form-control" ></input>
		  <hr/>
          
		<div data-toggle="buttons" id="regExpense_desc_group">
          <label class="btn btn-default btn-circle btn-lg tool" title="Rent">
			  <input type="radio" name="q2" value="rent">
			  <i class="material-icons">location_city</i>
		  </label>
          <label class="btn btn-default btn-circle btn-lg tool" title="Utilities">
			  <input type="radio" name="q2" value="utilities">
			  <i class="material-icons">whatshot</i>
		  </label>
		  <label class="btn btn-default btn-circle btn-lg tool" title="Mobile">
			  <input type="radio" name="q2" value="mobile">
			  <i class="material-icons">smartphone</i>
		  </label>
		  <label class="btn btn-default btn-circle btn-lg tool" title="Insurance">
			  <input type="radio" name="q2" value="insurance">
			  <i class="material-icons">security</i>
		  </label>
		  <label class="btn btn-default btn-circle btn-lg tool" title="Fees">
			  <input type="radio" name="q2" value="fees">
			  <i class="material-icons">school</i>
      </label>
      <label class="btn btn-default btn-circle btn-lg tool" title="Membership">
			  <input type="radio" name="q2" value="membership">
			  <i class="material-icons">group</i>
		  </label>
		  <label class="btn btn-default btn-circle btn-lg tool" title="Cables">
			  <input type="radio" name="q2" value="internet">
			  <i class="material-icons">settings_input_antenna</i>
		  </label>
		  <label class="btn btn-default btn-circle btn-lg tool" title="Other Expense">
			  <input type="radio" name="q2" value="other expense">
			  <i class="material-icons">star</i>
		  </label>


        </div>
		  
        </div>
        <div class="modal-footer">
          <button onclick="addregExpenseClicked();" type="button" class="btn btn-default" data-dismiss="modal">Add</button>
        </div>
      </div>
      
    </div>
  </div>
  <!-- Modal Saving -->
 <div class="modal fade" id="myModal-saving" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Set your saving!</h4>
        </div>
        <div class="modal-body">
		   <p>How musch do you want to save per month?</p>
		   <input type="number" id="saving_amount" class="form-control" ></input>
		</div>
		
        <div class="modal-footer">
          <button type="button" onclick="setSavingClicked();" class="btn btn-default" data-dismiss="modal">Save</button>
        </div>
      </div>
      
    </div>
  </div>
<?php
include ("footer.php");
?>

<script>
  getSettingData();

  function populateInocme(data){
    var html = "";
    for(var i = 0; i < data.length; i++){
      html += "<tr>"+
               "<td>"+data[i].description+"</td>"+
               "<td>"+data[i].amount+" €</td>"+
               "</tr>";
      
    }
    $("#income-table").html(html);
  }
  function populateExpense(data){
    var html = "";
    for(var i = 0; i < data.length; i++){
      html += "<tr>"+
               "<td>"+data[i].description+"</td>"+
               "<td>"+data[i].amount+" €</td>"+
               "</tr>";
      
    }
    $("#expense-table").html(html);
  }
  function populateSaving(data){
    var html = "";
    for(var i = 0; i < data.length; i++){
      html += "<tr>"+
               "<td>"+data[i].description+"</td>"+
               "<td>"+data[i].amount+" €</td>"+
               "</tr>";
      
    }
    $("#saving-table").html(html);
  }
  
  function populateSettingData(result){
       populateInocme(result.data.income);
       populateExpense(result.data.expense);
       populateSaving(result.data.saving);
  }

  
  function getSettingData(){
    $.ajax({
        type: 'GET',
        contentType: 'application/json',
        url: './api/getSettingData.php?userId=' + user_id,
        dataType: "json",
        //data:  FormToJSON($('#form-banner_add')),
        success: function(result, textStatus){
          if(result['status'] == "success"){
            console.log(result);
            

            populateSettingData(result);


          }else{
            console.log(result['message']);
          }
        },
        error: function(textStatus){
          console.log(textStatus);
        }
      });
  }


</script>
<!--button styles-->
<style type="text/css">
      

	  

</style>