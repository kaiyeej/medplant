<?php

class HealthAssessment extends Connection
{
    private $table = 'tbl_health_assessment';
    public $pk = 'assessment_id';
    public $name = 'assessment_name';

    public function add()
    {
        $entity_id = $this->clean($this->inputs['entity_id']);
        $is_exist = $this->select($this->table, $this->pk, "entity_id = '$entity_id'");
        if ($is_exist->num_rows > 0) {
            $id = $is_exist->fetch_array();
            return $id[0];
        } else {
            if (isset($_FILES['file']['tmp_name'])) {
                $assessment_img = $_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'], '../vendors/assessment/' . $assessment_img);
            } else {
                $assessment_img = "";
            }

            $form = array(
                $this->name                 =>  $this->clean($this->inputs[$this->name]),
                'entity_id'                 => $this->clean($this->inputs['entity_id']),
                'is_healthy'                => $this->clean($this->inputs['is_healthy']),
                'assessment_common_name'    => $this->clean($this->inputs['assessment_common_name']),
                'assessment_description'    => $this->clean($this->inputs['assessment_description']),
                'assessment_biological'     => $this->clean($this->inputs['assessment_biological']),
                'assessment_prevention'     => $this->clean($this->inputs['assessment_prevention']),
                'assessment_img'                 => $assessment_img,
            );

            return $this->insertIfNotExist($this->table, $form, "$this->name = '".$this->inputs[$this->name]."'");
        }
    }

    public function scan()
    {
        $entity_id = $this->clean($this->inputs['entity_id']);
        $is_exist = $this->select($this->table, $this->pk, "entity_id = '$entity_id'");
        if ($is_exist->num_rows > 0) {
            $id = $is_exist->fetch_array();
            return $id[0];
        } else {

            $img = $this->inputs['assessment_img'];
            $folderPath = "../vendors/assessment/";
          
            $image_parts = explode(";base64,", $img);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
          
            $image_base64 = base64_decode($image_parts[1]);
            $fileName = uniqid() . '.png';
          
            $file = $folderPath . $fileName;
            file_put_contents($file, $image_base64);

            $form = array(
                $this->name                 =>  $this->clean($this->inputs[$this->name]),
                'entity_id'                 => $this->clean($this->inputs['entity_id']),
                'is_healthy'                => $this->clean($this->inputs['is_healthy']),
                'assessment_common_name'    => $this->clean($this->inputs['assessment_common_name']),
                'assessment_description'    => $this->clean($this->inputs['assessment_description']),
                'assessment_biological'     => $this->clean($this->inputs['assessment_biological']),
                'assessment_prevention'     => $this->clean($this->inputs['assessment_prevention']),
                'assessment_img'            => $fileName,
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
                'entity_id'                   => $this->clean($this->inputs['entity_id']),
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
