<?php
/**
 * Por compatibilidad, tildes y simbolos especiales son omitidos.
 * 
 * @package Bootstrap Wrapper PHP
 * @version 0.3
 * @author Ejner Galaz
 * @author tuxnull (autor original, bajo licencia MIT)
 * @license GNU General Public License v3
 * @link https://github.com/ejner/Bootstrap-Wrapper-PHP
 */

/**
 * @param $lang Idioma de la pagina, opcional.
 */
function init_html( string $lang = null ) {
    $html = '<html>';

    if(  !is_null( $lang ) ) {
        $html = '<html lang="' . $lang . '">';
    }

    return '<!doctype html>' . $html . '<head>';
}

/**
 * @param $charset Codificacion de Caracteres, UTF-8 por defecto.
 */
function set_charset( string $charset = 'UTF-8' ) {
    return '<meta charset="' . $charset . '">';
}

/**
 * @param $content Contenido para atributo content.
 */
function set_viewport( string $content = null ) {
    if(  is_null( $content ) ) {
        $content = 'width=device-width, initial-scale=1, shrink-to-fit=no';
    }

    return '<meta name="viewport" content="' . $content . '">';
}

/**
 * @param $title Titulo de la pagina.
 */
function page_title( string $title ) {
    return '<title>'.$title.'</title>';
}

/**
 * 
 */
function init_stylesheet() {
    return init_cdn_stylesheet();
}

/**
 * @param $ver Version de Bootstrap a cargar
 */
function init_cdn_stylesheet( string $ver = '4.3.1' ) {
    return '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@' . $ver . '/dist/css/bootstrap.min.css">';
}

/**
 * 
 */
function init_bootswatch_stylesheet( string $style ) {
    $style = strtolower( $style );
    return '<link rel="stylesheet" href="https://bootswatch.com/4/' . $style . '/bootstrap.min.css">';
}

/**
 * 
 */
function init_js() {
    return '<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>';
}

/**
 * 
 */
function init_full_jquery() {
    return '<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>';
}

/**
 * 
 */
function init_navbar( array $args, string $content ) {
    if(  array_key_exists( "style", $args ) ) {
        $style = $args["style"];
    } else {
        return '<b>BootstraPHP has encountered an error: init_navbar is missing required argument "style"';
    }

    if(  array_key_exists( "links_to", $args ) ) {
        $links_to = $args["links_to"];
    } else {
        return '<b>BootstraPHP has encountered an error: init_navbar is missing required argument "links_to"';
    }

    if(  array_key_exists( "brand",$args ) ) {
        $brand = $args["brand"];
    } else {
        return '<b>BootstraPHP has encountered an error: init_navbar is missing required argument "brand"';
    }

    $returnstr = '<nav class="navbar navbar-expand-lg navbar-%s bg-%s">
    <a class="navbar-brand" href="%s">%s</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">%s</ul></div></nav>';

    return sprintf( $returnstr, $style, $style, $links_to, $brand, $content );
}

/**
 * 
 */
