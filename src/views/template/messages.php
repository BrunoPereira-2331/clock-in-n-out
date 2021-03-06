<?php 
$errors = [];

if (isset($_SESSION) && isset($_SESSION["message"])) {
    $message = $_SESSION["message"];
    unset($_SESSION["message"]);
} else if ($exception && isset($exception)) {
    $message = [
        "type" => "error",
        "message" => $exception->getMessage()
    ];

    if (get_class($exception) === "ValidationException") {
        $errors = $exception->getErrors();
    }

} 
if(isset($message) && count($message) > 0) {
    $classType = "";
    if ($message["type"] === "error") {
        $classType = "danger";
    } else {
        $classType = "success";
    }
?>
    <div class="my-3 alert alert-<?= $classType ?>" role="alert">
        <?php echo(isset($message)) ? $message["message"] : ""; ?>
    </div>
<?php } ?>
