<?php
date_default_timezone_set('UTC');

?>

<?php  
session_start();
 function fetch_data()  
 {    
      $output = '';  
      $conn = mysqli_connect("localhost", "root", "root", "jobs");  

    if(isset($_GET['tid']) && is_numeric($_GET['tid']) && isset($_GET['aid']) && is_numeric($_GET['aid']) && isset($_GET['eid']) && is_numeric($_GET['eid']))
    {
      $tid = $_GET['tid'];
      $aid = $_GET['aid'];
      $eid = $_GET['eid'];
      $sql3 = "SELECT * FROM contracts INNER JOIN jobposts ON contracts.topic_id=jobposts.id INNER JOIN users ON users.id = jobposts.author_id INNER JOIN jobpostscategories ON users.category_user_id=jobpostscategories.id WHERE jobposts.author_id=".$eid."";
      $res3 = mysqli_query($conn,$sql3) or die(mysqli_error($conn));

      $sql = "SELECT * FROM contracts INNER JOIN jobposts ON contracts.topic_id=jobposts.id INNER JOIN users ON users.id=contracts.applicant_id INNER JOIN jobpostscategories ON jobposts.category_id=jobpostscategories.id WHERE topic_id=".$tid." AND applicant_id=".$aid."";
      $result = mysqli_query($conn, $sql);  
      while($row = mysqli_fetch_assoc($result))  
      {       
        $title = $row['job_title'];
        $description = $row['job_description'];
        $agreed_price = $row['agreed_price'];
        $applicant = $row['applicant_id'];
        $category = $row['category'];
        $type = $row['type'];
          $firstname = $row['firstname'];
          $lastname = $row['lastname'];
          $type = $row['type'];
          $date = $row['startDate'];

              if($row3 = mysqli_fetch_assoc($res3)){
                      $firstname2 = $row3['firstname'];
                      $lastname2 = $row3['lastname']; 
                      $category2 = $row3['category'];
                      $type2 = $row3['type'];

      $output .= '<h1 align="center"><strong>EMPLOYMENT CONTRACT</strong></h1><hr>
                  <table style="width:100%">
                      <tr>
                        <th><h2 align="center"><strong>'.$firstname.' '.$lastname.'</strong></h2></th>
                        <th><h2 align="center"><strong>'.$firstname2.' '.$lastname2.'</strong></h2></th> 
                      </tr>
                      <tr>
                        <th><h3 align="center">'.$type.'</h3></th>
                        <th><h3 align="center">'.$type2.'</h3></th>                      
                      </tr>
                  </table> <hr>
                    <h2>Freelancer Agreement</h2>
                    <h4><strong>'.$firstname.' '.$lastname.'</strong> (also known as "Freelancer") will provide <strong>'.$firstname2.' '.$lastname2.'</strong> (also known as "Employer") a <strong>'.$category.'</strong> service.</h4>
                    <br>
                    <h4>Job Title:  <strong>'.$title.'</strong></h4>
                    <h4>Job Category:  <strong>'.$category.'</strong></h4>
                    <h4>Job Requirements:<br>  <strong>'.nl2br($description).'</strong></h4>                    
                    <h4>Contract in effect beginning:  <strong>'.$date.'</strong></h4>
                    <br>
                    <h3><strong>Terms and Conditions</strong></h3>
        
                        <p>Employer will pay <strong>$'.$agreed_price.'</strong> to Freelancer via direct deposit, PayPal, credit card, or other electronic payment processor as agreed to by both parties, no later than the 7th of the month, for work delivered and accepted in the previous month.</p>
                        <p>The Employer is of the opinion that the Freelancer has the necessary qualifications, experience and abilities to assist and benefit the Employer in its business.</p>
                        <p>The Employer desires to employ the Freelancer and the Freelancer has agreed to accept and enter such employment upon the terms and conditions set out in this Agreement.</p>
                        <p>The Employer is of the opinion that the Freelancer has the necessary qualifications, experience and abilities to assist and benefit the Employer in its business.</p>
                        <p>The Freelancer agrees to be subject to the general supervision of and act pursuant to the orders, advice and direction of the Employer.</p>
                        <p>The Freelancer will perform any and all duties as requested by the Employer that are reasonable and that are customarily performed by a person holding a similar position in the industry or business of the Employer.</p>
                        <p>The Employer may make reasonable changes to the job requirements, but only if there is approval of both the Freelancer and the Employer.</p>
                        <p>The Freelancer agrees to abide by the Employer`s rules, policies and practices, including those concerning work deadlines and sick, as they may from time to time be adopted or modified.</p>                                                
                        <h3>Freelancer agrees to terms and policies specified above!</h3><br>

                        <label>Signature: </label><hr>
                        <label>Name & Title: </label><hr>
                        <label>Date: <hr></label>
                        <br>';
      }  
    }
      return $output;
  }
  else
  {
    echo "<h1>The Contract Does Not Exist.</h1>";
  }
 }  
 if(isset($_POST["generate_pdf"]))  
 {  
  ob_start();
      require_once('tcpdf/tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("EMPLOYMENT CONTRACT");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 11);  
      $obj_pdf->AddPage();  
      $content = '';  
     
      $content .= fetch_data();  
     $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('file.pdf', 'I');  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>View Contract</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />            
      </head>  
      <body>  
           <br />
           <div class="container">  
                <div class="table-responsive">  
                	<div class="col-md-12">
                    <?php  
                      if(isset($_SESSION['uid']))
                      {
                        if(isset($_GET['tid']) && is_numeric($_GET['tid']) && isset($_GET['aid']) && is_numeric($_GET['aid']) && isset($_GET['eid']) && is_numeric($_GET['eid']))
                        {
                          echo "<form method='post'>  
                                <input type='submit' name='generate_pdf' class='btn btn-success' value='Generate PDF' />  
                            </form>  
                            ";
                        }
   
                          echo fetch_data();  
                      }
                      else
                      {
                        echo "<center>
                              <h2>You have to login.</h2>
                                  <a href='login.php'>
                                    <button class='button8 button9'>Login</button>
                                  </a>
                              </center>";
                      }
                     ?>  
                     </div>
                </div>  
           </div>  
      </body>  
 </html>  