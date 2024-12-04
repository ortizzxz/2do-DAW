<?php
    namespace Lib;

    class Pages{

        public function render(string $pageName, array $params = null): void{
            if($params != null){
                foreach($params as $name => $value){
                    $$name = $value;
                }
            }

            require_once "./src/views/layout/header.php";
            require_once "./src/views/$pageName.php";
            require_once "./src/views/layout/footer.php";
        }
    }

?>