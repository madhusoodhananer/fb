<?php
    include 'API/config.php';
    if (!isset($_GET['desk_id']) || $_GET['desk_id']=='') {
        header("Location:".$base_url);
    }
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        span {
            font-size: 90pt;
            /* background-color: lightgreen; */
        }

        p {
            margin: auto;
            text-align: center;
            font-size: 20pt;
            /*margin-left: 30px;*/
            /* background-color: lightblue; */
        }


        .excellent,
        .very-good {
            color: green;
            font-weight: bold;
        }

        .good {
            color: orange;
            font-weight: bold;
        }

        .bad {
            color: red;
            font-weight: bold;
        }

        .custom-badge {
            padding: 15px;
            font-size: 20pt;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .emoji {
            padding: 1rem;
            font-size: 6rem;
            transform: scale(.75);
            text-shadow: 0 2px 4px rgba(0, 0, 0, .3);
            transition: text-shadow .2s ease-in-out,
            transform .2s ease-in-out;
        }

        .emoji:hover {
            transform: scale(1) translatey(-20px);
            text-shadow: 0 20px 20px rgba(0, 0, 0, .3);
        }

        .emoji--happy:before {
            content: '🙂';
            /* background-color: lightblue; */
        }

        .emoji--happy:hover:before {
            content: '😃';

        }

        .emoji--sad:before {
            content: '😕';
            /* background-color: lightblue; */
        }

        .emoji--sad:hover:before {
            content: '☹️ ';
        }

        .emoji--crying:before {
            content: '😠';
            /* background-color: lightcyan; */
        }

        .emoji--crying:hover:before {
            content: '😡';
        }

        .emoji--grimacing:before {
            content: '😬';
            /* background-color: lightgreen; */
        }

        .emoji--grimacing:hover:before {
            content: '😁';
        }

        .service-string {
            color: green;
        }
        .header_line{
            width: 100%;
            height: 22px;
            background: #e31d1a;
        }
    </style>
</head>

<body>
<div class="header_line"></div>
<div>
    <img src="images/logo.png" alt="">
</div>
<div class="d-flex justify-content-center">
    <span class="badge badge-pill badge-success custom-badge">Overall Experience الخبرة الشاملة</span>
</div>

<div class="container-fluid">
    <div class=" d-flex justify-content-center">
        <h4 class="service-string">Your Overall Service Experience at Al Adheed? تجربتك الشاملة في الخدمة في
            العضيد؟</h4>
    </div>
</div>
<div class="d-flex justify-content-center">
    <div class="row justify-content-center">
        <div class="col-md-3 ">
            <!-- <span class="emoji emoji--crying"></span> -->
            <img class="emoji emoji--crying feed_back" src="images/2.png" alt="" id="2" onclick="saveFeedback(this.id)">
            <p class="bad">Bad <br> سيئة</p>
        </div>
        <div class="col-md-3">
            <!-- <span class="emoji emoji--sad"></span> -->
            <img class="emoji emoji--crying feed_back" src="images/3.png" alt="" id="3" onclick="saveFeedback(this.id)">
            <p class="good">Good <br> حسن</p>
        </div>
        <div class="col-md-3">
            <img class="emoji emoji--crying feed_back" src="images/4.png" alt="" id="4" onclick="saveFeedback(this.id)">
            <!-- <span class="emoji emoji--grimacing"></span> -->
            <p class="very-good">Very Good<br> حسن جدا</p>

        </div>
        <div class="col-md-3">
            <!-- <span class="emoji emoji--happy"></span> -->
            <img class="emoji emoji--crying feed_back" src="images/5.png" alt="" id="5" onclick="saveFeedback(this.id)">
            <p class="excellent">Excellent <br>ممتاز</p>
        </div>
        <input type="hidden" id="desk_id" name="desk_id" value="<?php echo $_GET['desk_id']; ?>">
    </div>
    <div class="fireworks-example"></div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="script/fireworks.js"></script>
<script src="API/config.js"></script>
<script>
    function saveFeedback(id)
    {
        let desk_id = $('#desk_id').val();
        $.ajax({
            url:FUNCTION_API_END_POINT+'?method=save_feedback',
            type:'POST',
            data:{
                'id':id,
                'desk_id':desk_id
            },
            success:function (data){

                swal("Thank you!🙏", "Thank you for your feed back", "success", {timer: 1500});
            }
        });
    }
</script>
</body>

</html>