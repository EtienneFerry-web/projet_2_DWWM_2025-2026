
<?php
    require_once'models/mother_model.php';

    class PersonModel extends Connect{

		public function findAllPerson(int $idMovie=0){

 	        $strRq	= " SELECT persons.*, nat_country AS 'pers_country'
                        FROM persons
                        LEFT JOIN participates ON persons.pers_id = participates.part_pers_id
                        LEFT JOIN movies ON participates.part_mov_id = movies.mov_id
                        LEFT JOIN nationalities ON persons.pers_nat_id = nationalities.nat_id
                        WHERE mov_id = $idMovie
                        GROUP BY pers_id";


		    return $this->_db->query($strRq)->fetchAll();
		}

	public function findPerson(int $idPerson=0){

        $strRq	= " SELECT persons.*, nat_country AS 'pers_country'
                    FROM persons
                    INNER JOIN nationalities ON persons.pers_nat_id = nationalities.nat_id
                    WHERE pers_id = $idPerson";



        return $this->_db->query($strRq)->fetch();
        }

    }
