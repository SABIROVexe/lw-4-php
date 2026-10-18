<?php

function alphabeticalOrder(string $str): string {
    
    $chars = [];
    $length = 0; 
    
    while (true) {
        if ($str[$length] == "") {
        break; 
    }

        $chars[] = $str[$length];
        $length++; 
    }

    for ($i = 0; $i < $length; $i++) {
        $chars[] = $str[$i]; 
    }


    for ($i = 0; $i < $length - 1; $i++) {
        for ($j = 0; $j < $length - $i - 1; $j++) {
            
            
            if ($chars[$j] > $chars[$j + 1]) {
                $temp = $chars[$j];
                $chars[$j] = $chars[$j + 1];
                $chars[$j + 1] = $temp;
            }
            
        }
    }

    $result = "";
    for ($i = 0; $i < $length; $i++) {
        $result .= $chars[$i]; // прибавляем по одной букве
    }

    return $result;
}

function findPerfectNumbers(array $array): array {
    $result = []; 
    
    
    $arrayLength = 0;
    while (isset($array[$arrayLength])) {
        $arrayLength++;
    }

    // Перебираем каждое число из массива
    for ($i = 0; $i < $arrayLength; $i++) {
        $currentNumber = $array[$i];

        
        if ($currentNumber <= 1) {
            continue; 
        }

        $sumOfDivisors = 0;

        //Ищем все делители числа (кроме него самого)
        for ($j = 1; $j < $currentNumber; $j++) {
            if ($currentNumber % $j == 0) {
                $sumOfDivisors += $j; 
            }
        }

       
        if ($sumOfDivisors == $currentNumber) {
            $result[] = $currentNumber; 
        }
    }

    return $result;
}

function mostRecent(string $text): string {
    $length = 0;
    while (isset($text[$length])) {
        $length++;
    }

    if ($length > 1000) {
        return "Ошибка: Текст превышает 1000 символов!";
    }

    //Разбиваем текст на слова и очищаем от знаков препинания
    $words = [];
    $currentWord = "";

    for ($i = 0; $i < $length; $i++) {
        $char = $text[$i];

        //Приводимn буквы к нижнему регистру
        if ($char >= 'A' && $char <= 'Z') {
            $char = chr(ord($char) + 32);
        }

        
        if (($char >= 'a' && $char <= 'z') || ($char >= '0' && $char <= '9')) {
            $currentWord .= $char;
        } else {
            
            if ($currentWord != "") {
                $words[] = $currentWord;
                $currentWord = ""; 
            }
        }
    }
    
    if ($currentWord != "") {
        $words[] = $currentWord;
    }

    
    $wordCounts = [];
    $wordsLength = 0;
    while (isset($words[$wordsLength])) {
        $wordsLength++;
    }

    for ($i = 0; $i < $wordsLength; $i++) {
        $word = $words[$i];
        if (isset($wordCounts[$word])) {
            $wordCounts[$word]++; 
        } else {
            $wordCounts[$word] = 1;
        }
    }

  
    $mostFrequentWord = "";
    $maxCount = 0;

    foreach ($wordCounts as $word => $count) {
        if ($count > $maxCount) {
            $maxCount = $count;
            $mostFrequentWord = $word;
        }
    }

    return $mostFrequentWord;
}

echo alphabeticalOrder('alphabetical'); 


$numbers = [4, 6, 12, 28, 15, 0, -6, 496];
$perfectNumbers = findPerfectNumbers($numbers);
print_r($perfectNumbers);

$text = "Apple, banana, apple! Orange, banana, and apple again.";
echo "Самое частое слово: " . mostRecent($text); 


