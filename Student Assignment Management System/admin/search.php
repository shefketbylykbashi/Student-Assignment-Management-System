<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php'); include('../config.php');
if (strlen($_SESSION['ocasaid']==0)) {
  header('location:logout.php');
  } else{



  ?>
<!DOCTYPE html>
<html lang="en">

<head>
   
    <title>FIEK Search</title>

    <!-- Styles -->
    <link href="../assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="../assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="../assets/css/lib/datatable/dataTables.bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/lib/datatable/buttons.bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/lib/menubar/sidebar.css?v=<?=$version?>" rel="stylesheet">
    <link href="../assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/lib/unix.css" rel="stylesheet">
    <link href="../assets/css/style.css?v=<?=$version?>" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
  body {
    font-family: Arail, sans-serif;
  }

  /* Formatting search box */
  .search-box {
    width: 300px;
    position: relative;
    display: inline-block;
    font-size: 14px;
  }

  .search-box input[type="text"] {
    height: 32px;
    padding: 5px 10px;
    border: 1px solid #CCCCCC;
    font-size: 14px;
  }

  .result {
    position: absolute;
    z-index: 999;
    top: 100%;
    left: 0;
    background: white;
  }

  .search-box input[type="text"],
  .result {
    width: 100%;
    box-sizing: border-box;
  }

  /* Formatting result items */
  .result p {
    margin: 0;
    padding: 7px 10px;
    border: 1px solid #CCCCCC;
    border-top: none;
    cursor: pointer;
  }

  .result p:hover {
    background: #f2f2f2;
  }
  </style>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script>
  $(document).ready(function() {
    $('.search-box input[type="text"]').on("keyup input", function() {
      /* Get input value on change */
      var inputVal = $(this).val();
      var resultDropdown = $(this).siblings(".result");
      if (inputVal.length) {
        $.get("backend-search.php", {
          term: inputVal
        }).done(function(data) {
          // Display the returned data in browser
          resultDropdown.html(data);
        });
      } else {
        resultDropdown.empty();
      }
    });

    // Set search input value on click of result item
    $(document).on("click", ".result p", function() {
      $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
      $(this).parent(".result").empty();
    });
  });
  </script>
</head>

<body>
 <?php include_once('includes/sidebar.php');?>
   
    <?php include_once('includes/header.php');?>
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="dashboard.php">Dashboard</a></li>
                                    <li class="active">Search</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <div id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card alert">
                                <div class="card-body">
                            <form name="" method="post" enctype="multipart/form-data">
                            <div class="card-header m-b-20">
                                <h4>Search uploaded Assignment</h4>
                                <div class="card-header-right-icon">
                                    <ul>
                                        <li class="card-close" data-dismiss="alert"><i class="ti-close"></i></li>
                                        <li class="card-option drop-menu"><i class="ti-settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="link"></i>
                                            <ul class="card-option-dropdown dropdown-menu">
                                                <li><a href="#"><i class="ti-loop"></i> Update data</a></li>
                                                <li><a href="#"><i class="ti-menu-alt"></i> Detail log</a></li>
                                                <li><a href="#"><i class="ti-pulse"></i> Statistics</a></li>
                                                <li><a href="#"><i class="ti-power-off"></i> Clear ist</a></li>
                                            </ul>
                                        </li>
                                        <li class="doc-link"><a href="#"><i class="ti-link"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="basic-form">
                                        <div class="form-group">
                                            <label>Search by Subject</label>
                                            <div class="search-box">
    <input type="text" autocomplete="off" placeholder="Search subject..." />
    <div class="result"></div>
  </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-default btn-lg m-b-10 bg-warning border-none m-r-5 sbmt-btn" type="submit" name="search">Submit</button>
                          
                        </form>
                        </div>

                        <script>
           function showHint(str) {
            if (str.length == 0) { 
                document.getElementById("showSubj").innerHTML = "";
                return;
            }
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                document.getElementById("showSubj").innerHTML =
                this.responseText;
            }
            xhttp.open("GET", "gethint.php?q="+str);
            xhttp.send();   
            }
        </script>
                                <div class="card-header">
                                   
                                    <div class="card-header-right-icon">
                                        <ul>
                                            <li class="card-close" data-dismiss="alert"><i class="ti-close"></i></li>
                                            <li class="doc-link"><a href="#"><i class="ti-link"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">


                                     <?php
