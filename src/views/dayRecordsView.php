<main class="content">
    <?php 
        renderTitle("Clock Register", "icofont-check-alt");
        include(TEMPLATE_PATH . "/messages.php");
    ?>
    <div class="card">
        <div class="card-header">
            <h3><?php echo $today; ?></h3>
            <p class="mb-0">Todays Clock</p>
        </div>
        <div class="card-body">
            <div class="d-flex m-5 justify-content-around">
                <span class="record">Clock In 1: ---</span>
                <span class="record">Clock Out 1: ---</span>
            </div>
            <div class="d-flex m-5 justify-content-around">
                <span class="record">Clock In 2: ---</span>
                <span class="record">Clock Out 2: ---</span>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-center">
            <a href="" class="btn btn-success btn-lg">
                <i class="icofont-check mr-1"></i>
                Clock In
            </a>
        </div>
    </div>
</main>