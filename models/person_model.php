
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
		
		public function listPerson(){

        $strRq	= " SELECT pers_id, pers_name, pers_firstname
                    FROM persons";

        return $this->_db->query($strRq)->fetchAll();
        }

    	public function findPerson(int $idPerson=0){
    
            $strRq	= " SELECT persons.*, nat_country AS 'pers_country'
                        FROM persons
                        INNER JOIN nationalities ON persons.pers_nat_id = nationalities.nat_id
                        WHERE pers_id = $idPerson";
    
    
    
            return $this->_db->query($strRq)->fetch();
        }
    //Search of Actor
    public function findActor(){

            $strRq	= " SELECT pers_id, pers_name, pers_firstname
                        FROM persons
                        INNER JOIN participates ON persons.pers_id = participates.part_pers_id
                        INNER JOIN jobs ON participates.part_job_id = jobs.job_id
                        WHERE pers_id IN (	SELECT part_pers_id
                                       	FROM participates
                                       	WHERE part_job_id = 3)
                        GROUP BY pers_id;";

            return $this->_db->query($strRq)->fetchAll();

    }
    //Search of realisator
    public function findReal(){
            $strRq	= " SELECT pers_id, pers_name, pers_firstname
                        FROM persons
                        INNER JOIN participates ON persons.pers_id = participates.part_pers_id
                        INNER JOIN jobs ON participates.part_job_id = jobs.job_id
                        WHERE pers_id IN (	SELECT part_pers_id
                                       	FROM participates
                                       	WHERE part_job_id = 1)
                        GROUP BY pers_id;";

            return $this->_db->query($strRq)->fetchAll();
        }
    //Search of Producer
    public function findProducer(){
            $strRq	= " SELECT pers_id, pers_name, pers_firstname
                        FROM persons
                        INNER JOIN participates ON persons.pers_id = participates.part_pers_id
                        INNER JOIN jobs ON participates.part_job_id = jobs.job_id
                        WHERE pers_id IN (	SELECT part_pers_id
                                       	FROM participates
                                       	WHERE part_job_id = 2)
                        GROUP BY pers_id;";

            return $this->_db->query($strRq)->fetchAll();
        }

    public function findJobsOfPerson(int $idPerson=0):array{
        $strRq	= " SELECT job_id ,  job_name AS 'job_NameJob'
                    FROM jobs
                    WHERE job_id IN (	SELECT part_job_id
                                   	FROM participates
                                   	WHERE part_pers_id = $idPerson
                               	) ";

        return $this->_db->query($strRq)->fetchAll();
    }
        
    public function deletePerson(int $intId){
		$strRq = "DELETE FROM persons
				  WHERE pers_id = :id";

		$rqPrep = $this->_db->prepare($strRq);
		$rqPrep->bindValue(':id', $intId, PDO::PARAM_INT);

		return $rqPrep->execute();
    }

    }
