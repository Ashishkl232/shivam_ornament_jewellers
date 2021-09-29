<?php
 if (isset($_POST['submit'])) {
    $name=get_safe_value($ornament_connect,$_POST['name']);
    $email=get_safe_value($ornament_connect,$_POST['email']);
    $Mobile=get_safe_value($ornament_connect,$_POST['mobile']);
    $mes=get_safe_value($ornament_connect,$_POST['message']);

    $sql="insert into shivam_contact(Name,Email,Mobile,Message) values('$name','$email','$Mobile','$mes')";
    $query=mysqli_query($ornament_connect, $sql);
    
      $msg="Thanks for message";

      $html="<table><tr><td>Name</td><td>$name</td></tr><tr><td>Email</td><td>$email</td></tr><tr><td>Message</td><td>$mes</td></tr><tr><td>Mobile</td><td>$Mobile</td></tr></table>";
     
 include('smtp/PHPMailerAutoload.php');
      $mail=new PHPMailer(true);
      $mail->isSMTP();
      $mail->Host="smtp.gmail.com";
      $mail->Post=587;
      $mail->SMTPSecure="tls";
      $mail->SMTPAuth=true;
      $mail->Username="webnotes31@gmail.com";
      $mail->Password="Shukla@232";
      $mail->SetFrom("webnotes31@gmail.com");
      $mail->addAddress("as2812274@gmail.com");
      $mail->IsHTML(true);
      $mail->Subject="New Contact Us";
      $mail->Body=$html;
      $mail->SMTPOptions=array('ssl'=>array(
              
             'verify_peer'=>false,
             'verify_peer_name'=>false,
             'allow_self_signed'=>false


      ));

     if ($mail->send()) {
         echo"Mail Send";
     }else{
        echo "error";
     }
    
  }


?>

<!-- Modal -->
<div class="modal fade " id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog col-log-6 col-md-6 ">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title bg-primary-alert reg text-dark" id="signupModalLabel">Contact Now</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" class="col-lg-12 col-md-6" method="post" >
  <div class="form-group ">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name"id="name" aria-describedby="name">
  </div>
   <div class="form-group">
    <label for="Email">Email address</label>
    <input type="email" class="form-control" name="email"id="Email" aria-describedby="email">
  </div>
  
   <div class="form-group">
    <label for="exampleInputEmail1">Mobile</label>
    <input type="Number" maxlength="16"class="form-control" name="mobile" id="number" aria-describedby="emailHelp">
  </div>
  
    <div class="form-group">
    <label for="exampleInputPassword1">Message</label>
    <textarea type="text" name="message" class="form-control" id="message"></textarea>
  </div>

  <button type="submit" name="submit"class="btn btn-primary">Contact Now</button>
</form>
      </div>  
    </div>
  </div>
</div>