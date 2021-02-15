<?php
declare(strict_types=1);

echo "Exercise 1 starts here:";

function new_exercise($x) {
    $block = "<br/><hr/><br/><br/>Exercise $x starts here:<br/>";
    echo $block;

}
// The IDE told me that `$x` was not declared
// i then noticed that this function is being called for each exercise with the number as a parameter
// so i added $x as a parameter to the function!

new_exercise(2);
// === Exercise 2 ===
// Below we create a week array with all days of the week.
// We then try to print the first day which is monday, execute the code and see what happens.

$week = ["monday", "tuesday", "wednesday", "thursday", "friday", "saturday", "sunday"];
$monday = $week[1];

echo $monday;


new_exercise(3);
// === Exercise 3 ===
// This should echo ` "Debugged !" `, fix it so that that is the literal text echo'ed

$str = "Debugged ! Also very fun";
echo substr($str, 0, 10);


// didn't look up anything, just replaced the faulty quotation marks “” with normal ones "".

new_exercise(4);
// === Exercise 4 ===
// Sometimes debugging code is just like looking up code and syntax...
// The print_r($week) should give:  Array ( [0] => mon [1] => tues [2] => wednes [3] => thurs [4] => fri [5] => satur [6] => sun )
// Look up whats going wrong with this code, and then fix it, with ONE CHARACTER!

foreach($week as &$day) {
    $day = substr($day, 0, strlen($day)-3);
}

print_r($week);

// first read the descriptions on the built-in functions, they checked out
// then checked the foreach information on php.net
// turns out adding a `&` in front of the key makes it so the current array will contain adjusted information.

new_exercise(5);
// === Exercise 5 ===
// The array should be printing every letter of the alfabet (a-z) but instead it does that + aa-yz
// Fix the code so the for loop only pushes a-z in the array

$arr = [];
for ($letter = 'a'; $letter <= 'z'; $letter++) {
    array_push($arr, $letter);
    if(count($arr)==26){
        break;
    }
}
print_r($arr); // Array ([0] => a, [1] => b, [2] => c, ...) a-z alfabetical array
// i made the loop stop at the 26th iteration so it doesn't double up.


new_exercise(6);
// === Final exercise ===
// The fixed code should echo the following at the bottom:
// Here is the name: $name - $name2
// $name variables are decided as seen in the code, fix all the bugs whilst keeping the functionality!

$arr = [];

function combineNames($str1 = "", $str2 = "") {
    $params = [$str1, $str2];
    foreach($params as &$param) {
        if ($param == "") {
            $param = randomHeroName();
        }
    }
    return implode(" - ", $params);
}


//function randomGenerate($arr, $amount) {
//    for ($i = $amount; $i > 0; $i--) {
//        array_push($arr, randomHeroName());
//    }
//
//    return $amount;
//}

function randomHeroName()
{
    $hero_firstnames = ["captain", "doctor", "iron", "Hank", "ant", "Wasp", "the", "Hawk", "Spider", "Black", "Carol"];
    $hero_lastnames = ["America", "Strange", "man", "Pym", "girl", "hulk", "eye", "widow", "panther", "daredevil", "marvel"];
    $heroes = [$hero_firstnames, $hero_lastnames];
    $randname = $heroes[rand(0,count($heroes)-1)][rand(0, 10)];

    return $randname;
}

echo "Here is the name: " . combineNames();

// first fix: missing `;` on line 99
// second : line 84, the parameters for the implode function were reversed!  - separator first then array!
// third : line 101, the random selection (0,1 or 2) went out of the array's range (0 or 1),
// fourth: line 103, echo $randname switched to return $randname
// fifth: line 78, added the `&` to the foreach so it would adjust itself

// note -> tried to implement the randomGenerate() function into the the solution for the 3rd fix,
// however this kills the vhost.  `$randname = $heroes[randomGenerate($heroes,count($heroes))][rand(0, 10)];` and `$randname = $heroes[randomGenerate($heroes,count($heroes))];`

new_exercise(7);
function copyright(int $year) {
    echo "&copy; $year BeCode";
}
//print the copyright
copyright((int)date('Y'));

// i made this decision from reading the error after trying this code.
// changed 'return' into echo on L118, and made sure the date would return as integer -> date('Y') returns a string or false

new_exercise(8);
function login(string $email, string $password) {
    if($email == 'john@example.be' && $password == 'pocahontas') {
        return 'Welcome John'.' Smith';

    }
    return 'No access';
}

//do not change anything below
//should great the user with his full name (John Smith)
echo login('john@example.be', 'pocahontas');
//no access
echo login('john@example.be', 'dfgidfgdfg');
//no access
echo login('wrong@example.be', 'wrong');
//you can change things again!

//removed the duplicate return from L130 and concatenated it on L129.
// changed the If-statement to be AND instead of OR

new_exercise(9);
function isLinkValid(string $link) {
    $unacceptables = array('https:','.doc','.pdf', '.jpg', '.jpeg', '.gif', '.bmp', '.png');

    foreach ($unacceptables as $unacceptable) {
        if (strpos($link, $unacceptable) == true) {
            return 'Unacceptable Found<br />';
        }
    }
    return 'Acceptable<br />';
}
//invalid link
isLinkValid('http://www.google.com/hack.pdf');
//invalid link
isLinkValid('https://google.com');
//VALID link
isLinkValid('http://google.com');
//VALID link
isLinkValid('http://google.com/test.txt');

// stopped here for now, will continue another time! So ex 9 itself hasn't been touched!

