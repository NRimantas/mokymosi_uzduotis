<?php

namespace App\DataFixtures;

use App\Entity\ProjectTool;
use App\Entity\ToolMeasure;
use DateTimeImmutable;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $projectTool = new ProjectTool();
        $projectTool->setTitle('Saulės');
        $projectTool->setCreatedAt(new DateTimeImmutable());
        $manager->persist($projectTool);

        $toolMeasure = new ToolMeasure();
        $toolMeasure->setTitle('Saulės priemonė 1');
        $toolMeasure->setPricePerUnit(1000);
        $toolMeasure->setProjectTool($projectTool);
        $toolMeasure->setCreatedAt(new DateTimeImmutable());
        $manager->persist($toolMeasure);

        $toolMeasure1 = new ToolMeasure();
        $toolMeasure1->setTitle('Saulės priemonė 2');
        $toolMeasure1->setPricePerUnit(2000);
        $toolMeasure1->setProjectTool($projectTool);
        $toolMeasure1->setCreatedAt(new DateTimeImmutable());
        $manager->persist($toolMeasure1);

        //
        $projectTool1 = new ProjectTool();
        $projectTool1->setTitle('Vėjo');
        $projectTool1->setCreatedAt(new DateTimeImmutable());
        $manager->persist($projectTool1);

        $toolMeasure2 = new ToolMeasure();
        $toolMeasure2->setTitle('Vėjo priemonė 1');
        $toolMeasure2->setPricePerUnit(3000);
        $toolMeasure2->setProjectTool($projectTool1);
        $toolMeasure2->setCreatedAt(new DateTimeImmutable());
        $manager->persist($toolMeasure2);

        // //

        $projectTool2 = new ProjectTool();
        $projectTool2->setTitle('Geoterminės energijos priemonė');
        $projectTool2->setCreatedAt(new DateTimeImmutable());
        $manager->persist($projectTool2);

        $toolMeasure3 = new ToolMeasure();
        $toolMeasure3->setTitle('Geoterminės energijos priemonė 1');
        $toolMeasure3->setPricePerUnit(4000);
        $toolMeasure3->setCreatedAt(new DateTimeImmutable());
        $toolMeasure3->setProjectTool($projectTool2);
        $manager->persist($toolMeasure3);

        // //

        $projectTool3 = new ProjectTool();
        $projectTool3->setTitle('Biokuro');
        $projectTool3->setCreatedAt(new DateTimeImmutable());
        $manager->persist($projectTool3);

        $toolMeasure4 = new ToolMeasure();
        $toolMeasure4->setTitle('Biokuro priemonė 1');
        $toolMeasure4->setPricePerUnit(6000);
        $toolMeasure4->setProjectTool($projectTool3);
        $toolMeasure4->setCreatedAt(new DateTimeImmutable());
        $manager->persist($toolMeasure4);

        $toolMeasure5 = new ToolMeasure();
        $toolMeasure5->setTitle('Biokuro priemonė 2');
        $toolMeasure5->setPricePerUnit(7000);
        $toolMeasure5->setProjectTool($projectTool3);
        $toolMeasure5->setCreatedAt(new DateTimeImmutable());
        $manager->persist($toolMeasure5);

        $toolMeasure6 = new ToolMeasure();
        $toolMeasure6->setTitle('Biokuro priemonė 3');
        $toolMeasure6->setPricePerUnit(8000);
        $toolMeasure6->setProjectTool($projectTool3);
        $toolMeasure6->setCreatedAt(new DateTimeImmutable());
        $manager->persist($toolMeasure6);

        $manager->flush();
    }
}
