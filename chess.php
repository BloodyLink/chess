<?php
/**
 * Created by PhpStorm.
 * User: blood
 * Date: 1/2/2018
 * Time: 9:57 PM
 */

require_once('Board.php');
require_once('Piece.php');
require_once('Referee.php');

do{
    $wqp = readLine("Enter White Queen's position (X,Y): ");
    $bqp = readLine("Enter Black Queen's position (X,Y): ");

    //cleaning up the input

    $whiteQueenPos = str_replace(' ', '', trim($wqp));
    $blackQueenPos = str_replace(' ', '', trim($bqp));

    $wPosX = explode(',', $whiteQueenPos)[0];
    $wPosY = explode(',', $whiteQueenPos)[1];
    $bPosX = explode(',', $blackQueenPos)[0];
    $bPosY = explode(',', $blackQueenPos)[1];

    if( !(is_numeric($wPosX) && $wPosX >= 1 && $wPosX <= 8) ||
        !(is_numeric($wPosY) && $wPosY >= 1 && $wPosY <= 8) ||
        !(is_numeric($bPosX) && $bPosX >= 1 && $bPosX <= 8) ||
        !(is_numeric($bPosY) && $bPosY >= 1 && $bPosY <= 8) ||
        ($wPosX == $bPosX && $wPosY == $bPosY)){
        echo "Invalid input. Try again.\n";
        $valid = false;
    }else{
        $valid = true;
    }


}while(!$valid);



$whiteQueen = new Piece();
$blackQueen = new Piece();

//setting positions

$whiteQueen->setPositionX($wPosX);
$whiteQueen->setPositionY($wPosY);
$blackQueen->setPositionX($bPosX);
$blackQueen->setPositionY($bPosY);

$board = new Board($whiteQueen, $blackQueen);

foreach($board->board as $row){
    foreach($row as $data){
        echo $data;
    }
    echo "\n";
}

$referee = new Referee();

if($referee->checkIfQueensCanAttackEachOther($board, $whiteQueen, $blackQueen)){
    echo "Queens can attack each other.";
}else{
    echo "Queens cannot attack each other.";
}





