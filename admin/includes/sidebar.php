<?php
// Get the current page URL
$currentUrl = $_SERVER['PHP_SELF'];

// Function to check if the given URL matches the current page URL
function isActive($url)
{
    global $currentUrl;
    return strpos($currentUrl, $url) !== false;
}
?>

<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <div class="image-container" style="background-color:white;  width: 100%; height: 70px; ">
           <center>
           <img src="../../assets/img/invoice-logo.png" alt="invoice" width="120" height="60" >
           </center>
    </div>

    <!-- Nav Item - Add Issue -->
    <li class="nav-item <?php if (isActive('addissue/index.php')) { echo 'active'; } ?>">
        <a class="nav-link" href="../addissue/index.php">
            <i class="fas fa-fw fa-exclamation-circle"></i>
            <span>Add Issue</span>
        </a>
    </li>

    <!-- Nav Item - Issues -->
    <li class="nav-item <?php if (isActive('issues/index.php')) { echo 'active'; } ?>">
        <a class="nav-link" href="../issues/index.php">
            <i class="fas fa-fw fa-bug"></i>
            <span>Issues</span>
        </a>
    </li>

    <!-- Nav Item - Board -->
    <li class="nav-item <?php if (isActive('home/tables.php')) { echo 'active'; } ?>">
        <a class="nav-link" href="../home/tables.php">
            <i class="fas fa-fw fa-columns"></i>
            <span>Board</span>
        </a>
    </li>

    <!-- Nav Item - Wiki -->
    <li class="nav-item <?php if (isActive('tables.php')) { echo 'active'; } ?>">
        <a class="nav-link" href="../wiki/index.php">
            <i class="fas fa-fw fa-book"></i>
            <span>Wiki</span>
        </a>
    </li>    

    <!-- Nav Item - Project Settings -->
    <li class="nav-item <?php if (isActive('tables.php')) { echo 'active'; } ?>">
        <a class="nav-link" href="../home/tables.php">
            <i class="fas fa-fw fa-cog"></i>
            <span>Project Settings</span>
        </a>
    </li>
</ul>