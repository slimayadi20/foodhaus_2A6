<script> 
function ValidateEmail(inputText)
{
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if(inputText.value.match(mailformat))
{
document.form1.text1.focus();
return true;
}
else
{
alert("You have entered an invalid email address!");
document.form1.text1.focus();
return false;
}
}
function numb(inputtxt)
 {
 var numbers = /^[-+]?[0-9]+$/;
 if(inputtxt.value.match(numbers))
 {
 return true;
 }
 else
 {
 alert('Prière de saisir uniquement des nombres');
 return false;
 }
 }

function lett(inputtxt)
 {
 var letters = /^[A-Za-z]+$/;
 if(inputtxt.value.match(letters))
 {
 return true;
 }
 else
 {
 alert('Prière de saisir uniquement des lettres');
 return false;
 }
 }


  </script>
<?php require_once('./includes/header.php'); ?>

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
                            <div class="page-header-content">
                                <h1 class="page-header-title">
                                    <div class="page-header-icon"><i data-feather="edit-3"></i></div>
                                    <span>Create New participant</span>
                                </h1>
                            </div>
                        </div>
                    </div>

                    <?php
                        if(isset($_POST['create'])) {
                            $id_participant = $_POST['id_participant'];
                            $name = $_POST['name'];
                            $mail = $_POST['mail'];
                            $id = $_POST['id'];

                            $sql = "INSERT INTO participant (id_participant,name,mail,id) values (:id_participant,:name,:mail,:id) ";
                            $stmt = $pdo->prepare($sql);
                           $stmt->execute([
                                    ':id_participant' => $id_participant,
                                    ':name' => $name,
                                    ':mail' => $mail,
                                    ':id' => $id,
                                
                                ]);
                                header("Location: Participant.php");
                            }
                            
                        
                    ?>

                    <!--Start Table-->
                    <div class="container-fluid mt-n10">
                        <div class="card mb-4">
                            <div class="card-header">Create New participant</div>
                            <div class="card-body">
                                <form action="new-participant.php" method="POST" enctype="multipart/form-data">
                                  
                                    <div class="form-group">
                                        <label for="participant-name">participant id:</label>
                                        <input name="id_participant" class="form-control" id="id_participant" type="text" placeholder="participant id..." />
                                    </div>
                                    <div class="form-group">
                                        <label for="nickname"> Name:</label>
                                        <input name="name" class="form-control" id="name" type="text"  onblur="lett(this)" placeholder=" Name..." />
                                    </div>
                                    <div class="form-group">
                                        <label for="participant-email">participant Email:</label>
                                        <input name="mail" class="form-control" id="mail" type="email" onblur="ValidateEmail(this)" placeholder="participant Email..." />
                                    </div>
                                  
                                    <label>  event id: </label>
<?php
$mysqli = NEW MySQLi('localhost','root','','evenement');
$resultSet = $mysqli->query("SELECT id FROM evenement");
?>
<select name="id" >
    <?php
    while($rows = $resultSet->fetch_assoc())
    {
        $id = $rows['id'];
        echo "<option value='$id'>$id</option>";
    }
    ?>
</select> </br>
                                    </div>
                                    <button name="create" class="btn btn-primary mr-2 my-1" type="submit">Create now!</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--End Table-->
                </main>

<?php require_once('./includes/footer.php'); ?>