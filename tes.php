<?php
// interface Animal
// {
//     public function makeSound();
// }

// class Cat implements Animal
// {
//     public function makeSound()
//     {
//         echo "Meow";
//     }
// }


// class Cat2
// {
//     private $interactor;

//     public function __construct(Animal $interacto)
//     {
//         $this->interactor = $interacto;
//     }

//     public function tes()
//     {
//         echo '/nada';
//         return $this->interactor->makeSound();
//     }
// }


// $b = new Cat();
// $a = new Cat2($b);
// $a->tes();


interface Animal
{
    public function makeSound();
}

class Cat implements Animal
{
    public function makeSound()
    {
        echo "Meow";
    }
}


class Cat2 extends Cat
{
    private $interactor;

    public function __construct(Animal $interacto)
    {
        $this->interactor = $interacto;
    }

    public function tes()
    {
        $this->makeSound();
        echo '/nada';
        return    $this->interactor->makeSound();
    }
}


$b = new Cat();
$a = new Cat2($b);
$a->tes();
