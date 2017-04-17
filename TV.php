<?php

/**
 * Created by PhpStorm.
 * User: Roman
 * Date: 16.04.2017
 * Time: 23:04
 */
class TV
{
    public $runned; // состояние
    public $maxChannel; // максимальный канал
    public $currentChannel; // текущий канал
    public $currentVolume; // текущая громкость

    // включаем
    public function Run() // включаем
    { $this->runned = true; }

    // выключаем
    public function Stop() // выключаем
    { $this->runned = false; $this->currentVolume = 0; $this->currentChannel = 0;}

    public function TV($_maxChannel)
    { // заглушка (конструктор)
        $this->runned = false;
        $this->maxChannel = $_maxChannel;
        $this->currentChannel = 0;
        $this->currentVolume = 0;
    }

    public function setChannel($_currentChannel)
    { // устнавливаем текущий канал
        if($_currentChannel > 0 && $_currentChannel <= $this->maxChannel)
        {
            $this->currentChannel = $_currentChannel;
        }
    }

    public function  setVolume($_currentVolume)
    { // устанавливаем текущую громкость
        if($_currentVolume >= 0 && $_currentVolume <= 100)
        {
            $this->currentVolume =  $_currentVolume;
        }
    }

    public function  setState($_state)
    {  // устанавливаем состояние (вкл/выкл)
        $this->runned = $_state;
    }

    public function  getCurrentChannel()
    {  // смотрим текущий канал
        return $this->currentChannel;
    }

    public function  getCurrentVolume()
    {  // смотрим текущую громкость
        return $this->currentVolume;
    }

    public function getState()
    {
        if($this->runned) { return " включён "; } else { return " выключен "; }
    }
}

// инициализируем
$big = new TV(100);
$small = new TV(6);

// включаем
$big->setState(true);
$small->setState(true);

// устанавливаем текущий канал
$big->setChannel(27);
$small->setChannel(5);

// устанавливаем громкость
$big->setVolume(50);
$small->setVolume(25);

// делаем разметку
echo '<html><head><title>TV</title></head><body>';

// выводим текущие состояния
echo '<h4>BIG: ',$big->getState(),',сейчас канал: ',$big->getCurrentChannel(),' из ',$big->maxChannel,', звук ',$big->getCurrentVolume(),'</h4><br>';
echo '<h4>SMALL: ',$small->getState(),',сейчас канал: ',$small->getCurrentChannel(),' из ',$small->maxChannel,', звук ',$small->getCurrentVolume(),'</h4><br>';
echo '<hr>';

// меняем состояния
$big->setChannel(90);
$small->setChannel(1);
$big->setVolume(90);
$small->setVolume(1);

// выводим текущие состояния
echo '<h4>BIG: ',$big->getState(),',сейчас канал: ',$big->getCurrentChannel(),' из ',$big->maxChannel,', звук ',$big->getCurrentVolume(),'</h4><br>';
echo '<h4>SMALL: ',$small->getState(),',сейчас канал: ',$small->getCurrentChannel(),' из ',$small->maxChannel,', звук ',$small->getCurrentVolume(),'</h4><br>';
echo '<hr>';

// выключаем
$big->Stop();
$small->Stop();

// выводим текущие состояния
echo '<h4>BIG: ',$big->getState(),',сейчас канал: ',$big->getCurrentChannel(),' из ',$big->maxChannel,', звук ',$big->getCurrentVolume(),'</h4><br>';
echo '<h4>SMALL: ',$small->getState(),',сейчас канал: ',$small->getCurrentChannel(),' из ',$small->maxChannel,', звук ',$small->getCurrentVolume(),'</h4><br>';
echo '<hr>';

// завершаем разаметку
echo '</body></html>';
