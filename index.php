<?php
include ("header.php");

?>
<!--index.css-->
<link rel="stylesheet" href="css/index.css">
<script src="js/index.js"></script>
<!--index main content-->
<div class="main-content">
			<div class="title">
        <p id="goalTitle"></p>
				  <div class="goal-container">
					    <div class="progress">
            			<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40"
            			 aria-valuemin="0" aria-valuemax="100" id="goalPercentage-bar" style="width:0%">
            	 		<p id="goalPercentage-text"></p>
						      </div>
					    </div>
						  <button class="btn-goal" onclick="goalClicked();"><i class="material-icons btn-setgoal tool" title="Set your goal">rowing</i></button>
				  </div>
			</div>
      
			    <div class="main">
				    <div class="widget">
					      <div class="title">Today's Budget</div>
					      <div class="todaysbudget-container">
                     <div id="leftover-container">
                     </div>
                     <div id="dailybudget-container">
                     </div>
                </div>
            </div>
            <div class="widget">
				    	  <div class="title">Today's Track
                     
			           	      <button class="btn-income" onclick="incomeClicked();"><i class="material-icons btn-plus-minus">add_circle</i></button>
				                <button class="btn-expense" onclick="expenseClicked();"><i class="material-icons btn-plus-minus">remove_circle</i></button>
		           	    
                </div>
				    	  <div class="track-container">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Category</th>
                        <th>Amount</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody id="track-table">
                    </tbody>
                  </table>
                </div>
				    </div>
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
          <label class="btn btn-default btn-circle btn-lg tool" title="Extra Income">
			  		<input type="radio" name="q1" value="extra income">
			  		<i class="material-icons">euro_symbol</i>
		  		</label>
          <label class="btn btn-default btn-circle btn-lg tool" title="Bonus">
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
          <label class="btn btn-default btn-circle btn-lg tool" title="Food">
			  <input type="radio" name="q2" value="food">
			  <i class="material-icons">local_dining</i>
		  </label>
          <label class="btn btn-default btn-circle btn-lg tool" title="Supermarket">
			  <input type="radio" name="q2" value="supermarket">
			  <i class="material-icons">local_grocery_store</i>
		  </label>
		  <label class="btn btn-default btn-circle btn-lg tool" title="Nightout">
			  <input type="radio" name="q2" value="nightout">
			  <i class="material-icons">local_bar</i>
		  </label>
		  <label class="btn btn-default btn-circle btn-lg tool" title="Entertainment">
			  <input type="radio" name="q2" value="entertainment">
			  <i class="material-icons">local_activity</i>
		  </label>
		  <label class="btn btn-default btn-circle btn-lg tool" title="Shopping">
			  <input type="radio" name="q2" value="shopping">
			  <i class="material-icons">local_mall</i>
		  </label>
		  <label class="btn btn-default btn-circle btn-lg tool" title="Activity">
			  <input type="radio" name="q2" value="activity">
			  <i class="material-icons">terrain</i>
		  </label>
		  <label class="btn btn-default btn-circle btn-lg tool" title="Gift">
			  <input type="radio" name="q2" value="gift">
			  <i class="material-icons">local_florist</i>
		  </label>
		  <label class="btn btn-default btn-circle btn-lg tool" title="Extra Expense">
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
include ("footer.php");
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
  function deleteTrack(id){
    $.ajax({
        type: 'GET',
        contentType: 'application/json',
        url: './api/deleteVariableById.php?id=' + id,
        dataType: "json",
        //data:  FormToJSON($('#form-banner_add')),
        success: function(result, textStatus){
          if(result['status'] == "success"){
            getTodaysData();

          }else{
            console.log(result['message']);
          }
        },
        error: function(textStatus){
          console.log(textStatus);
        }
      });
  }
  function populateTrack(data){
    var html = "";
    for(var i = 0; i < data.length; i++){
      html += "<tr>"+
               "<td>"+data[i].description+"</td>"+
               "<td>"+data[i].amount+" €</td>"+
               "<td><i onclick='deleteTrack("+data[i].id+")' class='material-icons deleteTrack'>remove</i></td>"+
               "</tr>";
      
    }
    $("#track-table").html(html);
  }
	getTodaysData();
	
	function getTodaysData(){
		$.ajax({
        type: 'GET',
        contentType: 'application/json',
        url: './api/getTodaysBudget.php?userId=' + user_id,
        dataType: "json",
        //data:  FormToJSON($('#form-banner_add')),
        success: function(result, textStatus){
          if(result['status'] == "success"){
            console.log(result);
            
            $("#goalPercentage-text").html(result.data.goalPercentage+"% completed");
            $("#goalPercentage-bar").css("width",result.data.goalPercentage+"%");
            $("#goalTitle").html(result.data.goalDescription + " in " + result.data.goalDday + " days");
            $("#leftover-container").html(result.data.todayBudget+" €");
            $("#dailybudget-container").html("Daily Budget : "+result.data.dailyBudget+" €");
            populateTrack(result.data.trackdata);
            //populateSettingData(result);


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
    #leftover-container{
       width:100%;
       text-align: center;
       font-size:82px;
       padding:20px;
    }
    #dailybudget-container{
       width:100%;
       text-align: center;
       font-size:24px;
    }
	  

  </style>
