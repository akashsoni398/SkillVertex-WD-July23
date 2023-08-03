<?php

/* fundamentals of code */

// storage 
$string31233_qqw34rfsd;
$_GET;

$x != $X;

$variable = "";

$string = "Hello";   //primitive DT
$num = 1234;
$float = 1234.56;
$numstring = "433443";
$boolean = true;
$boolean = false;

$username = null;  //trivial datatypes
$empty = "";

$arr = array("sdsddsds",322322,2332.323232,true); //index value array
$arr = ["sdsd",23232,false];  //index value array
$arr = ['name'=>"Akash Soni",'age'=>25,'address'=>"Bangalore"];   // key-value pair array

/*
Int array;  //declaration
array=[3432,3423,324,23];  //initialization
*/

$declaration = "initialization";

//input & output
if(isset($_GET['uname'])) {
    $username = $_GET['uname'];
    $email = $_GET['email'];
}

echo $variable;
$res = print($variable);

echo "Hello ","World","PHP";
print("Hello "."World");

//operations
$a=100;
$b=5;
$c = $a%$b;               // + - * / % ++ -- (arithmetic operators)
$a=10; $b='10';
$c = $a>$b;  //false      // > < >= <= == === != (comparison operators)
if($a>$b && $a==$c) {}    // && || ! (logical operator)
if($a>$b || $a==$b) {}
$a=10;                    // = += -= *= /= %= (assignment operator)
$a+=10;   $a=$a+10;
$a*=10;   $a = $a*10;

$a = 10;
$b = 20;
$c = $a + $b;

$a = 10;
$a+=$b;

echo ($a>$b && $a>$c) ? "$a is greatest" : "$a is not greatest";  // conditional operator

//condition
    if($condition) {}

    if($condition) {} else {}

    if($condition1) {} else if($condition2) {} else if($condition_n) {} else {}

    $grade='B+';
    switch($grade) {
        case 'A+':
            echo "95-100";
            break;
        case 'A':
            echo "85-95";
            break;
        case 'B+':
            echo "75-85";
            break;
        default:
            echo "Grade input incorrect";
    }

//iteration
    for($i=0;$i<=100;$i++) {
        echo $i;
    }

    $i=-100;
    while($i>=0) {
        echo $i;
        $i--;
    }


    $i=-100;
    do{
        echo $i;
        $i--;
    }
    while($i>=0);


    $arr1 = ["sdsd",23232,false];
    $arr1[2];

    $arr2 = ['name'=>"Akash Soni",'age'=>25,'address'=>"Bangalore"];
    $arr2['name'];


    foreach($arr1 as $value) {
        echo $value;
    }

//functions
function calc($num1,$num2,$op) {
    if($op=='+') {
        return $num1+$num2;
    }
    else if($op=='-') {
        return $num1-$num2;
    }
    else if($op=='*') {
        return $num1*$num2;
    }
    else if($op=='/') {
        return $num1/$num2;
    }
    else {
        return "Error:invalid operation";
    }
}

// superglobals
$GLOBALS;
$_SERVER;
$_REQUEST;
$_GET;
$_POST;
$_COOKIE;
$_SESSION;

//form handling using get & post
if(isset($_POST['uname-submit'])) {
    $username = $_POST['uname'];
    $email = $_POST['email'];
}

//cookies & sessions

$cookie_name = "user";
$cookie_value = "John Doe";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30)); // 86400 = 1 day

if(isset($_COOKIE['user'])) {
     echo $_COOKIE['user'];
}


session_start();

$_SESSION['user'] = "Akash soni";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Document</title>
</head>
<body>
    <p>Hello world. This is <?php echo '<b>'.$username.'</b>' ?></p>
    <form action="" method="post">
        <input type="text" name="uname" placeholder="Enter Username" />
        <input type="email" name="email" placeholder="Enter Email Address" />
        <button type="submit" name='uname-submit'>SUBMIT</button>
    </form>
</body>
</html>

<?php $result = calc(232,443,'*'); ?>