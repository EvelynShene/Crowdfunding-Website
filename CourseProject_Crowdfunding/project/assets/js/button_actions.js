// add new interested category
function interest(category){
    if (confirm('Are you sure to like this category?')) {
        // alert('Thanks for confirming');
        var interestact = "add";
            $.ajax({
                url: 'data/interest_action.php',
                type: 'post',
                data: {
                    "category":category,
                    "interestact":interestact
                },
                success: function(data){
                    // console.log(data);
                    display_categories();
                },
                error: function(){
                    eMsg("Fail to add interested category!");
                }
            });
    } 

}

//Remove the interested category
function uninterest(category){
    if (confirm('Are you not interested in this category anymore?')) {
        // alert('Thanks for confirming');
        var interestact = "remove";
            $.ajax({
                url: 'data/interest_action.php',
                type: 'post',
                data: {
                    "category":category,
                    "interestact":interestact
                },
                success: function(data){
                    // console.log(data);
                    display_categories();
                },
                error: function(){
                    eMsg("Fail to cancel the interested category!");
                }
            });
    } 
}

// Like or Dislike project actions
$(".content").on('click','.likeprj',function(){
    var $this = $(this);
    // console.log($this);
    var act = $this[0].title; 
    var likeact = "";
    if(act == "like"){
        likeact = "add";
    }
    else{
        likeact = "remove";
    }
    var pid = $this.parent().parent().children("table")[0].id;
    console.log(pid);

    $.ajax({
        url:'data/like_action.php',
        type:'post',
        data:{
            "pid":pid,
            "likeact":likeact
        },
        success: function(data){
            $btn = $(".likeprj");
            if(likeact == "add"){
                $btn.removeClass("btn-primary");
                $btn.addClass("btn-info");
                $btn.attr("title","unlike");
                var a = "<span>Liked</span><span class=\"glyphicon glyphicon-heart\"></span>";
                $btn.html(a);
            }
            else{
                $btn.removeClass("btn-info");
                $btn.addClass("btn-primary");
                $btn.attr("title","like");
                var a = "<span>Like</span><span class=\"glyphicon glyphicon-heart-empty\"></span>";
                $btn.html(a);
            }           
        },
        error: function(){
            if(likeact == "add")
                eMsg("Fail to add the interested project!");
            else
                eMsg("Fail to remove the interested project!");
        }
    });

});

//history->click category history
$(".content").on('click','.rcpid',function(){
    $category = $(this)[0].title;
    display_cat_projects($category);
});

//history->click a project history
$(".content").on('click','.rpid',function(){
    $pid = $(this)[0].title;
    $titlekey = "myhistory";
    $c = false;
    display_project_detail($pid,$titlekey,$c)
});

//history->click a request history
$(".content").on('click','.rrid',function(){
    $pid = $(this)[0].title;
    $titlekey = "myhistory";
    $c = false;
    display_request_detail($pid,$titlekey)
});

//Display projects that related to the category
function display_cat_projects(category){
    $.ajax({
        url: 'data/display_cat_projects.php',
        type: 'post',
        data:{
            "category":category,
        },
        success: function(data){
            //console.log(data);
            $('.content').empty();
            $('.content').html(data);
        },
        error: function(){
            eMsg("Fail to display the related projects!");
        }
    });
}


//Display the details of the project
function display_project_detail(pid,titlekey,c){
    $.ajax({
        url: 'data/display_project_detail.php',
        type: 'post',
        data:{
            "pid":pid,
            "titlekey":titlekey,
            "c":c
        },
        success:function(data){
            //console.log(data);
            $('.content').empty();
            $('.content').html(data);
        },
        error: function(){
            eMsg("Fail to display details of this project!");
        }
    });
}

// return to category labels page
function returncategory(){
    display_categories();
}

// return to projects pages that related to the category
function returncatproj(category){
    display_cat_projects(category);
}

// return to all projects display page
function returnallproj(){
    display_projects();
}

// return to my projects page
function returnmyproj(){
    display_my_allprojects();
}

//return to my history page
function returnmyhist(){
    display_myhistory();
}
//display the loginname2's pledges
function display_pledges(loginname2){
    // console.log(loginname2);
    $.ajax({
        url: 'data/display_pledges.php',
        type: 'post',
        data:{
            "loginname2":loginname2
        },
        success: function(data){
            // console.log(data);
            $('.content').empty();
            $('.content').html(data);
        },
        error: function(){
            eMsg("Fail to display pledges!");
        }
    });
}

