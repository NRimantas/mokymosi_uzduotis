<?php

namespace App\DataFixtures;

use App\Entity\ToolMeasure;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\ProjectTool;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $projectTool = new ProjectTool();
        $projectTool->setTitle('Saulės');        
        $manager->persist($projectTool);

        $toolMeasure = new ToolMeasure();
        $toolMeasure->setTitle('Saulės priemonė 1 | 1000');
        $toolMeasure->setProjectTool($projectTool);
        $manager->persist($toolMeasure);

        $toolMeasure1 = new ToolMeasure();
        $toolMeasure1->setTitle('Saulės priemonė 2 | 2000');
        $toolMeasure1->setProjectTool($projectTool);
        $manager->persist($toolMeasure1);

// 
        $projectTool1 = new ProjectTool();
        $projectTool1->setTitle('Vėjo');        
        $manager->persist($projectTool1);

        $toolMeasure2 = new ToolMeasure();
        $toolMeasure2->setTitle('Vėjo priemonė 1 | 3000');
        $toolMeasure2->setProjectTool($projectTool1);
        $manager->persist($toolMeasure2);

// 
        $projectTool2 = new ProjectTool();
        $projectTool2->setTitle('Geoterminės energijos');        
        $manager->persist($projectTool2);

        $toolMeasure3 = new ToolMeasure();
        $toolMeasure3->setTitle('Geoterminės energijos priemonė 1 | 4000');
        $toolMeasure3->setProjectTool($projectTool2);
        $manager->persist($toolMeasure3);
// 
        $projectTool3 = new ProjectTool();
        $projectTool3->setTitle('Biokuro');        
        $manager->persist($projectTool3);

        $toolMeasure4 = new ToolMeasure();
        $toolMeasure4->setTitle('Biokuro priemonė 1 | 6000');
        $toolMeasure4->setProjectTool($projectTool3);
        $manager->persist($toolMeasure4);

        $toolMeasure5 = new ToolMeasure();
        $toolMeasure5->setTitle('Biokuro priemonė 1 | 7000');
        $toolMeasure5->setProjectTool($projectTool3);
        $manager->persist($toolMeasure5);

        $toolMeasure6 = new ToolMeasure();
        $toolMeasure6->setTitle('Biokuro priemonė 1 | 8000');
        $toolMeasure6->setProjectTool($projectTool3);
        $manager->persist($toolMeasure6);

        $manager->flush();
    }
}
