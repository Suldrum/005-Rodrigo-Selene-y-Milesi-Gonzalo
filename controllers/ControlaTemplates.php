<?php

include_once ('models/ModelPokemon.php');
include_once ('models/ModelRegion.php');
include_once ('models/ModelTipoElemental.php');
include_once ('views/ViewTemplates.php');

const ROWSPERPAGE = 7;
class ControlaTemplates {

    private $model;
    private $view;
    

    function __construct() {
        $this->model = new ModelPokemon();
        $this->modelRegion = new ModelRegion();
        $this->modelTipo = new ModelTipoElemental();
        $this->view = new Viewtemplates();
    }

    /*hay que seguir armandolo */
    function showHome() {
        $this->view->showHomeVista();
    }

    function showPokedex($pagina){
        $listaRegiones = $this->modelRegion->getAll();
        $listaTipos = $this->modelTipo->getAll();
    //    $listaPokemones = $this->model->getAll();
        $listaPokemones = $this->paginationPokemon($pagina);
        $pokeTotal = $this->model->countPokemon();
        $cantPaginas = ceil ($pokeTotal->total / ROWSPERPAGE) ;
        $this->view->ShowPokedexVista ($listaPokemones,$listaRegiones,$listaTipos,$cantPaginas);
    }



    function showTarjetaPokemon($idPokemon){
        
        $pokemon = $this->model->getPokemon($idPokemon);
        if (!$pokemon)
        {
            header("Location: " . BASE_URL . 'dexter');
            die();
        }
        $region = $this->modelRegion->getRegion($pokemon->id_region);
        $tipo1 = $this->modelTipo->getTipo_Elemental($pokemon->id_tipo_elemental);
        $tipo2 = $this->modelTipo->getTipo_Elemental($pokemon->id_tipo_elemental2);
        $this->view->ShowTarjetaVistaPokemon($pokemon,$region,$tipo1,$tipo2);
    }

    function showPokedexFilter(){
        $id_tipo_elemental= $_POST['F_id_tipo_elemental'];
        $id_region= $_POST['F_id_region'];
        if (($id_region != "NADA") && ($id_tipo_elemental != "NADA"))
        {    
            $listaPokemones = $this->model->getAllFiltro($id_region,$id_tipo_elemental);
        }
        else
        {
            if ($id_region != "NADA")
                $listaPokemones = $this->model->getAllByRegion($id_region);
            else
            {
                if ($id_tipo_elemental != "NADA")
                    $listaPokemones = $this->model->getAllByType($id_tipo_elemental);
                else{
                        if (($id_region == "NADA") && ($id_tipo_elemental == "NADA"))
                            header("Location: " . BASE_URL . 'dexter');
                    }
            }
            
        }
        $listaRegiones = $this->modelRegion->getAll();
        $listaTipos = $this->modelTipo->getAll();
        $this->view->ShowPokedexVista ($listaPokemones,$listaRegiones,$listaTipos);
    }

    public function paginationPokemon($pagina)
    {
        $pokeTotal = $this->model->countPokemon();
         // number of rows to show per page
         // find out total pages
         $totalpages = ceil ($pokeTotal->total / ROWSPERPAGE) ;
    //     // get the current page or set a default
         if (isset($pagina) && is_numeric($pagina)) {
         // cast var as int
         $currentpage = (int) $pagina;
         } else {
         // default page num
         $currentpage = 1;
         } // end if
 
         // if current page is greater than total pages...
         if ($currentpage > $totalpages) {
         // set current page to last page
         $currentpage = $totalpages;
         } // end if
         // if current page is less than first page...
         if ($currentpage < 1) {
         // set current page to first page
         $currentpage = 1;
         } // end if
 
         // the offset of the list, based on current page 
         $offset = ($currentpage - 1) * ROWSPERPAGE ;
        
       $dexter = $this->model->paginationPokemon($offset, ROWSPERPAGE );
       return ($dexter);

    }
}


  /******  build the pagination links ******/
        // range of num links to show
/*       
        $range = 3;

        // if not on page 1, don't show back links
        if ($currentpage > 1) {
        // show << link to go back to page 1
        echo " <a href='dexter/1'> << </a> ";
        // get previous page num
        $prevpage = $currentpage - 1;
        // show < link to go back to 1 page
        echo " <a href='dexter/$prevpage'><</a> ";
        } // end if 

        // loop to show links to range of pages around current page
        for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
        // if it's a valid page number...
        if (($x > 0) && ($x <= $totalpages)) {
            // if we're on current page...
            if ($x == $currentpage) {
                // 'highlight' it but don't make a link
                echo " [<b>$x</b>] ";
            // if not current page...
            } else {
                // make it a link
                echo " <a href='dexter/$x'>$x</a> ";
            } // end else
        } // end if 
        } // end for
                        
        // if not on last page, show forward and last page links        
        if ($currentpage != $totalpages) {
        // get next page
        $nextpage = $currentpage + 1;
            // echo forward link for next page 
        echo " <a href='dexter/$nextpage'>></a> ";
        // echo forward link for lastpage
        echo " <a href='dexter/$totalpages'>>></a> ";
        } // end if
        /****** end build pagination links ******/


