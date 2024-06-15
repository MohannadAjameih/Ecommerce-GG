<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="dropdown">
        <a href="./" class="brand-link">
            <?php if ($_SESSION['login_type'] == 1): ?>
                <h3 class="text-center p-0 m-0"><b>ADMIN</b></h3>
            <?php elseif ($_SESSION['login_type'] == 2): ?>
                <h3 class="text-center p-0 m-0"><b>EMPLOYEE</b></h3>
            <?php endif; ?>
        </a>
    </div>
    <div class="sidebar pb-4 mb-4">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- <li class="nav-item dropdown">
                    <a href="./index.php" class="nav-link nav-home">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            General Statistics
                        </p>
                    </a>
                </li> -->
                <li class="nav-item">
                    <a href="./index.php?page=Home Page" class="nav-link nav-Home-page">
                        <i class="fas bi-house-fill nav-icon"></i>
                        <p>Settings</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link nav-edit_project nav-Home-page">
                        <i class="nav-icon fas fa-layer-group"></i>
                        <p>
                            Products
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php if ($_SESSION['login_type'] != 3): ?>
                            <li class="nav-item">
                                <a href="./index.php?page=new_product" class="nav-link nav-new_product tree-item">
                                    <i class="fas fa-angle-right nav-icon"></i>
                                    <p>Add New</p>
                                </a>
                            </li>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a href="./index.php?page=product_list" class="nav-link nav-product_list tree-item">
                                <i class="fas fa-angle-right nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="./index.php?page=Customer-Messages" class="nav-link nav-Customer-Messages">
                        <i class="fas bi-chat-fill  nav-icon"></i>
                        <p>Customer Messages </p>
                        <span class="count ml-3 badge badge-light">
                            <?php echo $conn->query("SELECT  *From messages where REMARKS = 0")->num_rows; ?>
                        </span>
                    </a>
                </li>
               <!-- <li class="nav-item">
                    <a href="./index.php?page=Page Applicants" class="nav-link nav-Page Applicants">
                        <i class="fas bi-person-rolodex nav-icon"></i>
                        <p>Page Applicants</p>
                        <span class="ml-3 badge badge-light">4</span>
                    </a>
                </li>-->
                <li class="nav-item">
                    <a href="#" class="nav-link nav-edit_project nav-view_project">
                        <i class="nav-icon fas fa-layer-group"></i>
                        <p>
                            Categories
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php if ($_SESSION['login_type'] != 3): ?>
                            <li class="nav-item">
                                <a href="./index.php?page=new_category" class="nav-link nav-new_project tree-item">
                                    <i class="fas fa-angle-right nav-icon"></i>
                                    <p>Add New</p>
                                </a>
                            </li>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a href="./index.php?page=category_list" class="nav-link nav-project_list tree-item">
                                <i class="fas fa-angle-right nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                    </ul>
                </li>
               <!-- <li class="nav-item">
                    <a href="./index.php?page=task_list" class="nav-link nav-task_list">
                        <i class="fas fa-tasks nav-icon"></i>
                        <p>Task</p>
                    </a>
                </li>-->
                <?php if ($_SESSION['login_type'] != 3): ?>
                    <!-- <li class="nav-item">
                        <a href="./index.php?page=reports" class="nav-link nav-reports">
                            <i class="fas fa-th-list nav-icon"></i>
                            <p>Report</p>
                        </a>
                    </li> -->
                <?php endif; ?>
                <?php if ($_SESSION['login_type'] == 1): ?>
                    <li class="nav-item">
                        <a href="#" class="nav-link nav-edit_user">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Staff
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="./index.php?page=new_user" class="nav-link nav-new_user tree-item">
                                    <i class="fas fa-angle-right nav-icon"></i>
                                    <p>Add New</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./index.php?page=user_list" class="nav-link nav-user_list tree-item">
                                    <i class="fas fa-angle-right nav-icon"></i>
                                    <p>List</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>
                <li class="nav-item  dropdown">
                    <hr class="horizontal light mt-0 mb-2">
                    <div class="profile-details">
                        <div class="profile-content">
                            <img class="profile_image" src="./assets/uploads/<?php echo ($_SESSION['login_avatar']) ?>"
                                alt="<?php echo ucwords($_SESSION['login_avatar']) ?>">
                        </div>
                        <div class="name-job">
                            <div class="profile_name">
                                <?php echo ucwords($_SESSION['login_firstname']) ?>
                            </div>
                            <div class="job">
                                <?php if ($_SESSION['login_type'] == 1): ?>
                                    ADMIN
                                <?php elseif ($_SESSION['login_type'] == 2): ?>
                                    EMPLOYEE
                                <?php endif; ?>
                            </div>
                        </div>
                        <i class='bx bx-log-out'></i>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</aside>

<?php include('footer.php') ?>
<script>
    $(document).ready(function () {
        var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>';
        var s = '<?php echo isset($_GET['s']) ? $_GET['s'] : '' ?>';
        if (s != '')
            page = page + '_' + s;
        if ($('.nav-link.nav-' + page).length > 0) {
            $('.nav-link.nav-' + page).addClass('active')
            if ($('.nav-link.nav-' + page).hasClass('tree-item') == true) {
                $('.nav-link.nav-' + page).closest('.nav-treeview').siblings('a').addClass('active')
                $('.nav-link.nav-' + page).closest('.nav-treeview').parent().addClass('menu-open')
            }
            if ($('.nav-link.nav-' + page).hasClass('nav-is-tree') == true) {
                $('.nav-link.nav-' + page).parent().addClass('menu-open')
            }
        }
    })
</script>