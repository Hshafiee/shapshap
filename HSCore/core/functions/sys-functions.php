<?php 
/**
 * Init Route
 */
use JetRouter\Router;
$route = Router::create(array()); 

 /**
 * Init endWith
 */
function endsWith($string, $endString) { 
    $len = strlen($endString); 
    if ($len == 0) { 
        return true; 
    } 
    return (substr($string, -$len) === $endString); 
} 

/**
 * Init startsWith
 */
function startsWith ($string, $startString) { 
    $len = strlen($startString); 
    return (substr($string, 0, $len) === $startString); 
} 
/**
 * 
 * Get options
 * @param Option_Key from base function
 * @param id from added field
 * @param prefix Use prefix
 * 
 */
function mod_get_option($key='',$field='',$prefix = TRUE) {
	
	$opts = get_option($key);
	if ($opts){
		if ($field == null or $field == ''){
			return $opts;
		}else{
            if ($prefix){
                $prefield = PREFIX() . $field;
                if (array_key_exists($prefield,$opts)){
                    return $opts[$prefield];
                }else{
                    if (defined('WP_DEBUG') && true === WP_DEBUG) {
                        return "برای فیلد $prefield مقدرای ذخیره نشده";
                    }
			    }
            }else{
                if (array_key_exists($field,$opts)){
                    return $opts[$field];
                }else{
                    if (defined('WP_DEBUG') && true === WP_DEBUG) {
                        return "برای فیلد $field مقدرای ذخیره نشده";
                    }
			    }
            }
		}
	}else {
		if (defined('WP_DEBUG') && true === WP_DEBUG) {
			return "برای کلید $key مقدرای ذخیره نشده";
		}
	}
	
	
}

/**
 * 
 * Get menu Items
 * @param Menu_Name
 * 
 */
function mod_get_menu_items($menu_name){
	$menuLocations = get_nav_menu_locations(); 
	if (array_key_exists($menu_name,$menuLocations)){
		$menuID = $menuLocations[$menu_name];
		return wp_get_nav_menu_items($menuID); 
	}else {
		return False;
	}

}


/**
 * 
 * Get link slug
 * @param slug
 * 
 */
function mod_get_slug($slug){
	$newslug = str_replace("-"," ",urldecode($slug));
	return strtoupper($newslug);
}

/**
 * 
 * Get Post image URL
 * @param Post_ID
 * @param Image_ALT
 * 
 */

function mod_get_img_byid($id , $alt='' , $class =''){
	$filetype = wp_check_filetype(wp_get_attachment_image_src($id, "full")[0]);
	if ($filetype['ext'] == 'svg'){
		if($alt == '' or $alt == null){
			echo '<img src="'. wp_get_attachment_image_src($id, "full")[0] .'" alt="'. get_post_meta( $id , '_wp_attachment_image_alt', true) .'"' . ($class != '' ? ' class="'.$class.'"' : '') . ' data-uk-svg>';
		}else{
			echo '<img src="'. wp_get_attachment_image_src($id, "full")[0] .'" alt="'. $alt .'"' . ($class != '' ? ' class="'.$class.'"' : '') . ' data-uk-svg>';
		}
	} else {
		if($alt == '' or $alt == null){
			echo '<img src="'. wp_get_attachment_image_src($id, "full")[0] .'" alt="'. get_post_meta( $id , '_wp_attachment_image_alt', true) .'"' . ($class != '' ? ' class="'.$class.'"' : '') . ' data-uk-img>';
		}else{
			echo '<img src="'. wp_get_attachment_image_src($id, "full")[0] .'" alt="'. $alt .'"' . ($class != '' ? ' class="'.$class.'"' : '') . ' data-uk-img>';
		}
	}
}

function mod_get_img_byurl($url , $alt='' , $class =''){
	$filetype = wp_check_filetype($url);
	$info = pathinfo($url);
	if ($filetype['ext'] == 'svg'){
		if($alt == '' or $alt == null){
			echo '<img src="'. $url .'" alt="'. $info['filename'] .'"' . ($class != '' ? ' class="'.$class.'"' : '') . ' data-uk-svg>';
		}else{
			echo '<img src="'. $url .'" alt="'. $alt .'"' . ($class != '' ? ' class="'.$class.'"' : '') . ' data-uk-svg>';
		}
	} else {
		if($alt == '' or $alt == null){
			echo '<img src="'. $url .'" alt="'. $info['filename'] .'"' . ($class != '' ? ' class="'.$class.'"' : '') . ' data-uk-img>';
		}else{
			echo '<img src="'.$url .'" alt="'. $alt .'"' . ($class != '' ? ' class="'.$class.'"' : '') . ' data-uk-img>';
		}
	}
}

