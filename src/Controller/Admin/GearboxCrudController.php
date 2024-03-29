<?php

namespace App\Controller\Admin;

use App\Entity\Gearbox;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

class GearboxCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Gearbox::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('boite'),
        ];
    }

}
