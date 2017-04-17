<?php

/**
 * Created by PhpStorm.
 * User: Roman
 * Date: 16.04.2017
 * Time: 21:39
 */
class Point2D
{ // класс для системы координат (x,y)
    public $x; // первая ось
    public $y; // вторая ось

    // конструктор (инициализатор)
    public function Point2D($_x,$_y)
    {
        $this->x = $_x;
        $this->y = $_y;
    }

    // получаем длинну до точки (0,0)
    public function getLength()
    {
        return sqrt(pow($this->x,2) + pow($this->y,2));
    }
}

class Point3D extends Point2D // наследуется от Point2D
{ // класс для системы координат (x,y,z)
    public  $z; // третья ось

    // конструктор (инициализатор)
    public function Point3D($_x,$_y,$_z)
    {
        $this->x = $_x;
        $this->y = $_y;
        $this->z = $_z;
    }

    // получаем длинну до точки (0,0,0)
    public function getLength()
    {
        return sqrt(pow($this->x,2) + pow($this->y,2) + pow($this->z,2));
    }
}
// делаем разметку
echo '<html><head><title>TV</title></head><body>';

// точка 1
$xy1 = new Point2D(2,2);
echo '(2,2) === ',$xy1->getLength(),'<br>';
// точка 2
$xy2 = new Point2D(-2,-2);
echo '(-2,-2) === ',$xy2->getLength(),'<br>';
// точка 3
$xyz3 = new Point3D(1,1,1);
echo '(1,1,1) === ',$xyz3->getLength(),'<br>';
// точка 4
$xyz4 = new Point3D(-1,-1,-1);
echo '(-1,-1,-1) === ',$xyz4->getLength(),'<br>';

// завершаем разаметку
echo '</body></html>';