if(isset($_POST['search']))
{ 

$sdata=$_POST['searchdata'];
  ?>
  <h4 align="center">Result against keyword </h4>

                                        <table  class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Assignment Number</th>
                                                    <th>Teacher Name</th>
                                                    <th>Course Name</th>
                                                    <th>Subject</th>
                                                    <th>Submitted By</th>
                                                    <th>Submitted Date</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                               if (isset($_GET['page_no']) && $_GET['page_no']!="") {
  $page_no = $_GET['page_no'];
  } else {
    $page_no = 1;
        }
        // Formula for pagination
        $no_of_records_per_page = 5;
        $offset = ($page_no-1) * $no_of_records_per_page;
        $previous_page = $page_no - 1;
  $next_page = $page_no + 1;
  $adjacents = "2"; 
$ret = "SELECT ID FROM tbluploadass";
$query1 = $dbh -> prepare($ret);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$total_rows=$query1->rowCount();
$total_no_of_pages = ceil($total_rows / $no_of_records_per_page);
  $second_last = $total_no_of_pages - 1; // total page minus 1
                                               

$sql="SELECT tblcourse.ID,tblcourse.BranchName,tblcourse.CourseName,tblsubject.SubjectFullname,tblsubject.SubjectCode,tblassigment.AssignmentNumber,tblassigment.AssignmenttTitle,tblassigment.ID as assinid,tblassigment.SubmissionDate,tblassigment.CreationDate,tblteacher.ID,tblteacher.FirstName,tblteacher.LastName,tbluploadass.UserID,tbluploadass.AssId,tbluploadass.AssDes,tbluploadass.AnswerFile,tbluploadass.SubmitDate,tbluploadass.Marks,tbluser.ID as uid, tbluser.FullName,tbluser.MobileNumber,tbluser.Email,tbluser.Cid,tbluser.RollNumber from tblassigment join tblcourse on tblcourse.ID=tblassigment.Cid join tblsubject on tblsubject.ID=tblassigment.Sid join tblteacher on tblteacher.ID=tblassigment.Tid join tbluploadass on tblassigment.ID=tbluploadass.AssId join tbluser on tbluploadass.UserID=tbluser.ID where tblassigment.AssignmentNumber like '$sdata%'|| tblteacher.FirstName like '$sdata%' || tblteacher.LastName like '$sdata%' || tblsubject.SubjectFullname like '$sdata%'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
   
                                                <tr>
                                                    <td><?php echo htmlentities($cnt);?></td>
                                                    <td><?php  echo htmlentities($row->AssignmentNumber);?> </td>
                                                    <td><?php  echo htmlentities($row->FirstName);?> <?php  echo htmlentities($row->LastName);?></td>
                                                    <td><?php  echo htmlentities($row->CourseName);?>(<?php  echo htmlentities($row->BranchName);?>)</td>
                                                    <td><?php  echo htmlentities($row->SubjectFullname);?>(<?php  echo htmlentities($row->SubjectCode);?>)</td>
                                                    <td><?php  echo htmlentities($row->FullName);?>(<?php  echo htmlentities($row->RollNumber);?>)</td>
                                                    <td><?php  echo htmlentities($row->SubmitDate);?></td>
                                                  <?php if($row->Marks==""){ ?>

                     <td><?php echo "Unchecked Assignment"; ?></td>
<?php } else { ?>
                                        <td>
                                            <span class="badge badge-primary"><?php  echo "Checked Assignment";?></span>
                                        </td>
<?php } ?> 
                                                    <td><a href="submit-assignment.php?assinid=<?php echo htmlentities ($row->assinid);?> && uid=<?php echo htmlentities ($row->uid);?> ">View</a></td>
                                                </tr>
                                             <?php 
$cnt=$cnt+1;
} } else { ?>
  <tr>
    <td colspan="9"> No record found against this date</td>

  </tr>
                                            </tbody>
                                            
 
                                        </table>
                                        
										<div class="row">
                        <div class="col-md-12">
                            <div align="left">
    <ul class="pagination">

<li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
<a <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>>Previous</a>
</li>

<?php
if ($total_no_of_pages <= 10){
for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
if ($counter == $page_no) {
echo "<li class='active'><a>$counter</a></li>";
}else{
echo "<li><a href='?page_no=$counter'>$counter</a></li>";
}
}
}
elseif($total_no_of_pages > 10){

if($page_no <= 4) {
for ($counter = 1; $counter < 8; $counter++){
if ($counter == $page_no) {
echo "<li class='active'><a>$counter</a></li>";
}else{
echo "<li><a href='?page_no=$counter'>$counter</a></li>";
}
}
echo "<li><a>...</a></li>";
echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
}

elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {
echo "<li><a href='?page_no=1'>1</a></li>";
echo "<li><a href='?page_no=2'>2</a></li>";
echo "<li><a>...</a></li>";
for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {
if ($counter == $page_no) {
echo "<li class='active'><a>$counter</a></li>";
}else{
echo "<li><a href='?page_no=$counter'>$counter</a></li>";
}
}
echo "<li><a>...</a></li>";
echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
}

else {
echo "<li><a href='?page_no=1'>1</a></li>";
echo "<li><a href='?page_no=2'>2</a></li>";
echo "<li><a>...</a></li>";

for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
if ($counter == $page_no) {
echo "<li class='active'><a>$counter</a></li>";
}else{
echo "<li><a href='?page_no=$counter'>$counter</a></li>";
}
}
}
}
?>

<li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
<a <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>>Next</a>
</li>
<?php if($page_no < $total_no_of_pages){
echo "<li><a href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
} ?>
</ul>
</div><?php } }?>

                        </div>
                    </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /# card -->
                        </div>
                        <!-- /# column -->
                    </div>
                    <!-- /# row -->
                   <?php include_once('includes/footer.php');?>
                </div>
            </div>
        </div>
    </div>
   
    <!-- jquery vendor -->
    <script src="../assets/js/lib/bootstrap.min.js"></script>
    <!-- bootstrap -->
    <script src="../assets/js/lib/jquery.min.js"></script>
    <script src="../assets/js/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="../assets/js/lib/menubar/sidebar.js"></script>
    <script src="../assets/js/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->
    <script src="../assets/js/lib/data-table/datatables.min.js"></script>
    <script src="../assets/js/lib/data-table/datatables-init.js"></script>
    <script src="../assets/js/scripts.js"></script>
    <!-- scripit init-->
<?php }  ?>







</body>

</html>