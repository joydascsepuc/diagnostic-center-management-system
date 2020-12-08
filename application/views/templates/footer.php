<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<footer class="page-footer text-center ml-4">
  <?php $year = date('Y'); ?>
  <div class="footer-copyright text-center">© <?=$year;?> Copyright: Softsource Software Limited, Bangladesh</div>
</footer>



<!-- <script src="<?php echo base_url().'assets/js/jquery-3.3.1.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/popper.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/main.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/bootstrap.min.js'; ?>"></script>

<script src="<?php echo base_url().'assets/jquery/external/jquery/jquery.js'; ?>"></script>
<script src="<?php echo base_url().'assets/jquery/jquery-ui.js'; ?>"></script>
<script src="<?php echo base_url().'assets/jquery/time.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/jquery.dataTables.min.js'; ?>"></script> -->



</body>
</html>


<!-- AJAX to validate username and Email in add user form -->



<script>
  
 $(document).ready(function(){  
      $('#email').change(function(){  
           var email = $('#email').val();  
           if(email != '')  
           {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>Users/check_email_avalibility",  
                     method:"POST",  
                     data:{email:email},  
                     success:function(data){  
                          $('#email_result').html(data);
                           var check1 = $("#email_result").text();
                           if(check1 == "Email Already registered"){
                              $('#submit').prop('disabled', true);
                              
                           }else{
                              $('#submit').prop('disabled', false);

                           }
                          
                     }  
                });  
           }  
      });  
 });  

 $(document).ready(function(){  
      $('#username').change(function(){  
           var username = $('#username').val();  
           if(username != '')  
           {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>Users/check_username_avalibility",  
                     method:"POST",  
                     data:{username:username},  
                     success:function(data){  
                          $('#username_result').html(data);
                          var check2 = $("#username_result").text();
                          if(check2 == "Username Already registered"){
                              $('#submit').prop('disabled', true);
                           }else{
                              $('#submit').prop('disabled', false);
                           }
                            
                     }  
                });  
           }  
      });  
 });



  $(document).ready(function(){  
      $('#email').change(function(){  
           var email = $('#email').val();  
           if(email != '')  
           {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>Employees/check_email_avalibility",  
                     method:"POST",  
                     data:{email:email},  
                     success:function(data){  
                          $('#employee_email_result').html(data);
                          var check3 = $("#employee_email_result").text();                        
                          if(check3 == "Email Already registered"){
                              $('#employee_submit').prop('disabled', true);
                           }else{
                              $('#employee_submit').prop('disabled', false);
                           }                         
                     }  
                });  
           }  
      });  
 });

 $(document).ready(function(){  
      $('#mobile').change(function(){  
           var mobile = $('#mobile').val();  
           if(mobile != '')  
           {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>Employees/check_mobile_avalibility",  
                     method:"POST",  
                     data:{mobile:mobile},  
                     success:function(data){  
                          $('#employee_mobile_result').html(data);
                          var check4 = $("#employee_mobile_result").text();
                          if(check4 == "Mobile Already registered"){
                              $('#submit').prop('disabled', true);
                           }else{
                              $('#submit').prop('disabled', false);
                           } 
                                            
                     }  
                });  
           }  
      });  
 });    


$(document).ready(function(){  
      $('#employeeid').change(function(){  
           var employeeid = $('#employeeid').val();  
           if(employeeid != '')  
           {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>Employees/check_id_avalibility",  
                     method:"POST",  
                     data:{employeeid:employeeid},  
                     success:function(data){  
                          $('#employee_id_result').html(data);
                           /*var button = $("#employee_id_result").text();
                           if(button == "ID Already registered"){
                              $('#submit').prop('disabled', true);
                              
                           }else{
                              $('#submit').prop('disabled', false);

                           }*/
                          
                     }  
                });  
           }  
      });  
 });  
</script>


<script type="text/javascript">
  $(document).ready( function () {
    $('#datatable').DataTable();
} );

</script>

<!-- For On Hover -->
<!-- <script type="text/javascript">
  jQuery('ul.navbar-nav li.nav-item').hover(function() {
  jQuery(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn();
}, function() {
  jQuery(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut();
});
</script> -->


<!-- For On click -->
<script type="text/javascript">
  $('.nav-item a').on('click', function() {
   
    $('.nav-item').children('.dropdown-menu').slideUp(150);
    
    if ($(this).parent().hasClass("show")) {
      $(this).next('.dropdown-menu').slideUp(150);
    } else {
      $(this).next('.dropdown-menu').slideDown(200);
    }

  });
</script>


<!-- <script type="text/javascript">
  $('.nav-item a').on('click', function() {
   
    $('.dropdown').children('.dropdown-menu').slideUp(300);
    
    if ($(this).parent().hasClass("open")) {
      $(this).next('.dropdown-menu').slideUp(300);
    } else {
      $(this).next('.dropdown-menu').slideDown(300);
    }

  });
</script> -->


<!-- <script>
  $(function(){
    $('#checkData').on('click',function(){
      var url = '<?php echo base_url();?>';
      $.ajax({
        type: "POST",url: url+"salary/check_employee",
        data:{keyword:$('[search=search]').val()},
        success: function(result){
          $(".result").html(result);
        },
        error: function (request, status, error) {
          $(".result").html(request.responseText);
        }
      });
    });
  });
</script> -->