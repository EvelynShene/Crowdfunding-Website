 <!-- jQuery 2.1.4 -->
    <script src="assets/js/jquery-3.1.1.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>

   <script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="assets/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.cookie.js"></script>
    <script type="text/javascript" src="assets/js/datetimepicker.min.js"></script>
    <script src="assets/js/menu_action.js"></script>
    <script src="assets/js/button_actions.js"></script>
    <script type="text/javascript">
        $(function(){
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
            // alert("ok?");
        });


        function num(obj){
        // obj.value = obj.value.replace(^\+?[1-9][0-9]*$,"");//nonzero
        obj.value = obj.value.replace(/[^\d.]/g,""); //清除"数字"和"."以外的字符
        obj.value = obj.value.replace(/^\./g,""); //验证第一个字符是数字
        obj.value = obj.value.replace(/\.{2,}/g,"."); //只保留第一个, 清除多余的
        obj.value = obj.value.replace(".","$#$").replace(/\./g,"").replace("$#$",".");
        obj.value = obj.value.replace(/^(\-)*(\d+)\.(\d\d).*$/,'$1$2.$3'); //只能输入两个小数

        }

    </script>

