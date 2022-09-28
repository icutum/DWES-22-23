<?php
    require("./fpdf/fpdf.php");

    function generarPDF($n, $e, $r, $f) {
        $pdf = new FPDF();
        $pdf -> AddPage();
        $pdf -> SetFont("Arial", "B", 24);
        $pdf -> MultiCell(0, 20, utf8_decode("Carta de motivación"), 0, "C");
        $pdf -> Line(10, 45, 200, 45);
        $pdf -> Ln();
        $pdf -> SetFont("Arial", "", 16);
        $pdf -> MultiCell(0, 10, utf8_decode("Estimado $r:"));
        $pdf -> Ln();
        $pdf -> MultiCell(0, 10, utf8_decode("Me pongo en contacto con usted tras haber visto que necesitan de un desarrollador web para sus oficinas en Madrid. Tras considerar que cumplo con los requisitos establecidos en la descripción de la oferta, me decidí por contactarle."));
        $pdf -> Ln();
        $pdf -> MultiCell(0, 10, utf8_decode("Tras varios años de experiencia en los que he tomado la responsabilidad de gestionar tanto el front-end como el back-end, considero que soy un candidato capaz de desenvolverse de forma autónoma en una ambiente dinámico como el que menciona en la descripción del puesto."));
        $pdf -> Ln();
        $pdf -> MultiCell(0, 10, utf8_decode("Con esta carta tendrá de forma adjunta mi curriculum vitae, junto con referencias de mi anterior posición. No obstante, me gustaría poder organizar un encuentro para poder explicar más detenidamente mi perfil profesional en relación con las responsabilidades y objetivos que afrontaría con ustedes, además de conocer más a fondo la situación de $e."));
        $pdf -> Ln();
        $pdf -> MultiCell(0, 10, utf8_decode("Atte.: $n"), 0, "R");
        $pdf -> MultiCell(0, 10, utf8_decode("$f"));
        $pdf -> Output();
        $pdf -> Close();
    }
?>