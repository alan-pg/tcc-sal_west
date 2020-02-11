<?php

namespace Classes;

class ClassLayout {

    public function setHeadRestrito() {
        $session = new ClassSessions();
        $session->verifyInsideSession();
    } 

    #Setar as tags do head

    public static function setHead($title, $description, $author = 'TCC-Alan-Bruno-Fernando-Alexander') {
        $html = "<!doctype html>\n";
        $html .= "<html lang='pt-br'>\n";
        $html .= "<head>\n";
        $html .= "  <meta charset='UTF-8'>\n";
        $html .= "  <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>\n";
        $html .= "  <meta name='author' content='$author'>\n";
        $html .= "  <meta name='format-detection' content='telephone=no'>\n";
        $html .= "  <meta name='description' content='$description'>\n";
        $html .= "  <title>$title</title>\n";
        #FAVICON
        $html .= " <link rel='stylesheet' href='" . DIRPAGE . "lib/vendor/fontawesome-free/css/all.min.css'>\n";
        $html .= " <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i'>\n";

        
        $html .= " <link rel='stylesheet' href='" . DIRPAGE . "lib/css/sb-admin-2.min.css'>\n";
        
        $html .= " <link rel='stylesheet' href='" . DIRPAGE . "lib/vendor/datatables/dataTables.bootstrap4.min.css'>\n";


        $html .= "</head>\n\n";
        $html .= "<body id='page-top'>\n";
        echo $html;
    }

    #Setar as tags do footer

    public static function setFooter() {
        $html = "<script src='" . DIRPAGE . "lib/js/zepto.min.js'></script>\n";
        $html .= "<script src='" . DIRPAGE . "lib/js/vanilla-masker.min.js'></script>\n";      
        
        $html .= "<script src='" . DIRPAGE . "lib/vendor/jquery/jquery.min.js'></script>\n";
        $html .= "<script src='" . DIRPAGE . "lib/vendor/bootstrap/js/bootstrap.bundle.min.js'></script>\n";
        $html .= "<script src='" . DIRPAGE . "lib/vendor/jquery-easing/jquery.easing.min.js'></script>\n";
        $html .= "<script src='" . DIRPAGE . "lib/js/sb-admin-2.min.js'></script>\n";
        
        $html .= "<script src='" . DIRPAGE . "lib/js/javascript.js'></script>\n";
        
        $html .= "<script src='" . DIRPAGE . "lib/vendor/datatables/jquery.dataTables.min.js'></script>\n";
        $html .= "<script src='" . DIRPAGE . "lib/vendor/datatables/dataTables.bootstrap4.min.js'></script>\n";
        $html .= "<script src='" . DIRPAGE . "lib/js/demo/datatables-demo.js'></script>\n";
        //$html .= "<script src='" . DIRPAGE . "lib/vendor/chart.js/Chart.min.js'></script>\n";
        //$html .= "<script src='" . DIRPAGE . "lib/js/demo/chart-area-demo.js'></script>\n";
        //$html .= "<script src='" . DIRPAGE . "lib/js/demo/chart-pie-demo.js'></script>\n";




        $html .= "</body>\n";
        $html .= "</html>";
        echo $html;
    }

}
