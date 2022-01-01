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
                <span class="record">Clock In 1: <?php echo $records && $records->time1 ? $records->time1 : '---'; ?></span>
                <span class="record">Clock Out 1: <?php echo $records && $records->time2 ? $records->time2 : '---'; ?></span>
            </div>
            <div class="d-flex m-5 justify-content-around">
                <span class="record">Clock In 2: <?php echo $records && $records->time3 ? $records->time3 : '---'; ?></span>
                <span class="record">Clock Out 2: <?php echo $records && $records->time4 ? $records->time4 : '---'; ?></span>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-center">
            <a href="punchClockController.php" class="btn btn-success btn-lg">
                <i class="icofont-check mr-1"></i>
                Clock In
            </a>
        </div>
    </div>

    <form class="mt-5" action="punchClockController" method="post">
        <div class="input-group no-border">
            <input type="text" name="forcePunchClock" class="form-control" id="forcePunchClock">
            <button class="btn btn-danger ml-3">
                Punch Clock Test
            </button>
        </div>
    </form>
</main>