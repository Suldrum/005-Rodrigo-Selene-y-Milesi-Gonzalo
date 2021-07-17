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

    function showHome() {
        $this->view->showHomeVista();
    }

    function showPokedex($pagina){
        $listaRegiones = $this->modelRegion->getAll();
        $listaTipos = $this->modelTipo->getAll();
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

    function showPokedexFilter($pagina){
        $id_tipo_elemental= $_GET['tipo_elemental'];
        $id_region= $_GET['region'];
        if (($id_region != "NADA") && ($id_tipo_elemental != "NADA"))
        {    
            $pokeTotal = $this->model->countPokemonFilterAll($id_region,$id_tipo_elemental);
            $currentpage = $this->getPage($pagina,$pokeTotal->total);
            $offset = $this->getOffSet($currentpage);
            $listaPokemones = $this->model->getAllFiltro($offset, ROWSPERPAGE, $id_region,$id_tipo_elemental);
            
        }
        else
        {
            if ($id_region != "NADA")
            {
                $pokeTotal = $this->model->countPokemonFilterByRegion($id_region);
                $currentpage = $this->getPage($pagina,$pokeTotal->total);
                $offset = $this->getOffSet($currentpage);
                $listaPokemones = $this->model->getAllByRegion($offset, ROWSPERPAGE,$id_region);
            }
            else
            {
                if ($id_tipo_elemental != "NADA")
                {
                    $pokeTotal = $this->model->countPokemonFilterByType($id_tipo_elemental);
                    $currentpage = $this->getPage($pagina,$pokeTotal->total);
                    $offset = $this->getOffSet($currentpage);
                    $listaPokemones = $this->model->getAllByType($offset, ROWSPERPAGE,$id_tipo_elemental);
                    
                }
                else{
                        if (($id_region == "NADA") && ($id_tipo_elemental == "NADA"))
                            header("Location: " . BASE_URL . "dexter/1");
                    }
            }
            
        }
        $listaRegiones = $this->modelRegion->getAll();
        $listaTipos = $this->modelTipo->getAll();
        $cantPaginas = ceil ($pokeTotal->total / ROWSPERPAGE) ;
        $this->view->ShowPokedexVista ($listaPokemones,$listaRegiones,$listaTipos,$cantPaginas);
    }

    public function paginationPokemon($pagina)
    {
        
        $pokeTotal = $this->model->countPokemon();
        $currentpage= $this->getPage($pagina,$pokeTotal->total);
        $offset = $this->getOffSet($currentpage) ;
        $dexter = $this->model->paginationPokemon($offset, ROWSPERPAGE );
        return ($dexter);
    }

    function getPage($pagina,$totalRows)
    {
        $totalpages = ceil ($totalRows / ROWSPERPAGE);
        if (isset($pagina) && is_numeric($pagina)) {
            $currentpage = (int) $pagina;
        } else {
        $currentpage = 1;
        } 
        if ($currentpage > $totalpages) {
            $currentpage = $totalpages;
        } 
        if ($currentpage < 1) {
            $currentpage = 1;
        } 
       return ($currentpage);

    }

    function getOffSet($currentpage)
    {
        return ($currentpage - 1) * ROWSPERPAGE ;
    }

}