<?php
//Functions
    function bookByAuthorYear($bookAuthor, $bookYear)
    {
        echo $bookYear;
        echo "\n";
        echo $bookAuthor;
        echo "\n";
    }

$year = 1920;
$authorName = "H.P. Lovecraft";
    echo $bookYear; //shows an "undefined" error
bookByAuthorYear($year, $authorName);

//string length
echo "\n";
$quote = "How long is this statement?";
$length = strlen($quote);
echo $length;
echo "\n";

//OPERATORS
echo "\nArithmetic operators:\n";
echo 8+3;
echo "\n";
echo 8-3;
echo "\n";
echo 8*3;
echo "\n";
echo 8/3;
echo "\n";
echo 8%3; //modulus
echo "\n";
echo 4**2; //exponents, 4^2
echo "\n";
echo "\nIncrements and decrements:\n";
$alterByOne = 2;
echo "Original one: $alterByOne\n";
++$alterByOne;
echo "$alterByOne\n";
echo --$alterByOne."\n";

echo "\nComparison operators:\n";
echo '=== means "same value and same type"';
echo "\n";
echo '== is only about the value';
echo "\n";
echo '= is for assignment';
echo "\n";
echo '<> means not equal';
echo "\n";
echo "<=> returns 1, 0, or -1. If it's it means that value on the left is larger. If it's 0 it means that they're equal. If it's -1 it means that the value on the right is larger";
echo "\n";

echo "\nLogical operators:\n";
$var1 = (6<7);
$var2 = (8==8);
$var3 = (8==="8");
var_dump($var1 && $var2); //returns true because both vars are true
var_dump($var2 && $var3); //returns false because integer 8 is not the same as string "8"
var_dump($var1 || $var2); //returns true because one of the vars is true
var_dump(!$var1); //returns false because of the "not" operator, which switches true to false and vice versa
var_dump(!$var3); //as above
echo "\n";

//indexed array
$authors = array("Charles Dickens","William Shakespeare","Mark Twain");
print_r($authors);
$books = ["Oliver Twist","Richard III","Romeo and Juliet"];
print_r($books);

//associative array
$authors = [
    "quarky" => "Charles Dickens",
    "brilliant" => "Jane Austin",
    "poetic" => "William Shakespeare",
    "Mark Twain",
    ];
print_r($authors);
echo "\n";
echo $books[1]."\n";
echo $authors['poetic']."\n";
echo array_key_exists(5,$authors);

//adding to an array
$authors["amazing"] = "HP Lovecraft"; //preferred to the one below
array_push($authors, "Jane Austin");
print_r($authors);

//removing from an array
echo "Now I'll remove Jane\n";
array_pop($authors);
print_r($authors);
echo "Now I'll remove Jane\n";
unset($authors["quarky"]);
print_r($authors);
unset($books);
print_r($books); //print "undefined variable: books" since we just removed that array

//sort arrays
asort($authors);
print_r($authors); //sorts records alphabetically preserves the associative flags
sort($authors);
print_r($authors); //sorts records alphabetically but takes away the associative flags

echo "The number of items is: ".count($authors)."\n";

//foreach loop
foreach($authors as $key => $i)
{
    echo $i." (".$key.")\n";
}
echo "\n";

//multidimensional array
$authorsMulti = [
    "Male" => [
        "Charles Dickens" => ["Oliver Twist"],
        "HP Lovecraft" => ["Call of Cthulhu"],
        "William Shakespeare" => ["Richard III"],
        "Mark Twain" => array("Tom Sawyer")
    ],
    "Female" => [
        "L. M. Montgomery" => ["Anne of GreenGables"],
        "Louisa May Alcott" => array("Little Women")
    ]
];
print_r("HP Lovecraft wrote ".$authorsMulti['Male']['HP Lovecraft'][0]);
echo "\n";

//if statement
$count = count($authorsMulti, COUNT_RECURSIVE);
if($count > 1)
{
    echo "There is a total of ".$count." items inside the array\n";
}
elseif($count == 1)
{
    echo "There is a total of ".$count." item inside the array\n";
}
else
    echo "This array is empty\n";
    
//while loop
while($i < 1)
{
    $i = 0;
    echo "Reading is fun!\n";
    $i++;
};

//for loop
for($i=0;$i<1;$i++)
{
    echo "Reading Necronomicon is even better!\n";
};

//DATABASES
//connecting to a database
$connection = mysqli_connect("localhost","webphp","password");
mysqli_select_db($connection,"Pluralsight");

//executing a query
$insertTwain = "insert into Authors(first_name,last_name) values ('Mart','Twain')"; //insert
$inserting = mysqli_query($connection,$insertTwain);
$updateTwain = "update Authors set first_name = 'Mark' where last_name = 'Twain'"; //update
$updating = mysqli_query($connection,$updateTwain);
$insertSecond = "insert into Authors(first_name,last_name) values ('Test','ToBeDeleted')"; //insert just to test the delete queries
$insertingSecond = mysqli_query($connection,$insertSecond);

echo "Newly created author id: ".$connection->insert_id."\n"; //grab the inserted id

$deleteAllAfterFirst = "delete from Authors where authorid>19"; //deleting all except for the Mart Twain we just inserted first
$deleting = mysqli_query($connection,$deleteAllAfterFirst);

$selectOrderByName = "select first_name, last_name from Authors order by first_name";
$resultOfSelect = mysqli_query($connection,$selectOrderByName);
while($singleRow = mysqli_fetch($resultOfSelect))
{
    print_r($singleRow);
}

//closing connection to a database
mysql_close($connection);
echo "\nThe work continues later! Portal has been closed\n";


echo "\n";
?>
