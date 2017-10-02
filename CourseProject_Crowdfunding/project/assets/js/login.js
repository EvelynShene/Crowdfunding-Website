$(document).on('submit', '#form-login', function(event) {
        event.preventDefault();
        /* Act on the event */
        var un = $('#username').val();
        var pw = $('#password').val();

        //remember loginname and password
        if ($("#ck_rememberme").prop("checked")) {
                $.cookie("rememberme", "true", { expires: 7 }); //store a 7 days cookie
                $.cookie("username", un, { expires: 7 });
                $.cookie("password", pw, { expires: 7 });
        }
        else {
                $.cookie("rememberme", "false", { expire: -1 });
                $.cookie("username", "", { expires: -1 });
                $.cookie("password", "", { expires: -1 });
        }

        $.ajax({
              url: 'data/user_login.php',
              type: 'post',
              dataType: 'json',
              data: {
                un:un,
                pw:pw
              },
              success: function (data) {
                // console.log(data);
                if(data.valid == true){
                  window.location = data.url;
                }else{
                  alert('Invalid Username / Password!');
                }
              },
              error: function(){
                alert('Error: Fail to log in the system!');
              }
            });//end a req
      });