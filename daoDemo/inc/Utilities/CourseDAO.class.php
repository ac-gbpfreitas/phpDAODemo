<?php

    class CourseDAO {
        private static $db;

        public static function initializeDb_gfr_91(){
            self::$db = new PDOService('Course');
        }

        public static function getCourseName_gfr_91() : Array {
            $sql = "SELECT DISTINCT CourseID,ShortName FROM course ORDER BY ShortName";
            
            //Query
            self::$db->query($sql);
            //Execute
            self::$db->execute();
            //Return an Array of Courses
            return self::$db->resultSet();
        }
    }