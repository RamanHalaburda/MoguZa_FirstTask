<?php

/**
 * Created by PhpStorm.
 * User: Roman
 * Date: 18.04.2017
 * Time: 3:10
 */

abstract class ABallance
{
    protected $ballance;
    protected $percent;

    abstract protected function getPercent(); // вывести процент
    abstract protected function doPercent(); // отнять/прибавить процент к имеющемуся счёту
    abstract protected function getBallance(); // вывести баланс
    abstract protected function setBallance($_b); // задать баланс

    // общий конструктор класса
    public function ABallance($_b, $_p)
    {
        $this->ballance = $_b;
        $this->percent = $_p;
    }
}

class ABallanceDebet extends ABallance
{
    public function ABallanceDebet($_b, $_p)
    {
        $this->ABallance($_b, $_p);
    }

    protected function getPercent() { return $this->percent; }
    protected function getBallance() { return $this->ballance; }
    protected function setBallance($_b) { $this->ballance = $_b; }
    protected function doPercent()
    {
        // TODO: Implement doPercent() method.

    }

    public function manyRequest ($_n) // снятие денег со счета
    {
        echo $this->getBallance().'  '.$this->getPercent();
    }

    public function manyAdd($_n) // взнос денег на счет
    {
        echo $this->getBallance().'  '.$this->getPercent();
    }
}

class ABallanceCredit
{

}

// делаем разметку
echo '<html><head><title>Abstract Ballance</title></head><body>';

$bDebet = new ABallanceDebet(5000, 0.5);
echo $bDebet->manyAdd(5);

// завершаем разаметку
echo '</body></html>';