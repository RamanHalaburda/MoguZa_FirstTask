<?php

/**
 * Created by PhpStorm.
 * User: Roman
 * Date: 17.04.2017
 * Time: 21:11
 */

class Point
{ // класс для системы координат (x,y)
    public $x; // первая ось
    public $y; // вторая ось

    // конструктор (инициализатор)
    public function Point($_x,$_y)
    {
        $this->x = $_x;
        $this->y = $_y;
    }
}

// класс круг наслудет от класса Точка точку (x;y)
class Circle extends Point
{
    public $r; // радиус

    // конструктор (инициализатор)
    public function Circle($_x, $_y, $_r)
    {
        $this->x = $_x;
        $this->y = $_y;
        $this->r = $_r;
    }

    // получаем расстояние между точкой (_x,_y) и центром круга
    public function getLengthToCenter($_p)
    {
        return sqrt(pow($this->x - $_p->x,2) + pow($this->y - $_p->y,2));
    }

    // проверяем принадлежность точки (_x,_y) кругу
    public function isPointIntoCircle($_p)
    {
        if($this->getLengthToCenter($_p) <= $this->r)
        { return  "да, точка (".$_p->x.";".$_p->y.") лежит внутри круга.";}
        else
        { return "нет, точка (".$_p->x.";".$_p->y.") не лежит внутри круга.";}
    }
}

// делаем разметку
echo '<html><head><title>Rectangle</title></head><body>';

// объект класса Circle (центр в точку (0;0), радиус 5)
$circle = new Circle(0,0,5);

// массив точек
$points = array();
$dim = array_push($points,
    new Point( 1, 1),
    new Point(-1, 1),
    new Point( 1,-1),
    new Point(-1,-1),
    new Point( 4, 4),
    new Point(-4,-4),
    new Point( 3, 3),
    new Point( 3, 3),
    new Point( 1, 5),
    new Point( 5, 1));

// выводим радиус
echo 'радиус = '.$circle->r.'<br>';
// цикл с вызовом каждой точки
for($i = 0; $i < $dim; $i++)
{
    // вызов метода класса Circle для определения принадлежности точки кругу
    echo $circle->isPointIntoCircle($points[$i]).'<br>';
}

// завершаем разаметку
echo '</body></html>';