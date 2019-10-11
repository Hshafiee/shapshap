<?php

function PREFIX(){
    return get_locale()."_";
}

/**
 * get_template_part in curent locale
 * 
 * @param $Template_DIR  | Template Directori
 * @param $Template_FILE | Template File
 */
function TEMPLATE($Template_DIR,$Template_FILE){
    $locale = get_locale();
    get_template_part( "mod-template/{$locale}/{$Template_DIR}/{$Template_FILE}"  );
}

?>