$(".content").on('click', '.pledge', function(){ 
    var $this = $(this); 
    display_pledges($this[0].id);
});


//display the loginname2's comments 
function display_comments(loginname2){
    // console.log(loginname2);
    $.ajax({
        url: 'data/display_comments.php',
        type: 'post',
        data:{
            "loginname2":loginname2
        },
        success: function(data){
            $('.content').empty();
            $('.content').html(data);
        },
        error: function(){
            eMsg("Fail to display comments!");
        }
    });
}
$(".content").on('click', '.comment', function(){  
    var $this = $(this);
    display_comments($this[0].id);
});


//display the loginname2's comments 
function display_comments(loginname2){
    $.ajax({
        url: 'data/display_comments.php',
        type: 'post',
        data:{
            "loginname2":loginname2
        },
        success: function(data){
            $('.content').empty();
            $('.content').html(data);
        },
        error: function(){
            eMsg("Fail to display comments!");
        }
    });
}
$(".content").on('click','.comment',function(){
    var $this = $(this);
   // console.log($this[0].id);
    display_comments($this[0].id);
});



//display the loginname2's likes 
function display_likes(loginname2){
    $.ajax({
        url: 'data/display_likes.php',
        type: 'post',
        data:{
            "loginname2":loginname2
        },
        success: function(data){
            $('.content').empty();
            $('.content').html(data);
        },
        error: function(){
            eMsg("Fail to display likes!");
        }
    });
}
$(".content").on('click','.like',function(){
    var $this = $(this);
   // console.log($this[0].id);
    display_likes($this[0].id);
});



//click to see projects that related to the category
$(".content").on('click','.catlabel',function(){
    // alert("lalalal");
    var $this = $(this);
    // console.log($this[0].id);
    display_cat_projects($this[0].id);
});


// click to display the details of the project - 返回问题
$(".content").on('click','.pid',function(){
    var $this = $(this);
    var pid = $this.html();
    // console.log(pid);
    $t = $(".content #myTable-project");
    var titlekey = $t[0].title;
    // console.log(titlekey);
    var c = false;
    if($t.hasClass("category"))
        c = true;

    display_project_detail(pid,titlekey,c);
});


// Display a projects' rates
function display_project_rates(pid){
    $.ajax({
        url: 'data/display_project_rates.php',
        type: 'post',
        data:{
            "pid":pid
        },
        success: function(data){
            // console.log(data);
            $('#modal-display').empty();
            $('#modal-display').html(data);
            $('#modal-display').modal('show');
        },
        error: function(){
            eMsg("Fail to display this project's rates!");
        }
    });
}

$(".content").on('click', '.rate', function(){
    var $this = $(this);
    var pid = $this.parents()[3].id;
    // console.log(pid);
    display_project_rates(pid);
    
});

//Display a request's sponsors
function display_request_sponsors(rid){
    $.ajax({
        url:'data/display_request_sponsors.php',
        type:'post',
        data:{
            "rid":rid,
        },
        success:function(data){
            $('#modal-display').empty();
            $('#modal-display').html(data);
            $('#modal-display').modal('show');
        },
        error: function(){
            eMsg("Fail to display this request's sponsors!");
        }
    });
}

$(".content").on('click', '.invest', function(){
    var $this = $(this);
    var rid = $this.parents()[3].id;
    // console.log(rid);
    display_request_sponsors(rid);
});

$(".content").on('click', '.rclose', function(){
    $('#modal-display').modal('hide');
});

//display details of the request 
function display_request_detail(rid,titlekey){
    $.ajax({
        url: 'data/display_request_detail.php',
        type: 'post',
        data:{
            "rid":rid,
            "titlekey":titlekey
        },
        success: function(data){
            $('.content').empty();
            $('.content').html(data);
        },
        error: function(){
            eMsg("Fail to display details of this request!");
        }
    });
}
$(".content").on('click','.requid',function(){
    var $this = $(this);
    $t = $(".content #myTable-request");
    var titlekey = $t[0].title;
   //console.log($this[0].id);
    display_request_detail($this[0].id,titlekey);
});


//Display owners info and all projects
$(".content").on('click', '.powner', function(){
    //alert("lalalal");
    var $this = $(this);
    var owner = $this.html();
    
    display_ownersInfos(owner);
});


