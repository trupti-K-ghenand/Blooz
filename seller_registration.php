<?php require_once('header.php'); ?>

<?php

$sell_name=$sell_phone=$sell_al_phone=$sell_email=$sell_pass=$sell_cname=$sell_bene_name=$sell_acc_num="";
$fnerr1=$nuerr1=$nuErr2=$emailErr1=$passerr=$fnerr2=$fnerr3=$nuerr3="";


function fnerr1($sell_name){
    if (isset($_POST['sell_name'])){
        $sell_name= test_input($_POST["sell_name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$sell_name)) {
            return "*Only letters and white space allowed";
          }  
        }
    }

    function nuerr1($sell_phone){
        if (isset($_POST['sell_phone'])){
        $sell_phone = test_input($_POST["sell_phone"]);
        if(!preg_match("/^[0-9]*$/",$sell_phone)){
            return "*Only numeric value is allowed.";
        }
        if(strlen($sell_phone)!=10){
           return "Mobile no must contain 10 digits.";
        }
      } 
    } 

    function nuerr2($sell_al_phone){
        if (isset($_POST['sell_al_phone'])){
        $sell_al_phone = test_input($_POST["sell_al_phone"]);
        if(!preg_match("/^[0-9]*$/",$sell_al_phone)){
            return "*Only numeric value is allowed.";
        }
        if(strlen($sell_al_phone)!=10){
           return "Mobile no must contain 10 digits.";
        }
      } 
    } 


    function emailerr1(){
        if (isset($_POST['sell_email'])){
            $sell_email = test_input($_POST["sell_email"]);
            if(!filter_var($sell_email,FILTER_VALIDATE_EMAIL)){
            {
            return "*Invalid email format";
            }
            }
        }
        }

        function passerr($sell_pass){
            $length = strlen ($sell_pass);
        if (isset($_POST['sell_pass'])){
            $sell_pass = test_input($_POST["sell_pass"]);
                $uppercase = preg_match('@[A-Z]@', $sell_pass);
                $lowercase = preg_match('@[a-z]@', $sell_pass);
                $number    = preg_match('@[0-9]@', $sell_pass);
                $specialChars = preg_match('@[^\w]@', $sell_pass);
                
                if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($sell_pass) < 8) {
                    return '*Invalid Password';
                
                }
            }
        }

        function fnerr2($sell_cname){
            if (isset($_POST['sell_cname'])){
                $sell_cname= test_input($_POST["sell_cname"]);
                if (!preg_match("/^[a-zA-Z-' ]*$/",$sell_cname)) {
                    return "*Only letters and white space allowed";
                  }  
                }
            }

            function fnerr3($sell_bene_name){
                if (isset($_POST['sell_bene_name'])){
                    $sell_bene_name= test_input($_POST["sell_bene_name"]);
                    if (!preg_match("/^[a-zA-Z-' ]*$/",$sell_bene_name)) {
                        return "*Only letters and white space allowed";
                      }  
                    }
                }


                function nuerr3($sell_acc_num){
                    if (isset($_POST['sell_acc_num'])){
                    $sell_acc_num = test_input($_POST["sell_acc_num"]);
                    if(!preg_match("/^[0-9]*$/",$sell_acc_num)){
                        return "*Only numeric value is allowed.";
                    }
                }
            }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
?>

