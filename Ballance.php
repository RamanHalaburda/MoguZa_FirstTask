<?php

/**
 * Created by PhpStorm.
 * User: Roman
 * Date: 17.04.2017
 * Time: 23:01
 */
class Ballance
{
    public $ballance; // баланс
    private static $limitAdd = 500; // ограничение пополнение
    private static $limitCharge = 800; // ограничение снятия о счёта

    public function Ballance($_b)
    {
        $this->ballance = $_b; // баланс
    }

    public function getBallance() { return $this->ballance; } // вывести баланс
    public function setBallance($_b) { $this->ballance = $_b; } // задать баланс
    public function getLimitAdd() { return self::$limitAdd; } // вывести баланс
    public function getlimitCharge() { return self::$limitCharge; } // вывести баланс

    public function manyRequest ($_n) // снятие денег со счета
    {
        $temp = $_n;
        echo 'Снимаем '.$temp.'$...<br>';
        for($i = 0; $temp >= 0; ++$i)
        {
            /** @var для изменения суммы снятых денег $temp */
            if($temp > $this->getLimitCharge())
            {
                echo 'снято '.$this->getLimitCharge().'$<br>';
                $temp = $temp - $this->getLimitCharge();
                $this->setBallance( $this->getBallance() - $this->getlimitCharge() );
                if($this->getBallance() < 0) { $this->setBallance(0); break; }
            }
            else
            {
                echo 'снято '.$temp.'$<br>';
                $this->setBallance( $this->getBallance() - $temp );
                echo 'Итого за '.($i + 1).' раз(а)!<br><br>';
                if($this->getBallance() < 0) { $this->setBallance(0); break; }
                break;
            }
        }
    }

    public function manyAdd($_n) // взнос денег на счет
    {
        $temp = $_n;
        echo 'Пополняем  на '.$temp.'$...<br>';
        for($i = 0; $temp >= 0; ++$i)
        {
            /** @var для изменения суммы пополняемых денег $temp */
            if($temp > $this->getLimitAdd())
            {
                echo 'поплнено на '.$this->getLimitAdd().'$<br>';
                $temp = $temp - $this->getLimitAdd();
                $this->setBallance( $this->getBallance() + $this->getlimitAdd() );
                if($this->getBallance() < 0) { $this->setBallance(0); break; }
            }
            else
            {
                echo 'пополнено на '.$temp.'$<br>';
                $this->setBallance( $this->getBallance() + $temp );
                echo 'Итого за '.($i + 1).' раз(а)!<br><br>';
                if($this->getBallance() < 0) { $this->setBallance(0); break; }
                break;
            }
        }
    }
}

// делаем разметку
echo '<html><head><title>Rectangle</title></head><body>';

$b = new Ballance(5000);

$b->manyRequest(300);
$b->manyRequest(900);
$b->manyRequest(1200);

echo $b->getBallance().'<br><br>';

$b->manyAdd(900);
$b->manyRequest(900);echo $b->getBallance().'<br><br>';
$b->manyAdd(1300);
$b->manyRequest(1300);echo $b->getBallance().'<br><br>';
$b->manyAdd(1700);
$b->manyRequest(1700);echo $b->getBallance().'<br><br>';

// завершаем разаметку
echo '</body></html>';