<?php

namespace App\Controller\Admin;

use App\Entity\Cloth;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ClothCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Cloth::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('name'),
            ArrayField::new('color'),
            TextField::new('home'),
            DateField::new('createdAt'),
        ];
    }
}
