<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=0">
    <meta name="description" content="Show student his/her exam results">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="assets/css/theme.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css?family=Nunito');
        body {
            background-color: #FFFFFF;
            font-family: 'Nunito', sans-serif;
        }

        .cong {
            font-size: 2em;
        }

        .ordinary-table {
            width: 100%;
        }

        .ordinary-table th {
            border: 1px solid #f2eaea;
            text-align: left;
            font-weight: 500;
        }

        .ordinary-table td {
            border: 1px solid #f2eaea;
            text-align: left;
        }

    </style>
</head>

<body>
<?php
session_start();


$roll =$_SESSION['user_roll_no'];

 $current_major =substr($roll,1,strpos($roll,'-'));
$pass_year =$roll[0];
$current_year =$pass_year+1;
$current_year = $current_year.$current_major;
switch ($pass_year){
    case 1:
        $pass_year="1st";
        break;
    case 2:
        $pass_year="2nd";
        break;
    case 3:
        $pass_year="3rd";
        break;
    case 4:
        $pass_year="4th";
        break;
    case 5:
        $pass_year="5th";
        break;
    case 6:
        $pass_year="6th";
        break;
}

$user_current_roll =$_SESSION['user_current_roll_no'];
$user_name =$_SESSION['user_name'];
$user_distinction =$_SESSION['user_distinction'];
$user_remark =$_SESSION['user_remark'];
if($user_distinction=="*")
{
    $user_distinction="Credit";
}
?>



    <div class="container-fluid">
        <div class="container">
            <div class="row align-items-center mt-5">

                <div class="col-12 col-lg-6 col-md-6 col-xl-6 order-md-2 mb-md-0">
                    <!-- Image -->
                    <div class="text-center">
                        <img src="assets/pass/407080-PD36G3-820.jpg" alt="..." class="img-fluid">
                    </div>
                </div>

                <div class="col-12 col-lg-6 col-md-6 col-xl-6 order-md-1 my-5">
                    <h1 class="display-5 text-center text-primary mb-3" style="font-weight: 700;">
                        Congratulations
                    </h1>

                    <p class="text-muted text-center mb-5">
                        You passed <?php echo $pass_year?> year.
                    </p>

                    <span class="text-muted">Your Result: </span>
                    <div class="row">
                        <table class="table table-hover rounded ordinary-table">
                            <tr id="name">
                                <th>Name</th>
                                <td><?php echo $user_name?></td>
                            </tr>
                            <tr id="roll-no">
                                <th>Roll-No</th>
                                <td><?php echo $current_year.$user_current_roll?></td>
                            </tr>
                            <tr id="destination">
                                <th rowspan="3">Destination</th>
                                <td></td>
                            </tr>
                            <?php
                                for ($i = 0; $i <2; $i++) {?>
                            <tr><td>
                                    ABC
                                   <!-- --><?php /*echo $user_distinction*/?>
                                </td></tr>
                            <?php } ?>
                            <tr id="remark">
                                <th>Remark</th>
                                <td><?php echo $user_remark?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- JAVASCRIPT
    ================================================== -->
    <!-- Libs JS -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Theme JS -->
    <script src="assets/js/theme.min.js"></script>
</body>

</html>
