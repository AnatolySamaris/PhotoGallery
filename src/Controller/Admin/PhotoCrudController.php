<?php

namespace App\Controller\Admin;

use App\Entity\Photo;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;


class PhotoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Photo::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('title')->setLabel('Название');
        yield AssociationField::new('author')->setLabel('Автор');
        yield ImageField::new('imageUrl')
            ->setBasePath('public/uploads/images')
            ->setUploadDir('public/uploads/images')
            ->hideOnIndex()
            ->setLabel('Изображение')
        ;

        $createdAt = DateField::new('createdAt')
            ->setFormTypeOptions([
                'years' => range(date('Y'), date('Y') + 5),
                'widget' => 'single_text',
            ])
            ->setFormat('d.MMMM.YYYY')
            ->setLabel('Добавлено')
        ;

        if (Crud::PAGE_EDIT === $pageName) {
            yield $createdAt->setFormTypeOption('disabled', true);
        } else {
            yield $createdAt;
        }
    }
    
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Фотография')
            ->setEntityLabelInPlural('Фотографии')
            ->setSearchFields(['title', 'author', 'createdAt'])
            ->setDefaultSort(['createdAt' => 'DESC'])
            ->setDateFormat('d MMMM YYYY')
        ;
    }
}
