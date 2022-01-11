<?php

declare(strict_types=1);

namespace ZdenekZahor\BmCalculator\Web\Controls\LoginControl;

use Nette\Application\UI\Control;
use Nette\Application\UI\Form;
use Nette\Security\AuthenticationException;
use Nette\Security\User;

class LoginControl extends Control
{
    private User $user;

    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function render(): void
    {
        $this->template->render(__DIR__ . '/LoginControl.latte');
    }

    protected function createComponentForm(): Form
    {
        $form = new Form();
        $form->addText('name', 'Jméno:');
        $form->addPassword('password', 'Heslo:');
        $form->addSubmit('send', 'Přihlásit')->getControlPrototype()->setAttribute('class', 'btn btn-primary');
        $form->onSuccess[] = [$this, 'formSucceeded'];
        return $form;
    }

    public function formSucceeded(Form $form, $data): void
    {
        try {
            $this->user->login($data->name, $data->password);
            $this->flashMessage('Byl jste úspěšně přihlášen.');
            $this->getPresenter()->redirect(':Front:Homepage:default');
        } catch (AuthenticationException $e) {
            $form->addError('Uživatelské jméno nebo heslo je nesprávné');
        }
    }
}