<div class="page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="user-content">

                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

                    <form action="" method="POST">

                   <div class="row">
                    <div class="col-md-2"></div>
                           
                    <div class="col-md-12">
                    <label style="margin-top:2%; margin-left:3%; font-size:35px"> Personal Details</label>

                    <div class="row">
                    <div class="col" style="margin-left:3%; margin-top:2%; width:400px">
                    <label for=""><h2>Full Name *</h2></label>
                     <input type="text" class="form-control" name="sell_name" value="<?php echo htmlspecialchars($_POST['sell_name'] ?? '', ENT_QUOTES); ?>" required/>
                     <?php echo fnerr1($sell_name);?>
                    </div>
                    <div class="col" style="margin-top:2%" >
                    <label for=""><h2>Mobile Number *</h2></label>
                    <input type="text" class="form-control" name="sell_phone" aria-label="Mobile Number" <?php echo htmlspecialchars($_POST['sell_phone'] ?? '', ENT_QUOTES); ?>required/>
                    <?php echo nuerr1($sell_phone);?>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col" style="margin-left:3%; margin-top:2%">
                    <label for=""><h2>Alternate Mobile Number *</h2></label>
                    <input type="text" class="form-control" name="sell_al_phone"  <?php echo htmlspecialchars($_POST['sell_al_phone'] ?? '', ENT_QUOTES); ?> required>
                    <?php echo nuerr2($sell_al_phone);?>
                    </div>
                    <div class="col" style="margin-top:2%" >
                    <label for=""><h2>Email Address *</h2></label>
                    <input type="text" class="form-control" name="sell_email" <?php echo htmlspecialchars($_POST['sell_email'] ?? '', ENT_QUOTES); ?> required>
                    <?php echo emailerr1(); ?>
                    </div>
                    </div>

                    <label style="margin-top:2%; margin-left:3%; font-size:35px"> Company Overview</label>
                    <div class="row">
                    <div class="col" style="margin-left:3%; margin-top:2%">
                    <label for=""><h2>Company/Store Name *</h2></label>
                    <input type="text" class="form-control" name="sell_cname" value="<?php echo htmlspecialchars($_POST['sell_cname'] ?? '', ENT_QUOTES); ?>"  required></p>
                    <?php echo fnerr2($sell_cname);?>
                    </div>
                    <div class="col" style="margin-top:2%" >
                    <label for=""><h2>Company/Store Establish date *</h2></label>
                    <input type="date" class="form-control" name="sell_cdate"  required>
                    </div>
                    </div>
                                    
                                
                    <div class="row">
                    <div class="col" style="margin-left:3%; margin-top:2%">
                    <label for=""><h2>Annual Turnover *</h2></label>
                    <input type="text" class="form-control" name="sell_turnover" required>
                    </div>
                    <div class="col" style="margin-top:2%" >
                    <label data-toggle="popover" title="The Ministry of Micro, Small and Medium Enterprises, a branch of the Government of India" data-content="Some content inside the popover"><h2>Is your Company MSME *</h2></label>
                    <select name="sell_MSME" class="form-control select2" required>
                    <option value="1"><h2>Yes</h2></option>
                    <option value="2"><h2>No</h2></option>
                    </select>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
                    </div>
                    </div>

                    <label style="margin-top:2%; margin-left:3%; font-size:35px"> Payment Details</label>
                    <div class="row">
                    <div class="col" style="margin-left:3%; margin-top:2%">
                    <label for=""><h2>Bank Name *</h2></label>
                    <input type="text" class="form-control" name="sell_b_name"  required></p>
                    </div>
                    <div class="col" style="margin-top:2%" >
                    <label for=""><h2>Beneficiary Name *</h2></label>
                    <input type="text" class="form-control" name="sell_bene_name"  value="<?php echo htmlspecialchars($_POST['sell_bene_name'] ?? '', ENT_QUOTES); ?>"  required>
                    <?php echo fnerr3($sell_bene_name);?>    
                    </div>

                    </div>
                    <div class="col" style="margin-left:3%; margin-top:2%">
                    <label for=""><h2>Account Number *</h2></label>
                    <input type="text" class="form-control" style="width:530px" name="sell_acc_num" <?php echo htmlspecialchars($_POST['sell_acc_num'] ?? '', ENT_QUOTES); ?>  required></p>
                    <?php echo nuerr3($sell_acc_num);?>
                    </div>
                    <div class="col" style="margin-left:3%; margin-top:2%" >
                    <label for="floatingTextarea2"><h2>Bank Address</h2></label>
                    <textarea class="form-control" name="sell_b_address" placeholder="" id="floatingTextarea2" style="height: 60px; width:600px" required ></textarea>
                    </div>
                    </div>

                    <div class="col-md-12 form-group" style="margin-left:30px; margin-top:2%">
                      <label for="floatingTextarea2"><h2>Story till Blooz</h2></label>
                      <textarea class="form-control" name="sell_story" placeholder="" id="floatingTextarea2" style="height: 80px; width:600px"></textarea>
                     </div>

                     <div class="col-md-12 form-group" style="margin-left:30px; margin-top:2%">
                        <label for="floatingTextarea2"><h2>How soon do you want to launch your product on Blooz (Month,year)</h2></label>
                        <textarea class="form-control" name="sell_launch" placeholder="" id="floatingTextarea2" style="height: 50px; width:600px"></textarea>
                     </div>

                     <div class="row">
                    <div class="col" style="margin-left:3%; margin-top:2%">
                    <label for=""><h2>Password* </h2></label>
                    <input type="password" class="form-control" name="sell_pass" value="<?php echo htmlspecialchars($_POST['sell_pass']?? '', ENT_QUOTES); ?>" required></p>
                    <?php echo passerr($sell_pass);?>
                    </div>
                    <div class="col" style="margin-top:2%" >
                    <label for=""><h2>Confirm Password* </h2></label>
                    <input type="password" class="form-control" name="sell_cpass" value="<?php echo htmlspecialchars($_POST['sell_cpass']?? '', ENT_QUOTES); ?>" required>
                    </div>
                    </div>

                    
                    <div class="col-md-6 form-group">
                    <input type="submit" name="submit" value="Submit" class="btn btn-danger" style="margin-top:10%; margin-left:500px">
                    </div>

                    

                                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
                                </div>
                            </div>
                        </div>                        
                    </form>
                </div>                
            </div>
        </div>
    </div>
