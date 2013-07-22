<?php
class XML_Form extends CFormModel
{
    /*Makes anything into a string
     *Good for turning object into string and returning
     *that value to a variable
     */
    public function _toString($too)
    {
            return "$too";
    }
}