<?php
/**
 * Created by PhpStorm.
 * User: blood
 * Date: 1/2/2018
 * Time: 9:59 PM
 */

require_once('Piece.php');

class Board
{
    public $board = array();

    function __construct($whiteQueen, $blackQueen)
    {

        //First, we fill up the board with the queens's position data.

        for($x = 1; $x <= 8; $x++){
            for($y = 1; $y <=8; $y++){

                $this->board[$x][$y] = " _ ";

                if ($whiteQueen->positionX == $x && $whiteQueen->positionY == $y) {
                    $this->board[$x][$y] = "W";
                }
                if ($blackQueen->positionX == $x && $blackQueen->positionY == $y) {
                    $this->board[$x][$y] = "B";
                }

            }
        }
    }

    public function checkRow($whiteQueen, $blackQueen){
        //This one is easy. We check whether or not the other queen is on the same X position.
        if ($whiteQueen->positionX == $blackQueen->positionX){
            return true;
        }else{
            return false;
        }

    }

    public function checkColumn($whiteQueen, $blackQueen){
        //Same as checkRow, but now with the Y position.
        if ($whiteQueen->positionY == $blackQueen->positionY){
            return true;
        }else{
            return false;
        }
    }

    public function checkDiagonal($whiteQueen, $blackQueen){

        $canAttack = false;

        //Here comes the fun. We will use the white queen as
        //reference to check if the black queen is on the upper-left diagonal.

        $x = $whiteQueen->positionX;
        $y = $whiteQueen->positionY;


        while($x >= 1 || $y >= 1){
            $x--;
            $y--;
            if($blackQueen->positionX == $x && $blackQueen->positionY == $y){
                $canAttack = true;
                break;
            }
        }

        //Now we check the lower-right diagonal
        $x = $whiteQueen->positionX;
        $y = $whiteQueen->positionY;

        while($x <= 8 || $y <= 8){
            $x++;
            $y++;
            if($blackQueen->positionX == $x && $blackQueen->positionY == $y){
                $canAttack = true;
                break;
            }
        }

        //lower-left diagonal
        $x = $whiteQueen->positionX;
        $y = $whiteQueen->positionY;

        while($x >= 1 || $y <= 8){
            $x--;
            $y++;
            if($blackQueen->positionX == $x && $blackQueen->positionY == $y){
                $canAttack = true;
                break;
            }
        }

        //upper_right diagonal
        $x = $whiteQueen->positionX;
        $y = $whiteQueen->positionY;

        while($x <= 8 || $y >= 1){
            $x++;
            $y--;
            if($blackQueen->positionX == $x && $blackQueen->positionY == $y){
                $canAttack = true;
                break;
            }
        }

        return $canAttack;
    }

}