<?php
namespace app\controllers;

use app\forms\PersonEditForm;
use PDOException;

class PersonEditCtrl {

    private $form;

    public function __construct() {
        $this->form = new PersonEditForm();
    }

    // показать пустую форму
    public function action_personNew() {
        $this->generateView();
    }

    // заполнить форму из БД
    public function action_personEdit() {
        $id = getFromRequest('id');
        if ($id) {
            $row = getDB()->get(
                'person',
                ['idperson','name','surname','birthdate'],
                ['idperson' => $id]
            );
            $this->form->id        = $row['idperson'];
            $this->form->name      = $row['name'];
            $this->form->surname   = $row['surname'];
            $this->form->birthdate = $row['birthdate'];
        }
        $this->generateView();
    }

    // сохранить (insert/update)
    public function action_personSave() {
        $this->form->id        = getFromRequest('id');
        $this->form->name      = getFromRequest('name');
        $this->form->surname   = getFromRequest('surname');
        $this->form->birthdate = getFromRequest('birthdate');

        // простая валидация
        if (empty(trim($this->form->name)))      getMessages()->addError('Wprowadź imię');
        if (empty(trim($this->form->surname)))   getMessages()->addError('Wprowadź nazwisko');
        if (empty(trim($this->form->birthdate))) getMessages()->addError('Wprowadź datę urodzenia');
        if (getMessages()->isError()) {
            return $this->generateView();
        }

        $data = [
            'name'      => $this->form->name,
            'surname'   => $this->form->surname,
            'birthdate' => $this->form->birthdate,
        ];

        try {
            if ($this->form->id) {
                getDB()->update('person', $data, ['idperson' => $this->form->id]);
                getMessages()->addInfo('Zaktualizowano');
            } else {
                $this->form->id = getDB()->insert('person', $data);
                getMessages()->addInfo('Dodano nową osobę');
            }
        } catch (PDOException $e) {
            getMessages()->addError('Błąd zapisu');
            if (getConf()->debug) getMessages()->addError($e->getMessage());
        }

        forwardTo('personList');
    }

    // вывод формы
    public function generateView() {
        getSmarty()->assign('form', (array) $this->form);
        getSmarty()->display('PersonEdit.tpl');
    }
}
