<?php
/**
 * Created by PhpStorm.
 * User: blood
 * Date: 1/3/2018
 * Time: 1:01 AM
 */

require_once('Board.php');
require_once('Piece.php');
require_once('Referee.php');

class ChessTest extends PHPUnit_Framework_TestCase
{
    public function testCheckIfQueenCanAttackSameRowGoodCase(){
        $whiteQueen = new Piece();
        $blackQueen = new Piece();

        $whiteQueen->setPositionX(7);
        $whiteQueen->setPositionY(5);
        $blackQueen->setPositionX(7);
        $blackQueen->setPositionY(3);

        //On this test, the chess board should look like this:
        // _  _  _  _  _  _  _  _
        // _  _  _  _  _  _  _  _
        // _  _  _  _  _  _  _  _
        // _  _  _  _  _  _  _  _
        // _  _  _  _  _  _  _  _
        // _  _  _  _  _  _  _  _
        // _  _ B _ W _  _  _
        // _  _  _  _  _  _  _  _

        //So the expected response is: TRUE, THEY CAN ATTACK EACH OTHER.
        $expectedResponse = true;


        $board = new Board($whiteQueen, $blackQueen);

        $referee = new Referee();

        $response = $referee->checkIfQueensCanAttackEachOther($board, $whiteQueen, $blackQueen);

        $this->assertEquals($expectedResponse, $response);
    }

    public function testCheckIfQueenCanAttackSameRowBadCase(){
        $whiteQueen = new Piece();
        $blackQueen = new Piece();

        $whiteQueen->setPositionX(7);
        $whiteQueen->setPositionY(5);
        $blackQueen->setPositionX(6);
        $blackQueen->setPositionY(3);

        //On this test, the chess board should look like this:
        // _  _  _  _  _  _  _  _
        // _  _  _  _  _  _  _  _
        // _  _  _  _  _  _  _  _
        // _  _  _  _  _  _  _  _
        // _  _  _  _  _  _  _  _
        // _  _ B _  _  _  _  _
        // _  _  _  _ W _  _  _
        // _  _  _  _  _  _  _  _
        //So the expected response is: FALSE, THEY CAN'T ATTACK EACH OTHER.
        $expectedResponse = false;


        $board = new Board($whiteQueen, $blackQueen);

        $referee = new Referee();

        $response = $referee->checkIfQueensCanAttackEachOther($board, $whiteQueen, $blackQueen);

        $this->assertEquals($expectedResponse, $response);
    }

    public function testCheckIfQueenCanAttackSameColumnGoodCase(){
        $whiteQueen = new Piece();
        $blackQueen = new Piece();

        $whiteQueen->setPositionX(3);
        $whiteQueen->setPositionY(5);
        $blackQueen->setPositionX(8);
        $blackQueen->setPositionY(5);

        //On this test, the chess board should look like this:
        // W _  _  _  _  _  _  _
        // _  _  _  _  _  _  _  _
        // _  _  _  _  _  _  _  _
        // _  _  _  _  _  _  _  _
        // _  _  _  _  _  _  _  _
        // _  _  _  _  _  _  _  _
        // _  _  _  _  _  _  _  _
        // _  _  _  _  _  _  _ B

        //So the expected response is: TRUE, THEY CAN ATTACK EACH OTHER.
        $expectedResponse = true;


        $board = new Board($whiteQueen, $blackQueen);

        $referee = new Referee();

        $response = $referee->checkIfQueensCanAttackEachOther($board, $whiteQueen, $blackQueen);

        $this->assertEquals($expectedResponse, $response);
    }

    public function testCheckIfQueenCanAttackSameColumnBadCase(){
        $whiteQueen = new Piece();
        $blackQueen = new Piece();

        $whiteQueen->setPositionX(2);
        $whiteQueen->setPositionY(1);
        $blackQueen->setPositionX(6);
        $blackQueen->setPositionY(6);

        //On this test, the chess board should look like this:
        //So the expected response is: FALSE, THEY CAN'T ATTACK EACH OTHER..
        $expectedResponse = false;


        $board = new Board($whiteQueen, $blackQueen);

        $referee = new Referee();

        $response = $referee->checkIfQueensCanAttackEachOther($board, $whiteQueen, $blackQueen);

        $this->assertEquals($expectedResponse, $response);
    }

    public function testCheckIfQueenCanAttackSameDiagonalGoodCase(){
        $whiteQueen = new Piece();
        $blackQueen = new Piece();

        $whiteQueen->setPositionX(1);
        $whiteQueen->setPositionY(1);
        $blackQueen->setPositionX(8);
        $blackQueen->setPositionY(8);

        //On this test, the chess board should look like this:
        // W _  _  _  _  _  _  _
        // _  _  _  _  _  _  _  _
        // _  _  _  _  _  _  _  _
        // _  _  _  _  _  _  _  _
        // _  _  _  _  _  _  _  _
        // _  _  _  _  _  _  _  _
        // _  _  _  _  _  _  _  _
        // _  _  _  _  _  _  _ B
        //So the expected response is: TRUE, THEY CAN ATTACK EACH OTHER.
        $expectedResponse = true;


        $board = new Board($whiteQueen, $blackQueen);

        $referee = new Referee();

        $response = $referee->checkIfQueensCanAttackEachOther($board, $whiteQueen, $blackQueen);

        $this->assertEquals($expectedResponse, $response);
    }

    public function testCheckIfQueenCanAttackSameDiagonalBadCase(){
        $whiteQueen = new Piece();
        $blackQueen = new Piece();

        $whiteQueen->setPositionX(2);
        $whiteQueen->setPositionY(1);
        $blackQueen->setPositionX(7);
        $blackQueen->setPositionY(8);

        //On this test, the chess board should look like this:
        // _  _  _  _  _  _  _  _
        //W _  _  _  _  _  _  _
        // _  _  _  _  _  _  _  _
        // _  _  _  _  _  _  _  _
        // _  _  _  _  _  _  _  _
        // _  _  _  _  _  _  _  _
        // _  _  _  _  _  _  _ B
        // _  _  _  _  _  _  _  _
        //So the expected response is: FALSe, THEY CAN'T ATTACK EACH OTHER.
        $expectedResponse = false;


        $board = new Board($whiteQueen, $blackQueen);

        $referee = new Referee();

        $response = $referee->checkIfQueensCanAttackEachOther($board, $whiteQueen, $blackQueen);

        $this->assertEquals($expectedResponse, $response);
    }

}