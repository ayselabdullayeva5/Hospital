<?php
require_once '../ORM.php';

$db = new MyOrm('mysql:host=localhost;dbname=hospital','root', 'root', true);

if(isset($_POST['search']))
{
    $filterValues = $_POST['search'];
    $query = $db->filterBed($filterValues);
}

?>
<html lang="en">
<head>
    <title>Beds | Patient Palooza</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css?v=2" />
    <link rel="icon" href="../css/1.ico" type="image/x-icon">
</head>
<body>

    <div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">Bed Palooza</h2>
            </div>

            <div class="menu">
                <ul>
                    <li><a href="../Index.html"><-HOME</a></li>
                    <li class="active">SEARCH BED</li>
                    <li><a href="deleteBed.html">DELETE BED</a></li>
                    <li><a href="addBed.html">ADD BED</a></li>
                    <li><a href="updateBed.html">UPDATE BED</a></li>

                </ul>
            </div>
        </div> 

        <center>
        <div class="content1">
            <div>
                <h1><span>Bed List</span></h1><br>
            </div>

            <div class="search">
                <form action="" method="POST">
                <input class="srch" type="text" name="search" placeholder="Type To text">
                <button class="btn" type="submit">Search</button>
      
                </form>
            </div>
        </div>
        
        <div>
            <table class="tablestyle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Bed Name</th>
                        <th>Rate per Day</th>
                        <th>Bed Type</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                            if(isset($_POST['search']))
                                {
                                    $filterValues = $_POST['search'];
                                    $query = $db->filterPatient($filterValues);
                                    $count = $query->rowCount();
                                    if($count > 0)
                                        {
                                            foreach($query as $items){
                                                 ?>
                                                <tr>
                                                    <td><?= $items['bedId'] ?></td>
                                                    <td><?=  $items['bedName']?></td>
                                                    <td><?=  $items['ratePerDay']?></td>
                                                    <td><?=  $items['bedType']?></td>
                                               
                            
                                                </tr>

                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                            <tr>
                                                    <td colspan="4">No Record Found</td>
                            
                                                </tr>
                                            <?php

                                        }
                                }
                        ?>
                </tbody>
            </table>
        </div>   
        </center>  
                                
    </div>

    
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>
</html>


<style>
  .main{
    width: 100%;
    background: linear-gradient(to top, rgba(0,0,0,0.5)50%,rgba(0,0,0,0.5)50%), url(1.jpg);
    background-position: center;
    background-size: cover;
    height: 100vh;
    background-image: url("../css/BGimage2.jpg");
    position: relative;
  }
  
</style>