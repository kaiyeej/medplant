<?php

class Plants extends Connection
{
    private $table = 'tbl_plants';
    public $pk = 'plant_id';
    public $name = 'plant_name';

    public function add()
    {
        if (isset($_FILES['file']['tmp_name'])) {
            $plant_img = $_FILES['file']['name'];
            move_uploaded_file($_FILES['file']['tmp_name'], '../vendors/file/' . $plant_img);
        } else {
            $plant_img = "";
        }

        $form = array(
            $this->name     => $this->clean($this->inputs[$this->name]),
            'plant_description'   => $this->inputs['plant_description'],
            'plant_img'      => $plant_img,
        );

        return $this->insertIfNotExist($this->table, $form, "$this->name = '".$this->inputs[$this->name]."'");
    }

    public function edit()
    {
        $primary_id = $this->inputs[$this->pk];
        $is_exist = $this->select($this->table, $this->pk, "$this->name = '".$this->inputs[$this->name]."' AND $this->pk != '$primary_id'");
        if ($is_exist->num_rows > 0) {
            return 2;
        } else {
            $form = array(
                $this->name     => $this->clean($this->inputs[$this->name]),
                'plant_description'   => $this->inputs['plant_description']
            );

            return $this->updateIfNotExist($this->table, $form, "$this->pk = '$primary_id'");
        }
    }


    public function show()
    { 
        $param = isset($this->inputs['param']) ? $this->inputs['param'] : null;
        $rows = array();
        $result = $this->select($this->table, '*', $param);
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }


    public function view()
    {
        $primary_id = $this->inputs['id'];
        $result = $this->select($this->table, "*", "$this->pk = '$primary_id'");
        return $result->fetch_assoc();
    }

    public function remove()
    {
        $ids = implode(",", $this->inputs['ids']);

        return $this->delete($this->table, "$this->pk IN($ids)");
    }

    public function name($primary_id)
    {
        $result = $this->select($this->table, $this->name, "$this->pk = '$primary_id'");
        $row = $result->fetch_assoc();
        return $row[$this->name];
    }
}
