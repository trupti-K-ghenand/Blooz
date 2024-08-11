
<?php require_once('header.php'); ?>
<?php
if(isset($_POST['form1'])) {
    echo "<script>alert('view your customized product')</script>";
    header('location: vc_product.php?id='.$_REQUEST['id']);
	$valid = 1;
    $id=$_REQUEST['id'];
    $path = $_FILES['photo']['name'];
    $path_tmp = $_FILES['photo']['tmp_name'];

    if($path == '') {
    	$valid = 0;
        $error_message .= "You must have to select a photo";
    } else {
    	$ext = pathinfo( $path, PATHINFO_EXTENSION );
        $file_name = basename( $path, '.' . $ext );
        if( $ext!='jpg' && $ext!='png' && $ext!='jpeg' && $ext!='gif' ) {
            $valid = 0;
            $error_message .= 'You must have to upload jpg, jpeg, gif or png file';
        }
    }
    
    if($valid == 1) {

    	// getting auto increment id for photo renaming
		$statement = $pdo->prepare("SHOW TABLE STATUS LIKE 'tbl_c'");
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row) {
			$ai_id=$row[10];
		}
        
		// uploading the photo into the main location and giving it a final name
		$final_name = 'photo-'.$ai_id.'.'.$ext;
        move_uploaded_file( $path_tmp, 'assets/c_uploads/'.$final_name );

		// saving into the database
		$statement = $pdo->prepare("INSERT INTO tbl_c (photo,p_id) VALUES (?,?)");
		$statement->execute(array($final_name,$id));

    	$success_message = 'Photo is added successfully.';
    }}
?>
<!--
<section class="content-header">
	<div class="content-header-right">
    
    <a href="product.php" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>
-->
<section class="content">

	<div class="row">
		<div class="col-md-12">
        <?php
if($error_message1 != '') {
    echo "<script>alert('".$error_message1."')</script>";
}
if($success_message1 != '') {
    echo "<script>alert('".$success_message1."')</script>";
    header('location: product.php?id='.$_REQUEST['id']);
}
?>
			

			<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
            <label style="float:left;
                            margin-top:4%;
                            margin-left:4%;
                            margin-bottom:4%;
                            " >Upload Photo <span>*</span></label>
                <div style="float:left;
                            margin-top:4%;
                            margin-left:4%;
                            margin-bottom:4%;
                            " class="box box-info">

					<div  style="width:250px;height:100px;"class="box-body">
						<div class="form-group">
							
            
							<div  style="float:left;padding-top:10px;margin-left:14%;">
								<input type="file" name="photo">
							</div>

						</div>
						<div class="form-group">
							
							<div style="float:left;padding-top:5px;margin-left:14%;">
								<button type="submit" class="btn btn-success pull-left" name="form1">Submit</button></a>
							</div>
                            
						</div>
					</div>
				</div>

			</form>


		</div>
	</div>

</section>