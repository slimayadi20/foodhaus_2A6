<?php require_once('./includes/header.php'); ?>
<script type="text/javascript">
    function hide_show_table(col_name) {
        var checkbox_val = document.getElementById(col_name).value;
        if (checkbox_val == "hide") {
            var all_col = document.getElementsByClassName(col_name);
            for (var i = 0; i < all_col.length; i++) {
                all_col[i].style.display = "none";
            }
            document.getElementById(col_name + "_head").style.display = "none";
            document.getElementById(col_name).value = "show";
        } else {
            var all_col = document.getElementsByClassName(col_name);
            for (var i = 0; i < all_col.length; i++) {
                all_col[i].style.display = "table-cell";
            }
            document.getElementById(col_name + "_head").style.display = "table-cell";
            document.getElementById(col_name).value = "hide";
        }
    }
</script>
<script>
    function myFunction() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("dataTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
<script>
    // JavaScript program to illustrate
    // Table sort for both columns and both directions.
    function sortTable(n) {
        var table;
        table = document.getElementById("dataTable");
        var rows, i, x, y, count = 0;
        var switching = true;

        // Order is set as ascending
        var direction = "ascending";

        // Run loop until no switching is needed
        while (switching) {
            switching = false;
            var rows = table.rows;

            //Loop to go through all rows
            for (i = 1; i < (rows.length - 1); i++) {
                var Switch = false;

                // Fetch 2 elements that need to be compared
                x = rows[i].getElementsByTagName("TD")[n];
                y = rows[i + 1].getElementsByTagName("TD")[n];

                // Check the direction of order
                if (direction == "ascending") {

                    // Check if 2 rows need to be switched
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        // If yes, mark Switch as needed and break loop
                        Switch = true;
                        break;
                    }
                } else if (direction == "descending") {

                    // Check direction
                    if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                        // If yes, mark Switch as needed and break loop
                        Switch = true;
                        break;
                    }
                }
            }
            if (Switch) {
                // Function to switch rows and mark switch as completed
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;

                // Increase count for each switch
                count++;
            } else {
                // Run while loop again for descending order
                if (count == 0 && direction == "ascending") {
                    direction = "descending";
                    switching = true;
                }
            }
        }
    }



    function CopyToClipboard(containerid) {
        if (document.selection) {
            var range = document.body.createTextRange();
            range.moveToElementText(document.getElementById(containerid));
            range.select().createTextRange();
            document.execCommand("copy");

        } else if (window.getSelection) {
            var range = document.createRange();
            range.selectNode(document.getElementById(containerid));
            window.getSelection().addRange(range);
            document.execCommand("copy");
            alert("text copied")
        }
    }
</script>
<script>
    function exportTableToExcel(tableID, filename = '') {
        var downloadLink;
        var dataType = 'application/vnd.ms-excel';
        var tableSelect = document.getElementById(tableID);
        var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

        // Specify file name
        filename = filename ? filename + '.xls' : 'excel_data.xls';

        // Create download link element
        downloadLink = document.createElement("a");

        document.body.appendChild(downloadLink);

        if (navigator.msSaveOrOpenBlob) {
            var blob = new Blob(['\ufeff', tableHTML], {
                type: dataType
            });
            navigator.msSaveOrOpenBlob(blob, filename);
        } else {
            // Create a link to the file
            downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

            // Setting the file name
            downloadLink.download = filename;

            //triggering the function
            downloadLink.click();
        }
    }
</script>

