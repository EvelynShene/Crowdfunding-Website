$('#regcancel').on('click',function(event){
  event.preventDefault();
  window.location = "index.php";
});

$(document).on('submit','#form-register',function(event){
  event.preventDefault();
  // console.log($(this));
  // alert("haha");
  var loginname = $('#loginname').val();
  var password = $('#password').val();
  var nickname = $('#nickname').val();
  // console.log(loginname);
  // console.log(password);
  // console.log(nickname);
  $.ajax({
    url:'data/user_register.php',
    type:'post',
    dataType:'json',
    data:{
      "loginname":loginname,
      "password":password,
      "nickname":nickname
    },
    success: function(data){
      // console.log(data.valid);
      if(data.valid == true){
        window.location = data.url;
      }
      else{
        //if(data.info)
        alert("Loginname is used! Please use another loginname!");
      }
      
    },
    error: function(){
      alert('Fail to Sign up!');
    }
  });
});
