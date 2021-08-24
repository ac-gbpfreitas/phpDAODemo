<?php
/*
CourseID INT AUTO_INCREMENT PRIMARY KEY,
    ShortName TINYTEXT,
    LongName TINYTEXT
*/
    class Course {
        private $CourseID;
        private $ShortName;
        private $LongName;

        public function getCourseId() : int{
            return $this->CourseID;
        }
        public function getShortName() : String{
            return $this->ShortName;
        }
        public function getLongName() : String{
            return $this->LongName;
        }

        public function setShortName(String $nShortName) {
            $this->ShortName = $nShortName;
        }
        public function setLongName(String $nLongName) {
            $this->LongName = $nLongName;
        }

    }