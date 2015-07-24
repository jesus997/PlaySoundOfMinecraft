<?php
	class Sound{
		var $name, $souce, $downloads;

		function __construct($data){
			$this->name = $data["name"];
			$this->souce = $data["source"];
			$this->downloads = $data["downloads"];
		}

		static function all(){
			$sort = "id";

			$all = array();
			$result = get_mysql()->query("select * from sounds order by $sort desc limit 100");

			while ($data = $result->fetch_assoc()) {
                $all[] = new Sound($data);
            }

            return $all;
		}

		static function forName($name){
			return new Sound(get_mysql()->query("select * from sounds where name='$name'")->fetch_assoc());
		}

		static function _downloads($name){
			$num = get_mysql()->query("select downloads from sounds where name='$name->name'")->fetch_assoc();
			if(isset($num) || !is_null($num)){
				if(count($num) > 0){
					return $num["downloads"];
				}
			}

			return 0;
		}

		static function downUp($name){
			$int = $name->downloads + 1;
			get_mysql()->query("update sounds set downloads='$int' where name='$name->name'");
			return $int;
		}
	}

	function get_mysql() {
        $conn = new mysqli("localhost", "root", "", "LSMC");

        if ($conn->connect_error) {
            die("Connection error: " . $conn->connect_error . " (" . $conn->connect_errno . ")");
        }

        return $conn;
    }
?>