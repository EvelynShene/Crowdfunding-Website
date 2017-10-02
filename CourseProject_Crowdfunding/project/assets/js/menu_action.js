var valid = true;
function eMsg(message){
    alert('Error: '+message);
}

//change password
$('#changePwd').on('click',function(event){
    $('#modal-pass').find('.modal-title').text('Change Password');
    $('#modal-pass').modal('show');
});

// check new password and submit 
$(document).on('submit', '#form-change', function(event) {
    event.preventDefault();
    /* Act on the event */
    var pwd = $('#pwd').val();
    var pwd2 = $('#pwd2').val();
    if(pwd != pwd2){
        alert("Password Not Match!");
    }else{
        //pass is match
        $.ajax({
            url: 'data/change_pwd.php',
            type: 'post',
            dataType: 'json',
            data:{
                "pwd":pwd
            },
            success: function(data){
                if(data.valid == valid){
                    $('#modal-pass').modal('hide');
                    $('#modal-msg').find('#msg-body').text(data.msg);
                    $('#modal-msg').modal('show');
                }
            },
            error: function(){
                eMsg("Fail to set new password!");
            }
        });
    }
});

//display user's profile
function display_myprofile(){
    $.ajax({
        url: 'data/display_myprofile.php',
        type: 'post',
        success: function(data){
            $('.content').empty();
            $('.content').html(data);
        },
        error: function(){
            eMsg("Fail to display your profile!");
        }
    });
}
// display_myprofile();
$("#Myprofileaction").on('click',function(){
    display_myprofile();
});

// display category labels
function display_categories(){
    $.ajax({
        url: 'data/display_categories.php',
        type: 'post',
        success: function(data){
            $('.content').empty();
            $('.content').html(data);
            // $('#table-type').html(data);
            // console.log(data);
        },
        error: function(){
            eMsg("Fail to display categories!");
        }
    });
}
// display_categories();
$("#Categoryaction").on('click',function(){
        //window.location.href = "homepage.php";
    display_categories();
});

//display persons loginname1 follows
function display_follows(){
    $.ajax({
        url: 'data/display_follows.php',
        type: 'post',
        success: function(data){
            $('.content').empty();
            $('.content').html(data);
        },
        error: function(){
            eMsg("Fail to display categories!");
        }
    });
}

$("#Followsaction").on('click',function(){ 
    // alert();
    display_follows();
});



//back to 'Follows' 
function backtofollows(){
    display_follows();
}


//display persons loginname1 requests
function display_requests(){
    $.ajax({
        url: 'data/display_requests.php',
        type: 'post',
        success: function(data){
            $('.content').empty();
            $('.content').html(data);
        },
        error: function(){
            eMsg("Fail to display requests!");
        }
    });
}
$("#Requestsaction").on('click',function(){ 
    display_requests();
});

//back to 'Requests' 
function backtorequests(){
    display_requests();
}

//display all the projects
function display_projects(){
    $.ajax({
        url: 'data/display_projects.php',
        type: 'post',
        success: function(data){
            $('.content').empty();
            $('.content').html(data);
        },
        error: function(){
            eMsg("Fail to display projects!");
        }
    });
}

$("#Projectsaction").on('click',function(){
    display_projects();
});

//Home button action
$("#HomeAction").on('click', function(){
    $.ajax({
        url:'data/HomeDisplay.php',
        type:'post',
        success:function(data){
                    // console.log(data);
            $(".content").empty();
            $(".content").html(data);
        },
        error: function(){
                eMsg("Fail to display Home pages!");
            }
    });
});

//submit 
$(document).on('submit', '#form-edit', function(event){
    event.preventDefault();
    /* Act on the event */
    var name = $('#name').val();
    var hometown = $('#hometown').val();
    var ccn = $('#ccn').val();
    //var data = "name=" +name+"&hometown="+hometown+"&ccn="+ccn;
    $.ajax({
        url: 'data/edit_prof.php',
        type: 'post',
        dataType: 'json',
        data:{
            "name":name,
            "hometown":hometown,
            "ccn":ccn
        },
        success: function(data){
            if(data.valid == valid){
                $('#modal-edit').modal('hide');
                $('#modal-msg').find('#msg-body').text(data.msg);
                $('#modal-msg').modal('show');
                $("#nickn").children().html();
                $("#nickn").children().html("Welcome \""+name+"\"!");
                display_myprofile();
            }
        },
        error: function(){
            eMsg("Fail to edit your profile!");
        }
    });
});
//Edit profile
$(".content").on('click', '.editprofile', function(event){ 
    var denn = $("#enn").html();
    var deht = $("#eht").html();
    var deccn = $("#eccn").html();
    $('#modal-edit #name').val(denn);
    $('#modal-edit #hometown').val(deht);
    $('#modal-edit #ccn').val(deccn);
    $('#modal-edit').modal('show');
});


//add a project 
$(document).on('submit', '#form-addproj', function(event){
    event.preventDefault();
    /* Act on the event */
    var pname = $('#pname').val();
    var descrip = $('#descrip').val();
    var catg = $('#catg').val();
    $.ajax({
        url: 'data/add_proj.php',
        type: 'post',
        dataType: 'json',
        data:{
            "pname":pname,
            "descrip":descrip,
            "catg":catg
        },
        success: function(data){
            if(data.valid == valid){
                display_my_allprojects();
            }
        },
        error: function(){
            eMsg("Fail to add a new project!");
        }
    });
});

$(".content").on('click', '#backtohome', function(){ 
  $.ajax({
        url:'data/HomeDisplay.php',
        type:'post',
        success:function(data){
            $(".content").empty();
            $(".content").html(data);
        },
        error: function(){
                eMsg("Fail to display Home pages!");
            }
    });
});

//display user's profile
function display_myhistory(){
    $.ajax({
        url: 'data/display_myhistory.php',
        type: 'post',
        success: function(data){
            $('.content').empty();
            $('.content').html(data);
        },
        error: function(){
            eMsg("Fail to display your history record!");
        }
    });
}
// display_myhistory();
$("#Historyaction").on('click',function(){
        //window.location.href = "homepage.php";
    display_myhistory();
});


// //submit the information to post a request
// $(".content").on('click', '.postreq', function(){ 
//     display_my_allrequests();
// });