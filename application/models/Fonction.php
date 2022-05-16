<?php
if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fonction extends CI_Model{

    public function getCauses(){
        $req = "select * from cause";
        $query = $this->db->query($req);
        $val1 = array();
        foreach($query->result_array() as $row){
             $val1[] = $row;
        }
         return $val1;
    }

    public function getCauseById($id){
        $req = "select * from cause where id=".$id;
        $query = $this->db->query($req);
        $val1 = array();
        foreach($query->result_array() as $row){
             $val1[] = $row;
        }
        return $val1[0];
    }

    public function getConsequences(){
        $req = "select * from consequence";
        $query = $this->db->query($req);
        $val1 = array();
        foreach($query->result_array() as $row){
             $val1[] = $row;
        }
         return $val1;
    }

    public function getConsequenceById($id){
        $req = "select * from consequence where id=".$id;
        $query = $this->db->query($req);
        $val1 = array();
        foreach($query->result_array() as $row){
             $val1[] = $row;
        }
        return $val1[0];
    }

    public function getSolutions(){
        $req = "select * from solution";
        $query = $this->db->query($req);
        $val1 = array();
        foreach($query->result_array() as $row){
             $val1[] = $row;
        }
         return $val1;
    }

    public function getSolutionById($id){
        $req = "select * from solution where id=".$id;
        $query = $this->db->query($req);
        $val1 = array();
        foreach($query->result_array() as $row){
             $val1[] = $row;
        }
        return $val1[0];
    }

    public function getContinents(){
        $req = "select * from continent";
        $query = $this->db->query($req);
        $val1 = array();
        foreach($query->result_array() as $row){
             $val1[] = $row;
        }
         return $val1;
    }
    public function getContinentById($id){
        $req = "select * from continent where id=".$id;
        $query = $this->db->query($req);
        $val1 = array();
        foreach($query->result_array() as $row){
             $val1[] = $row;
        }
         return $val1[0]['nom'];
    }

    public function getActualites(){
        $req = "select * from actualite";
        $query = $this->db->query($req);
        $val1 = array();
        foreach($query->result_array() as $row){
             $val1[] = $row;
        }
         return $val1;
    }

    public function getActualiteById($id){
        $req = "select * from actualite where id=".$id;
        $query = $this->db->query($req);
        $val1 = array();
        foreach($query->result_array() as $row){
             $val1[] = $row;
        }
        return $val1[0];
    }

    public function getActualiteByCont($id){
        $req = "select * from actualite where idcontinent=".$id;
        $query = $this->db->query($req);
        $val1 = array();
        foreach($query->result_array() as $row){
             $val1[] = $row;
        }
         return $val1;
    }

    public function login($email, $mdp){
        $req = "select * from admin where login='".$email."'";
        $query = $this->db->query($req);
        $val1 = array();
		foreach($query->result_array() as $row){
			$val1[] = $row;
		}
        if($val1 !=null){
            if($val1[0]['mdp'] == sha1($mdp)){
                $rep = 0;
            }
            else{
                $rep= 1;
                return $rep;
            }
        }else{
            $rep = 2;
            return $rep;
        }
    }


    public function getAllTable(){
        $req = "show tables";
        $query = $this->db->query($req);
        $val1 = array();
        foreach($query->result_array() as $row){
             $val1[] = $row;
        }
         return $val1;
    }

    public function selectgen($table){
        $req = "select * from ".$table;
        $query = $this->db->query($req);
        $val1 = array();
        foreach($query->result_array() as $row){
             $val1[] = $row;
        }
         return $val1;
    }

    public function supprActu($id){
        $req = "delete from actualite where id=".$id;
        $this->db->query($req);
    }

    public function modifActu($id, $titre, $idcontinent, $description, $date, $url){
        $req = "update actualite set titre='".$titre."',idcontinent=".$idcontinent.", description='".$description."', date='".$date."', url='".$url."' where id=".$id;
        $this->db->query($req);
    }
    
    public function insertActu($titre, $idcontinent, $description, $date){
        $url= $this->createSlug($titre);
        $req= "insert into actualite values(null, '".$titre."', ".$idcontinent.", '".$description."', '".$date."', '".$url."')";
        $this->db->query($req);
    }

    function createSlug($str, $delemiter = '-'){
        $slug = strtolower(trim(preg_replace('/[\s-]+/', $delemiter, preg_replace('/[^A-Za-z0-9-]+/', $delemiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', $delemiter,iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delemiter));
        return $slug;
    }

    function actuHtml($actu, $continent){
        file_put_contents($actu['url'].".html", '<section id="about-us" class="about-us padd-section">
        <div class="container" data-aos="fade-up">
          <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
              <div class="about-content" data-aos="fade-left" data-aos-delay="100">
                  <h1><span>'.$actu['titre'].'</span></h1>
                  <center><h2><span>Continent: </span>'.$continent.'</h2></center>
                  <center><h3><span>Date: </span>'.$actu['date'].'</h3></center>
                  </br>
                  <p>'.$actu['description'].'</p>
              </div>
            </div>
  
          </div>
        </div>
      </section>');
    }

    function causeHtml($cause, $image){
        file_put_contents($cause['url'].".html", '<section id="about-us" class="about-us padd-section">
        <div class="container" data-aos="fade-up">
          <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
              <div class="about-content" data-aos="fade-left" data-aos-delay="100">
                  <center><img src="'.$image.'.jpg)" alt="img"></center>
                  <br/>
                  <h1><span>'.$cause['titre'].'</span></h1>
                  <p>'.$cause['description'].'</p>
              </div>
            </div>
  
          </div>
        </div>
      </section>
        ');
    }

    function consHtml($cons, $image){
        file_put_contents($cons['url'].".html", '<section id="about-us" class="about-us padd-section">
        <div class="container" data-aos="fade-up">
          <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
              <div class="about-content" data-aos="fade-left" data-aos-delay="100">
                  <center><img src="'.$image.'" alt="img"></center>
                  <br/>
                  <h1><span>' .$cons['titre'].'</span></h1>
                  <p>'.$cons['description'].'</p>
              </div>
            </div>
  
          </div>
        </div>
      </section>');
    }

    function solHtml($solution, $image){
        file_put_contents($solution['url'].".html", '<section id="about-us" class="about-us padd-section">
        <div class="container" data-aos="fade-up">
          <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
              <div class="about-content" data-aos="fade-left" data-aos-delay="100">
                  <center><img src="'.$image.'" alt="img"></center>
                  <br/>
                  <h1><span>' .$solution['titre'].'</span></h1>
                  <p>'.$solution['description'].'"</p>
              </div>
            </div>
  
          </div>
        </div>
      </section>');
    }
}
?>