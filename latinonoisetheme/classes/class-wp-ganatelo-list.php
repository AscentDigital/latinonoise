<?php  
  class Ganatelo_List_Table extends WP_List_Table {

    function __construct() {
      parent::__construct( array(
        'singular'=> 'wp_list_ganatelo',
        'plural' => 'wp_list_ganatelos',
        'ajax'   => false
        ));
    }

    function extra_tablenav( $which ) {
      if ( $which == "top" ){
        echo"Hello, I'm before the table";
      }

      if ( $which == "bottom" ){
        echo"Hi, I'm after the table";
      }
    }

    function get_columns() {
      return $columns= array(
        'post_title' => __('Ganatelo'),
        'number_of_registrant' => __('Number of Registrant'),
        'registrants' => __('View Registrants'),
        'winners' => __('Winner/s'),
      );
    }

    public function get_sortable_columns() {
      return $sortable = array(
        'post_title'  => array('post_title',false),
      );
    }

    function prepare_items() {
     global $wpdb, $wp_column_headers;
     $screen = get_current_screen();

    $query = "SELECT * FROM $wpdb->posts WHERE post_type = 'ganatelos' AND post_status = 'publish'";

    $orderby = !empty($_GET["orderby"]) ? $_GET["orderby"] : 'ASC';
    $order = !empty($_GET["order"]) ? $_GET["order"] : '';

    if(!empty($orderby) && !empty($order)){ 
      $query.=' ORDER BY '.$orderby.' '.$order; 
    }

    $totalitems = $wpdb->query($query);
    $perpage = 5;
    $paged = !empty($_GET["paged"]) ? mysql_real_escape_string($_GET["paged"]) : '';

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
  $records = $this->items;
  list( $columns, $hidden ) = $this->get_column_info();

  if(!empty($records)){
    foreach($records as $rec){
        echo '<tr id="record_'.$rec->ID.'">';
        foreach($columns as $column_name => $column_display_name){
          $class = "class='$column_name column-$column_name'";
          $style = "";
          if(in_array($column_name, $hidden)) $style = ' style="display:none;"';
          $attributes = $class . $style;

         //Display the cell
         switch ( $column_name ) {
            case "post_title":  echo '<td '.$attributes.'>'.stripslashes($rec->post_title).'</td>';   break;
            case "number_of_registrant": echo '<td '.$attributes.'>asd</td>'; break;
            case "registrants": echo '<td '.$attributes.'>asd</td>'; break;
            case "winners": echo '<td '.$attributes.'>asd</td>'; break;
         }
      }

      //Close the line
      echo'</tr>';
   }}
}
}
?>