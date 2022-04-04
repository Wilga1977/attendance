<?php
    class crud {

        private $db;

        function __construct($conn){
            $this->db = $conn;
        }

        public function insertAttendees($fname,$lname,$dob, $email, $contact,$speciality){
            try {
                $sql = "INSERT INTO attendee (firstname,lastname,dateofbirth,emailadress,contactnumber,speciality_id) values (:fname, :lname,:dob,:email,:contact,:speciality)";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(":lname",$lname);
                $stmt->bindparam(":dob",$dob);
                $stmt->bindparam(":email",$email);
                $stmt->bindparam(":contact",$contact);
                $stmt->bindparam("speciality",$speciality);
                $stmt->execute();
                return true;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
        // cette fonction modifie les données de la db, en se connectant à la table à travers 'id'.
        public function editAttendee($id,$fname,$lname,$dob, $email, $contact,$speciality){
            try{
                $sql = "UPDATE `attendee` SET `firstname`= :fname,`lastname`= :lname,`dateofbirth`= :dob,`emailadress`= :email,`contactnumber`= :phone,`speciality_id`= :speciality WHERE attendee_id =:id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(":lname",$lname);
                $stmt->bindparam(":dob",$dob);
                $stmt->bindparam(":email",$email);
                $stmt->bindparam(":phone",$contact);
                $stmt->bindparam(":speciality",$speciality);
                $stmt->execute();
                return true;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
            
        }
        public function deleteAttendee($id){
            try{
                $sql = "DELETE FROM `attendee` WHERE attendee_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            return true;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }

            
            
        }

        public function getAttendees(){
            try{
            $sql = "SELECT * FROM `attendee`a inner join specialities s on a.speciality_id = s.speciality_id";
            $result = $this->db->query($sql);
            return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
            
        }
        //cette fonction fusionne les données de la table "attendee" et celle de "specialities" et rend le résultat
        //à partir du paramètre "id".
        public function getAtendeesDetails($id){
            try{
                $sql = "SELECT * FROM attendee a INNER JOIN specialities s ON a.speciality_id = s.speciality_id where attendee_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
            

        }
        //cette fonction récupère les données de la table specialities et rend le résultat.
        public function getSpecialties(){
            try{
            $sql = "SELECT * FROM specialities";
            $result = $this->db->query($sql);
            return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
            
        }

    }
?>
