<?php
require_once "Configs/config.php";
if (!defined("Darkrulerz"))
    die("Hack attempt?");
require "Classes/User.php";
require "Classes/Database.php";
require "Classes/Image.php";
$Database = new DB();
$User = new User($Database);
if ($_POST['Register'])
{
    $User->DoRegister($_POST);
}
else if ($_POST['LogIn'])
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $User->LogIn($username, $password);
}
else if ($_POST['LogOut'])
{
    $User->LogOut();
}
else if ($_POST['ChangePass'])
{
    $User->ChangePass($_POST);
}
else if ($_POST['Additional'])
{
    $User->SaveAdditional($_FILES, $_POST);
}
else if ($_GET['AdminPanel'])
{
    if ($User->IsAdmin())
        echo '<meta http-equiv="refresh" content="0;url=Admin.php">';
}
else if ($_GET['Friend'])
{
    $User->AddFriend($_GET['Friend']);
    echo '<meta http-equiv="refresh" content="0;url=?User=">';
}
else if ($_POST['PM'])
{
    $User->SendPrivateMessage($_POST['receiver']. $_POST['subject'], $_POST['message']);
}

if ($User->IsLoggedIn() == true)
    $User->RefreshCookie();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8">
<script type="text/javascript" src="Scripts/Country.js"></script>
<script type="text/javascript" src="Scripts/CheckFields.js"></script>
</head>
<body>
<?php
if ($User->IsLoggedIn() == false)
{
    if (!$_GET['ShowRegister'])
    {
        echo $User->Translate('Login').":";
        $User->ShowLogin();
        echo "<a href='?ShowRegister=1'>Register</a>";
    }
    else
    {
        echo $User->Translate('Register').":";
        $User->ShowRegister();
    }
    echo "<hr>";
}
else
{
    $User->ShowLogout();
    echo '<a href="?ChangePass=1">'.$User->Translate('ChangePass').'</a><br>';
    echo '<a href="?ShowAdditionalForm=1">'.$User->Translate('SetAdditional').'</a><br><br>';
    if ($_GET['ChangePass'])
    {
        echo "<hr>";
        $User->ShowChangePass();
    }
    else if ($_GET['ShowAdditionalForm'])
    {
        echo "<hr>";
        $User->ShowAdditionalForm();
    }
    else if ($_GET['pm'])
    {
        $receiver = $_GET['pm'];
        $User->DisplayPMControls($receiver);
    }
    else
    {
        if ($User->IsAdmin())
        {
            echo '<a href="?AdminPanel=1">Admin Panel</a><br><br>';
        }
        $User->ShowHomepage();
    }
}
if ($_GET['User'])
{
    $Username = $_GET['User'];
    if ($Username != "")
    {
        if (strtolower($Username) != strtolower($User->GetName()))
        {
            echo '<a href="?pm='.$Username.'">Send a PM to this user</a>';
            $User->ShowHomePage($Username);
        }
    }
}
?>