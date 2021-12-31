<?php 

function loadModel($modelName){
    require_once(MODEL_PATH . "/{$modelName}.php");
}

function loadView($viewName, $params = [], $exception = []) {
    if (count($params) > 0) {
        foreach ($params as $key => $value) {
            if (strlen($value) > 0) {
                ${$key} = $value;
            }
        }
    }
    require_once(VIEW_PATH . "/{$viewName}.php");
}

function loadTemplateView($viewName, $params = [], $exception = []) {
    if (count($params) > 0) {
        foreach ($params as $key => $value) {
            if (gettype($value) == "string") {
                if (strlen($value) > 0) {
                    ${$key} = $value;
                }
            } else if (gettype($value) == "object" || gettype($value) == "array") {
                ${$key} = $value;
            }
        }
    }
    require_once(TEMPLATE_PATH . "/header.php");
    require_once(TEMPLATE_PATH . "/menu.php");
    require_once(VIEW_PATH . "/{$viewName}.php");
    require_once(TEMPLATE_PATH . "/footer.php");
}

function renderTitle($title, $icon = null) {
    require_once(TEMPLATE_PATH . "/title.php");
}

?>