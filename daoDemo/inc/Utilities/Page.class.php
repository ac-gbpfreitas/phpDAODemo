<?php

    class Page {
        public static $title = "Lab 08 - GFR - 91";

        public static function header_gfr_91(){
            echo '
            <!DOCTYPE html>
                <html lang="en">
                <head>
                    <!-- Required meta tags -->
                    <meta charset="utf-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

                    <!-- Bootstrap CSS -->
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
                    <link rel="stylesheet" href="css/style.css">

                    <title>'.self::$title.'</title>
                </head>
                <body>
                    <div class="container">
						<div class="header">
                        <h1>'.self::$title.'</h1>
						</div>
            ';
        }

        public static function foot_gfr_91(){
            echo '
                </div>
                <!-- Optional JavaScript; choose one of the two! -->
                <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

                <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
                -->
            </body>
            </html>
            ';
        }

        public static function insertForm_gfr_91(Array $courseList){
            
            echo '
                <hr>
                <form action="'.$_SERVER['PHP_SELF'].'" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="action" value="insert">
                    <table>
                        <thead>
                            <th colspan="2">Create Section</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Semester: </td>
                                <td><input type="text" name="semester" maxlength="3" size="15"></td>
                            </tr>
                            <tr>
                                <td>Instructor: </td>
                                <td><input type="text" name="instructorName" size="15"></td>
                            </tr>
                            <tr>
                                <td>Course: </td>
                                <td>
                                    <select name="shortName">';
                                    for($i = 0; $i < count($courseList); $i++){
                                        echo '<option value="'.$courseList[$i]->getCourseId().'">'.
                                            $courseList[$i]->getShortName()
                                        .'</option>';
                                    }
                                        
                                echo '</select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="submit" value="Create"></td>
                            </tr>
                        </tbody>
                    </table>       
                </form>
                <hr>
            ';
        }

        public static function editForm_gfr_91($section, Array $courseList){
            echo '
            <hr>
                <form action="'.$_SERVER['PHP_SELF'].'" method="POST" enctype="multipart/form-data">
                    <table>
                        <thead>
                            <th colspan="2">Edit Section - '.$section[0]->getSectionId().'</th>
                            <input type="hidden" name="sectionId" value="'.$section[0]->getSectionId().'">
                        </thead>
                        <tbody>
                            <tr>
                                <td>Semester: </td>
                                <td>
                                    <input type="text" name="semester" maxlength="3" size="15" value="'.$section[0]->getSemester().'">
                                </td>
                            </tr>
                            <tr>
                                <td>Instructor: </td>
                                <td>
                                    <input type="text" name="instructorName" size="15" value="'.$section[0]->getInstructorName().'">
                                </td>
                            </tr>
                            <tr>
                                <td>Course: </td>
                                <td>
                                <select name="shortName">';
                                for($i = 0; $i < count($courseList); $i++){

                                    if($section[0]->getCourseId() == $courseList[$i]->getCourseId()){
                                        echo '<option selected value="'.$courseList[$i]->getCourseId().'">'.
                                        $courseList[$i]->getShortName()
                                        .'</option>';
                                    }
                                    echo '<option value="'.$courseList[$i]->getCourseId().'">'.
                                        $courseList[$i]->getShortName()
                                    .'</option>';
                                }
                                    
                            echo '</select>
                                </td>
                                <input type="hidden" value="edit" name="action">
                            </tr>
                            <tr>
                                <td colspan="2"><input type="submit" value="Edit"></td>
                            </tr>
                        </tbody>
                    </table>       
                </form>
                <hr>
            ';
        }

        public static function sectionTable_gfr_91(Array $section){
            
            echo '
            <form method="GET" action="'.$_SERVER['PHP_SELF'].'" ecntype="multipart/form-data">
                <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">SectionId</th>
                    <th scope="col">Semester</th>
                    <th scope="col">Instructor</th>
                    <th scope="col">Course</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>';
                for($i = 0; $i < count($section); $i++){
                    echo '
                    <tr>
                        <th>'.$section[$i]->getSectionId().'</th>
                        <td>'.$section[$i]->getSemester().'</td>
                        <td>'.$section[$i]->getInstructorName().'</td>
                        <td>'.$section[$i]->ShortName.'</td>
                        <td><a href="?action=edit&id='.$section[$i]->getSectionId().'">Edit</a></td>
                        <td><a href="?action=delete&id='.$section[$i]->getSectionId().'">Delete</a></td>
                    </tr>
                    ';
                }
                echo '
                </tbody>
                </table>
            </form>
            ';
        }
    }