function display_ownersInfos(owner){
    $.ajax({
        url:'data/display_ownersInfos.php',
        type: 'post',
        data:{
            "owner":owner
        },
        success: function(data){
            // console.log(data);
            $('#modal-display').empty();
            $('#modal-display').html(data);
            $('#modal-display').modal('show');
        },
        error: function(){
            eMsg("Fail to the owner's infomation!");
        }
    });
}


//Display owners info and all requests
$(".content").on('click', '.rowner', function(){
    //alert("lalalal");
    var $this = $(this);
    var owner = $this.html();
    // console.log(owner);
    display_ownersInfosreq(owner);
});

function display_ownersInfosreq(owner){
    $.ajax({
        url:'data/display_ownersInfosreq.php',
        type: 'post',
        data:{
            "owner":owner
        },
        success: function(data){
            // console.log(data);
            $('#modal-display').empty();
            $('#modal-display').html(data);
            $('#modal-display').modal('show');
        },
        error: function(){
            eMsg("Fail to the owner's infomation!");
        }
    });
}

//Display user info who post this comment
$(".content").on('click','.commer',function(){
    var $this = $(this);
    var commusr = $this.html();
    display_ownersBasicInfo(commusr);
});

//Users' Basic information
function display_ownersBasicInfo(owner){
    $.ajax({
        url:'data/display_ownersBasicInfo.php',
        type: 'post',
        data:{
            "owner":owner
        },
        success: function(data){
            // console.log(data);
            $('#modal-display').empty();
            $('#modal-display').html(data);
            $('#modal-display').modal('show');
        },
        error: function(){
            eMsg("Fail to the user's infomation!");
        }
    });
}
//Display user info whom i followed
$(".content").on('click','.fusr',function(){
    var $this = $(this);
    var fusr = $this.html();
    display_ownersAllInfos(fusr);
});

//Display user info whom i not followed
$(".content").on('click','.othusr',function(){
    var $this = $(this);
    var othusr = $this.html();
    display_ownersAllInfos(othusr);
});

function display_ownersAllInfos(owner){
    $.ajax({
        url:'data/display_ownersAllInfos.php',
        type: 'post',
        data:{
            "owner":owner
        },
        success: function(data){
            // console.log(data);
            $('#modal-display').empty();
            $('#modal-display').html(data);
            $('#modal-display').modal('show');
        },
        error: function(){
            eMsg("Fail to the user's infomation!");
        }
    });
}

//Display user's all projects
function display_my_allprojects(){
    $.ajax({
        url: 'data/display_my_projects.php',
        type: 'post',
        success:function(data){
            $('.content').empty();
            $('.content').html(data);
        },
        error:function(){
            eMsg("Fail to the my all projects!");
        }
    });
}
$(".content").on('click', '.myallprojects', function(){
    display_my_allprojects();
});

//Display user's all requests
function display_my_allrequests(){
    $.ajax({
        url: 'data/display_my_requests.php',
        type: 'post',
        success:function(data){
            $('.content').empty();
            $('.content').html(data);
        },
        error:function(){
            eMsg("Fail to the my all requests!");
        }
    });
}
$(".content").on('click',".myallrequests",function(){
    display_my_allrequests();
});

// back to my all requests page
function backtomyrequests(){
    display_my_allrequests();
}

//Display user's all pledges
function display_my_allpledges(){
    $.ajax({
        url: 'data/display_my_pledges.php',
        type: 'post',
        success:function(data){
            $('.content').empty();
            $('.content').html(data);
        },
        error:function(){
            eMsg("Fail to the my all pledges!");
        }
    });
}
$(".content").on('click', '.myallpledges', function(){
    display_my_allpledges();
});

//Display user's all comments
function display_my_allcomments(){
    $.ajax({
        url: 'data/display_my_comments.php',
        type: 'post',
        success:function(data){
            $('.content').empty();
            $('.content').html(data);
        },
        error:function(){
            eMsg("Fail to the my all comments!");
        }
    });
}
$(".content").on('click', '.myallcomments', function(){
    display_my_allcomments();
});

//Click to add projects
function display_addprojects(){
    $.ajax({
        url: 'data/display_addprojects.php',
        type: 'post',
        success:function(data){
            $('.content').empty();
            $('.content').html(data);
        },
        error:function(){
            eMsg("Fail to display addprojects interface!");
        }
    });
}
$(".content").on('click', '.addprojects', function(){
    display_addprojects();
});

