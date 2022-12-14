<?php

class Profile extends Connection
{
    private $table = 'tbl_users';
    private $pk = 'user_id';
    private $name = 'username';

    public function add()
    {
        $username = $this->clean($this->inputs['username']);
        $is_exist = $this->select($this->table, $this->pk, "username = '$username'");
        if ($is_exist->num_rows > 0) {
            return 2;
        } else {
            $pass = $this->inputs['password'];
            $form = array(
                'user_fname' => $this->inputs['user_fname'],
                'user_mname' => $this->inputs['user_mname'],
                'user_lname' => $this->inputs['user_lname'],
                'user_email' => $this->inputs['user_email'],
                'user_contact_num' => $this->inputs['user_contact_num'],
                'user_category' => $this->inputs['user_category'],
                'date_added' => $this->getCurrentDate(),
                'username' => $this->inputs['username'],
                'password' => md5('$pass')
            );
            return $this->insert($this->table, $form);
        }
    }

    public function edit()
    {
        $primary_id = $_SESSION['mp_user_id'];
        $form = array(
            'user_fname' => $this->inputs['user_fname'],
            'user_mname' => $this->inputs['user_mname'],
            'user_lname' => $this->inputs['user_lname'],
            'user_email' => $this->inputs['user_email'],
            'user_contact_num' => $this->inputs['user_contact_num'],
        );
        return $this->update($this->table, $form, "$this->pk = '$primary_id'");
    }

    public function update_username()
    {
        $primary_id = $_SESSION['mp_user_id'];
        $username = $this->clean($this->inputs['username']);
        $is_exist = $this->select($this->table, $this->pk, "username = '$username' AND  $this->pk != '$primary_id'");
        if ($is_exist->num_rows > 0) {
            return 2;
        } else {
            $form = array(
                'username' => $username
            );
            return $this->update($this->table, $form, "$this->pk = '$primary_id'");
        }
    }


    public function update_password()
    {
        $primary_id = $this->inputs[$this->pk];
        $old_password = $this->inputs['old_password'];
        $is_exist = $this->select($this->table, $this->pk, "password = md5('$old_password') AND $this->pk = '$primary_id'");
        if ($is_exist->num_rows <= 0) {
            return 2;
        } else {
            $pass = $this->clean($this->inputs['new_password']);
            $form = array(
                'password' => md5($pass)
            );
            return $this->update($this->table, $form, "$this->pk = '$primary_id'");
        }
    }

    public function show()
    {
        $rows = array();
        $result = $this->select($this->table);
        while ($row = $result->fetch_assoc()) {
            $row['category'] = $row['user_category'] == "A" ? "Admin" : "Faculty";
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

    public static function name($primary_id)
    {
        $self = new self;
        $result = $self->select($self->table, $self->name, "$self->pk  = '$primary_id'");
        $row = $result->fetch_assoc();
        return $row[$self->name];
    }

    public function view_data()
    {
        $primary_id = $_SESSION['mp_user_id'];
        $result = $this->select($this->table, "*", "$this->pk = '$primary_id'");
        $row = $result->fetch_assoc();
        $fullname = $row['user_fname']." ".$row['user_mname']." ".$row['user_lname'];
        $cat = $row['user_category'] == "A" ? "Admin" : "User";
        return [$row['username'],$fullname,$cat,$row['user_email'],$row['date_last_modified']];
    }
}
