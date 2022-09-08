<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
    
    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>

    <head>
        <link rel="stylesheet" href="../fontawesome/css/all.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="js/wiki.js"></script>
<link rel="stylesheet" href="../fontawesome/css/all.css">


<style type="text/css">
    
     /* Rate Css Starts Here */

    .star-widget input{
            display: none;

        }

        .star-widget label{
            font-size: 40px;
            color: #444;
            padding: 10px;
            float: right;
        }

        input:not(:checked) ~ label:hover,
        input:not(:checked) ~ label:hover ~ label{
            color:#fd4;
        }

        input#popup1rate-5:checked ~ label{
            color: #fe7;
            text-shadow: 0 0 20px #952;
        }

        input#popup1rate-4:checked ~ label{
            color: #fe7;
            text-shadow: 0 0 20px #952;
        }

        input#popup1rate-3:checked ~ label{
            color: #fe7;
            text-shadow: 0 0 20px #952;
        }

        input#popup1rate-2:checked ~ label{
            color: #fe7;
            text-shadow: 0 0 20px #952;
        }

        input#popup1rate-1:checked ~ label{
            color: #fe7;
            text-shadow: 0 0 20px #952;
        }

        input#popup2rate-5:checked ~ label{
            color: #fe7;
            text-shadow: 0 0 20px #952;
        }

        input#popup2rate-4:checked ~ label{
            color: #fe7;
            text-shadow: 0 0 20px #952;
        }

        input#popup2rate-3:checked ~ label{
            color: #fe7;
            text-shadow: 0 0 20px #952;
        }

        input#popup2rate-2:checked ~ label{
            color: #fe7;
            text-shadow: 0 0 20px #952;
        }

        input#popup2rate-1:checked ~ label{
            color: #fe7;
            text-shadow: 0 0 20px #952;
        }


        input#popup3rate-5:checked ~ label{
            color: #fe7;
            text-shadow: 0 0 20px #952;
        }

        input#popup3rate-4:checked ~ label{
            color: #fe7;
            text-shadow: 0 0 20px #952;
        }

        input#popup3rate-3:checked ~ label{
            color: #fe7;
            text-shadow: 0 0 20px #952;
        }

        input#popup3rate-2:checked ~ label{
            color: #fe7;
            text-shadow: 0 0 20px #952;
        }

        input#popup3rate-1:checked ~ label{
            color: #fe7;
            text-shadow: 0 0 20px #952;
        }


        input#popup4rate-5:checked ~ label{
            color: #fe7;
            text-shadow: 0 0 20px #952;
        }

        input#popup4rate-4:checked ~ label{
            color: #fe7;
            text-shadow: 0 0 20px #952;
        }

        input#popup4rate-3:checked ~ label{
            color: #fe7;
            text-shadow: 0 0 20px #952;
        }

        input#popup4rate-2:checked ~ label{
            color: #fe7;
            text-shadow: 0 0 20px #952;
        }

        input#popup4rate-1:checked ~ label{
            color: #fe7;
            text-shadow: 0 0 20px #952;
        }

        input#popup5rate-5:checked ~ label{
            color: #fe7;
            text-shadow: 0 0 20px #952;
        }

        input#popup5rate-4:checked ~ label{
            color: #fe7;
            text-shadow: 0 0 20px #952;
        }

        input#popup5rate-3:checked ~ label{
            color: #fe7;
            text-shadow: 0 0 20px #952;
        }

        input#popup5rate-2:checked ~ label{
            color: #fe7;
            text-shadow: 0 0 20px #952;
        }

        input#popup5rate-1:checked ~ label{
            color: #fe7;
            text-shadow: 0 0 20px #952;
        }
        .btn{
            padding: 10px 60px;
            background: #fff;
            border:0;
            outline: none;
            cursor: pointer;
            font-size: 22px;
            font-weight: 500;
            border-radius: 30px;
        }

        #reviewInput{
            width:90%;
            border: 1.5px solid black;
            border-radius: 5px;
            padding: 10px;

        }
        .popup{
            width:400px;
            background: #fff;
            border-radius:6px;
            position:absolute;
            top: 0%;
            left:50%;
            transform: translate(-50%,-50%) scale(0.1);
            text-align:center;
            padding:0 30px 30px;
            color:#333;
            visibility: hidden;
            transition: transform 0.4s, top 0.4s;
        }

        .open-popup{
            visibility: visible;
            top: 50%;
            transform: translate(-50%,-50%) scale(1);
            
        }

        .popup img{
            width:100px;
            margin-top: -50px;
            border-radius: 50%;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }

        .popup h2{
            font-size:38px;
            font-weight:500px;
            margin: 30px 0 10px;
        }

        .popup button{
            width:100%;
            margin-top:50px;
            padding:10px 0;
            background: #6fd649;
            color: #fff;
            border: 0;
            outline: none;
            font-size: 18px;
            border-radius: 4px;
            cursor: pointer;
            box-shadow: 0 5px 5px rgba(0,0,0,0.2);
        }

        /* Rate Css Ends Here */
