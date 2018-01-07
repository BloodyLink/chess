<?php
/**
 * Created by PhpStorm.
 * User: blood
 * Date: 1/2/2018
 * Time: 9:57 PM
 */

require_once('classes/Board.php');
require_once('classes/Piece.php');
require_once('classes/Referee.php');

do{

    $valid = true;

    //ASKING POSITIONS:
    $wqp = readLine("Enter White Queen's position (X,Y): ");
    $bqp = readLine("Enter Black Queen's position (X,Y): ");

    //cleaning up the input

    $whiteQueenPos = str_replace(' ', '', trim($wqp));
    $blackQueenPos = str_replace(' ', '', trim($bqp));

    //THE INPUT MUST USE A COMMA.

    if (strpos($whiteQueenPos, ',') == false ||
        strpos($blackQueenPos, ',') == false){
        $valid = false;
        echo "Invalid input. Try again.\n";
        continue;
    }

    $wPosX = explode(',', $whiteQueenPos)[0];
    $wPosY = explode(',', $whiteQueenPos)[1];
    $bPosX = explode(',', $blackQueenPos)[0];
    $bPosY = explode(',', $blackQueenPos)[1];

    //VALIDATING IF THE INPUT IS NUMERIC AND BETWEEN 1 AND 8.
    //WE DON'T WANT A QUEEN OUT THE BOARD

    if( !(is_numeric($wPosX) && $wPosX >= 1 && $wPosX <= 8) ||
        !(is_numeric($wPosY) && $wPosY >= 1 && $wPosY <= 8) ||
        !(is_numeric($bPosX) && $bPosX >= 1 && $bPosX <= 8) ||
        !(is_numeric($bPosY) && $bPosY >= 1 && $bPosY <= 8) ||
        ($wPosX == $bPosX && $wPosY == $bPosY)){
        echo "Invalid input. Try again.\n";
        $valid = false;
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


//THIS FOREACH JUST DRAWS THE CHESS BOARD ON SCREEN SO IT IS EASIER TO TEST
foreach($board->board as $row){
    foreach($row as $data){
        echo $data;
    }
    echo "\n";
}

$referee = new Referee();

//REFEREE WILL TELL US IF THE QUEENS CAN ATTACK EACH OTHER.

if($referee->checkIfQueensCanAttackEachOther($board, $whiteQueen, $blackQueen)){
    echo "Queens can attack each other.\n";
}else{
    echo "Queens cannot attack each other.\n";
}