function navbar_element( array $args ) {
    if(  array_key_exists( "element", $args ) ) {
        $element = $args["element"];
    } else {
        return '<b>BootstraPHP has encountered an error: navbar_element is missing required argument "element"';
    }

    if(  array_key_exists( "links_to",$args ) ) {
        $links_to = $args["links_to"];
    } else {
        return '<b>BootstraPHP has encountered an error: navbar_element is missing required argument "links_to"';
    }

    if(  array_key_exists( "name",$args ) ) {
        $name = $args["name"];
    } else {
        return '<b>BootstraPHP has encountered an error: navbar_element is missing required argument "name"';
    }

    if(  array_key_exists( "style",$args ) ) {
        $style = $args["style"];
    } else {
        $active = "";
    }

    if(  array_key_exists( "dropdown_content", $args ) ) {
        $dcontent = $args["dropdown_content"];
    } else {
        $dcontent = "";
    }

    if(  array_key_exists( "return_method", $args ) ) {
        $returl = $args["return_method"];
    } else {
        $returl = "";
    }

    if(  array_key_exists( "dropdown_id", $args ) ) {
        $dropdown_id = $args["dropdown_id"];
    } else {
        $dropdown_id = "";
    }

    if(  array_key_exists( "lead_link_id", $args ) ) {
        $lead_link_id = $args["lead_link_id"];
    } else {
        $lead_link_id = "";
    }

    if(  array_key_exists( "lead_link_element", $args ) ) {
        $lead_link_element = $args["lead_link_element"];
    } else {
        $lead_link_element = "a";
    }

    if(  array_key_exists( "autodetect_active", $args ) ) {
        $autodetect_active = $args["autodetect_active"];
    } else {
        $autodetect_active = true;
    }

    if(  $autodetect_active == true ) {
        if( pathinfo( $_SERVER["SCRIPT_FILENAME"],PATHINFO_FILENAME).".".pathinfo( $_SERVER["SCRIPT_FILENAME"],PATHINFO_EXTENSION) == $links_to) {
            $active = true;
        }

        if( $links_to == "#" ) {
            $active = true;
        }
    }

    if(  array_key_exists( "active",$args ) ) {
        $active = $args["active"];
    } else {
        $active = false;
    }

    if(  $active == true ) {
        $active = "active";
    } else {
        $active = "";
    }


    if(  $element == "link" ) {
        return sprintf( '<li class="nav-item %s">
        <a class="nav-link" href="%s">%s</a>
        </li>', $active, $links_to,$name );
    }

    if(  $element == "dropdown" ) {
        return sprintf( '<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="%s" id="%s" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">%s</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">%s</div>
        </li>', $links_to, $dropdown_id, $name, $dcontent );
    }

    if(  $element == "search" ) {
        return sprintf( '<form class="form-inline my-2 my-lg-0" action="%s" method="%s">
        <input class="form-control mr-sm-2" type="search" placeholder="%s" aria-label="%s" name="query">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">%s</button>
        </form>', $links_to, $returl, $name, $name, $name );
    }
    if(  $element == "lead_link" ) {
        return sprintf( '<%s class="btn btn-outline-%s my-2 my-sm-0" id="%s" href="%s">%s</%s>', $lead_link_element, $style, $lead_link_id, $links_to, $name, $lead_link_element );
    }

}

/**
 * 
 */
function dropdown_element( array $args ) {

    if(  array_key_exists( "element", $args ) ) {
        $element = $args["element"];
    } else {
        return '<b>BootstraPHP has encountered an error: dropdown_element is missing required argument "element"';
    }

    if(  array_key_exists( "links_to", $args ) ) {
        if(  $args["links_to"] ) {
            $links_to = $args["links_to"];
        } else {
            $links_to = "";
        }
    } else {
        $links_to = "";
    }

    if(  array_key_exists( "name", $args ) ) {
        if(  $args["name"] ) {
            $name = $args["name"];
        } else {
            $name = "";
        }
    } else {
        $name = "";
    }

    if(  $element == "link" ) {
        return sprintf('<a class="dropdown-item" href="%s">%s</a>',$links_to,$name);
    }

    if(  $element == "divider" ) {
        return '<div class="dropdown-divider"></div>';
    }
}

/**
 * 
 */
function navbar_swap_alignment() {
    return "</ul>";
}

/**
 * 
 */
function alert( array $args, string $content ) {
    if(  array_key_exists( "dismissable", $args ) ) { #Dismissable attribute is optional, doesnt need to be included in the array this way
        $dismissable = $args["dismissable"];
    } else {
        $dismissable = false;
    }

    if(  array_key_exists( "style", $args ) ) { #Dismissable attribute is optional, doesnt need to be included in the array this way
        $style = $args["style"];
    } else {
        return '<b>BootstraPHP has encountered an error: alert is missing required argument "style"';
    }


    if(  $dismissable == true ) {
        return sprintf( '<div class="alert alert-%s" role="alert">%s<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button></div>', $style, $content );
    } else {
        return sprintf( '<div class="alert alert-%s" role="alert">%s</div>', $style, $content );
    }

}

/**
 * 
 */
function badge( string $content, string $style ) {
    return '<span class="badge badge-' . $style . '">' . $content . '</span>';
}

/**
 * 
 */
function pill( string $content, string $style ) {
    return '<span class="badge badge-pill badge-' . $style . '">' . $content . '</span>';
}

/**
 * 
 */
function custom_link( array $args, string $content ) {

    if(  array_key_exists( "element",$args ) ) {
        $element = $args["element"];
    } else {
        return '<b>BootstraPHP has encountered an error: custom_link is missing required argument "element"';
    }

    if(  array_key_exists( "links_to", $args ) ) {
        $links_to = $args["links_to"];
    } else {
        return '<b>BootstraPHP has encountered an error: custom_link is missing required argument "links_to"';
    }

    if(  array_key_exists( "style", $args ) ) {
        $style = $args["style"];
    } else {
        return '<b>BootstraPHP has encountered an error: custom_link is missing required argument "style"';
    }

    if(  array_key_exists( "disabled", $args ) ) {
        $disabled = $args["disabled"];
    } else {
        $disabled = false;
    }


    if(  $disabled == true ) {
        $disabled = "disabled";
    } else {
        $disabled = "";
    }
    if(  $element == "badge" ) {
        return '<a href="'.$links_to.'" class="badge badge-'.$style.'" '.$disabled.'>'.$content.'</a>';
    }else if(  $element == "pill" ) { #Pill Link
        return '<a href="'.$links_to.'" class="badge badge-pill badge-'.$style.'" '.$disabled.'>'.$content.'</a>';
    }else if(  $element == "button" ) { #Button Link
        return '<a href="'.$links_to.'" class="btn btn-'.$style.'" '.$disabled.'>'.$content.'</a>';
    }else if(  $element == "outline-button" ) { #Outline colored Button Link
        return '<a href="'.$links_to.'" class="btn btn-outline-'.$style.'" '.$disabled.'>'.$content.'</a>';
    }else if(  $element == "button-sm" ) { #Small Button
        return '<a href="'.$links_to.'" class="btn btn-sm btn-'.$style.'" '.$disabled.'>'.$content.'</a>';
    }else if(  $element == "outline-button-sm" ) { #Small Outline Button
        return '<a href="'.$links_to.'" class="btn btn-sm btn-outline-'.$style.'" '.$disabled.'>'.$content.'</a>';
    }else if(  $element == "button-lg" ) { #Big Button
        return '<a href="'.$links_to.'" class="btn btn-lg btn-'.$style.'" '.$disabled.'>'.$content.'</a>';
    }else if(  $element == "button-block" ) { #Block Button
        return '<a href="'.$links_to.'" class="btn btn-block btn-'.$style.'" '.$disabled.'>'.$content.'</a>';
    }else if(  $element == "button-block-lg" ) { #Big Block Button
        return '<a href="'.$links_to.'" class="btn btn-block btn-lg btn-'.$style.'" '.$disabled.'>'.$content.'</a>';
    }else if(  $element == "button-block-sm" ) { #Small Block Button
        return '<a href="'.$links_to.'" class="btn btn-block btn-sm btn-'.$style.'" '.$disabled.'>'.$content.'</a>';
    }else if(  $element == "outline-button-lg" ) { #Big Outline Button
        return '<a href="'.$links_to.'" class="btn btn-lg btn-outline-'.$style.'" '.$disabled.'>'.$content.'</a>';
    } else { #No Element Found, Creating regular link with error message
        return '<a href="'.$links_to.'" error="Could not find an element called '.$element.'" '.$disabled.'>'.$content.'</a>';
    }
}

/**
 * 
 */
function card( array $args, string $content ) {

    if(  array_key_exists( "image_url",$args ) ) {
        $image_url = $args["image_url"];
    } else {
        $image_url = "";
    }

    if(  array_key_exists( "card_header",$args ) ) {
        $card_header = $args["card_header"];
    } else {
        $card_header = "";
    }

    if( array_key_exists( "bg_style",$args ) ) {
        $style = "bg-".$args["bg_style"];
    } else {
        $style = "";
    }

    if( array_key_exists( "text_white",$args ) ) {
        $whitetext = $args["text_white"];
    } else {
        $whitetext = false;
    }

    if( $whitetext == true ) {
        $whitetext = "text-white";
    }


    if( $image_url == "" ) {
        if( $card_header == "" ) {
            $header = "<!-- Optional Card Header position here -->";
        } else {
            $header = '<div class="card-header">'.$card_header.'</div>';
        }

        return '<div class="card '.$style.' '.$whitetext.'">
        '.$header.'
        <div class="card-body">
        '.$content.'
        </div>
        </div>';

    } else {
        if( $card_header == "" ) {
            $header = "<!-- Optional Card Header position here -->";
        } else {
            $header = '<div class="card-header">'.$card_header.'</div>';
        }

        return '<div class="card">
        '.$header.'
        <img src="'.$image_url.'" class="card-img-top" alt="'.$image_url.'">
        <div class="card-body">
        '.$content.'
        </div>
        </div>';
    }
}

/**
 * 
 */
function card_content( array $args, string $content ) {

    if( array_key_exists( "title", $args ) ) {
        $title = $args["title"];
    } else {
        $title = "";
    }

    if( array_key_exists( "subtitle", $args ) ) {
        $subtitle = '<h6 class="card-subtitle mb-2 text-muted">'.$args["subtitle"].'</h6>';
    } else {
        $subtitle = "";
    }

    return '<h5 class="card-title">'.$title.'</h5>
    '.$subtitle.'
    <p class="card-text">'.$content.'</p>';
}

/**
 * 
 */
function card_list_group( string $content ) {
    return '</div>
    <ul class="list-group list-group-flush">
    '.$content.'
    </ul>
    <div class="card-body">';
}

/**
 * 
 */
function list_group_item( array $args, string $content ) {

    if( array_key_exists( "style",$args ) ) {
        $style = "list-group-item-".$args["style"];
    } else {
        $style = "";
    }

    return '<li class="list-group-item '.$style.'">'.$content.'</li>';
}

/**
 * 
 */
function collapsible_div( array $args, string $content ) {

    if( array_key_exists( "show", $args ) ) {
        $show = $args["show"];
    } else {
        $show = false;
    }

    if( array_key_exists( "id", $args ) ) {
        $id = $args["id"];
    } else {
        return '<b>BootstraPHP has encountered an error: collapsible_div is missing required argument "id"';
    }

    if( $show == true) {
        $show = "show";
    } else {
        $show = "";
    }
    
    return '<div class="collapse '.$show.'" id="'.$id.'">'.$content.'</div>';
}

/**
 * 
 */
function collapse_link( string $id ) {
    return "javascript:$('#".$id."').collapse('toggle');";
}

/**
 * 
 */
function breadcrumb( string $content ) {
    return '<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
    '.$content.'
    </ol>
    </nav>';
}

/**
 * 
 */
function breadcrumb_item( array $args, string $content ) {

    if( array_key_exists( "links_to", $args ) ) {
        $links_to = $args["links_to"];
    } else {
        $links_to = "";
    }

    if( array_key_exists( "active", $args ) ) {
        $active = $args["active"];
    } else {
        $active = false;
    }

    if( $links_to == "" ) {
        if( $active == true) {
            return '<li class="breadcrumb-item active"><a href="'.$links_to.'">'.$content.'</a></li>';
        } else {
            return '<li class="breadcrumb-item"><a href="'.$links_to.'">'.$content.'</a></li>';
        }
    } else {
        if( $active == true) {
            return '<li class="breadcrumb-item active">'.$content.'</li>';
        } else {
            return '<li class="breadcrumb-item">'.$content.'</li>';
        }
    }
}

/**
 * 
 */
function jumbotron( array $args, string $content ) {

    if( array_key_exists( "fluid", $args ) ) {
        $fluid = $args["fluid"];
    } else {
        $fluid = false;
    }


    if( $fluid == true) {
        $fluid = "jumbotron-fluid";
    } else {
        $fluid = "";
    }

    return '<div class="jumbotron '.$fluid.'">
    <div class="container">
    '.$content.'
    </div>
    </div>';
}

/**
 * 
 */
function jumbotron_content( array $args, string $content ) {

    if( array_key_exists( "lead_text", $args ) ) {
        $lead_text = $args["lead_text"];
    } else {
        $lead_text = "";
    }

    if( array_key_exists( "title_tag", $args ) ) {
        $title_tag = $args["title_tag"];
    } else {
        $title_tag = "h1";
    }

    if( array_key_exists( "title_class", $args ) ) {
        $title_tag = $args["title_class"];
    } else {
        $title_tag = "display-4";
    }

    if( array_key_exists( "title", $args ) ) {
        $title = $args["title"];
    } else {
        $title = "";
    }

    if( array_key_exists( "links_to", $args ) ) {
        $links_to = 'href="'.$args["links_to"].'"';
    } else {
        $links_to = "";
    }

    if( array_key_exists( "button_text", $args ) ) {
        $button_text = $args["button_text"];
    } else {
        $button_text = "";
    }

    if( $lead_text == "" ) {
        $lead_text == "";
    } else {
        $lead_text = '<p class="lead">'.$lead_text.'</p>';
    }

    if( array_key_exists( "spacer", $args ) ) {
        if( $args["spacer"] == true) {
            $spacer = '<hr class="my-4">';
        }
    } else {
        $spacer = "";
    }

    if( array_key_exists( "button_type", $args ) ) {
        $button_type = $args["button_type"];
    } else {
        $button_type = "a";
    }

    if( array_key_exists( "button_style", $args ) ) {
        $button_style = $args["button_style"];
    } else {
        $button_style = "btn btn-primary btn-lg";
    }

    if( array_key_exists( "title_tag", $args ) ) {
        $title_tag = $args["title_tag"];
    } else {
        $title_tag = "h1";
    }

    if( array_key_exists( "title_class", $args ) ) {
        $title_class = $args["title_class"];
    } else {
        $title_class = "display-4";
    }

    if( $button_text != "" ) {
        $button_text = '<'.$button_type.' class="'.$button_style.'" '.$links_to.' role="button">'.$button_text.'</'.$button_type.'>';
    }

    return '<'.$title_tag.' class="'.$title_class.'">'.$title.'</'.$title_tag.'>
    '.$lead_text.$spacer.'
    <p>'.$content.'</p>
    '.$button_text;
}

/**
 * 
 */
function spinner( array $args ) {

    if( array_key_exists( "type", $args ) ) {
        $type = $args["type"];
    } else {
        return '<b>BootstraPHP has encountered an error: spinner is missing required argument "type"';
    }

    if( array_key_exists( "style", $args ) ) {
        $style = $args["style"];
    } else {
        return '<b>BootstraPHP has encountered an error: spinner is missing required argument "style"';
    }

    if( array_key_exists( "alt", $args ) ) {
        $alt = $args["alt"];
    } else {
        $alt = "";
    }

    if( $type == "border" ) {
        return '<div class="spinner-border text-'.$style.'" role="status"><span class="sr-only">'.$alt.'</span></div>';
    }else if( $type == "growing" ) {
        return '<div class="spinner-grow text-'.$style.'" role="status"><span class="sr-only">'.$alt.'</span></div>';
    } else {
        return "Spinner-element not found.";
    }
}

/**
 * 
 */
function span_spinner( array $type ) {
    if( $type == "border" ) {
        return '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>';
    }else if( $type == "growing" ) {
        return '<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>';
    } else {
        return 'Spinner-element not found.';
    }
}

/**
 * 
 */
function container( string $content ) {
    return '<div class="container">'.$content.'</div>';
}

/**
 * 
 */
function grid_row( array $args, string $content ) {

    if( array_key_exists( "horizontal_alignment", $args ) ) {
        $horizontal_alignment = $args["horizontal_alignment"];
    } else {
        $horizontal_alignment = "";
    }

    if( $horizontal_alignment == "" ) {
        return '<div class="row">'.$content.'</div>';
    } else {
        return '<div class="row justify-content-'.$horizontal_alignment.'">'.$content.'</div>';
    }
}

/**
 * 
 */
function col( array $args, string $content) {

    $class = "";

    if( array_key_exists( "col", $args ) ) {
        if( $args["col"] == "auto" ) {
            $class = $class . "col";
        } else {
            $class = $class . " col-".$args["col"];
        }
    }

    if( array_key_exists( "col-sm", $args ) ) {
        if( $args["col-sm"] == "auto" ) {
            $class = $class . "col-sm";
        } else {
            $class = $class . " col-sm-".$args["col-sm"];
        }
    }

    if( array_key_exists( "col-md", $args ) ) {
        if( $args["col-md"] == "auto" ) {
            $class = $class . "col-md";
        } else {
            $class = $class . " col-md-".$args["col-md"];
        }
    }

    if( array_key_exists( "col-lg", $args ) ) {
        if( $args["col-lg"] == "auto" ) {
            $class = $class . "col-lg";
        } else {
            $class = $class . " col-lg-".$args["col-lg"];
        }
    }

    if( array_key_exists( "col-xl", $args ) ) {
        if( $args["col-xl"] == "auto" ) {
            $class = $class . "col-xl";
        } else {
            $class = $class . " col-xl-".$args["col-xl"];
        }
    }

    if( array_key_exists( "order", $args ) ) {
        $class = $class . "order-".$args["order"];
    }

    return sprintf('<div class="%s">%s</div>',$class,$content);
}

/**
 * 
 */
function grid_break() {
    return '<div class="w-100"></div>';
}

/**
 * 
 */
function table( array $args, string $content) {

    if( array_key_exists( "dark", $args ) ) {
        $dark = $args["dark"];
    } else {
        $dark = false;
    }

    if( array_key_exists( "striped", $args ) ) {
        $striped = $args["striped"];
    } else {
        $striped = false;
    }

    if( array_key_exists( "bordered", $args ) ) {
        $bordered = $args["bordered"];
    } else {
        $bordered = false;
    }

    if( array_key_exists( "hover", $args ) ) {
        $hover = $args["hover"];
    } else {
        $hover = false;
    }

    if( $dark == true) {
        $dark = "table-dark";
    }
    if( $striped == true) {
        $striped = "table-striped ";
    }
    if( $bordered == true) {
        $bordered = "table-bordered ";
    }
    if( $hover == true) {
        $hover = "table-hover ";
    }

    return '<table class="table '.$dark." ".$striped." ".$bordered."".$hover.'">'.$content.'</table>';
}

/**
 * 
 */
function table_head( array $args, string $content ) {

    if( array_key_exists( "style", $args ) ) {
        $style = $args["style"];
    } else {
        $style = "";
    }

    if( $style == "" ) {
        return '<thead><tr>'.$content.'</tr></thead>';
    } else {
        return '<thead class="thead-'.$style.'"><tr>'.$content.'</tr></thead>';
    }
}

/**
 * 
 */
function table_th( array $args, string $content ) {

    if( array_key_exists( "scope", $args ) ) {
        $scope = $args["scope"];
    } else {
        $scope = "";
    }

    return '<th scope="'.$scope.'">'.$content.'</th>';
}

/**
 * 
 */
function table_body( string $content ) {
    return '<tbody>'.$content.'</tbody>';
}

/**
 * 
 */
function table_row( string $content ) {
    return '<tr>'.$content.'</tr>';
}

/**
 * 
 */
function table_td( array $args, string $content ) {

    if( array_key_exists( "colspan", $args ) ) {
        $colspan = $args["colspan"];
    } else {
        $colspan = "";
    }

    if( $colspan != "" ) {
        return '<td colspan="'.$colspan.'">'.$content.'</td>';
    }
    return '<td>'.$content.'</td>';
}

/**
 * 
 */
function form( array $args, string $content ) {

    if( array_key_exists( "action", $args ) ) {
        $action = $args["action"];
    } else {
        return '<b>BootstraPHP has encountered an error: form is missing required argument "action"';
    }

    if( array_key_exists( "method", $args ) ) {
        $method = $args["method"];
    } else {
        return '<b>BootstraPHP has encountered an error: form is missing required argument "method"';
    }

    if( array_key_exists( "enctype", $args ) ) {
        $enctype = $args["enctype"];
    } else {
        $enctype = "";
    }

    if( $enctype != "" ) {
        $enctype = 'enctype="'.$enctype.'"';
    }

    return '<form action="'.$action.'" method="'.$method.'" '.$enctype.'>'.$content.'</form>';
}

/**
 * 
 */
function form_input( array $args ) {

    if( array_key_exists( "prepend", $args ) ) {
        $prepend = $args["prepend"];
    } else {
        $prepend = "";
    }

    if( array_key_exists( "append", $args ) ) {
        $append = $args["append"];
    } else {
        $append = "";
    }

    if( array_key_exists( "type", $args ) ) {
        $type = $args["type"];
    } else {
        return '<b>BootstraPHP has encountered an error: form_input is missing required argument "type"';
    }

    if( array_key_exists( "placeholder", $args ) ) {
        $placeholder = $args["placeholder"];
    } else {
        $placeholder = "";
    }

    if( array_key_exists( "name", $args ) ) {
        $name = $args["name"];
    } else {
        $name = "";
    }

    if( $prepend != "" ) {
        $prepend = '<div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">'.$prepend.'</span>
        </div>';
    }

    if( $append != "" ) {
        $append = '<div class="input-group-append">
        <span class="input-group-text" id="basic-addon1">'.$append.'</span>
        </div>';
    }

    return '<div class="input-group mb-3">
    '.$prepend.'
    <input type="'.$type.'" class="form-control" placeholder="'.$placeholder.'" aria-label="'.$placeholder.'" aria-describedby="basic-addon1" name="'.$name.'">
    '.$append.'
    </div>';
}

/**
 * 
 */
function input_group( string $content ) {
    return '<div class="input-group mb-3">'.$content.'</div>';
}

/**
 * 
 */
function input_group_prepend( string $content ) {
    return '<div class="input-group-prepend">'.$content.'</div>';
}

/**
 * 
 */
function input( array $args ) {

    if( array_key_exists( "type", $args ) ) {
        $type = $args["type"];
    } else {
        return '<b>BootstraPHP has encountered an error: input is missing required argument "type"';
    }

    if( array_key_exists( "placeholder", $args ) ) {
        $placeholder = $args["placeholder"];
    } else {
        $placeholder = "";
    }

    if( array_key_exists( "name", $args ) ) {
        $name = $args["name"];
    } else {
        $name = "";
    }

    if( array_key_exists( "id", $args ) ) {
        $id = $args["id"];
    } else {
        $id = "";
    }

    return '<input type="'.$type.'" placeholder="'.$placeholder.'" name="'.$name.'" id="'.$id.'">';
}

/**
 * 
 */
function input_group_append( string $content ) {
    return '<div class="input-group-append">'.$content.'</div>';
}

/**
 * 
 */
function pagination( array $args, string $content ) {

    if( array_key_exists( "alignment", $args ) ) {
        $alignment = $args["alignment"];
    } else {
        $alignment = "";
    }

    if( array_key_exists( "aria_label", $args ) ) {
        $aria_label = $args["aria_label"];
    } else {
        $aria_label = "";
    }

    if( $alignment != "" ) {
        $alignment = "justify-content-".$alignment;
    }
    return '<nav aria-label="'.$aria_label.'"><ul class="pagination '.$alignment.'">'.$content.'</ul></nav>';
}

/**
 * 
 */
function page_item( array $args, string $content ) {

    if( array_key_exists( "disabled", $args ) ) {
        $disabled = $args["id"];
    } else {
        $disabled = false;
    }

    if( $disabled == true) {
        $disabled == "disabled";
    }
    return '<li class="page-item '.$disabled.'">'.$content.'</li>';
}

/**
 * 
 */
function page_link( array $args, string $content ) {

    if( array_key_exists( "links_to", $args ) ) {
        $links_to = $args["links_to"];
    } else {
        return '<b>BootstraPHP has encountered an error: page_link is missing required argument "links_to"';
    }

    return '<a class="page-link" href="'.$links_to.'">'.$content.'</a>';
}

/**
 * 
 */
function list_group( string $content ) {
    return '<ul class="list-group">'.$content.'</ul>';
}

/**
 * 
 */
function ext_footer( string $content ) {
    return '<footer class="footer">
      <div class="container">
        <span class="text-muted">'.$content.'</span>
      </div>
    </footer>';
}

/**
 * 
 */
function button_group( array $args, string $content ) {
    if( array_key_exists( "size",$args ) ) {
        $sizing = "btn-group-".$args["size"];
    } else {
        $sizing = "";
    }

    if( array_key_exists( "vertical",$args ) ) {
        $vertical = $args["vertical"];
    } else {
        $vertical = false;
    }

    if( $vertical == true) {
        $vertical = "-vertical";
    }

    return sprintf('<div class="btn-group%s %s" role="group" aria-label="Basic example">%s</div>',$vertical,$sizing,$content);
}

/**
 * 
 */
function button_toolbar( string $content ) {
    return sprintf('<div class="btn-toolbar" role="toolbar">%s</div>',$content);
}

/**
 * 
 */
function modal( array $args, string $content ) {
    if( array_key_exists( "size",$args ) ) {
        $size = "modal-".$args["size"];
    } else {
        $size = "";
    }

    if( array_key_exists( "id",$args ) ) {
        $id = $args["id"];
    } else {
        $id = "";
    }

    return sprintf('<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="%s">
    <div class="modal-dialog %s"><div class="modal-content">
    %s </div></div></div>',$id,$size,$content);
}

/**
 * 
 */
function modal_header( array $args ) {
    if( array_key_exists( "title",$args ) ) {
        $title = $args["title"];
    } else {
        $title = "";
    }

    if( array_key_exists( "close_button",$args ) ) {
        $close_button = $args["close_button"];
    } else {
        $close_button = false;
    }

    if( $close_button == true) {
        $close_button = '<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>';
    } else {
        $close_button = "";
    }

    return '<div class="modal-header"><h5 class="modal-title" id="exampleModalCenterTitle">'.$title.'</h5>'.$close_button.'</div>';

}

/**
 * 
 */
function modal_body( string $content ) {
    return sprintf('<div class="modal-body">%s</div>',$content);
}

/**
 * 
 */
function modal_footer( string $content ) {
    return sprintf('<div class="modal-footer">%s</div>',$content);
}

/**
 * 
 */
function carousel( array $args, string $content ) {

    if( array_key_exists( "controls",$args ) ) {
        $controls = $args["controls"];
    } else {
        $controls = false;
    }

    if( array_key_exists( "id",$args ) ) {
        $id = $args["id"];
    } else {
        $id = "carousel";
    }

    if( $controls == true) {
        $controls = '<a class="carousel-control-prev" href="#'.$id.'" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#'.$id.'" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </a>';
    }

    return '<div id="'.$id.'" class="carousel slide" data-ride="carousel"><div class="carousel-inner">'.$content.'</div>'.$controls.'</div>';
}

/**
 * 
 */
function carousel_item( array $args ) {
    if( array_key_exists( "active",$args ) ) {
        $active = $args["active"];
    } else {
        $active = false;
    }

    if( array_key_exists( "img_src",$args ) ) {
        $img_src = $args["img_src"];
    } else {
        return '<b>BootstraPHP has encountered an error: carousel_item is missing required argument "img_src"';
    }

    if( array_key_exists( "duration",$args ) ) {
        $duration = $args["duration"];
    } else {
        $duration = "5000";
    }

    if( $active == true) {
        $active = "active";
    }

    return sprintf('<div class="carousel-item %s" data-interval="%s"><img src="%s" class="d-block w-100" alt="..."></div>',$active,$duration,$img_src);

}

/**
 * 
 */
function progress_bar( array $args, string $content ) {

    if( array_key_exists( "progress",$args ) ) {
        $progress = $args["progress"];
    } else {
        $progress = "100";
    }

    if( array_key_exists( "style",$args ) ) {
        $style = "bg-".$args["progress"];
    } else {
        $style = "";
    }

    if( array_key_exists( "id",$args ) ) {
        $id = $args["id"];
    } else {
        $id = "progress";
    }

    if( array_key_exists( "striped",$args ) ) {
        $striped = $args["id"];
    } else {
        $striped = false;
    }

    if( $striped == true ) {
        $striped = "progress-bar-striped";
    }

    return'<div class="progress">
      <div class="progress-bar '.$striped.' '.$style.'" role="progressbar" style="width: '.$progress.'%" aria-valuenow="'.$progress.'" aria-valuemin="0" aria-valuemax="100" id="'.$progress.'">'.$content.'</div>
    </div>';
}

function code_text( array $args, string $content ) {
    if( array_key_exists( "bg_bash",$args ) ) {
        $bg_bash = $args["bg_bash"];
    } else {
        $bg_bash = false;
    }

	if( array_key_exists( "bg_white",$args ) ) {
        $bg_white = $args["bg_white"];
    } else {
        $bg_white = false;
    }



    if( $bg_bash == true ) {
        $bg_bash = "background-color: black; color: white; font-family: 'Consolas', Times, serif;";
    }
	if( $bg_white == true ) {
        $bg_white = "background-color: white; color: black; font-family: 'Consolas', Times, serif;";
    }

    return '<div style="'.$bg_bash.' '.$bg_white.'">'.$content.'</div>';
}