function mod_get_thumbnail($id , $alt='' , $class ='' ){
	$filetype = wp_check_filetype(get_the_post_thumbnail_url($id, "full"));
	if ($filetype['ext'] == 'svg'){
		if($alt == ''){
			echo '<img src="'. get_the_post_thumbnail_url($id, "full") .'" alt="'. get_post_meta( $id , '_wp_attachment_image_alt', true) .'"' . ($class != '' ? ' class="'.$class.'"' : '') . ' data-uk-svg>';
		}else{
			echo '<img src="'. get_the_post_thumbnail_url($id, "full") .'" alt="'. $alt .'"' . ($class != '' ? ' class="'.$class.'"' : '') . ' data-uk-svg>';
		}
	} else {
		if($alt == ''){
			echo '<img src="'. get_the_post_thumbnail_url($id, "full") .'" alt="'. get_post_meta( $id , '_wp_attachment_image_alt', true) .'"' . ($class != '' ? 'class="'.$class.'"' : '') . ' data-uk-img>';
		}else{
			echo '<img src="'. get_the_post_thumbnail_url($id, "full") .'" alt="'. $alt .'"' . ($class != '' ? 'class="'.$class.'"' : '') . ' data-uk-img>';
		}
	}
}


// MODIRAN Helper
if (defined('WP_DEBUG') && true === WP_DEBUG) {
    add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');
    function my_custom_dashboard_widgets() {
        wp_add_dashboard_widget('mod_developer_widget', 'توسعه دهنده', 'mod_developer_widget');
    }
    function mod_developer_widget() {
        echo '<style>table.table-style-three{font-size:14px;color:#333;border-width:1px;border-color:#3a3a3a;border-collapse:collapse;width:100%}table.table-style-three th{border-width:1px;padding:8px;border-style:solid;border-color:#2575a7;background-color:#2575a7;color:#fff}table.table-style-three tr:hover td{cursor:text}table.table-style-three tr td:nth-child(even){background-color:#73abce;direction:ltr}table.table-style-three td{border-width:1px;padding:8px;border-style:solid;border-color:#2575a7;background-color:#fff}#search-box{width: 100%;font-size: 16px;padding: 12px 20px 12px 40px;border: 1px solid #ddd;margin: 0 0 0 0;}td{display:block;box-sizing:border-box;clear:both}</style>
              <script>jQuery(document).ready(function(){jQuery("#search-box").on("keyup", function() {var value = jQuery(this).val().toLowerCase();jQuery("#func-table tr").filter(function() {jQuery(this).toggle(jQuery(this).text().toLowerCase().indexOf(value) > -1)});});});</script>
        
        <table id="func-table" class="table-style-three">
            <input type="text" id="search-box" onkeyup="myFunction()" placeholder="جستجو ..." title="جستجو">
            <thead><tr><th>توابع</th></tr></thead>
            <tbody>
            
            <tr>
                <td>دریافت از Page Option</td>
                <td>mod_get_option("{Parent Key}","{Field ID}")</td>
            </tr>
            <tr>
                <td>دریافت از Metabox</td>
                <td>get_post_meta({Page or Post ID},"{Feild ID}",TRUE)</td>
            </tr>
            <tr>
                <td>دریافت متن آدرس</td>
                <td>mod_get_slug("{slug}")</td>
            </tr>
            <tr>
                <td>دریافت تگ تصویر با ID تصویر</td>
                <td>mod_get_img_byid({Image ID} , {Alt (optional)} , {Class (optional)})</td>
            </tr>
            <tr>
                <td>دریافت تگ تصویر با آدرس تصویر</td>
                <td>mod_get_img_byurl({Image ID} , {Alt (optional)} , {Class (optional)})</td>
            </tr>
            <tr>
                <td>دریافت تگ تصویر شاخص</td>
                <td>mod_get_thumbnail({Post ID} , {Alt (optional)} , {Class (optional)})</td>
            </tr>
            <tr>
                <td>دریافت تصویر شاخص</td>
                <td>get_the_post_thumbnail_url({Post ID}, "full" )</td>
            </tr>
            <tr>
                <td>دریافت آدرس قالب</td>
                <td>get_template_directory_uri()</td>
            </tr>
            <tr>
                <td>تگ شناسایی هدر</td>
                <td>wp_head()</td>
            </tr>
            <tr>
                <td>تگ قرار دادن هدر</td>
                <td>get_header()</td>
            </tr>
            <tr>
                <td>تگ شناسایی فوتر</td>
                <td>wp_footer()</td>
            </tr>
            <tr>
                <td>تگ قرار دادن فوتر</td>
                <td>get_footer()</td>
            </tr>
            <tr>
                <td>دریافت عنوان سایت</td>
                <td>get_bloginfo()</td>
            </tr>
            


           
            </div> 
            </tbody>
        </table>
        
        
        
        
        
        
        
        ';
    }
 }


 