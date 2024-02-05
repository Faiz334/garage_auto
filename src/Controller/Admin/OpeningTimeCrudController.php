<?php

namespace App\Controller\Admin;

use App\Entity\OpeningTime;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;

class OpeningTimeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return OpeningTime::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('jour'),
            TimeField::new('ouverture')->setFormat('HH:mm'),
            TimeField::new('fermeture')->setFormat('HH:mm'),
        ];
    }
    
}