//Sponsor to rate a completed projects
$(".content").on('click','.toRate', function(){
    var $this = $(this);
    var $t = $($this.parents()[1]);
    // console.log($t);
    var pid = $t.children(':eq(1)').html();
    var pname = $t.children(':eq(2)').html();
    var invest = $t.children(':eq(3)').html();
    console.log(pid);
    $.ajax({
        url:'data/rate_project.php',
        type:'post',
        data:{
            "pid":pid,
            "pname":pname,
            "invest":invest
        },
        success:function(data){
            $('#modal-display').empty();
            $('#modal-display').html(data);
            $('#modal-display').modal('show');
        },
        error:function(){
            eMsg("Fail to rate this completed project!");
        }
    });
});

//add rate!
$(document).on('submit', '#form-addrate', function(event){
    event.preventDefault();
    /* Act on the event */

    var pid = $('#pid').html();
    // var pname = $('#pname').html();
    // var invest = $('#descrip').val();
    var star = $('#projrate').val();
    // console.log(pid);
    // console.log(star);
    $.ajax({
        url: 'data/add_rate.php',
        type: 'post',
        dataType: 'json',
        data:{
            "pid":pid,
            "star":star
        },
        success: function(data){
            // console.log(data);
            $('#modal-display').modal('hide');
            display_my_allpledges();

        },
        error: function(){
            eMsg("Fail to add this rate!");
        }
    });
});

//pledge money to a project
$(".content").on('click','.pledgeprj',function(){
    var rid = $('table')[0].id;
    // console.log(rid);
    $.ajax({
        url:'data/handle_pledge.php',
        type:'post',
        dataType: 'json',
        data:{
            "rid":rid
        },
        success: function(data){
            // console.log(data);
            if(data.c == "1"){ //already pledge money to this request
                alert("You already pledged this request before!");
            }
            else if(data.ccn == "0"){
                alert("You don't have a credit card number!\n Please first go to \"My profile\" to enter you credit card number!");
            }
            else {
                pledge_request(rid,data.ccninfo);
            }
            // $('#modal-display').modal('hide');
            // display_my_allpledges();

        },
        error: function(){
            eMsg("Fail to pledge this project!");
        }

    });
});

//Display pledge page
function pledge_request(rid,ccn){
    $.ajax({
        url:'data/Pledge_page.php',
        type:'post',
        data:{
            "rid":rid,
            "ccn":ccn
        },
        success:function(data){
            // console.log(data);
            $('#modal-display').empty();
            $('#modal-display').html(data);
            $('#modal-display').modal('show');
        },
        error: function(){
            eMsg("Fail to pledge this project!");
        }
    });
}

//Do pledge
$(document).on('submit', '#form-dopledge', function(event){
    event.preventDefault();
    /* Act on the event */

    var rid = $('#ridpl').html();
    var invest = $('#money').val();
    // console.log(rid);
    // console.log(invest);

    if(parseFloat(invest) == '0.00'){
        alert("Please enter enter a nonzero number!");
    }
    else{
        $.ajax({
            url: 'data/add_pledge.php',
            type: 'post',
            dataType: 'json',
            data:{
                "rid":rid,
                "invest":invest
            },
            success: function(data){
                // console.log(data);
                $('#modal-display').modal('hide');
                var retype = $(".panel-heading").children(':first')[0].id;
                if(retype == "backtorequests"){
                    display_request_detail(rid,"allreq");
                }
                else if(retype == "backtomyrequests"){
                    display_request_detail(rid,"myreq");
                }

                $('#modal-msg').find('#msg-body').text("Pledge successfully!");
                $('#modal-msg').modal('show');
            },
            error: function(){
                eMsg("Fail to add this rate!");
            }
        });
    }
    
});

//follow a user
$(".content").on('click','.followp',function(){
    $this = $(this);
    var loginname2 = $($this.parent().parent().children(':first')).children(':first').html();
    console.log(loginname2);

    $.ajax({
        url:'data/add_follow.php',
        type:'post',
        data:{
            "loginname2":loginname2
        },
        success:function(data){
            display_follows();
        },
        error: function(){
            eMsg("Fail to follow this person!");
        }
    });
});

//unfollow a user 
$(".content").on('click','.unfollowp',function(){
    $this = $(this);
    var loginname2 = $($this.parent().parent().children(':first')).children(':first').html();
    console.log(loginname2);

    $.ajax({
        url:'data/unfollow_user.php',
        type:'post',
        data:{
            "loginname2":loginname2
        },
        success:function(data){
            display_follows();
        },
        error: function(){
            eMsg("Fail to unfollow this person!");
        }
    });
});

