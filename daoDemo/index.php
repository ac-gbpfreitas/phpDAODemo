<?php

//Config Page
require_once("inc/config.inc.php");

//Entities Pages
require_once("inc/Entities/Student.class.php");
require_once("inc/Entities/Course.class.php");
require_once("inc/Entities/Section.class.php");
require_once("inc/Entities/Enrollment.class.php");

//Utilities Pages
require_once("inc/Utilities/PDOService.class.php");
require_once("inc/Utilities/SectionDAO.class.php");
require_once("inc/Utilities/CourseDAO.class.php");
require_once("inc/Utilities/Page.class.php");

//Initialize Section and Course List db
SectionDAO::initializeDb_gfr_91();
CourseDAO::initializeDb_gfr_91();

if( !empty($_GET['action']) && ($_GET['action'] == "delete") ){
    SectionDAO::deleteSection_gfr_91($_GET['id']);
}

if(!empty($_POST)){

    if($_POST['action'] == "insert"){
        $newSection = new Section();
        $newSection->setSemester($_POST['semester']);
        $newSection->setInstructorName($_POST['instructorName']);
        $newSection->setCourseId($_POST['shortName']);
        SectionDAO::insertSection_gfr_91($newSection);
    }

    if($_POST['action'] == "edit"){
        $newSection = new Section();
        $newSection->setSectionId($_POST['sectionId']);
        $newSection->setSemester($_POST['semester']);
        $newSection->setInstructorName($_POST['instructorName']);
        $newSection->setCourseId($_POST['shortName']);
        SectionDAO::editSection_gfr_91($newSection);
    }
}

$courseList = CourseDAO::getCourseName_gfr_91();

Page::header_gfr_91();
if(!empty($_GET) && $_GET['action'] == "edit"){
    $section = SectionDAO::selectSection_gfr_91($_GET['id']);
    Page::editForm_gfr_91($section,$courseList);
} else {
    Page::insertForm_gfr_91($courseList);
}
$sectionRs = SectionDAO::getSections_gfr_91();

Page::sectionTable_gfr_91($sectionRs);

Page::foot_gfr_91();