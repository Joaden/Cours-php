<!DOCTYPE html>
<html lang="fr">

    <?php $PAGE_TITLE = "TEST BOOTSTRAP"; ?>
    <?php include("./views/common/head.php");?>

<body>
    <!-- =================================================== -->
    <!-- ================ DEBUT HTML  ================ -->


    <h1>TEST BOOTSTRAP</h1>

    <form class="container grid-1 grid-md-2">
        <!-- <div class="form-group"> -->
            <label class="" for="exampleFormControlInput1">Email address</label>
            <input class="mb-5" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        <!-- </div> -->
        <!-- <div class="form-group"> -->
            <label class="" for="exampleFormControlSelect1">Example select</label>
            <select class="mb-5" class="form-control" id="exampleFormControlSelect1">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
        <!-- </div> -->
        <!-- <div class="form-group"> -->
            <label class="" for="exampleFormControlSelect2">Example multiple select</label>
            <select class="form-control mb-5" multiple id="exampleFormControlSelect2">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
        <!-- </div> -->
        <!-- <div class="form-group"> -->
            <label class="" for="exampleFormControlTextarea1">Example textarea</label>
            <textarea class="form-control mb-5" id="exampleFormControlTextarea1" rows="3"></textarea>
        <!-- </div> -->
    </form>

    <?php include("./views/common/load_js_scripts.php");?>
</body>

</html>