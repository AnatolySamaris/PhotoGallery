<?php

namespace App\Controller\Admin;

use App\Entity\Rating;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class RatingCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Rating::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield AssociationField::new('photo')->setLabel('Фотография');
        yield AssociationField::new('rater')->setLabel('Оценил');
        yield IntegerField::new('score')->setLabel('Оценка');
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Оценка')
            ->setEntityLabelInPlural('Оценки')
            ->setSearchFields(['photo', 'rater', 'score'])
        ;
    }
}
