<?php

    class Section {
        private $SectionID;
        private $Semester;
        private $InstructorName;
        private $CourseID;

        public function getSectionId() : int{
            return $this->SectionID;
        }
        public function getSemester() : String{
            return $this->Semester;
        }
        public function getInstructorName() : String{
            return $this->InstructorName;
        }
        public function getCourseId() : int{
            return $this->CourseID;
        }

        public function setSectionId(int $nSectionID){
            $this->SectionID = $nSectionID;
        }
        public function setSemester(String $nSemester) {
            $this->Semester = $nSemester;
        }
        public function setInstructorName(String $nInstructorName) {
            $this->InstructorName = $nInstructorName;
        }
        public function setCourseId(int $nCourseId){
            $this->CourseID = $nCourseId;
        }

    }