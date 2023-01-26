<?php

class Plants extends Connection
{
    private $table = 'tbl_plants';
    public $pk = 'plant_id';
    public $name = 'plant_name';

    public function add()
    {
        $plantid = $this->clean($this->inputs['plantid']);
        $is_exist = $this->select($this->table, $this->pk, "plantid = '$plantid'");
        if ($is_exist->num_rows > 0) {
            $id = $is_exist->fetch_array();
            return $id[0];
        } else {
            if (isset($_FILES['file']['tmp_name'])) {
                $plant_img = $_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'], '../vendors/file/' . $plant_img);
            } else {
                $plant_img = "";
            }

            $form = array(
                $this->name                 =>  $this->clean($this->inputs[$this->name]),
                'plantid'                   => $this->clean($this->inputs['plantid']),
                'plant_name_authority'      => $this->clean($this->inputs['plant_name_authority']),
                'plant_synonyms'            => $this->clean($this->inputs['plant_synonyms']),
                'plant_taxonomy_class'      => $this->clean($this->inputs['plant_taxonomy_class']),
                'plant_taxonomy_family'     => $this->clean($this->inputs['plant_taxonomy_family']),
                'plant_taxonomy_genus'      => $this->clean($this->inputs['plant_taxonomy_genus']),
                'plant_taxonomy_kingdom'    => $this->clean($this->inputs['plant_taxonomy_kingdom']),
                'plant_taxonomy_order'      => $this->clean($this->inputs['plant_taxonomy_order']),
                'plant_taxonomy_phylum'     => $this->clean($this->inputs['plant_taxonomy_phylum']),
                'plant_description'         => $this->clean($this->inputs['plant_description']),
                'plant_img'                 => $plant_img,
            );

            return $this->insertIfNotExist($this->table, $form, "$this->name = '".$this->inputs[$this->name]."'");
        }
    }

    public function scan()
    {
        $plantid = $this->clean($this->inputs['plantid']);
        $is_exist = $this->select($this->table, $this->pk, "plantid = '$plantid'");
        if ($is_exist->num_rows > 0) {
            $id = $is_exist->fetch_array();
            return $id[0];
        } else {
            $img = $this->inputs['plant_img'];
            $folderPath = "../vendors/file/";
          
            $image_parts = explode(";base64,", $img);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
          
            $image_base64 = base64_decode($image_parts[1]);
            $fileName = uniqid() . '.png';
          
            $file = $folderPath . $fileName;
            file_put_contents($file, $image_base64);

            $form = array(
                $this->name                 =>  $this->clean($this->inputs[$this->name]),
                'plantid'                   => $this->clean($this->inputs['plantid']),
                'plant_name_authority'      => $this->clean($this->inputs['plant_name_authority']),
                'plant_synonyms'            => $this->clean($this->inputs['plant_synonyms']),
                'plant_taxonomy_class'      => $this->clean($this->inputs['plant_taxonomy_class']),
                'plant_taxonomy_family'     => $this->clean($this->inputs['plant_taxonomy_family']),
                'plant_taxonomy_genus'      => $this->clean($this->inputs['plant_taxonomy_genus']),
                'plant_taxonomy_kingdom'    => $this->clean($this->inputs['plant_taxonomy_kingdom']),
                'plant_taxonomy_order'      => $this->clean($this->inputs['plant_taxonomy_order']),
                'plant_taxonomy_phylum'     => $this->clean($this->inputs['plant_taxonomy_phylum']),
                'plant_description'         => $this->clean($this->inputs['plant_description']),
                'plant_img'                 => $fileName,
            );

            return $this->insertIfNotExist($this->table, $form, "$this->name = '".$this->inputs[$this->name]."'");
        }
    }

    public function edit()
    {
        $primary_id = $this->inputs[$this->pk];
        $is_exist = $this->select($this->table, $this->pk, "$this->name = '".$this->inputs[$this->name]."' AND $this->pk != '$primary_id'");
        if ($is_exist->num_rows > 0) {
            return 2;
        } else {
            $form = array(
                $this->name                 =>  $this->clean($this->inputs[$this->name]),
                'plantid'                   => $this->clean($this->inputs['plantid']),
                'plant_name_authority'      => $this->clean($this->inputs['plant_name_authority']),
                'plant_synonyms'            => $this->clean($this->inputs['plant_synonyms']),
                'plant_taxonomy_class'      => $this->clean($this->inputs['plant_taxonomy_class']),
                'plant_taxonomy_family'     => $this->clean($this->inputs['plant_taxonomy_family']),
                'plant_taxonomy_genus'      => $this->clean($this->inputs['plant_taxonomy_genus']),
                'plant_taxonomy_kingdom'    => $this->clean($this->inputs['plant_taxonomy_kingdom']),
                'plant_taxonomy_order'      => $this->clean($this->inputs['plant_taxonomy_order']),
                'plant_taxonomy_phylum'     => $this->clean($this->inputs['plant_taxonomy_phylum']),
                'plant_description'         => $this->clean($this->inputs['plant_description']),
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

    public function delete_entry()
    {
        $id = $this->inputs['id'];

        return $this->delete($this->table, "$this->pk = $id");
    }


    public function name($primary_id)
    {
        $result = $this->select($this->table, $this->name, "$this->pk = '$primary_id'");
        $row = $result->fetch_assoc();
        return $row[$this->name];
    }
}
