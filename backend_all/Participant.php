<?php require_once('./includes/header.php'); ?>
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
            td = tr[i].getElementsByTagName("td")[3];
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
                                <div class="page-header-icon"><i data-feather="home"></i></div>
                                <span>Participant</span>
                            </h1>
                            <a href="new-participant.php" title="Add new participant" class="btn btn-white">
                                <div class="page-header-icon"><i data-feather="plus"></i></div>
                            </a>
                        </div>
                    </div>
                </div>
                <!--Start Table-->
                <div class="container-fluid mt-n10">
                    <div class="card mb-4">
                        <div class="card-header">participant</div>
                        <div class="card-body">
                            <div class="datatable table-responsive">
                                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                <a ><label>Search: <input type="text"  id="myInput" onkeyup="myFunction()" class="form-control form-control-sm" placeholder="Search for events id.."></label></a>                                    

                                    <thead>
                                        <tr>
                                            <th onclick="sortTable(0)">id</th>
                                            <th onclick="sortTable(1)">name</th>
                                            <th onclick="sortTable(2)">mail</th>
                                            <th onclick="sortTable(3)">idevent</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM participant";
                                        $stmt = $pdo->prepare($sql);
                                        $stmt->execute();
                                        while ($participant = $stmt->fetch(PDO::FETCH_ASSOC)) {

                                            $id_participant = $participant['id_participant'];
                                            $name = $participant['name'];
                                            $mail = $participant['mail'];
                                            $id = $participant['id'];

                                        ?>
                                            <tr>

                                                <td>
                                                    <?php echo $id_participant; ?>
                                                </td>
                                                <td>
                                                    <?php echo $name; ?>
                                                </td>
                                                <td>
                                                    <?php echo $mail; ?>
                                                </td>
                                                <td><?php echo $id; ?></td>

                                                <td>
                                                    <?php
                                                    if (isset($_POST['delete'])) {
                                                        $id_participant = $_POST['id_participant'];
                                                        $sql = "DELETE FROM participant WHERE id_participant = :id_participant";
                                                        $stmt = $pdo->prepare($sql);
                                                        $stmt->execute([':id_participant' => $id_participant]);
                                                        header("Location: Participant.php");
                                                    }
                                                    ?>
                                                    <form action="Participant.php" method="POST">
                                                        <input type="hidden" name="id_participant" value="<?php echo $id_participant; ?>">
                                                        <button name="delete" type="submit" class="btn btn-red btn-icon"><i data-feather="trash-2"></i></button>
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