<!DOCTYPE html>
<html lang="en">
<head>
    
    <?php include ('../includes/header.php'); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Wiki</title>
</head>
<body>
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
                <div style="display: flex; justify-content: flex-end;">
                    <div style="margin-right: 50px;">
                        <a href="add_wiki.php"
                            class="btn btn-success btn-user btn-lg p-2 <?php if($_SESSION['auth_role'] == '2'){ echo 'd-none'; } ?>"
                            style="font-size:15px;">
                            <i class="fa fa-plus"></i> add wiki
                        </a>
                    </div>
                    <form class="d-flex justify-content-end" role="search" style="width: 100;">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" style="margin-left: auto; flex: 1; margin-right: 10px;">
                        <button class="btn btn-success" style="margin-right: 5px;" type="submit">Search Wiki</button>
                    </form>
                </div>
                <div class="left-to-right" style= "display: flex; flex-direction: row-reverse; justify-content: space-between;">
                    <div class="o-hidden border-2 shadow-lg my-5 card-body p-1" style="display: flex; flex-direction: row-reverse; justify-content: space-between; width: auto; height: 700px; margin: 5px; border: 2px solid #ccc;">
                        <!-- Content for the first card-body -->
                    </div>
                    <div class="o-hidden border-2 shadow-lg my-5 card-body p-1" style="display: flex; flex-direction: row-reverse; justify-content: space-between; width: 800px; height: 700px; margin: 5px; border: 2px solid #ccc;">
                        <!-- Content for the second card-body -->
                    </div>
                </div>
            </div>
            <!-- Start of Modal -->
            <?php include ('../includes/modal.php'); ?>
            <!-- End of Modal -->

            <!-- Footer -->
            <?php include ('../includes/footer.php'); ?>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
</body>
</html>
