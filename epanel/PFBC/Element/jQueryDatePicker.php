<?php

class Element_jQueryDatePicker extends Element_Textbox {

    protected $_attributes = array("type" => "text", "data-field" => "date", "data-format" => "dd-MM-yyyy");

    public function render() {
        $this->validation[] = new Validation_Date;
        parent::render();
    }

}
