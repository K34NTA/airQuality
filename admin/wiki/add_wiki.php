<!DOCTYPE html>
<html lang="en">
<head>
    <?php include ('../includes/header.php'); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Add Wiki</title>
</head>
<body>
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar --> 
            <?php include ('../includes/sidebar.php'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                    <?php include ('../includes/topbar.php'); ?>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <form action="save_wiki.php" method="POST" enctype="multipart/form-data">
                    <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h5 mb-2 text-gray-800">
                        <strong>Add Wiki</strong></h1>

                    <div>
                        <a href="index.php"
                            class="btn">
                            <i class="material-icons">&#xe5d9;</i> <strong> Back </strong>
                        </a>
                    </div>
                    <br>
                    <div style="padding-top: 0; padding-bottom: 0; padding-left: 20px; padding-right: 20px;">
                        <label for="pageName"><strong>Page Name</strong></label> 
                            <input type="text" class="form-control form-control-lg shadow-inset-0 font-weight-bold" id="pageName" name="pageName" style="height: 30px;" required>
                     </div>
                    <div class="card-body shadow mt-2">
                        <div class="wrapper  text-left mt-0">
                            <label for="pageName"><strong>Content</strong></label>
                            <textarea class="col-md-12" rows="10" name="content" id="content"  style=" font-size: 12px;" autofocus required></textarea>
                        <script>
                        window.onload = function() {
                            document.getElementById('content').value = '';
                        };
                        </script>
                        </textarea>
                            <!-- Status, Catergory, Assignee, and Due Date -->
                            
                        </div>
                    </div>
                    <br>
                    <!-- Attachment of files -->
                    <div>
                       <strong> Attach file </strong>
                    </div>
                    <div class="shadow mt-2 mb-2" style="height: 100px;">
                        <style>
                            #file-upload {
                            width: 100%;
                            height: 100px;
                            border: 2px dashed #ccc;
                            text-align: center;
                            padding: 10px;
                            font-family: Arial, sans-serif;
                            }

                            #file-upload.highlight {
                                border-color: #999;
                            }
                            #file-upload p {
                                margin: 0;
                                padding: 10px;
                            }
                            </style>

                            <div id="file-upload" style="margin: 0;">
                                <p>Hold down <strong>Ctrl</strong> key for mulitple selection</p>
                                    <input type="file"  name="image[]" multiple="" id="imgInp"
                                        accept="image/png, image/gif, image/jpeg, image/jpg, .pdf, .xlsx" required/> 
                                </p>
                            </div>
                    </div>
                    <div class="d-flex float-right mb-2">
                        <!-- <button type="button" class="btn btn-outline-primary waves-effect waves-themed mr-2" style="font-size: 12px; width: 100px"><strong>Previous</strong></button> -->
                        <button type="submit" class="btn btn-success waves-effect waves-themed" style="font-size: 12px; width: 100px" name="add"><strong>Add</strong></button>
                    </div>
                    </div>
                </form>
                <!-- Modal -->
                <form>
                    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel">Add Category</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <input type="text" class="form-control" id="newOptionInput">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" id="addOptionBtn" data-dismiss="modal">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- JavaScript to handle modal functionality -->
                    <script>
                    document.getElementById("addOptionBtn").addEventListener("click", function() {
                        var newOption = document.getElementById("newOptionInput").value;
                        var selectElement = document.getElementById("optionSelect");

                        // Create a new option element
                        var option = document.createElement("option");
                        option.value = newOption;
                        option.text = newOption;

                        // Add the new option to the select element
                        selectElement.add(option);

                        // Clear the input field
                        document.getElementById("newOptionInput").value = "";
                        
                        // Close the modal
                        var modalElement = document.getElementById("modal");
                        var bootstrapModal = bootstrap.Modal.getInstance(modalElement);
                        bootstrapModal.hide();
                    });
                    </script>
                </form>   
            </div>
            
            <!-- Start of Modal -->
            <?php include ('../includes/modal.php'); ?>
            <!-- End of Modal -->

            <!-- Footer -->
            <?php include ('../includes/footer.php'); ?>
            <!-- End of Footer -->

            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->
    </div>
</body>
</html>