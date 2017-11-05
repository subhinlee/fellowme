<?php
include("header.php");
?>
<!--css for setting.php-->
<link rel="stylesheet" href="css/setting.css">
<script src="js/setting.js"></script>
<div class="main-content">
    <div class="main">
				<div class="widget">
					<div class="title">Setting</div>
					<div class="chart"></div>
				</div>
	</div>
    
    <div class="setting_container">
				<button class="btn-regIncome" onclick="regIncomeClicked();"><i class="material-icons btn-setting">add_circle</i></button>
				<button class="btn-regExpense" onclick="regExpenseClicked();"><i class="material-icons btn-setting">remove_circle</i></button>
                <button class="btn-saving" onclick="savingClicked();"><i class="material-icons btn-setting">monetization_on</i></button>
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
          <label class="btn btn-default btn-circle btn-lg">
			  		<input type="radio" name="q1" value="wage">
			  		<i class="material-icons">work</i>
		  </label>
          <label class="btn btn-default btn-circle btn-lg">
			  		<input type="radio" name="q1" value="student loan">
			  		<i class="material-icons">account_balance</i>
          </label>
          <label class="btn btn-default btn-circle btn-lg">
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
          <label class="btn btn-default btn-circle btn-lg">
			  <input type="radio" name="q2" value="rent">
			  <i class="material-icons">local_dining</i>
		  </label>
          <label class="btn btn-default btn-circle btn-lg">
			  <input type="radio" name="q2" value="utilities">
			  <i class="material-icons">local_grocery_store</i>
		  </label>
		  <label class="btn btn-default btn-circle btn-lg">
			  <input type="radio" name="q2" value="mobile">
			  <i class="material-icons">local_bar</i>
		  </label>
		  <label class="btn btn-default btn-circle btn-lg">
			  <input type="radio" name="q2" value="insurance">
			  <i class="material-icons">local_activity</i>
		  </label>
		  <label class="btn btn-default btn-circle btn-lg">
			  <input type="radio" name="q2" value="fees">
			  <i class="material-icons">local_mall</i>
		  </label>
		  <label class="btn btn-default btn-circle btn-lg">
			  <input type="radio" name="q2" value="internet">
			  <i class="material-icons">terrain</i>
		  </label>
		  <label class="btn btn-default btn-circle btn-lg">
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
include("footer.php");
?>

<script>
  function regIncomeClicked(){
	$("#myModal-regIncome").modal();
  }

  function regExpenseClicked(){
    $("#myModal-regExpense").modal();
  }
  function savingClicked(){
    $("#myModal-saving").modal();
  }
</script>
<!--button styles-->
<style type="text/css">
      
      .btn-circle {
        width: 30px;
        height: 30px;
        text-align: center;
        padding: 6px 0;
        font-size: 12px;
        line-height: 1.428571429;
        border-radius: 15px;
      }
      .btn-circle.btn-lg {
        width: 50px;
        height: 50px;
        padding: 13px 13px;
        font-size: 18px;
        line-height: 1.33;
		border-radius: 25px;
		
	  }
	  .btn {
		  outline:0 !important;
	  }
	  

  </style>