<?php

    class SectionDAO{

        private static $db;

        public static function initializeDb_gfr_91(){
            self::$db = new PDOService('Section');
        }

        public static function getSections_gfr_91() : Array{
            $sql = "SELECT SectionID, Semester, InstructorName, ShortName FROM Section INNER JOIN Course ON Section.CourseID = Course.CourseID";
            //Query
            self::$db->query($sql);
            //Execute SQL
            self::$db->execute();
            //Return the Section array
            return self::$db->resultSet();
        }

        public static function deleteSection_gfr_91(int $sectionId){
            //SQL
            $sql = "DELETE FROM Section WHERE SectionID = :id";

            self::$db->query($sql);
            self::$db->bind(":id", $sectionId);
            self::$db->execute();

            return self::$db->rowCount();
        }

        public static function insertSection_gfr_91(Section $newSection){
            $sql = "INSERT INTO Section (Semester,InstructorName,CourseID) VALUES
            (:semester,:instructorName,:shortName)";
            self::$db->query($sql);

            self::$db->bind(":semester",$newSection->getSemester());
            self::$db->bind(":instructorName",$newSection->getInstructorName());
            self::$db->bind(":shortName",$newSection->getCourseId());

            //Execute
            self::$db->execute();

            return self::$db->lastInsertedId();
        }

        public static function editSection_gfr_91(Section $newSection){
            $sql = "UPDATE Section SET Semester=:semester, InstructorName=:instructorName, CourseID=:shortName WHERE SectionID =:id";
            
            self::$db->query($sql);

            self::$db->bind(":id",$newSection->getSectionId());
            self::$db->bind(":semester",$newSection->getSemester());
            self::$db->bind(":instructorName",$newSection->getInstructorName());
            self::$db->bind(":shortName",$newSection->getCourseId());

            self::$db->execute();

            return self::$db->lastInsertedId();
        }

        public static function selectSection_gfr_91(int $sectionId){
            $sql = "SELECT * FROM Section WHERE SectionID = $sectionId";

            self::$db->query($sql);
            self::$db->execute();
            
            return self::$db->resultSet();
        }
    }