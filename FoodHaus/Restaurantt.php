<?php $current_page = "restaurant";
$curr_page = basename(__FILE__); ?>
<?php require_once("./includes/navbar.php"); ?>
<title>Restaurant </title>

<!-- Title Page -->
<link rel="stylesheet" href="css/jihed.css">
<link rel="stylesheet" href="css/menu.css">
<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(images/bg-title-page-01.jpg);">
    <h2 class="tit6 t-center">
        FOODHAUS Restaurant
    </h2>
</section>
<!-- Content page -->


<!-- restaurant -->

<!-- appel php -->
<?php
$sql1 = "SELECT * FROM restaurant ";
$stmt1 = $pdo->prepare($sql1);
$stmt1->execute([]);
while ($restaurant = $stmt1->fetch(PDO::FETCH_ASSOC)) {
    $id = $restaurant['id'];
    $nom = $restaurant['nom'];
    $contact = $restaurant['contact'];
    $email = $restaurant['email'];
    $adresse = $restaurant['adresse'];
    $type = $restaurant['type'];
    $description = $restaurant['description'];
    $image = $restaurant['image'];
?>

    <!--affichage-->
    <section class="tab">
        <table>
            <tr>


                <td><img src="assets/img/<?PHP echo $restaurant['image']; ?>" width="200" height="200"></td>
                <td>
                    <form action="menu.php" method="POST">
                        <input type="hidden" name="id-r" value="<?php echo $id; ?>">
                        <button name="idmenu" type="submit" class="square_btn"><span class="tit2 t-center">
                                Menu
                            </span></button>
                    </form>


                <td>
                    <h1>Nom Restaurant:</br><?PHP echo $restaurant['nom']; ?></h1>
                </td>
                <td>
                    <h1>Type:</br><?PHP echo $restaurant['type']; ?></h1>
                </td>
                <td>
                    <h1>email:</br><?PHP echo $restaurant['email']; ?></h1>
                </td>
                <td>
                    <h1>description: </br><?PHP echo $restaurant['description']; ?></h1>
                </td>
                <td>
                    <iframe width="100%" height="200" src="https://maps.google.com/maps?q=<?php echo $restaurant['adresse'];
                                                                                            ?>&output=embed"></iframe>
                </td>
            </tr>
            </tbody>
        </table>

    </section>

    <div><?php
        }
            ?>
    </div>
    </section>


    <!-- Back to top -->
    <div class="btn-back-to-top bg0-hov" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <i class="fa fa-angle-double-up" aria-hidden="true"></i>
        </span>
    </div>

    <?php require_once("./includes/footer.php"); ?>

    </body>

    </html>