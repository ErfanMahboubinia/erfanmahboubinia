<html>
<head>
    <meta charset="UTF-8">
    <title>
        Passwordlist
    </title>
    <link rel="stylesheet" type="text/css" href="passwordlist%20stylesheet.css">
</head>
<body>
    <div class="form">
        <form action="passwordlist.php" method="post" class="form" id="passwordmakerform">
            <h2>charecter which you want to be in passwordlist </h2>
            <div><label> <input type="checkbox" name="captal_word">Captal Word(A - Z)</label></div>
            <div><label> <input type="checkbox" name="small_word">Small Word (a - z)</label></div>
            <div><label> <input type="checkbox" name="number">number (0-9)</label></div>
            <div><label><input type="checkbox" name="sign_1">Sign ( !@#$%^&* )</label></div>
            <div><label><input type="checkbox" name="sign_2">Sign ( ?(){}][:><,./;\| )</label></div>
            <hr>
            <div class="filldiv">
                <lable class="fill_margin">any thing else, write that here : </lable><br>
                <label class="fill_margin">How many passwords : </label><br>
                <label class="fill_margin">Lentgh of each pass : </label><br>
                <label class="fill_margin">The filename you want the passwords to include : </label>
                <label id="example">example : passwordlist.txt</label>
            </div>
            <div>
                <input type="text" name="somthing_else" class="fill_margin txt_input" value=""><br>
                <input type="number" name="num" class="fill_margin txt_input" value=""><br>
                <input type="number" name="len" class="fill_margin txt_input" value=""><br>
                <input type="text" name="filename" class="fill_margin txt_input" value="">
            </div>
            <hr>
            <input type="submit" value="Submit" name="submit" id="submitpassform">
        </form>
    </div>
<?php
set_time_limit ( 1000000 );
/*if($_POST['captal_word'] == null) $_POST['captal_word'] = '';
if($_POST['small_word'] == null) $_POST['small_word'] = '';
if($_POST['number'] == null) $_POST['number'] = '';
if($_POST['sign_1'] == null) $_POST['sign_1'] = '';
if($_POST['sign_2'] == null) $_POST['sign_2'] = '';
if($_POST['somthing_else'] == null) $_POST['somthing_else'] = '';*/

//print_r($_POST['sign_2']);
$Cword = '';
$Sword = '';
$numbers = '';
$Sign_1 = '';
$Sign_2 = '';
$else = $_POST['somthing_else'];
$count = (int) $_POST['num'];

if($_POST['captal_word'] == 'on')$Cword = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
else $Cword='';
if($_POST['small_word'] == 'on')$Sword = 'abcdefghijklmnopqrstuvwxyz';
else $Sword='';
if($_POST['number'] == 'on')$numbers = '1234567890';
else $numbers='';
if($_POST['sign_1'] == 'on')$Sign_1 = '!@#$%^&*';
else $Sign_1='';
if($_POST['sign_2'] == 'on')$Sign_2 = '?(){}][:><,./;\|';
else $Sign_2='';

$words = $Cword.$Sword.$Sign_1.$Sign_2.$numbers.$else;
$array = str_split($words);
$Length = $_POST['len'];
$password = '';
$file_name = $_POST['filename'];
$file_text = fopen($file_name,'w');
$passwordlist= array();
for($j = 0; $j < $count;$j++)
{
    shuffle($array);
    for ($i = 0; $i < $Length; $i++) {
        $password .= $array[$i];
    }
    echo $password .'<br>';
    $pass = $password."\n";
    $passwordlist[] = $pass;
    $password_list = array_unique($passwordlist);
    fwrite($file_text,$pass);
    $password = '';
}
?>
</body>
</html>