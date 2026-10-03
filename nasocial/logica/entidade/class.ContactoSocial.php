<?php
/**
 * Description of class
 *
 * @author hash
 */
class ContactoSocial {
    private $facebook;
    private $twitter;
    private $google;
    private $instagram;
    //
    public function getFacebook() {
        return $this->facebook;
    }
    public function setFacebook($facebook) {
        $this->facebook = $facebook;
    }
    //
    public function getTwitter() {
        return $this->twitter;
    }
    public function setTwitter($twitter){
        $this->twitter = $twitter;
    }
    //
    public function getGoogle(){
        return $this->google;
    }
    public function setGoogle($google){
        $this->google = $google;
    }
    //
    public function getInstagram(){
        return $this->instagram;
    }
    public function setInstagram($instagram){
        $this->instagram = $instagram;
    }
}