//Click to post a request
function display_postrequest(pid, pstatus){
    $.ajax({
        url: 'data/display_postrequest.php',
        type: 'post',
        data:{
            "pid":pid,
            "pstatus":pstatus
        },
        success:function(data){
            $('.content').empty();
            $('.content').html(data);
        },
        error:function(){
            eMsg("Fail to display postrequest interface!");
        }
    });
}
$(".content").on('click', '.postrequest', function(){
    var pid = $('table')[0].id;
    var pstatus = $('#pst').html(); 
    display_postrequest(pid, pstatus);
});

//post a request 
$(document).on('submit', '#form-postreqst', function(event){
    event.preventDefault();
    /* Act on the event */
    var pid = $('h3').attr('id');
    var min_amount = $('#min_amount').val();
    var max_amount = $('#max_amount').val();
    var endtime = $('#endtime').val();
    var planned_compl_time = $('#planned_compl_time').val();

    var e = new Date(endtime);
    var pct = new Date(planned_compl_time);

    if(endtime == null || endtime == ""){
        alert("Please enter the deadline(end time) of this request.");
    }
    else if(planned_compl_time == null || planned_compl_time == ""){
        alert("Please enter the related project's planned completion time");
    }
    else if(parseFloat(min_amount) == '0.00'){
        alert("Minimum amount must be larger than 0!");
    }
    else if(parseFloat(min_amount) >= parseFloat(max_amount)){
        alert("Maximum amount must be larger than minimum amount!");
    }
    else if(e >= pct){
        alert("Project's planned completion time must be later than the deadline of the request.");
    }
    else{
        $.ajax({
            url: 'data/post_request.php',
            type: 'post',
            dataType: 'json',
            data:{
                "pid":pid,
                "min_amount":min_amount,
                "max_amount":max_amount,
                "endtime":endtime,
                "planned_compl_time":planned_compl_time
            },
            success: function(data){
                display_my_allrequests();
         
            },
            error: function(){
                eMsg("Fail to post a new request!");
            }
        });
    }
    
});

$(".content").on('click', '#backtomyallprojects', function(){ 
    display_my_allprojects();
});

$(".content").on('click','.comm',function(){
    $('#modal-comment').modal('show');
});

//add comment
$(document).on('submit', '#form-comment', function(event){
    event.preventDefault();
    // $this = $(this);
    // console.log($this);
    // alert($('table')[0].id);
    var pid = $('table')[0].id;
    var opinion = $("#comms").val().trim();
    // console.log(opinion)
    if(opinion.length == 0){
        alert("Please enter your comment!");
    }
    else{
        //alert("ok");
        $.ajax({
            url:'data/do_comment.php',
            type:'post',
            data:{
                "pid":pid,
                "opinion":opinion
            },
            success: function(data){
                var titlekey = $('.panel1').children(':first')[0].title;
                var c = false;
                // if(titlekey != "allprojects" && titlekey != "my")
                //     c = true;

                $('#modal-comment').modal('hide');
                $('#modal-msg').find('#msg-body').text("Add comment successfully!");
                $('#modal-msg').modal('show');
                display_project_detail(pid,titlekey,c);
            },
            error: function(){
                eMsg("Fail to comment the project!");
            }
        });
    }

});

//Do upload
function doUpload(pid,titlekey){
    var formData = new FormData($("#uploadf")[0]);
    console.log(formData);
    $.ajax({
        url:'data/do_upload.php',
        type:'post',
        dataType: 'json',
        data:formData,
        processData: false,
        contentType: false,
        success:function(data){
            console.log(data);
            console.log(data.error);
            if(typeof(data.error)=="undefined"){//upload successfully!
                alert("Upload successfully!");
                display_project_detail(pid,titlekey,false);
            }
            else{
                eMsg(data.error);
            }
        },
        error:function(){
            eMsg("Fail to upload this file!");
        }
    });
}

//Project completed offline

function completeproj(pid,titlekey){
    // var pid = $('table')[0].title;
    // var pstatus = $('#pst').html(); 
    //complete_project(pid);
    $.ajax({
        url:'data/complete_project.php',
        type:'post',
        data:{
            "pid":pid,
            //"titlekey":titlekey
        },
        success:function(data){
            display_project_detail(pid,titlekey,false);           
        },
        error:function(){
            eMsg("Fail to change this project's status!");
        }
    });
}

