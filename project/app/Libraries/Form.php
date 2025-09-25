<?php
class Form {
    private $action;
    private $method;
    private $elements = [];

    public function __construct($action, $method="POST") {
        $this->action = $action;
        $this->method = $method;
    }

    public function addText($name, $label) {
        $this->elements[] = "<label>$label</label><br><input type='text' name='$name'><br><br>";
    }

    public function addPassword($name, $label) {
        $this->elements[] = "<label>$label</label><br><input type='password' name='$name'><br><br>";
    }

    public function addRadio($name, $label, $options=[]) {
        $html = "<label>$label</label><br>";
        foreach ($options as $val => $text) {
            $html .= "<input type='radio' name='$name' value='$val'> $text ";
        }
        $this->elements[] = $html . "<br><br>";
    }

    public function addCheckbox($name, $label, $options=[]) {
        $html = "<label>$label</label><br>";
        foreach ($options as $val => $text) {
            $html .= "<input type='checkbox' name='$name' value='$val'> $text ";
        }
        $this->elements[] = $html . "<br><br>";
    }

    public function addSelect($name, $label, $options=[]) {
        $html = "<label>$label</label><br><select name='$name'>";
        foreach ($options as $val => $text) {
            $html .= "<option value='$val'>$text</option>";
        }
        $html .= "</select><br><br>";
        $this->elements[] = $html;
    }

    public function addTextarea($name, $label) {
        $this->elements[] = "<label>$label</label><br><textarea name='$name'></textarea><br><br>";
    }

    public function addSubmit($label="Submit") {
        $this->elements[] = "<input type='submit' value='$label'>";
    }

    public function render() {
        echo "<form action='{$this->action}' method='{$this->method}'>";
        foreach ($this->elements as $el) echo $el;
        echo "</form>";
    }
}
