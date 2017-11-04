function addIncomeClicked(){
    
      var amount = $('#amount').val();
      var desc = $("#desc_group input[type='radio']:checked").val();

      console.log(amount + "/" + desc );
      
      if(amount == "" || desc === undefined){
        console.log("Please fill all required fields");
        return;
      }
     
      $.ajax({
        type: 'GET',
        contentType: 'application/json',
        url: './api/addIncome.php?amount=' + amount + '&description=' + desc +'&user_id=' + user_id,
        dataType: "json",
        //data:  FormToJSON($('#form-banner_add')),
        success: function(data, textStatus){
          if(data['status'] == "success"){
            console.log("yeay");
          }else{
            console.log(data['message']);
          }
        },
        error: function(textStatus){
          console.log(textStatus);
        }
      });
}

function addExpenseClicked(){
    
      var expense_amount = $('#expense_amount').val();
      var expense_desc = $("#expense_desc_group input[type='radio']:checked").val();

      console.log(expense_amount + "/" + expense_desc );
      
      if(expense_amount == "" || expense_desc === undefined){
        console.log("Please fill all required fields");
        return;
      }
     
      $.ajax({
        type: 'GET',
        contentType: 'application/json',
        url: './api/addExpense.php?amount=' + expense_amount + '&description=' + expense_desc +'&user_id=' + user_id,
        dataType: "json",
        //data:  FormToJSON($('#form-banner_add')),
        success: function(data, textStatus){
          if(data['status'] == "success"){
            console.log("yeay");
          }else{
            console.log(data['message']);
          }
        },
        error: function(textStatus){
          console.log(textStatus);
        }
      });
}