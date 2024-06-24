#!/etc/env php
<?php

    class Category {
        public function index() {
            $json = file_get_contents('categories.json');
            $categories = json_decode($json,true);
            foreach($categories as $key=>$category) {
                if($key==0) {
                    echo "ID | Type | Name ".PHP_EOL;
                }
                echo $category['id']." | ".$category['type']." | ".$category['name'].PHP_EOL;
            }
        }
    }

    $category = new Category();
    $category->index();