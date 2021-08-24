<?php

    class Enrollment {
        private $EnrollmentID;
        private $StudentID;
        private $SectionID;
        
        public function getEnrollmentId() : int{
            return $this->EnrollmentID;
        }
        public function getStudentId() : int {
            return $this->StudentID;
        }
        public function getSectionId() : int{
            return $this->SectionID;
        }
    }