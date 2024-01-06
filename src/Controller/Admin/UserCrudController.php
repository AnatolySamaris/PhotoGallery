<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('name')->setLabel('Имя');
        yield EmailField::new('email')->setLabel('Адрес электронной почты');
        yield TelephoneField::new('phone')->setLabel('Номер телефона');
        yield TextField::new('password')
            ->hideOnDetail()
            ->hideOnIndex()
            ->setLabel('Пароль');
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Пользователь')
            ->setEntityLabelInPlural('Пользователи')
            ->setSearchFields(['name', 'email', 'phone'])
            ->setDefaultSort(['id' => 'DESC'])
        ;
    }
}
