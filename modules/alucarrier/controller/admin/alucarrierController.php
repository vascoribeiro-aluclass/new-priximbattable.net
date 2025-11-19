<?php
class AluCarrierControllerController extends ModuleAdminController
{
    public function renderList() {
        $this->content = $this->createTemplate('alucarrier.tpl')->fetch();
        return $this->content;
    }
}
?>
