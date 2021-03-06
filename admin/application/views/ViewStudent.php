<!DOCTYPE html>
<head>
    <title>View Student</title>
    <?php $this->load->view("head"); ?>
    <style type="text/css">
     #head.secondary{
        min-height: 40px;
        height: 40px !important;
        margin-top:10px;
        padding-bottom: 25px;
    }
    h2{
        margin-top: -07px;
    }
</style>
</head>
<body>

    <div id="wrapper">
        <!--header start-->
        <?php $this->load->view("top"); ?>
        <!--header end-->
        <!--sidebar start-->

        <header id="head" class="secondary">
            
                <h2>Students</h2>
            
        </header>
        

        <?php $this->load->view("panel1"); ?>
        <!--sidebar end-->
        <!--main content start-->
        

        <div class="container col-sm-9">
            <div id="page-wrapper">
                <div class="row col-sm-12">

                    <!-- Page Header -->
                    <div class="col-sm-8" style="margin-top: -20px;">
                        <div class="page-header">
                            
                            <ol class="breadcrumb">
                                <li><a href="<?php echo base_url("index.php/Login_Controller/Home"); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                                <li>Students</li>
                                <li class="active">All Students</li>
                            </ol>
                        </div>
                    </div>
                    <!--End Page Header -->
                    <div class="col-sm-2" style="margin-top: 10px;">
                        <a href="<?php echo base_url("index.php/Student_Controller/AddStudent")?>" class="btn btn-sm btn-default">Add</a>
                    </div>
                    <div class="col-sm-2" style="margin-top: 10px;">
                        <a href="<?php echo base_url("index.php/Student_Controller/DownloadList")?>" class="btn btn-sm btn-default">Export List</a>
                        
                    </div>

                </div>


                <div class="row">
                    <div class="col-lg-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            
                            <!-- Welcome -->
                            <div class="panel-body">
                                <?php
                                if (isset($_SESSION['InsertStudentData'])) {
                                    if ($_SESSION['InsertStudentData'] == '1') { ?>
                                    <div class="alert alert-success"><?php echo "Record Added Succesfully" ?></div>
                                    <?php unset($_SESSION['InsertStudentData']);
                                } else if($_SESSION['InsertStudentData'] == '1062') { ?>
                                
                                <div class="alert alert-danger"><?php echo "Roll Number already exist. Please try with different roll number."; ?></div>
                                <?php unset($_SESSION['InsertStudentData']); } else { ?>
                                
                                <div class="alert alert-danger"><?php echo "Something Went Wrong !! Please Try Again.."; ?></div>
                                <?php
                                unset($_SESSION['InsertStudentData']); }
                            }
                            if (isset($_SESSION['Deletestudent'])) {
                                if ($_SESSION['Deletestudent'] == '1') {
                                    ?>
                                    <div class="alert alert-success"><?php echo "Record Delete Succesfully" ?></div>
                                    <?php
                                    unset($_SESSION['DeleteStudent']);
                                } else {
                                    ?>
                                    <div class="alert alert-danger"><?php echo "Something Went Wrong !! Please Try Again.." ?></div>
                                    <?php
                                    unset($_SESSION['Deletestudent']);
                                }
                            }
                            if (isset($_SESSION['UpdateStudentData'])) {
                                if ($_SESSION['UpdateStudentData'] == '1') {
                                    ?>
                                    <div class="alert alert-success"><?php echo "Record update Succesfully" ?></div>
                                    <?php
                                    unset($_SESSION['UpdateStudentData']);
                                } else {
                                    ?>
                                    <div class="alert alert-danger"><?php echo "Something Went Wrong !! Please Try Again.." ?></div>
                                    <?php
                                    unset($_SESSION['UpdateStudentData']);
                                }
                            }
                            ?>

                            <div class="table-responsive col-sm-12">
                            
                                <table id="example" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Roll No</th>
                                            <th>Student Name</th>
                                            <th>School Name</th>
                                            <th>Branch</th>
                                            <th>Standard</th>
                                            <th>Subjects</th>
                                            <th>Email</th>
                                            <th>Student Photo</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <?php if(isset($AllStudents)){?>
                                    <tbody>
                                        <?php $no=1; foreach ($AllStudents as $value) {?>
                                        <tr>
                                            <td><?php echo $no; $no++;?></td>
                                            <td><?php echo $value->roll_no;?></td>
                                            <td><?php echo $value->stud_name;?></td>
                                            <td><?php echo $value->school_name;?></td>
                                            <td><?php echo $value->branch_area;?></td>
                                            <td><?php echo $value->standard; ?></td>
                                            <td>
                                                <?php
                                                $subjects=explode(",",$value->subject);
                                                foreach($subjects as $subject) {
                                                   echo $subject."<br/>";
                                               }

                                               ?>
                                           </td>
                                           <td><?php  echo $value->email_id; ?></td>
                                           <td><img src="<?php if($value->photo == '') {
                                            echo($value->gender != "Male") ? base_url("panel/img/female.png") : base_url("panel/img/male.png"); } else { echo base_url("panel/img/student/$value->photo"); } ?>" width="75px" height="75px"></td>
                                            <td>
                                                <a href="<?php echo base_url("index.php/Student_Controller/EditStudent/$value->stud_id");?>"><i class="fa fa-pencil update" data-toggle="tooltip" data-placement="top" title="Edit"></i></a>&nbsp;
                                                <a  onclick="return confirm('Are You Sure Remove This Record ');" href="<?php echo base_url("index.php/Student_Controller/Deletestudent/$value->stud_id");?>" data-toggle="tooltip" data-placement="top" title="Delete">
                                                    <i class="fa fa-trash-o delete"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view("footer"); ?>
<script>
    $(function () {
        $("#example").dataTable();
    })
</script>
<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
</body>
</html>
