<?php
include("header.php");
?>
<!--index.css-->
<link rel="stylesheet" href="css/index.css">
<script src="js/index.js"></script>
<!--index main content-->
<div class="main-content">
			<div class="title">
				  <div class="goal-container">
					    <div class="progress">
            			<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40"
            			 aria-valuemin="0" aria-valuemax="100" style="width:40%">
            	 		40% Complete (success)
						      </div>
					    </div>
						  <button class="btn-goal" onclick="goalClicked();"><i class="material-icons btn-plus-minus">bubble_chart</i></button>
				  </div>
			</div>

			<div class="main">
				<div class="widget">
					<div class="title">Todays Budget</div>
					<div class="chart"></div>
				</div>
			</div>
			<div class="plus-minus">
				<button class="btn-income" onclick="incomeClicked();"><i class="material-icons btn-plus-minus">add_circle</i></button>
				<button class="btn-expense" onclick="expenseClicked();"><i class="material-icons btn-plus-minus">remove_circle</i></button>
			</div>
</div>



 <!-- Modal Income -->
 <div class="modal fade" id="myModal-income" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Today's Income</h4>
        </div>
        <div class="modal-body">
		   <p>Amount</p>
		  <input type="number" id="amount" class="form-control" ></input>
		  <hr/>
          
		<div data-toggle="buttons" id="desc_group">
          <label class="btn btn-default btn-circle btn-lg">
			  		<input type="radio" name="q1" value="extra income">
			  		<i class="material-icons">euro_symbol</i>
		  		</label>
          <label class="btn btn-default btn-circle btn-lg">
			  		<input type="radio" name="q1" value="bonus">
			  		<i class="material-icons">star_rate</i>
		  		</label>
    </div>
		  
        </div>
        <div class="modal-footer">
          <button onclick="addIncomeClicked();"type="button" class="btn btn-default" data-dismiss="modal">Add</button>
        </div>
      </div>
      
    </div>
  </div>
<!-- Modal Expense -->
<div class="modal fade" id="myModal-expense" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Today's Expense</h4>
        </div>
        <div class="modal-body">
		   <p>Amount</p>
		  <input type="number" id="expense_amount" class="form-control" ></input>
		  <hr/>
          
		<div data-toggle="buttons" id="expense_desc_group">
          <label class="btn btn-default btn-circle btn-lg">
			  <input type="radio" name="q2" value="food">
			  <i class="material-icons">local_dining</i>
		  </label>
          <label class="btn btn-default btn-circle btn-lg">
			  <input type="radio" name="q2" value="supermarket">
			  <i class="material-icons">local_grocery_store</i>
		  </label>
		  <label class="btn btn-default btn-circle btn-lg">
			  <input type="radio" name="q2" value="nightout">
			  <i class="material-icons">local_bar</i>
		  </label>
		  <label class="btn btn-default btn-circle btn-lg">
			  <input type="radio" name="q2" value="entertainment">
			  <i class="material-icons">local_activity</i>
		  </label>
		  <label class="btn btn-default btn-circle btn-lg">
			  <input type="radio" name="q2" value="shopping">
			  <i class="material-icons">local_mall</i>
		  </label>
		  <label class="btn btn-default btn-circle btn-lg">
			  <input type="radio" name="q2" value="activity">
			  <i class="material-icons">terrain</i>
		  </label>
		  <label class="btn btn-default btn-circle btn-lg">
			  <input type="radio" name="q2" value="gift">
			  <i class="material-icons">local_florist</i>
		  </label>
		  <label class="btn btn-default btn-circle btn-lg">
			  <input type="radio" name="q2" value="extra expense">
			  <i class="material-icons">star</i>
		  </label>


        </div>
		  
        </div>
        <div class="modal-footer">
          <button onclick="addExpenseClicked();" type="button" class="btn btn-default" data-dismiss="modal">Add</button>
        </div>
      </div>
      
    </div>
  </div>
  <!-- Modal Goal -->
 <div class="modal fade" id="myModal-goal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Set your goal!</h4>
        </div>
        <div class="modal-body">
		   <p>What is your goal?</p>
		   <input type="text" id="goal_desc" class="form-control" ></input>
		</div>
		<hr/>
		<div class="modal-body">
		   <p>How much will you need?</p>
		   <input type="number" id="goal_amount"  class="form-control" ></input>
		</div>
		<hr/>
		<div class="modal-body">
		   <p>On which day?</p>
		   <input type="date" id="date_end" class="form-control" ></input>
		</div>
        <div class="modal-footer">
          <button type="button" onclick="setGoalClicked();" class="btn btn-default" data-dismiss="modal">Set the goal</button>
        </div>
      </div>
      
    </div>
  </div>
    

<?php
include("footer.php");
?>
<script>
  function incomeClicked(){
	$("#myModal-income").modal();
  }

  function expenseClicked(){
    $("#myModal-expense").modal();
  }
  function goalClicked(){
    $("#myModal-goal").modal();
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
