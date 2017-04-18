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

    abstract protected function manyRequest($_n); // снятие денег со счета
    abstract protected function manyAdd($_n); // пополнение счета

    // общий конструктор класса
    public function ABallance($_b, $_p)
    {
        $this->ballance = $_b;
        $this->percent = $_p;
    }
}

class ABallanceDebet extends ABallance // дебетовый счет
{
    public function ABallanceDebet($_b, $_p)
    {
        $this->ABallance($_b, $_p);
    }

    protected function getPercent() { return $this->percent; }
    protected function getBallance() { return $this->ballance; }
    protected function setBallance($_b) { $this->ballance = $_b; }
    protected function doPercent() // добавление процентов
    {
        // TODO: Implement doPercent() method.
        $p = $this->getBallance() * $this->getPercent();
        $this->setBallance($this->getBallance() + $p);
        return $p;
    }

    public function manyRequest ($_n) // снятие денег со счета
    {
        $this->setBallance($this->getBallance() - $_n);
        $p = $this->doPercent();
        echo 'Снято: '.$_n.'; Начислено с процентами: '.$p.'; Текущий баланс: '.$this->getBallance().'<br>';
    }

    public function manyAdd($_n) // взнос денег на счет
    {
        $this->setBallance($this->getBallance() + $_n);
        $p = $this->doPercent();
        echo 'Добавлено: '.$_n.'; Начислено с процентами: '.$p.'; Текущий баланс: '.$this->getBallance().'<br>';
    }
}

class ABallanceCredit extends ABallance // кредитный счет
{
    public function ABallanceCredit($_b, $_p) // конструктор
    {
        $this->ABallance($_b, $_p);
    }

    protected function getPercent() { return $this->percent; }
    protected function getBallance() { return $this->ballance; }
    protected function setBallance($_b) { $this->ballance = $_b; }
    protected function doPercent() // снятие процентов
    {
        // TODO: Implement doPercent() method.
        $p = $this->getBallance() * $this->getPercent();
        $this->setBallance($this->getBallance() - $p);
        return $p;
    }

    public function manyRequest ($_n) // снятие денег со счета
    {
        $this->setBallance($this->getBallance() - $_n);
        $p = $this->doPercent();
        echo 'Снято: '.$_n.'; Списано с процентами: '.$p.'; Текущий баланс: '.$this->getBallance().'<br>';
    }

    public function manyAdd($_n) // взнос денег на счет
    {
        $this->setBallance($this->getBallance() + $_n);
        $p = $this->doPercent();
        echo 'Добавлено: '.$_n.'; Списано с процентами: '.$p.'; Текущий баланс: '.$this->getBallance().'<br>';
    }
}

// делаем разметку
echo '<html><head><title>Abstract Ballance</title></head><body>';

$bDebet = new ABallanceDebet(5000, 0.005);
echo $bDebet->manyAdd(500);
echo $bDebet->manyRequest(500);
echo '<br>';
$bCredit = new ABallanceCredit(5000, 0.05);
echo $bCredit->manyAdd(500);
echo $bCredit->manyRequest(500);

// завершаем разаметку
echo '</body></html>';