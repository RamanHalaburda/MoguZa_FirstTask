<?php

/**
 * Created by PhpStorm.
 * User: Roman
 * Date: 18.04.2017
 * Time: 3:08
 */
interface IBallance
{
    const creditPercent = 6 * 0.01; // константа кредитного процента
    const debetPercent = 0.6 * 0.01; // константа дебетового процента

    public function doPercent(); // отнять/прибавить процент к имеющемуся счёту
    public function getBallance(); // вывести баланс
    public function setBallance($_b); // задать баланс

    public function manyRequest($_n); // снятие денег со счета
    public function manyAdd($_n); // пополнение счета
}

class IBallanceDebet implements IBallance
{
    private $ballance;

    // конструктр класса
    public function IBallanceDebet($_b)
    {
        $this->ballance = $_b;
    }

    public function doPercent() // отнять/прибавить процент к имеющемуся счёту
    {
        $p = $this->getBallance() * IBallance::debetPercent;
        $this->setBallance($this->getBallance() + $p);
        return $p;
    }
    public function getBallance() // вывести баланс
    { return $this->ballance; }
    public function setBallance($_b) // задать баланс
    { $this->ballance = $_b; }

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

class IBallanceCredit implements IBallance
{
    private $ballance;

    // конструктр класса
    public function IBallanceCredit($_b)
    {
        $this->ballance = $_b;
    }

    public function doPercent() // отнять/прибавить процент к имеющемуся счёту
    {
        $p = $this->getBallance() * IBallance::creditPercent;
        $this->setBallance($this->getBallance() - $p);
        return $p;
    }
    public function getBallance() // вывести баланс
    { return $this->ballance; }
    public function setBallance($_b) // задать баланс
    { $this->ballance = $_b; }

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
echo '<html><head><title>Interface Ballance</title></head><body>';

$bDebet = new IBallanceDebet(5000);
echo $bDebet->manyAdd(500);
echo $bDebet->manyRequest(500);
echo '<br>';
$bCredit = new IBallanceCredit(5000);
echo $bCredit->manyAdd(500);
echo $bCredit->manyRequest(500);

// завершаем разаметку
echo '</body></html>';