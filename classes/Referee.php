<?php
/**
 * Created by PhpStorm.
 * User: blood
 * Date: 1/3/2018
 * Time: 12:48 AM
 */

class Referee
{
    public function checkIfQueensCanAttackEachOther($board, $whiteQueen, $blackQueen){


        //checking all 3 cases
        //if any of them returns true, the queens can attack each other.

        $rowAttack = $board->checkRow($whiteQueen, $blackQueen);
        $columnAttack = $board->checkColumn($whiteQueen, $blackQueen);
        $diagonalAttack = $board->checkDiagonal($whiteQueen, $blackQueen);

        if ($rowAttack || $columnAttack || $diagonalAttack){
            return true;
        }else{
            return false;
        }
    }
}