<?php
require_once __DIR__ . '/CalcForm.class.php';
require_once __DIR__ . '/CalcResult.class.php';
require_once __DIR__ . '/Messages.class.php';

class CalcCtrl {
    private $form;
    private $result;
    private $messages;

    public function __construct() {
        $this->form = new CalcForm();
        $this->result = new CalcResult();
        $this->messages = new Messages();
    }

    public function getParams() {
        $this->form->loanAmount   = isset($_REQUEST['loanAmount']) ? $_REQUEST['loanAmount'] : null;
        $this->form->loanPeriod   = isset($_REQUEST['loanPeriod']) ? $_REQUEST['loanPeriod'] : null;
        $this->form->interestRate = isset($_REQUEST['interestRate']) ? $_REQUEST['interestRate'] : null;
    }

    // Валидация входных данных
    public function validate() {
        // Если параметры не заданы – просто показать форму
        if (!isset($this->form->loanAmount, $this->form->loanPeriod, $this->form->interestRate)) {
            return false;
        }

        if ($this->form->loanAmount == "") {
            $this->messages->addMessage("Nie podano kwoty kredytu");
        }
        if ($this->form->loanPeriod == "") {
            $this->messages->addMessage("Nie podano okresu kredytowania");
        }
        if ($this->form->interestRate == "") {
            $this->messages->addMessage("Nie podano oprocentowania");
        }

        if (count($this->messages->messages) != 0) return false;

        if (!is_numeric($this->form->loanAmount)) {
            $this->messages->addMessage("Kwota kredytu musi być liczbą");
        }
        if (!is_numeric($this->form->loanPeriod)) {
            $this->messages->addMessage("Okres kredytowania musi być liczbą");
        }
        if (!is_numeric($this->form->interestRate)) {
            $this->messages->addMessage("Oprocentowanie musi być liczbą");
        }

        // Дополнительные ограничения для обычного пользователя (role user)
        if (isset($_SESSION['role']) && $_SESSION['role'] === ROLE_USER) {
            if ($this->form->interestRate < 3.5) {
                $this->messages->addMessage("Dla zwykłego użytkownika oprocentowanie musi być nie mniejsze niż 3.5%");
            }
            if ($this->form->loanAmount < 1000 || $this->form->loanAmount > 350000) {
                $this->messages->addMessage("Dla zwykłego użytkownika kwota kredytu musi być między 1000 a 350000");
            }
            if ($this->form->loanPeriod < 1 || $this->form->loanPeriod > 45) {
                $this->messages->addMessage("Dla zwykłego użytkownika okres kredytowania musi być między 1 a 45 lat");
            }
        }

        return count($this->messages->messages) == 0;
    }

    // Основной метод, выполняющий расчёт кредита
    public function process() {
        $this->getParams();

        if ($this->validate()) {
            $amount = floatval($this->form->loanAmount);
            $interest = floatval($this->form->interestRate) / 100 / 12;
            $months = intval($this->form->loanPeriod) * 12;

            if ($interest == 0) {
                $payment = $amount / $months;
            } else {
                $payment = $amount * $interest / (1 - pow(1 + $interest, -$months));
            }
            $this->result->monthlyPayment = round($payment, 2);
        }

        $this->generateView();
    }

    // Генерация представления через Smarty
    public function generateView() {
        $smarty = new Smarty\Smarty();
        $smarty->setTemplateDir(_ROOT_PATH . '/templates');
        $smarty->setCompileDir(_ROOT_PATH . '/templates_c');

        // Передаём базовые переменные для шаблона
        $smarty->assign('app_url', _APP_URL);
        $smarty->assign('username', $_SESSION['username'] ?? 'Gość');
        $smarty->assign('role', $_SESSION['role'] ?? '');

        // Передаём данные формы
        $smarty->assign('loanAmount', $this->form->loanAmount);
        $smarty->assign('loanPeriod', $this->form->loanPeriod);
        $smarty->assign('interestRate', $this->form->interestRate);

        // Сообщения об ошибках
        $smarty->assign('messages', $this->messages->messages);

        // Результат расчёта
        $smarty->assign('result', $this->result->monthlyPayment);

        $smarty->display('calc.tpl');
    }
}
?>
