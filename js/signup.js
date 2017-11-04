$(function() {

  $('#login-form-link').click(function(e) {
    $("#login-form").delay(100).fadeIn(100);
    $("#register-form").fadeOut(100);
    $('#register-form-link').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
  });
  $('#register-form-link').click(function(e) {
    $("#register-form").delay(100).fadeIn(100);
    $("#login-form").fadeOut(100);
    $('#login-form-link').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
  });

});

var TxtType = function(el, toRotate, period) {
  this.toRotate = toRotate;
  this.el = el;
  this.loopNum = 0;
  this.period = parseInt(period, 10) || 2000;
  this.txt = '';
  this.tick();
  this.isDeleting = false;
};

TxtType.prototype.tick = function() {
  var i = this.loopNum % this.toRotate.length;
  var fullTxt = this.toRotate[i];

  if (this.isDeleting) {
    this.txt = fullTxt.substring(0, this.txt.length - 1);
  } else {
    this.txt = fullTxt.substring(0, this.txt.length + 1);
  }

  this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

  var that = this;
  var delta = 200 - Math.random() * 100;

  if (this.isDeleting) { delta /= 2; }

  if (!this.isDeleting && this.txt === fullTxt) {
    delta = this.period;
    this.isDeleting = true;
  } else if (this.isDeleting && this.txt === '') {
    this.isDeleting = false;
    this.loopNum++;
    delta = 500;
  }

  setTimeout(function() {
    that.tick();
  }, delta);
};

window.onload = function() {
  var elements = document.getElementsByClassName('typewrite');
  for (var i=0; i<elements.length; i++) {
    var toRotate = elements[i].getAttribute('data-type');
    var period = elements[i].getAttribute('data-period');
    if (toRotate) {
      new TxtType(elements[i], JSON.parse(toRotate), period);
    }
  }
  // INJECT CSS
  var css = document.createElement("style");
  css.type = "text/css";
  css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
  document.body.appendChild(css);
};


function loginClicked(){
  
    var username = $('#login-userName').val().trim();
    var password = $('#login-password').val().trim();
    var messagediv = $('#login-message');
  
    if(username == "" || password == ""){
      messagediv.html("Please fill all required fields");
      return;
    }
  
    $.ajax({
      type: 'GET',
      contentType: 'application/json',
      url: './api/login.php?userName=' + username + '&password=' + password,
      dataType: "json",
      //data:  FormToJSON($('#form-banner_add')),
      success: function(data, textStatus){
        if(data['status'] == "success"){
          window.location.assign('index.php');
        }else{
          messagediv.html(data['message']);
        }
  
  
  
      },
      error: function(textStatus){
        console.log(textStatus);
      }
    })
  }
  
  
  function registerClicked(){
  
    var username = $('#userName').val().trim();
    var password = $('#password').val().trim();
    var cpassword = $('#confirm-password').val().trim();
    var messagediv = $('#message');
    console.log(username + "/" + password + "/" + cpassword);
  
    if(username == "" || password == ""  || cpassword == "" ){
      messagediv.html("Please fill all required fields");
      return;
    }
    if(password != cpassword){
      messagediv.html("Please type the same password to confirm");
      return;
    }
  
  
  
    $.ajax({
      type: 'GET',
      contentType: 'application/json',
      url: './api/register.php?userName=' + username + '&password=' + password,
      dataType: "json",
      //data:  FormToJSON($('#form-banner_add')),
      success: function(data, textStatus){
        if(data['status'] == "success"){
          $.confirm({
            title: 'Success!',
            content: 'You have successfully registered press OK to login',
            buttons: {
              confirm: function () {
                window.location.assign('index.php');
              }
            }
          });
        }else{
          messagediv.html(data['message']);
        }
  
  
  
      },
      error: function(textStatus){
        console.log(textStatus);
      }
    })
  }
  




