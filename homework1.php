<?php

class Cat
{

    public $name;
    protected $place;
    private $price;

    const NAME = '猫猫';

    //构造方法
    public function __construct($name,$place,$price)
    {
        $this->name = $name;//$this伪变量，访问非静态成员
        $this->place = $place;
        $this->price = $price;
    }

    public function getPlace()
    {
        $res = $this->place;
        if ($this->name == 'kitty') {
            $res = '人造猫还有祖籍？别逗了';
        }
        return $res;
    }

    public function getPrice()
    {
        $res = $this->price;
        if ($this->name == 'kitty') {
            $res = '不详';
        }
        return $res;
    }

    private function helloKitty($a){
        echo $a.self::NAME,"<br>";//self用作类中引用类名
        // self后面必须使用范围解析符::(双冒号)来访问类公共成员(如类常量和静态成员)
    }

    public function getHello($b='你好！'){
        $this->helloKitty($b);
    }
}

$cat_1 = new Cat('美短','美国',2000);
echo '姓名:', $cat_1->name, '<br>';
echo '祖籍:', $cat_1->getPlace(), '<br>';//私有变量访问接口
echo '售价:', $cat_1->getPrice(), '<br>';
$cat_2 = new Cat('kitty','美国',2000);
echo '姓名:', $cat_2->name, '<br>';
echo '祖籍:', $cat_2->getPlace(), '<br>';
echo '售价:', $cat_2->getPrice(), '<br>';

// echo $cat_2->helloKitty(); 私有方法无法访问
echo $cat_2->getHello();//私有方法访问接口
echo $cat_2->getHello('好棒！');