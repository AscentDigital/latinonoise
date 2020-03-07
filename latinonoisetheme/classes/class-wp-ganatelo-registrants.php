<?php  
  class Ganatelo_Registrants_Table extends WP_List_Table {

    function __construct() {
      parent::__construct( array(
        'singular'=> 'wp_list_ganatelo_registrant',
        'plural' => 'wp_list_ganatelo_registrants',
        'ajax'   => false
        ));
    }

    function get_columns() {
      return $columns= array(
        'name' => __('Name'),
        'created' => __('Date of Registration'),
        'winner' => __('Winner'),
      );
    }

    // public function get_sortable_columns() {
    //   return $sortable = array(
    //     'name'  => array('name',false),
    //   );
    // }

    function prepare_items() {
     global $wpdb, $wp_column_headers;
     $screen = get_current_screen();

    $query = "SELECT * FROM ".$wpdb->prefix."ganatelo WHERE ganatelo_id = " . $_GET['ganatelo_id'];

    $orderby = !empty($_GET["orderby"]) ? $_GET["orderby"] : 'ASC';
    $order = !empty($_GET["order"]) ? $_GET["order"] : '';
    $query.=' ORDER BY winner DESC';
    if(!empty($orderby) && !empty($order)){ 
      $query.=', '.$orderby.' '.$order; 
    }

    $totalitems = $wpdb->query($query);
    $perpage = 20;
    $paged = !empty($_GET["paged"]) ? $_GET["paged"] : '';

    if(empty($paged) || !is_numeric($paged) || $paged<=0 ){ 
      $paged=1;
    }

    $totalpages = ceil($totalitems/$perpage);

    if(!empty($paged) && !empty($perpage)){ 
      $offset=($paged-1)*$perpage; $query.=' LIMIT '.(int)$offset.','.(int)$perpage; 
    }

    $this->set_pagination_args( array(
      "total_items" => $totalitems,
      "total_pages" => $totalpages,
      "per_page" => $perpage,
    ));

    $columns = $this->get_columns();
    $hidden = array();
    $sortable = $this->get_sortable_columns();
    $this->_column_headers = array($columns, $hidden, $sortable);

    $this->items = $wpdb->get_results($query);
  }

  function display_rows() {
    global $wpdb;

    $records = $this->items;
    list( $columns, $hidden ) = $this->get_column_info();

    if(!empty($records)){
      foreach($records as $rec){
          echo '<tr id="record_'.$rec->id.'">';
          foreach($columns as $column_name => $column_display_name){
            $class = "class='$column_name column-$column_name'";
            $style = "";
            if(in_array($column_name, $hidden)) $style = ' style="display:none;"';
            $attributes = $class . $style;

           //Display the cell
           switch ( $column_name ) {
              case "name":  
                $user = get_userdata($rec->user_id);
                echo '<td '.$attributes.'>'.$user->display_name.'</td>';   
                break;

              case "created": 
                echo '<td '.$attributes.'>'.date('F j, Y h:i a', strtotime($rec->created)).'</td>'; 
                break;

              case "winner": 
                $winner = 'No';
                if($rec->winner){
                  $winner = 'Yes';
                }
                echo '<td '.$attributes.'>'.$winner.'</td>'; 
                break;
           }
        }

        //Close the line
        echo'</tr>';
      }
    }
  }
}
?>