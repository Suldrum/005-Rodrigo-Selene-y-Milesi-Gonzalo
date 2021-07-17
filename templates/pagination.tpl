<ul class="pagination justify-content-center">
{if (($url[3] - 1) < 1)}  {$previosly =  1} {else} {$previosly =  $url[3] - 1}{/if}
{if (($url[3] + 1) > $cantPaginas)}  {$next =  $cantPaginas} {else} {$next =  $url[3] + 1}{/if}
{if ($url[2] != "dexter")}
    <li class="page-item"><a class="page-link" href="{$url[2]}/1?{$url[4]}"><<</a></li>
    <li class="page-item"><a class="page-link" href="{$url[2]}/{$previosly}?{$url[4]}">Previous</a></li>
    {for $pagina = 1 to $cantPaginas}
        {if ($url[3] == $pagina)}
            <li class="page-item active"><a class="page-link" href="{$url[2]}/{$pagina}?{$url[4]}"> {$pagina} </a></li>
        {else}
            <li class="page-item"><a class="page-link" href="{$url[2]}/{$pagina}?{$url[4]}">{$pagina}</a></li>
        {/if}
    {/for}
    <li class="page-item"><a class="page-link" href="{$url[2]}/{$next}?{$url[4]}">Next</a></li>
    <li class="page-item"><a class="page-link" href="{$url[2]}/{$cantPaginas}?{$url[4]}">>></a></li>
{else}
    <li class="page-item"><a class="page-link" href="{$url[2]}/1"><<</a></li>
    <li class="page-item"><a class="page-link" href="{$url[2]}/{$previosly}">Previous</a></li>
    {for $pagina = 1 to $cantPaginas}
        {if ($url[3] == $pagina)}
            <li class="page-item active"><a class="page-link" href="{$url[2]}/{$pagina}">{$pagina}</a></li>
        {else}
            <li class="page-item"><a class="page-link" href="{$url[2]}/{$pagina}">{$pagina}</a></li>
        {/if}
    {/for}
    <li class="page-item"><a class="page-link" href="{$url[2]}/{$next}">Next</a></li>
    <li class="page-item"><a class="page-link" href="{$url[2]}/{$cantPaginas}">>></a></li>
{/if}
</ul>

