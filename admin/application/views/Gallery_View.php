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
    </style>
</head>
<body>
    <div id="wrapper">
        <!--header start-->
        <?php $this->load->view("top"); ?>
        <!--header end-->

        <header id="head" class="secondary">
            
                <h2>Gallery</h2>
            
        </header>

        <!--sidebar start-->
        <?php $this->load->view("panel1"); ?>
        <!--sidebar end-->



        <!--main content start-->
         <div class="container col-sm-9">
            <div id="page-wrapper">
                <div class="row col-sm-12">

                    <!-- Page Header -->
                    <div class="col-sm-10" style="margin-top: -20px;">
                        <div class="page-header">
                            
                            <ol class="breadcrumb">
                                <li><a href="<?php echo base_url("index.php/Login_Controller/Home"); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                                <li class="active">Gallery</li>
                            </ol>
                        </div>
                    </div>
                    <!--End Page Header -->

                    <div class="col-sm-2" style="margin-top: 10px;">
                        <a href="<?php echo base_url("index.php/Gallery_Controller/AddImage")?>" class="btn btn-sm btn-default">Add New Image</a>
                    </div>

                </div>

                <!-- Table Part -->

                <div class="row">
                    <div class="col-lg-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                          
                            <!-- Welcome -->
                            <div class="panel-body">

                                <?php
                                if (isset($_SESSION['InsertGalleryData'])) {
                                    if ($_SESSION['InsertGalleryData'] == '1') { ?>
                                    <div class="alert alert-success"><?php echo "Record Added Succesfully" ?></div>
                                    <?php unset($_SESSION['InsertGalleryData']);
                                } else if($_SESSION['InsertGalleryData'] == '1062') { ?>

                                 <div class="alert alert-danger"><?php echo "Something Went Wrong !! Please Try Again.."; ?></div>
                                <?php
                                unset($_SESSION['InsertGalleryData']); }
                                }


                                if (isset($_SESSION['DeleteGallery'])) {
                                if ($_SESSION['DeleteGallery'] == '1') {
                                    ?>
                                    <div class="alert alert-success"><?php echo "Record Delete Succesfully" ?></div>
                                    <?php
                                    unset($_SESSION['DeleteGallery']);
                                } else {
                                    ?>
                                    <div class="alert alert-danger"><?php echo "Something Went Wrong !! Please Try Again.." ?></div>
                                    <?php
                                    unset($_SESSION['DeleteGallery']);
                                    } //end of else
                                } //endof if
                                ?>


                                <div class="table-responsive col-sm-12">
                                <table id="example" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Photo</th>
                                            <th>Category</th>
                                            <th>Description</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <?php if(isset($AllImages)){?>
                                    <tbody>
                                        <?php $no=1; 
                                        foreach ($AllImages as $value) {?>
                                        <tr>
                                            <td><?php echo $no; $no++;?></td>
                                            <!-- <td><?php echo $value->photo;?></td> -->

                                        <td><img src="<?php echo base_url("panel/img/gallery/$value->photo"); ?>" width="100px" height="100px"></td>

                                            <td><?php echo $value->category;?></td>
                                            <td><?php echo $value->description;?></td>

                                            <td>
                                                <a onclick="return confirm('Are You Sure Remove This Record ');" href="<?php echo base_url("index.php/Gallery_Controller/DeleteImage/$value->photo");?>" data-toggle="tooltip" data-placement="top" title="Delete">
                                                    <i class="fa fa-trash-o delete"></i>
                                                </a>
                                            </td>


                                        </tr>
                                         <?php }?> <!-- end of foreach-->
                                    </tbody>
                                    <?php } ?> <!-- end of if-->
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
