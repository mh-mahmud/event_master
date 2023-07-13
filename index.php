<?php

require_once 'core/init.php';

function dd($data) {
    echo "<pre>";
    print_r($data);
    die;
}

if(Session::exists('success')){
    echo Session::flash('success');
}


if(!empty($_POST) && $_FILES['upload_file']['tmp_name']) {

    echo "<pre>";
    print_r($_FILES);
    if($_FILES['upload_file']['type'] != "application/json") {
        return;
    }

    $json_data = json_decode(file_get_contents($_FILES['upload_file']['tmp_name']));
    $user = new User();
    $insert = $user->uploadJsonData($json_data);
    dd($insert);

    dd($json_data);

}

?>

<form action="" method="post" enctype="multipart/form-data" autocomplete="off">
    <div class="field">
        <label for="username">Upload File</label>
        <input type="file" name="upload_file" accept=".json" required />
    </div><br>

    <input type="hidden" name="token" value="<?php echo Token::generate();?>"/>

    <input type="submit" value="Login"/>
</form><hr>
