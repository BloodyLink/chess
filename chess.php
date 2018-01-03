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

    if($wqp == $bqp){
        echo "There cannot be 2 Queens on the same position. Try again.\n";
    }


}while($whiteQueenPos == $blackQueenPos);



$whiteQueen = new Piece();
$blackQueen = new Piece();

//setting positions

$whiteQueen->setPositionX(explode(',', $whiteQueenPos)[0]);
$whiteQueen->setPositionY(explode(',', $whiteQueenPos)[1]);
$blackQueen->setPositionX(explode(',', $blackQueenPos)[0]);
$blackQueen->setPositionY(explode(',', $blackQueenPos)[1]);

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





