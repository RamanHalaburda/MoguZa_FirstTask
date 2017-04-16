<?php

/**
 * Created by PhpStorm.
 * User: Roman
 * Date: 16.04.2017
 * Time: 21:39
 */
class Point2D
{
    public $x;
    public $y;

    public function Point2D($_x,$_y)
    {
        $this->x = $_x;
        $this->y = $_y;
    }

    public function getLength()
    {
        return sqrt(pow($this->x,2) + pow($this->y,2));
    }
}

class Point3D extends Point2D
{
    public  $z;

    public function Point2D($_x,$_y,$_z)
    {
        $this->x = $_x;
        $this->y = $_y;
        $this->z = $_z;
    }

    public function getLength()
    {
        return sqrt(pow($this->x,2) + pow($this->y,2) + pow($this->z,2));
    }
}

$xy1 = new Point2D(2,2);
echo $xy1->getLength(),PHP_EOL;
$xy2 = new Point2D(-2,-2);
echo $xy2->getLength(),PHP_EOL;
$xy3 = new Point3D(1,1,1);
echo $xy3->getLength(),PHP_EOL;
$xy4 = new Point3D(-1,-1,-1);
echo $xy4->getLength(),PHP_EOL;