# Chess
Tech test for Nisum Technologies.

# How to play
Just use the following command (assuming php is on your `$path`):

`php chess.php`

You will get the following:

`Enter White Queen's position (X,Y): `

So just write where you want the white queen to be and then press enter.

Example: 

`Enter White Queen's position (X,Y): 5,6`


Same thing with the black queen.

The app will tell you if they can attack each other or not.
# How to run unit tests

Use the following command:

`phpunit tests/chessTest.php`

You should get the following:

```PHP
 PHPUnit 3.7.21 by Sebastian Bergmann.
 ......
 
 Time: 0 seconds, Memory: 2.00Mb
 
 OK (6 tests, 6 assertions)
 
```

If you get OK at the end, we are good to go!