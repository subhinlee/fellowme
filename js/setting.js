function addregIncomeClicked(){
    
      var amount = $('#regIncome_amount').val();
      var desc = $("#regIncome_desc_group input[type='radio']:checked").val();

      console.log(amount + "/" + desc );
      
      if(amount == "" || desc === undefined){
        console.log("Please fill all required fields");
        return;
      }
     
      $.ajax({
        type: 'GET',
        contentType: 'application/json',
        url: './api/addregIncome.php?amount=' + amount + '&description=' + desc +'&user_id=' + user_id,
        dataType: "json",
        //data:  FormToJSON($('#form-banner_add')),
        success: function(data, textStatus){
          if(data['status'] == "success"){
            console.log("yeay");
            getSettingData();
          }else{
            console.log(data['message']);
          }
        },
        error: function(textStatus){
          console.log(textStatus);
        }
      });
}

function addregExpenseClicked(){
    
      var expense_amount = $('#regExpense_amount').val();
      var expense_desc = $("#regExpense_desc_group input[type='radio']:checked").val();

      console.log(expense_amount + "/" + expense_desc );
      
      if(expense_amount == "" || expense_desc === undefined){
        console.log("Please fill all required fields");
        return;
      }
     
      $.ajax({
        type: 'GET',
        contentType: 'application/json',
        url: './api/addregExpense.php?amount=' + expense_amount + '&description=' + expense_desc +'&user_id=' + user_id,
        dataType: "json",
        //data:  FormToJSON($('#form-banner_add')),
        success: function(data, textStatus){
          if(data['status'] == "success"){
            console.log("yeay");
            getSettingData();
          }else{
            console.log(data['message']);
          }
        },
        error: function(textStatus){
          console.log(textStatus);
        }
      });
}

function setSavingClicked(){
    

      var saving_amount = $('#saving_amount').val();
      
      if(saving_amount == "" ){
        console.log("Please fill all required fields");
        return;
      }
     
      $.ajax({
        type: 'GET',
        contentType: 'application/json',
        url: './api/addSaving.php?amount=' + saving_amount + '&user_id=' + user_id,
        dataType: "json",
        //data:  FormToJSON($('#form-banner_add')),
        success: function(data, textStatus){
          if(data['status'] == "success"){
            console.log("yeay");
            getSettingData();
          }else{
            console.log(data['message']);
          }
        },
        error: function(textStatus){
          console.log(textStatus);
        }
      });
}

 //when each setting button clicked
 function regIncomeClicked(){
	$("#myModal-regIncome").modal();
  }

  function regExpenseClicked(){
    $("#myModal-regExpense").modal();
  }
  function savingClicked(){
    $("#myModal-saving").modal();
  }
