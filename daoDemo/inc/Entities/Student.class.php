<?php


    class Student {
        private $studentID;
        private $name;
        private $email;
        private $age;
        private $dateOfBirth;

        public function getStudentId() : int {
            return $this->studentID;
        }
        public function getName() : String {
            return $this->name;
        }
        public function getEmail() : String {
            return $this->email;
        }
        public function getAge() : int {
            return $this->age;
        }
        public function getDateOfBirth() : String {
            return $this->dateOfBirth;
        }

        public function setName(String $nName){
            $this->name = $nName;
        }
        public function setEmail(String $nEmail){
            $this->email = $nEmail;
        }
        public function setAge(int $nAge){
            $this->age = $nAge;
        }
        public function setDateOfBirth(String $nDateOfBirth){
            $this->dateOfBirth = $nDateOfBirth;
        }
    }