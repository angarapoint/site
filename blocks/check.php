<?php
//создаем класс с одной переменной и тремя методами для разных типов макадрессов
        class Processor
        {

            public function myMethod_00($sercMac)
            {
                $mac = trim($sercMac, " ");
                $mac = str_replace("-", "", $mac);          //Вырезать(заменить ничем) в маке все '-', получится набор из одних чисел
                $mac = str_replace(":", "", $mac);           //Вырезать(заменить ничем) в маке все ':', получится набор из одних чисел
                return $mac;
            }

            public function myMethod1($sercMac)
            {
                $mac = $this->myMethod_00($sercMac);
                $mac = chunk_split($mac, 2, ':');             //Вставить через каждый второй символ ':'
                $mac = trim($mac, ":");                        //Обрезать лишние вставленные ':' в начале и конце строки
                echo $mac;                                    //Вывести результат на экран
            }

            public function myMethod2($sercMac)
            {
                $mac = $this->myMethod_00($sercMac);
                $mac = chunk_split($mac, 2, '-');            //Вставить через каждый второй символ '-'
                $mac = trim($mac, "-");                      //Обрезать лишние вставленные '-' в начале и конце строки
                echo $mac;
            }

            public function myMethod3($sercMac)
            {
                $mac = $this->myMethod_00($sercMac);
                $mac = chunk_split($mac, 4, '-');            //Вставить через каждый четвертый символ '-'
                $mac = trim($mac, "-");                      //Обрезать лишние вставленные '-' в начале и конце строки
                echo $mac;
            }
        }

        //Присваиваем переменным значения из Post запроса			
        $macSerc = $_POST["mac1"];
        $vidMac = $_POST["macaddress"]["0"];

        //Создаем объект класса Processor
        $raschet = new Processor();
        //В зависимости от вида мака в Post запросе вызываем процедуру обработки
        if (isset($macSerc) && $vidMac == "mac01") {
            $raschet->myMethod1($macSerc);
        } elseif (isset($macSerc) && $vidMac == "mac02") {
            $raschet->myMethod2($macSerc);
        } elseif (isset($macSerc) && $vidMac == "mac03") {
            $raschet->myMethod3($macSerc);
        }
        // echo '<pre>';
        // print_r($_POST); 
        // echo '</pre>';
        ?>