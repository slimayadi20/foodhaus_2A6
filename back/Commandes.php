<?php require_once('./includes/header.php'); ?>
<script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("tblData");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
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
<body class="nav-fixed">
    <?php require_once('./includes/top-navbar.php'); ?>
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

    <script>
    // JavaScript program to illustrate
    // Table sort for both columns and both directions.
    function sortTable(n) {
        var table;
        table = document.getElementById("tblData");
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
                    if (Number(x.innerHTML) > Number(y.innerHTML)) {
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
                                <div class="page-header-icon"><i data-feather="shopping-cart"></i></div>
                                <span>Commandes</span>
                            </h1>
                            
                        </div>
                    </div>
                </div>
                <!--Start Table-->
                <div class="container-fluid mt-n10">
                    <div class="card mb-4">
                        <div class="card-header">Commandes</div>
                        <div class="card-body">
                            <div class="datatable table-responsive">
                                <table class="table table-bordered table-hover" id="tblData" width="100%" cellspacing="0">
                                <a class="btn btn-primary mr-2 my-1" tabindex="0" aria-controls="datatable-buttons" href="Commandes.php" onclick="CopyToClipboard('tblData')"><span>Copy</span></a>
                                <a class="btn btn-primary mr-2 my-1" tabindex="0" aria-controls="datatable-buttons" href="generate_pdfkarim.php"><span>PDF</span></a>
                                <a class="btn btn-primary mr-2 my-1" tabindex="0" aria-controls="datatable-buttons" href="Commandes.php"  onclick="exportTableToExcel('tblData')"><span>Excel</span></a> &emsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                <a ><label>Search: <input type="text"  id="myInput" onkeyup="myFunction()" class="form-control form-control-sm" placeholder="Search for names.."></label></a>                                    

                            <br>
                            </br>
                                    <thead>
                                        <tr>

                                                    <th onclick="sortTable(0)">id</th>
                                                    <th >Nom de commande</th>
                                                    <th>Email</th>
                                                    <th>Adresse</th>
                                                    <th>Code Postal</th>
                                                    <th>Pays</th>
                                                    <th>Ville</th>
                                                    <th>Nom sur Carte</th>
                                                    <th>Numéro de carte</th>
                                                    <th>Mois d'exp</th>
                                                    <th>Année d'exp</th>
                                                    <th>CVV</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM commande";
                                        $stmt = $pdo->prepare($sql);
                                        $stmt->execute();
                                        while ($event = $stmt->fetch(PDO::FETCH_ASSOC)) {

                                            $idCommande = $event['idCommande'];
                                            $nom = $event['nom'];
                                            $email = $event['email'];
                                            $adresse = $event['adresse'];
                                            $codePostal = $event['codePostal'];
                                            $pays = $event['pays'];
                                            $ville = $event['ville'];
                                            $nomCarte = $event['nomCarte'];
                                            $numCarte = $event['numCarte'];
                                            $moisExp = $event['moisExp'];
                                            $anneeExp = $event['anneeExp'];
                                            $cvv = $event['cvv'];
                                           
                                        ?>
                                            <tr>

                                                <td>
                                                    <?php echo $idCommande; ?>
                                                </td>
                                                <td>
                                                    <?php echo $nom; ?>
                                                </td>
                                                <td>
                                                    <?php echo $email; ?>
                                                </td>
                                                <td>
                                                    <?php echo $adresse; ?>
                                                </td>
                                                <td>
                                                    <?php echo $codePostal; ?>
                                                </td>
                                                <td>
                                                    <?php echo $pays; ?>
                                                </td>
                                                <td>
                                                    <?php echo $ville; ?>
                                                </td>
                                                <td>
                                                    <?php echo $nomCarte; ?>
                                                </td>
                                                <td>
                                                    <?php echo $numCarte; ?>
                                                </td>
                                                <td>
                                                    <?php echo $moisExp; ?>
                                                </td>
                                                <td>
                                                    <?php echo $anneeExp; ?>
                                                </td>
                                                <td>
                                                    <?php echo $cvv; ?>
                                                </td>
                                                <td>

                                                
                                                    <form action="updateC.php" method="POST">
                                                        <input type="hidden" name="idCommande" value="<?php echo $idCommande; ?>">
                                                        <button name="edit-user" type="submit" class="btn btn-primary btn-icon"><i data-feather="edit"></i></button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <?php
                                                    if (isset($_POST['delete'])) {
                                                        $id = $_POST['com-id'];
                                                        $sql = "DELETE FROM commande WHERE idCommande = :idCommande";
                                                        $stmt = $pdo->prepare($sql);
                                                        $stmt->execute([':idCommande' => $idCommande]);
                                                        header("Location: Commandes.php");
                                                    }
                                                    ?>
                                                    <form action="Commandes.php" method="POST">
                                                        <input type="hidden" name="com-id" value="<?php echo $idCommande; ?>">
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