</div>

<?php

include 'sellerconnection.php';

if(isset($_POST['submit'])){
    $sell_name=$sell_phone=$sell_al_phone=$sell_email=$sell_pass=$sell_cpass=$sell_cname=$sell_bene_name=$sell_acc_num=$sell_b_address="";
$fnerr1=$nuerr1=$nuErr2=$emailErr1=$passerr=$fnerr2=$fnerr3=$nuerr2=$adderr=$err="";

$err=fnerr1($sell_name).nuerr1($sell_phone).nuerr2($sell_al_phone).emailerr1($sell_email).passerr($sell_pass).fnerr2($sell_cname).fnerr3($sell_bene_name).nuerr2($sell_acc_num);
if ($err!="") {
    ?>
    <script>
        alert ("Please recheck the form");
        </script>
        <?php

}else{

    $sell_name = $_POST['sell_name'];
    $sell_phone = $_POST['sell_phone'];
    $sell_al_phone = $_POST['sell_al_phone'];
    $sell_email = $_POST['sell_email'];
    $sell_cname = $_POST['sell_cname'];
    $sell_cdate = $_POST['sell_cdate'];
    $sell_turnover = $_POST['sell_turnover'];
    $sell_MSME = $_POST['sell_MSME'];
    $sell_b_name = $_POST['sell_b_name'];
    $sell_bene_name = $_POST['sell_bene_name'];
    $sell_acc_num = $_POST['sell_acc_num'];
    $sell_b_address = $_POST['sell_b_address'];
    $sell_story = $_POST['sell_story'];
    $sell_launch = $_POST['sell_launch'];
    $sell_pass = $_POST['sell_pass'];
    $sell_cpass = $_POST['sell_cpass'];

    $emailquery = "SELECT * FROM `tbl_seller` WHERE sell_email= '$sell_email'";
    $result = mysqli_query($con,$emailquery);

    $emailcount = mysqli_num_rows($result);
    if($emailcount>0){
    ?>
    <script>
    alert( "Email already exists");
    </script>
    <?php

    }else{
    $insertquery = " INSERT INTO `tbl_seller` (`sell_name`, `sell_phone`, `sell_al_phone`, `sell_email`, `sell_cname`, `sell_cdate`, `sell_turnover`, `sell_MSME`, `sell_b_name`, `sell_bene_name`, `sell_acc_num`, `sell_b_address`, `sell_story`, `sell_launch`, `sell_pass`, `sell_cpass`, `status`)
    values('$sell_name', '$sell_phone', '$sell_al_phone', '$sell_email', '$sell_cname', '$sell_cdate', '$sell_turnover','$sell_MSME', '$sell_b_name', '$sell_bene_name', '$sell_acc_num', '$sell_b_address', '$sell_story', '$sell_launch', '$sell_pass', '$sell_cpass', 1)";
    $res = mysqli_query ($con, $insertquery);
    if($res){

     ?>
        <script>
        alert("Registration successful")
        location.replace("Seller_panel/seller_login.php");
        </script>
        <?php
}else{
    ?>
        <script>
        alert ("Data not inserted");
        </script>
        <?php
}
}
}
}


?>

<?php require_once('footer.php'); ?>
