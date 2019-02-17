<?php
class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
$a1 = new A();//создан экземпляр класса А. ничего не выводится
$a2 = new A();// создан еще один экземпляр класса А. снова ничего не выводится
$a1->foo();// запущен метод foo в экземпляре а1. в этом методе объявляется статическая переменная х, далее префиксный инкремент и вывод. Выведется 1
$a2->foo();//запущен метод foo в а2. при выполнении инструкции выполняется поиск переменной а, т.к. она была создана шагом ранее, эта инструкция будет проигнорирована, выведется 2
$a1->foo();//аналогично предыдущему пункту, выведется 3
$a2->foo();//аналогично предыдущему пункту, выведется 4