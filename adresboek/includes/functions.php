<?php
function t($debug){
    echo '
<div class="debug">
    <div>
        <h3>-- Debug --</h3>
        <pre>';
    print_r($debug);
    echo '</pre>
    </div>
    <div>
        <h3>-- Post --</h3>
        <pre>';
    print_r($_POST);
    echo '</pre>
    </div>
    <div>
        <h3>-- Get --</h3>
        <pre>';
    print_r($_GET);
    echo '</pre>
    </div>
    <div>
        <h3>-- Session --</h3>
        <pre>';
    print_r($_SESSION);
    echo '</pre>
    </div>
    <div>
        <h3>-- Files --</h3>
        <pre>';
    print_r($_FILES);
    echo '</pre>
    </div>
</div>';
    exit;
}

function autoloadClasses($classname) {
    $directories = array();
    $directories[] = rtrim(BASEPATH, '/');
    $directories[] = 'src';
    $directories = array_merge($directories, explode('\\', $classname));
    $filepath = join('/', $directories).'.php';
    require($filepath);
}

function addToFile($data, $file = "data.txt"){
    checkFile($file);

    if (is_array($data)){
        $newFileData = '';
        foreach ($data as $key => $content) {
            $newFileData .= $key . ' => ' . $content .','.PHP_EOL;
        }
        $existingFileData = file_get_contents($file);
        $newFileData .= $existingFileData;

        if (!file_put_contents($file, $newFileData)){
            t(error_get_last());
        }
    } else{
        $data .= PHP_EOL;

        $existingFileData = file_get_contents($file);
        $newFileData = $data . $existingFileData;
        if (!file_put_contents($file, $newFileData)){
            t(error_get_last());
        }
    }
}

function checkFile($file){
    if (!file_exists($file) || !is_writable($file) || !is_readable($file)){
        fopen($file, "w");
    }
    return true;
}

function getFromFile($file = "data.txt"){
    $content = file_get_contents($file);
    $expoldedContent = explode(',',$content);
    return $expoldedContent;
}

function addToCSV($data, $file = "data.csv"){
if (!is_array($data)){
    return;
}
if (!is_writable($file) || !is_readable($file) || !file_exists($file)){
    $file = fopen($file,"w");
}
foreach ($data as $line) {
    fputcsv($file,explode(',',$line));
}
fclose($file);
}

function home(){
    header("location:/gastenboek/public/?component=home");
}

function redirect($input){
    header("location:/gastenboek/site/public/?component=".$input);
}

function create_file($path){
    if (!file_exists($path)) {
        $return = false;
        if (\Menno\Database::select(sprintf("select id from menuitems where component = '%s'", $_GET['component']))[0]) {

            $path_array = explode("/", $path);
            $amount = count($path_array);
            $new_path = "";

            for ($i = 0; $i < $amount - 1; $i++) {
                $new_path .= $path_array[$i] . "/";
            }

            mkdir($new_path, 0777, true);

            if ($f = fopen($new_path . $path_array[$amount - 1], 'w') or die("Can't create file")) {
                $return = "created";
            }

            fclose($f);

            return $return;
        } else {
            return "not in database";
        }
    }
    return true;
}

function isValidEmail($email)
{
    return preg_match('/\A[a-z0-9]+([-._][a-z0-9]+)*@([a-z0-9]+(-[a-z0-9]+)*\.)+[a-z]{2,4}\z/', $email)
        && preg_match('/^(?=.{1,64}@.{4,64}$)(?=.{6,100}$).*/', $email);
}

function message($message, $type){
    $_SESSION['message']["text"] = $message;
    $_SESSION['message']["type"] = $type;
}

function showMessage(){
    if (isset($_SESSION["message"])) {
        echo "
    <div class='message message-" . $_SESSION["message"]["type"] . "'>
        <p>" . $_SESSION["message"]["text"] . "</p>
    </div>
    ";
        session_unset($_SESSION["message"]);
    }
}