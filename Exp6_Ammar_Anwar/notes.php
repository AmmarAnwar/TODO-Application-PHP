<?php
    $insert = false;
    $conn = mysqli_connect("127.0.0.1", "root", "", "database");
    if (!$conn)
        die("Sorry, we are unable to connect to the server : <br>" . mysqli_connect_error());

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (isset($_POST['srnoEdit']))
        {
            $srno = $_POST['srnoEdit'];
            $title = $_POST['editTitle'];
            $description = $_POST['editDescription'];
            $sql = "UPDATE `notes` SET `title` = '$title', `description` = '$description' WHERE `notes` . `srno` = $srno";
            $result = mysqli_query($conn, $sql);
        }
        else 
        {
            $title = $_POST['addTitle'];
            $description = $_POST['addDescription'];
            $sql = "INSERT INTO `notes` (`title`, `description`) VALUES ('$title', '$description')";
            $result = mysqli_query($conn, $sql);
    
            if ($result)
                $insert = true;
        }
    }

    if (isset($_GET['delete'])) {
        $srno = $_GET['delete'];
        $sql = "DELETE FROM `notes` WHERE `srno` = '$srno'";
        $result = mysqli_query($conn, $sql);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CURD : Make your notes</title>
    <link rel="stylesheet" href="css/notes_style.css">
    <link rel="stylesheet" href="css/notes_modal.css">
    <link rel="stylesheet" href="css/notes_alert.css">
    <link rel="stylesheet" href="css/notes_dataTables.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/53fc36434a.js"></script>
</head>

<body>
    <div class="alert hide">
        <span class="fas fa-exclamation-circle"> </span>
        <span class="msg">&nbsp;&nbsp;Form Submitted Sucessfully</span>
        <span class="fas fa-times" id="alertcloseBtn"></span>
    </div>

    <!-- *Layout of the modal -->
    <div class="modal">
        <div class="modal-header">
            <div class="title">Edit this Note</div>
            <button class="close-button">&times;</button>
        </div>
        <div class="modal-body">
            <form action="notes.php" method="post">
                <input type="hidden" name="srnoEdit" id="srnoEdit">
                <div class="title">
                    <label for="addTitle">Note Title</label>
                    <input type="text" name="editTitle" id="editTitle" placeholder="Add Title">
                </div>
                <div class="description">
                    <label for="addDesciption">Note Description</label>
                    <textarea name="editDescription" id="editDescription" rows="5"></textarea>
                </div>
                <button type="submit" class="submit">Update Note</button>
            </form>
        </div>
    </div>

    <!-- *The overlay under the modal when it pops up -->
    <div id="overlay"></div>

    <header class="header">
        <h2>CURD : Make your notes</h2>
    </header>

    <div class="addNotes">
        <h1>Add a Note</h1>
        <form action="notes.php" method="post">
            <div class="title">
                <label for="addTitle">Note Title</label>
                <input type="text" name="addTitle" id="addTitle" placeholder="Add Title">
            </div>
            <div class="description">
                <label for="addDesciption">Note Description</label>
                <textarea name="addDescription" id="addDescription" rows="5"></textarea>
            </div>
            <button type="submit" class="submit" id="submitBackend">Submit</button>
        </form>
    </div>

    <div class="container">
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM `notes`";
                    $result = mysqli_query($conn, $sql);

                    $serial = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $serial = $serial + 1;
                        echo "<tr>
                                <td>" . $serial . "</td>
                                <td>" . $row['title'] . "</td>
                                <td>" . $row['description'] . "</td>
                                <td>
                                    <button class='open-modal-btn action' id=".$row['srno'].">
                                        Edit
                                    </button>
                                    <br>
                                    <button class='action delete' id=d".$row['srno'].">Delete</button>
                                </td>
                              </tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>

    <!-- JavaScript -->
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
    </script>
    <script src="js/notes.js"></script>
</body>

</html>