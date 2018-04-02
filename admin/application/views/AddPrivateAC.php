<!DOCTYPE html>
<head>
    <title>Tution Classes | Admin</title>
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
    select.form-control {
        -webkit-appearance: none;
    }
    select.standard, select.student  {
        -webkit-appearance: menulist;
    }
</style>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
    var standard_id = standard;

    function getSubjects(standard) {
        $.post("<?php echo base_url(); ?>index.php/Announcement_Controller/FetchSubjects/", {id: standard.value}, function(data) {
            console.log(data);
            window.alert(data);
            $('#subject').html(data);
        });
    }

     function getStudents(subject) {
        $.post("<?php echo base_url(); ?>index.php/Announcement_Controller/FetchStudents/", {
            id:standard_id,sub_id:subject.value}, function(data) {
            console.log(data);
            window.alert("Hii");
            $('#student').html(data);
        });
    }
</script>
</head>
<body>
    <div id="wrapper">
        <!--header start-->
        <?php $this->load->view("top"); ?>
        <!--header end-->

        <header id="head" class="secondary" >
            
                <h2>Private Announcement</h2>
            
        </header>

        <!--sidebar start-->
        <?php $this->load->view("panel1"); ?>
        <!--sidebar end-->

        <div class="container col-sm-9">
            <div id="page-wrapper">
                <div class="row">

                    <!-- Page Header -->
                    <div class="col-lg-12">
                        <div class="page-header">
                            <!-- <h1 class="heading">Add New Image</h1> -->

                            <ol class="breadcrumb">
                                <li><a href="<?php echo base_url('index.php/Login_Controller/Home'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                                <li> <a href="<?php echo base_url('index.php/Announcement_Controller/ViewPrivate'); ?>">Private Announcement</a></li>

                                <li class="active">Add New</li>   
                            </ol>
                        </div>
                    </div>
                    <!--End Page Header -->

                </div>
                <!-- For Displaying Error of any field of form 
                <?php
                                if (isset($_SESSION['InsertGalleryData'])) {
                                    ?>
                                    <div class="alert alert-danger"><?php echo $_SESSION['InsertGalleryData'] ?></div>
                                    <?php unset($_SESSION['InsertGalleryData']);
                                } 
                                ?> -->


                                <!-- Add Image Form -->
                                <div class="row">
                                    <div class="col-lg-10">
                                        <div class="panel panel-default">
                            <!-- <div class="panel-heading">
                                Add New Image Form
                            </div> -->
                            
                            <!-- Welcome -->
                            <div class="panel-body">

                                <form role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url('index.php/Announcement_Controller/InsertPrivate') ?>">

                                 <div class="col-md-6 form-group">
                                    <label>Announcement Image<br> <span style="color:blue;font-size:12px;font-weight: normal;">(Note: Photo format : jpg | png | jpeg | gif & Maximum Size : 500kb are allowed.)</span></label>
                                    <input type="file" class="form-input" name="ImageUpload" accept="image/*" required>


                                    <!-- <?php if(isset($row)){?><img src="<?php echo base_url("panel/img/student/$row->photo"); ?>" width="100px" height="100px"><?php }?> -->
                                </div>   

                                <div class="col-md-6 form-group">
                                    <label>Title</label>
                                    <input type="text" name="title" class="form-input form-control branch" required>
                                </div>



                                <div class="col-md-6 form-group">
                                    <label>Description</label>
                                    <textarea class="form-input form-control branch" name="description" maxlength="250" required></textarea>      
                                </div>

                                <div class="col-md-6 form-group">
                                    <label>Standard</label>
                                    <select class="form-input form-control standard" name="Standard" onchange="getSubjects(this);" required>
                                        <option value="">Select Standard</option>
                                        <?php foreach($AllStandards as $standard) 
                                        { ?>
                                           <option value="<?php echo $standard->standard_id ?>" <?php echo(isset($StudentDetails) && $standard->standard_id == $row->standard_id) ? "selected" : "" ; ?>>
                                            <?php echo $standard->standard; ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Subjects </label>
                                    <select class="form-input form-control" name="subject" id="subject" onselect="getStudents(this);" required">
                                        <option value="">Select Subject</option>
                                        </select>
                                        </div>

                                        <div class="col-md-6 form-group">
                                            <label>Students [Select multiple Students <kbd>Ctrl</kbd>+<kbd>Select</kbd>]</label>
                                            <select class="form-input form-control" name="student[]" multiple="multiple" id="student" size="3" required >
                                            </select>
                                        </div>

                                       


                                                <div class="col-md-6 form-group">
                                                    <input type="submit" class="btn btn-default" value="Submit" name="AddPrivate">
                                                </div>
                                            </form> 
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
