<?php

/**
 * Created by PhpStorm.
 * User: Roman
 * Date: 17.04.2017
 * Time: 15:41
 */
class Rectangle
{
    public $x1; // x левой нижней точки
    public $y1; // y левой нижней точки
    public $x2; // x правой верхней точки
    public $y2; // y правой верхней точки

    public function Rectangle($_x1, $_y1, $_x2, $_y2)
    { // инициализируем координаты (конструктор)
        $this->x1 = $_x1;
        $this->y1 = $_y1;
        $this->x2 = $_x2;
        $this->y2 = $_y2;
    }

    // двигаем на _x по оси Y и на _y по оси Y
    public function Move($_x, $_y)
    {
        $this->x1 += $_x;
        $this->y1 += $_y;
        $this->x2 += $_x;
        $this->y2 += $_y;
    }

    // проверяем находится ли точка (_x;_y) в пределах прямоугольника
    public function isPointIntoRectangle($_x, $_y)
    {
        if(($_x >= $this->x1) && ($_x <= $this->x2) && ($_y >= $this->y1) && ($_y <= $this->y2))
        { return  "да, точка (".$_x.";".$_y.") лежит внутри прямоугольника.";}
        else
        { return "нет, точка (".$_x.";".$_y.") не лежит внутри прямоугольника.";}
    }

    // возвращает общий многоугольник
    public static function unionOfRectangles($_r1, $_r2)
    {
        $_r = new Rectangle($_r1->x1, $_r1->y1, $_r2->x2, $_r2->y2);
        return $_r;
    }

    // возвращает пересечение многоугольников
    public static function intersectOfRectangles($_r1, $_r2)
    {
        $_r = new Rectangle($_r1->x2, $_r1->y2, $_r2->x1, $_r2->y1);
        return $_r;
    }

    // вывод координат точек
    public function toString()
    { return '('.$this->x1.';'.$this->y1.')-('.$this->x2.';'.$this->y2.')'; }
}

// делаем разметку
echo '<html><head><title>Rectangle</title></head><body>';

$first = new Rectangle(1,1,5,5);
echo 'первый '.$first->toString().'<br>';
$second = new Rectangle(3,3,10,10);
echo 'второй '.$second->toString().'<br>';

$third = Rectangle::unionOfRectangles($first, $second);
echo 'общий '.$third->toString().'<br>';
$fours = Rectangle::intersectOfRectangles($first, $second);
echo 'пересечение '.$fours->toString().'<br>';

$first->Move(2,4);
echo 'двигаем '.$first->toString().'<br>';

// проверяем принадлежность точек прямоугольнику
echo $second->isPointIntoRectangle(4,4).' '.$second->toString().'<br>';
echo $second->isPointIntoRectangle(12,12).' '.$second->toString().'<br>';

// завершаем разаметку
echo '</body></html>';