<body class="nav-fixed">
    <?php require_once('./includes/top-navbar.php'); ?>

    <!--Side Nav-->
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php
            $curr_page = basename(__FILE__);
            require_once("./includes/left-sidebar.php");
            ?>
        </div>

        <div id="layoutSidenav_content">
            <main>
                <div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
                    <div class="container-fluid">
                        <div class="page-header-content d-flex align-items-center justify-content-between text-white">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="users"></i></div>
                                <span>All Users</span>
                            </h1>
                            <a href="new-user.php" title="Add new user" class="btn btn-white">
                                <div class="page-header-icon"><i data-feather="plus"></i></div>
                            </a>
                        </div>

                        <!--Seerch bar-->
                        <form class="page-header-signup mb-2 mb-md-0" action="search.php" method="POST">
                            <div class="form-row justify-content-center">
                                <div class="col-lg-6 col-md-8">
                                    <div class="form-group mr-0 mr-lg-2">
                                    
                                        <input name="search-keyword" id="myInput" onkeyup="myFunction()" class="form-control form-control-solid rounded-pill" type="text" placeholder="Search User..." />
                                    </div>
                                </div>

                            </div>
                        </form>


                        <br><br>

                    </div>
                </div>
                <!--Start Table-->
                <div class="container-fluid mt-n10">
                    <div class="card mb-4">
                        <div class="card-header">All Users</div>
                        <div class="card-body">
                            <div class="datatable table-responsive">

                                <div class="dropdown">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                    <button class="btn btn-teal dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Download options
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="./pdf_genrator/generate_pdf users.php">PDF</a>
                                        <a class="dropdown-item" onclick="exportTableToExcel('dataTable')" href="#">Excel</a>

                                    </div>
                                </div>
                                <br>


                                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th onclick="sortTable(0)"><i data-feather="filter"></i>ID</th>
                                            <th onclick="sortTable(1)"><i data-feather="filter"></i>User Name</th>
                                            <th onclick="sortTable(2)"><i data-feather="filter"></i>User Email</th>
                                            <th onclick="sortTable(3)"><i data-feather="filter"></i>Photo</th>
                                            <th onclick="sortTable(4)"><i data-feather="filter"></i>Registered on</th>
                                            <th onclick="sortTable(5)"><i data-feather="filter"></i>Role</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                            <th onclick="sortTable(8)"><i data-feather="filter"></i>status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM users";
                                        $stmt = $pdo->prepare($sql);
                                        $stmt->execute();
                                        while ($users = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                            $user_id = $users['user_id'];
                                            $user_name = $users['user_name'];
                                            $user_email = $users['user_email'];
                                            $user_photo = $users['user_photo'];
                                            $registered_on = $users['registered_on'];
                                            $user_role = $users['user_role'];
                                            $user_status = $users['user_status'];
                                        ?>
                                            <tr>
                                                <td><?php echo $user_id; ?></td>
                                                <td>
                                                    <?php echo $user_name; ?>
                                                </td>
                                                <td>
                                                    <?php echo $user_email; ?>
                                                </td>
                                                <td>
                                                    <img src="./assets/img/<?php echo $user_photo; ?>" width="50" height="50" />
                                                </td>
                                                <td><?php echo $registered_on; ?></td>
                                                <td>
                                                    <div class="badge badge-<?php echo $user_role == "admin" ? "primary" : "warning"; ?>">
                                                        <?php echo $user_role; ?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <?php
                                                    if (isset($_COOKIE['_uid_'])) {
                                                        $u_id = base64_decode($_COOKIE['_uid_']);
                                                    } else if (isset($_SESSION['user_id'])) {
                                                        $u_id = $_SESSION['user_id'];
                                                    } else {
                                                        $u_id = -1;
                                                    }
                                                    ?>
                                                    <?php
                                                    if ($user_id == $u_id) { ?>
                                                        <button title="You can't edit yourself!" class="btn btn-info btn-icon"><i data-feather="edit"></i></button>
                                                    <?php } else { ?>
                                                        <form action="user-update.php" method="POST">
                                                            <input type="hidden" name="user-id" value="<?php echo $user_id; ?>">
                                                            <button name="edit-user" class="btn btn-info btn-icon"><i data-feather="edit"></i></button>
                                                        </form>
                                                    <?php }
                                                    ?>

                                                </td>
                                                <td>

                                                    <?php
                                                    if (isset($_POST['user'])) {
                                                        $u_id = $_POST['user-id'];
                                                        $sql = "DELETE FROM users WHERE user_id = :id";
                                                        $stmt = $pdo->prepare($sql);
                                                        $stmt->execute([':id' => $u_id]);
                                                        header("Location: users.php");
                                                    }
                                                    ?>
                                                    <?php
                                                    if (isset($_COOKIE['_uid_'])) {
                                                        $u_id = base64_decode($_COOKIE['_uid_']);
                                                    } else if (isset($_SESSION['user_id'])) {
                                                        $u_id = $_SESSION['user_id'];
                                                    } else {
                                                        $u_id = -1;
                                                    }
                                                    ?>

                                                    <?php
                                                    if ($user_id == $u_id) { ?>
                                                        <button title="You can't delete yourself!" class="btn btn-red btn-icon"><i data-feather="trash-2"></i></button>
                                                    <?php } else { ?>
                                                        <form action="users.php" method="POST">
                                                            <input type="hidden" name="user-id" value="<?php echo $user_id; ?>">
                                                            <button name="user" type="submit" class="btn btn-danger btn-icon"><i data-feather="trash-2"></i></button>
                                                        </form>
                                                    <?php }
                                                    ?>

                                                </td>
                                                <td>


                                                    <?php
                                                    if (isset($_POST['access'])) {

                                                        $u_id = $_POST['user-id'];
                                                        $status = !$_POST['user-status'];
                                                        $sql = "UPDATE users SET user_status = :status WHERE user_id = :id";
                                                        $stmt = $pdo->prepare($sql);
                                                        $stmt->execute([':id' => $u_id, ':status' => $status]);
                                                        header("Location: users.php");
                                                    }
                                                    ?>
                                                    <form action="users.php" method="POST">
                                                        <input type="hidden" name="user-id" value="<?php echo $user_id; ?>">
                                                        <input type="hidden" name="user-status" value="<?php echo $user_status; ?>">

                                                        <button type="submit" name="access" class="btn btn-<?php echo ($user_status == "0" ?  "success" : "red"); ?>">
                                                            <?php echo ($user_status == "0" ?  "active" : "banned"); ?>
                                                        </button>
                                                    </form>

                                                </td>
                                            </tr>
                                        <?php }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Table-->
            </main>

            <?php require_once('./includes/footer.php'); ?>