<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // 1- Write a PHP script that records 3 digits and prints the total of the first two digits multiplied by the third digit
       function calcSumAndMultiply ($n1, $n2 , $n3) {
        $sum = $n1 + $n2;
        return $sum * $n3;
       }
       echo calcSumAndMultiply(2,2,1) . "<br>";
    // 2- A program that calculates the size of a box whose length and width are fixed with a value of 5 and 10 and the height is variable (size = length x width x height)
       function calcSize($height){
        $size = 5 * 10 * $height;
        return $size;
       }
       echo calcSize(10) . "<br>";
    // 3- Write a PHP script that takes a number integer representing the hours and converts it to seconds.
        function convertHoursToSeconds($hours){
            $seconds = $hours * 3600;
            return $seconds;
        }
        echo convertHoursToSeconds(2) . "<br>";
    // 4- Write a PHP script that calculates the Area of a Triangle store the base and height Print the area.
        function calcAreaOfTriangle($base, $height){
            $area = ($base * $height) / 2;
            return $area;
        }
        echo calcAreaOfTriangle(5, 10). "<br>";
    // 5- Write a PHP script that takes the age in years and prints the age in days.
        function calcAgeInDays($age){
            $days = $age * 365;
            return $days;
        }
        echo calcAgeInDays(22). "<br>";
    // // // // // // // // // // // // // // // // // // //
    // // // // // // // // // // // // // // // // // // //
        $sentence = "EraaSoft Learn by practice";
    // // // // // // // // // // // // // // // // // // //
    // // // // // // // // // // // // // // // // // // //    
    // 6- Get the length of this sentence.
        $length = strlen($sentence);
        echo $length. "<br>";
    // 7- Get the length of this sentence without spaces.
        $withoutSpaces = str_replace(' ', '', $sentence);
        $lengthWithoutSpaces = strlen($withoutSpaces);
        echo $lengthWithoutSpaces. "<br>";
    // 8- Get the number of words in this sentence by explode
        $wordCount = str_word_count($sentence);
                // or 
        $words = explode(' ', $sentence);
        $lengthWords = count($words);
        echo "$lengthWords" . " " . "(Another Way)" . "$wordCount" . "<br>";
    // 9- Check if this word (by) exists in the string or not.
        if (strpos($sentence, "by") !== false) {
            echo "by". " ". "exists". "<br>";
        } else {
            echo "by". " ". "does not exist". "<br>";
        }
                // or
        echo str_Contains($sentence, "by") == 1 ? "yes <br>" : "no <br>";
    //  10- Get the word (EraaSoft) from the string and print it.
        $substring = "EraaSoft";
        $position = strpos($sentence, $substring);
        $res = $position !== false ? "yes" : "no";
        echo $res . "<br>";
                // or
        $pattern = '/\bEraaSoft\b/';
        preg_match($pattern, $sentence, $matches);
        echo count($matches) == 1 ? "yes <br>" : "no <br>";
    // 11 - Remove the word (by) from the string and print the string with and without (by).
        $stringWithoutBy = str_replace("by", "", $sentence);
        echo $stringWithoutBy . "<br>";
        echo $sentence . "<br>";
        // // // // // // // // // // // // // // // // // // // //
        // // // // // // // // // // // // // // // // // // // //
        $string_one = "Eraa"; 
        $string_two = "Soft";
        // // // // // // // // // // // // // // // // // // // //
        // // // // // // // // // // // // // // // // // // // //
    // 12 - Make a new variable called (Full_string) that concatenate string_one and string_two.
        $Full_string = $string_one. $string_two;
        echo $Full_string. "<br>";
    // 13 - Compare the full_string and this string (EraaSoft).
        echo $Full_string == "EraaSoft"? "yes <br>" : "no <br>";
    // 14 - Write a PHP script to split the following string. Sample string: 'ErraSoft' Expected Output: Er/ra/So/ft
        $string = "EraaSoft";
        $split = str_split($string);
        echo $split[0].$split[1]."/".$split[2].$split[3]."/".$split[4].$split[5]."/".$split[6].$split[7]."<br>";
                // or
        $split2 = str_split($string, 2);
        $splitOutput = implode('/', $split2);
        echo $splitOutput ."<br>";
    // 15 - Write a PHP script that stores the number as a variable and checks if it is odd or even.
        $number = 6;
        if ($number % 2 == 0) {
            echo "Even <br>";
        } else {
            echo "Odd <br>";
        }
    // 16 - Write a PHP script that stores the string as a variable and checks if the length is odd or even.
        $length = strlen($string);
        if ($length % 2 == 0) {
            echo "Even <br>";
        } else {
            echo "Odd <br>";
        }
        // // // // // // // // // // // // // // // // // // // //
        // // // // // // // // // // // // // // // // // // // //
        $description = "no pain , no gain ";
        // // // // // // // // // // // // // // // // // // // //
        // // // // // // // // // // // // // // // // // // // //
    // 17 - Check from this string o If the string has “gain” Print ( success word ) o If the string has ( peen ) Print ( success word )  Else ( wrong word ).
        if (strpos($description, "gain")!== false) {
            echo "success word <br>";
        } else if (strpos($description, "peen") !== false) {
            echo "success word <br>";
        } else {
            echo "wrong word <br>";
        }
                // or
        if(str_Contains($description, "gain")){
            echo "success word <br>";
        }else if (str_Contains($description,"peen")){
            echo "success word <br>";
        }else{
            echo "wrong word <br>";
        }
    // 18 - A Boolean is a data type that has only two values true or false. These values often correspond to 1 (true) or 0 (false). When a 1 or a 0 is used, it's called an int Boolean. Write a PHP script that stores an int Boolean and outputs its opposite (1 becomes 0 and 0 becomes 1).
        $Boolean = true;
        if ($Boolean == true) {
            echo "0 <br>";
        } else {
            echo "1 <br>";
        }
    // 19 - Write a PHP script that stores a word and determines Is the Word is Singular or Plural? (A plural word is one that ends in "s".)
        $word = "EraaSoft";
        if (substr($word, -1) == "s") {
            echo "Plural <br>";
        } else {
            echo "Singular <br>";
        }
    // 20 - Make a calculator with these operations using if and else if o Submission  o Subtraction  o Multiplication  o Division  o Power  o Modulus.
        // Sample values
        $num1 = 10;
        $num2 = 5;
        $operation = "Subtraction";
        if ($operation == "Addition") {
            $result = $num1 + $num2;
        } elseif ($operation == "Subtraction") {
            $result = $num1 - $num2;
        } elseif ($operation == "Multiplication") {
            $result = $num1 * $num2;
        } elseif ($operation == "Division") {
            if ($num2 != 0) {
                $result = $num1 / $num2;
            } else {
                $result = "Cannot divide by zero";
            }
        } elseif ($operation == "Power") {
            $result = pow($num1, $num2);
        } elseif ($operation == "Modulus") {
            if ($num2 != 0) {
                $result = $num1 % $num2;
            } else {
                $result = "Cannot perform modulus with zero";
            }
        } else {
            $result = "Invalid operation";
        }
        echo "Result =  $result";
        ?>
</body>
</html>