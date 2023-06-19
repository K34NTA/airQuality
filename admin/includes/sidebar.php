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

<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color:#00703C;">

    <div class="image-container" style="background-color:white;  width: 100%; height: 70px; ">
           <center>
           <img src="../../assets/img/lsu.png" alt="invoice" width="auto" height="70" >
           </center>
    </div>

    <!-- Nav Item - Data Visualization -->
    <li class="nav-item <?php if (isActive('visualization/index.php')) { echo 'active'; } ?>">
        <a class="nav-link" href="../visualization/index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Nav Item - Activity Log -->
    <li class="nav-item <?php if (isActive('activitylog/index.php')) { echo 'active'; } ?>">
        <a class="nav-link" href="../activitylog/index.php">
            <i class="fas fa-fw fa-history"></i>
            <span>Activity Log</span>
        </a>
    </li>

    <!-- Nav Item - Air Quality Index -->
    <li class="nav-item <?php if (isActive('aqi/index.php')) { echo 'active'; } ?>">
        <a class="nav-link" href="../aqi/index.php">
            <i class="fas fa-fw fa-columns"></i>
            <span>Air Quality Index</span>
        </a>
    </li>

    <!-- Nav Item - About -->
    <li class="nav-item <?php if (isActive('about/index.php')) { echo 'active'; } ?>">
        <a class="nav-link" href="../about/index.php">
            <i class="fas fa-fw fa-check"></i>
            <span>About</span>
        </a>
    </li>
</ul>