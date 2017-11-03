<?php
include("header.php");
?>
<!--index.css-->
<link rel="stylesheet" href="css/index.css">

        <div class="main-content">
			<div class="title">
				Ihr nächstes Ziel
				<div class="progress">
            		<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40"
            		 aria-valuemin="0" aria-valuemax="100" style="width:40%">
            	 	40% Complete (success)
            		</div>
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



 <!-- Modal -->
 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Today's Income</h4>
        </div>
        <div class="modal-body">
		   <p>Amount</p>
		  <input type="text"  class="form-control" ></input>
		  <hr/>
          
		<div data-toggle="buttons">
          <label class="btn btn-default btn-circle btn-lg">
			  <input type="radio" name="q1" value="0">
			  <i class="material-icons">euro_symbol</i>
		  </label>
          <label class="btn btn-default btn-circle btn-lg">
			  <input type="radio" name="q1" value="1">
			  <i class="material-icons">star_rate</i>
		  </label>
        </div>
		  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
    

<?php
include("footer.php");
?>
<script>
  function incomeClicked(){
	$("#myModal").modal();
  }

  function expenseClicked(){

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
