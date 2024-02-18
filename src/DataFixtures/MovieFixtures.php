<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MovieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $movie=new Movie();
        $movie->setTitle('The dark knight');
        $movie->setReleaseYear(2018);
        $movie->setDescription('this is description');
        $movie->setImagePath('https://cdn.pixabay.com/photo/2022/08/24/05/44/duck-7406987_960_720.jpg');
        $manager->persist($movie);

        $movie2=new Movie();
        $movie2->setTitle('Avengers');
        $movie2->setReleaseYear(2019);
        $movie2->setDescription('this is description 2');
        $movie2->setImagePath('https://cdn.pixabay.com/photo/2018/08/12/16/59/parrot-3601194_960_720.jpg');

        $movie2->addActor($this->getReference('actor_3'));
        $movie2->addActor($this->getReference('actor_4'));
        $manager->persist($movie2);

        $manager->flush();
    }
}
