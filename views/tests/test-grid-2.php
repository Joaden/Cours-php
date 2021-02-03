<!DOCTYPE html>
<html lang="fr">

    <?php $PAGE_TITLE = "TEST BOOTSTRAP"; ?>
    <?php include("./views/common/head.php");?>

<body>
    <!-- =================================================== -->
    <!-- ================ DEBUT HTML  ================ -->


    <h1>TEST BOOTSTRAP</h1>

    <form class="container">
        <div class="form-group grid-md-2">
            <label class="" for="exampleFormControlInput1">Email address</label>
            <input class="" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>
        <div class="form-group grid-md-2">
            <label class="" for="exampleFormControlSelect1">Example select</label>
            <select class="" class="form-control" id="exampleFormControlSelect1">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
        </div>
        <div class="form-group grid-md-2">
            <label class="" for="exampleFormControlSelect2">Example multiple select</label>
            <select class="form-control" multiple id="exampleFormControlSelect2">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
        </div>
        <div class="form-group grid-md-2">
            <label class="" for="exampleFormControlTextarea1">Example textarea</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
    </form> 


    <?php include("./views/common/load_js_scripts.php");?>
</body>

</html>