</style>
    </head>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <?php 

                    if (isset($_GET['category'])) {
                        $cat_type = $_GET['category'];
                    }

                    $query = "SELECT *  FROM  posts WHERE post_category_id=$cat_type ORDER BY rating DESC";
                    $select_all_bus = mysqli_query($connection,$query);

                    // $count = mysqli_num_rows($search_all_bus);
                    // if($count == 0) {
                    //     echo "<h1>NO RESULT</h1>";
                    // }
                    // else {
                        
                    // }
                     $idNum=1;
                    while($row = mysqli_fetch_assoc($select_all_bus)) {
                        $post_title = $row['post_title'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = $row['post_content'];
                        $post_id = $row['post_id'];
                        $rate = $row['rating'];

                         $id = "popup".$idNum;
                        $idNum++;
                        ?>


                        <!-- First Blog Post -->
                        <h2>
                            <a href="bus_info.php?bus_id=<?php echo $post_id; ?>"><?php echo $post_title." "." ".$rate."/5"; ?></a>
                             <button type="button" id="but" class="btn" style="float:right" onclick="openPopup('<?php echo $id; ?>')">Rate Now</button>
                        </h2>

                        <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                        <hr>
                        <a href="bus_info.php?bus_id=<?php echo $post_id; ?>"><img class="img-responsive" src="images/<?php echo $post_image; ?>" alt=""></a>
                        <!-- <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt=""> -->
                        <hr>
                        <p><?php echo $post_content ?></p>
                       

                        <hr>
                        <div class="popup" id="<?php echo $id;?>">
        <form action="rateprocess.php" method="post">
        
            <div class="star-widget">
                <input type="radio" name="rate" id="<?php echo $id.'rate-5';?>" value="5">
                <label for="<?php echo $id.'rate-5';?>"  class="fas fa-star"></label>
                <input type="radio" name="rate" id="<?php echo $id.'rate-4';?>" value="4">
                <label for="<?php echo $id.'rate-4';?>"  class="fas fa-star"></label>
                <input type="radio" name="rate" id="<?php echo $id.'rate-3';?>" value="3">
                <label for="<?php echo $id.'rate-3';?>"  class="fas fa-star"></label>
                <input type="radio" name="rate" id="<?php echo $id.'rate-2';?>" value="2">
                <label for="<?php echo $id.'rate-2';?>"  class="fas fa-star"></label>
                <input type="radio" name="rate" id="<?php echo $id.'rate-1';?>" value="1">
                <label for="<?php echo $id.'rate-1';?>"  class="fas fa-star"></label>
            </div>
        
        <h2>Rate <?php echo $post_title ?></h2>
        <p>Your Review</p> <br>
        <input type="hidden" value="<?php echo $post_id ?>" name="pid">
        <input type="textarea" placeholder="Describe your experience" id="reviewInput" name="review">
        <button type="submit" >OK</button>
    </form>
    </div>
                    <?php } ?>      

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>
         <script>

        let popup = document.getElementById("popup");

        function checkForm(){
            console.log(document.getElementById('searchTerm').value);
            return false;
            }

        function openPopup(id){
            popup = document.getElementById(id);
            popup.classList.add("open-popup");
            document.getElementById("but").innerHTML;
        }
        function closePopup(){
            popup.classList.remove("open-popup");
        }

</script>

<?php include "includes/footer.php"; ?>