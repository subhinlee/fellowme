<?php
include("header.php");
?>
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
				<button class="btn-income" onclick="incomeClicked();"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
				<button class="btn-expense" onclick="expenseClicked();"><i class="fa fa-minus-circle" aria-hidden="true"></i></button>
			</div>
		</div>
<?php
include("footer.php");
?>
<script>
  function incomeClicked(){
	swal({
			buttons: {
				cancel: true,
				confirm: "Confirm",
				roll: {
				text: "Do a barrell roll!",
				value: "roll",
				},
			},
			});
  }

  function expenseClicked(){

  }
</script>
