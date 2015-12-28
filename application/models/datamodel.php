<?php
class datamodel extends CI_Model{

function insert_data($table, $data){
$this->db->insert($table, $data);  
$insert_id = $this->db->insert_id();
return  $insert_id;
}
function update_data($table, $where, $data){
        $this->db->where($where);
        $this->db->update($table,$data);
        // print_r($this->db->last_query());
}
function delete_data ($table, $where){
        $this->db->where($where);
        $this->db->delete($table);
        // print_r($this->db->last_query());
    }
function get_data($table, $select = FALSE, $where = FALSE, $table2 = FALSE, $table2_col = FALSE, $table1_col = FALSE, $table3 = FALSE, $table3_col = FALSE, $table2_3_col = FALSE, $data_show = FALSE, $limit = FALSE, $order_by = FALSE, $order=FALSE, $group_by = FALSE) {
        $low_limit = $data_show - $limit;
        if ($table2 != FALSE) {
            $this->db->join($table2, $table2 . '.' . $table2_col . '=' . $table . '.' . $table1_col);
        }
        if ($table3 != FALSE) {
            $this->db->join($table3, $table3 . '.' . $table3_col . '=' . $table . '.' . $table2_3_col);
        }
        if ($select != FALSE) {
            $this->db->select($select);
        }
        if ($where != FALSE) {
            $this->db->where($where);
        }

        if ($data_show != FALSE) {
            $this->db->limit($data_show);
        }
        if ($data_show != FALSE && $data_show > $limit) {
            $this->db->limit($limit, $low_limit);
        }
        if ($order_by != FALSE && $order!=FALSE) {
        $this->db->order_by($order_by,$order);
        }
        if ($group_by != FALSE) {
          $this->db->group_by($group_by); 
        }
        // echo $this->db->last_query();
        // exit;
        $result = $this->db->get($table)->result_array();  
        return $result;
    }
}
?>
