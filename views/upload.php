<!DOCTYPE html>
<html>
<head>
<style>
  #customers {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
    margin-top: 60px;
    font-size: 13px;
  }

  #customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
  }

  #customers tr:nth-child(even){background-color: #f2f2f2;}

  #customers tr:hover {background-color: #ddd;}

  #customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #bbb;
    color: black;
  }
</style>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data" autocomplete="off">
    <div class="field">
        <label for="username">Upload File</label>
        <input type="file" name="upload_file" accept=".json" required />
    </div><br>

    <input type="hidden" name="token" value="<?php echo Token::generate();?>"/>

    <input type="submit" name="upload_form" value="Submit"/>
</form><hr>