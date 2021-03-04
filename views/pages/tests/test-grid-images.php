<?php
    $PAGE_TITLE = "TEST BOOTSTRAP";
    $pathToRootFolder = "../../";
?>

<!DOCTYPE html>
<html lang="fr">

<?php include($pathToRootFolder."views/common/head.php"); ?>

<body>
    <!-- =================================================== -->
    <!-- ================ DEBUT HTML  ================ -->


    <h1>TEST BOOTSTRAP</h1>

    <div class="grid-1 grid-sm-2 grid-md-3 grid-lg-4 vline-xl-6 grid-rowHeightForImg">

        <div class="grid-sm-2col grid-md-1col grid-lg-4col vline-xl-1to2">
            <img src="https://source.unsplash.com/featured/?nature" alt="">
        </div>
        <div class="grid-lg-2col vline-xl-1to3">
            <img src="https://source.unsplash.com/featured/?sun" alt="">
        </div>
        <div class="grid-md-1col grid-lg-2col vline-xl-1to4">
            <img src="https://source.unsplash.com/featured/?water" alt="">
        </div>
        <div class="grid-sm-2col grid-md-3col grid-lg-4col vline-xl-1to5">
            <img src="https://source.unsplash.com/featured/?work" alt="">
        </div>
        <div class="grid-lg-2col vline-xl-1to6">
            <img src="https://source.unsplash.com/featured/?ocean" alt="">
        </div>
        <div class="grid-lg-2col vline-xl-1to7">
            <img src="https://source.unsplash.com/featured/?girl" alt="">
        </div>
        <div class="grid-sm-2col grid-md-1col grid-lg-4col">
            <img src="https://source.unsplash.com/featured/?meeting" alt="">
        </div>
        <div class="grid-md-3col grid-lg-2col">
            <img src="https://source.unsplash.com/featured/?music" alt="">
        </div>
        <div class="grid-lg-2col">
            <img src="https://source.unsplash.com/featured/?animal" alt="">
        </div>
        <div class="grid-lg-4col">
            <img src="https://source.unsplash.com/featured/?plant" alt="">
        </div>
        <div class="grid-lg-2col">
            <img src="https://source.unsplash.com/featured/?desert" alt="">
        </div>
        <div class="grid-lg-2col">
            <img src="https://source.unsplash.com/featured/?forest" alt="">
        </div>
        <div class="grid-md-2col grid-lg-4col">
            <p class="display-4 text-center">La puissance du systeme Grid</p>
        </div>
        <div class="vline-1to2 vline-sm-1to3">
            <img src="https://source.unsplash.com/featured/?sky" alt="">
        </div>
        <div class="">
            <img src="https://source.unsplash.com/featured/?dirty" alt="">
        </div>
        <div class="">
            <img src="https://source.unsplash.com/featured/?camera" alt="">
        </div>

    </div>

    <?php include($pathToRootFolder."views/common/load_js_scripts.php");?>
</body>

</html>